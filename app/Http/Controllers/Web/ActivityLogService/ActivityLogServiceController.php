<?php

namespace App\Http\Controllers\Web\ActivityLogService;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Services\ActivityService\ActivityLogService;
use Illuminate\Http\Request;

class ActivityLogServiceController extends Controller
{
    protected $activityLogService;
    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    public function index()
    {
        $activityLogs = $this->activityLogService->allActivities();
        return view('admin.activity_log.index', compact('activityLogs'));
    }

    public function create()
    {
        $users = User::get();
        $services = Service::get();

        return view('admin.activity_log.create', compact('users', 'services'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'nullable|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|max:4048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/activity_log/'), $filename);
            $validatedData['file'] = 'uploads/activity_log/' . $filename;
        }
        // Pass the validated data as an array
        $this->activityLogService->storeActivity($validatedData);

        return redirect()->route('activity-log.index')->with('success', 'Activity log created successfully.');
    }
    public function edit($id)
    {
        $activityLog = $this->activityLogService->getActivityById($id);
        $users = User::get();
        $services = Service::get();
        return view('admin.activity_log.edit', compact('activityLog', 'users', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'nullable|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|max:4048',
            'status' => 'nullable|in:pending,completed,in_progress',
            'file_orginal_name' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/activity_log/'), $filename);
            $validatedData['file'] = 'uploads/activity_log/' . $filename;
        }
        $validatedData['status'] = $request->status;
        $validatedData['file_orginal_name'] = $request->file_orginal_name;
        // Pass the validated data as an array
        $this->activityLogService->updateActivity($id, $validatedData);

        return redirect()->route('activity-log.index')->with('success', 'Activity log updated successfully.');
    }
    public function destroy($id)
    {
        $this->activityLogService->deleteActivity($id);
        return redirect()->route('activity-log.index')->with('success', 'Activity log deleted successfully.');
    }
}
