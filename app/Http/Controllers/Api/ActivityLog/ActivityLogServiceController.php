<?php

namespace App\Http\Controllers\Api\ActivityLog;

use Carbon\Carbon;

use App\Models\ActivityLog;
use App\Services\ActivityService\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogServiceController
{
    protected $activityLogService;
    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }
    public function getDataForUser(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Fetch activity logs with relationships
        $activityLogs = ActivityLog::where('user_id', $userId)
            ->where('service_id', $validated['service_id'])
            ->with(['service', 'user']) // Load relationships
            ->get();

        // Format data for better response

        $formattedLogs = $activityLogs->map(function ($log) {
            return [
                'id' => $log->id,
                'name' => $log->name,
                'status' => $log->status,
                'created_at' => Carbon::parse($log->created_at)->format('d M Y, h:i A'),
                'file' => $log->file ? asset('public/uploads/activity_logs/' . $log->file) : null,

                'description' => $log->description,
                'service' => [
                    'id' => $log->service->id,
                    'name' => $log->service->name,
                    'icon' => asset('storage/' . $log->service->icon),
                    'description' => $log->service->description,
                ],
                'user' => [
                    'id' => $log->user->id,
                    'name' => $log->user->name,
                    'email' => $log->user->email,
                ],

            ];
        });

        // Return a clean JSON response
        return response()->json([
            'success' => true,
            'data' => $formattedLogs,
        ], 200);
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|max:2048',
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/activity_logs'), $filename);
            $validatedData['file'] = $filename;
            $validatedData['file_orginal_name'] = $request->file('file')->getClientOriginalName();
        }


        $validatedData['user_id'] = $userId;
        // Pass the validated data as an array
        $this->activityLogService->storeActivity($validatedData);

        return response()->json(['success' => true, 'message' => 'Activity Log created successfully'], 201);
    }

    public function show($id)
    {
        $activityLog = ActivityLog::where('id', $id)
            ->select('id', 'name', 'description', 'file', 'created_at', 'file_orginal_name', 'status')
            ->first();

        if ($activityLog) {
            try {
                // تحقق إذا كان created_at ليس فارغاً
                if ($activityLog->created_at) {
                    // استخدام Carbon لتحليل التاريخ بصيغة ISO 8601
                    $created_at = Carbon::parse($activityLog->created_at)
                        ->format('d M Y, h:i A'); // 23 Dec 2024, 07:32 AM
                } else {
                    // إذا كان التاريخ فارغاً
                    $activityLog->created_at = 'N/A';
                }
            } catch (\Exception $e) {
                // التعامل مع الأخطاء أثناء تحليل التاريخ
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to format the date.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            return response()->json([
                'success' => true,

                'data' => [
                    'name' => $activityLog->name,
                    'file_orginal_name' => (string)$activityLog->file_orginal_name,
                    'description' => $activityLog->description,
                    'status' => $activityLog->status,
                    'file' => asset('public/uploads/activity_logs/' . $activityLog->file),
                    'created_at' => $created_at
                ]
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Activity log not found'], 404);
        }
    }
    public function updateSubmitServiceDetails(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|max:2048',
        ]);
        $userId = Auth::id();
        $activityLog = ActivityLog::where('id', $id)->first();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/activity_logs'), $filename);
            $validatedData['file'] = $filename;
        }
        $activityLog->update($validatedData);
        return response()->json(['success' => true, 'message' => 'Activity Log updated successfully'], 200);
    }
}
