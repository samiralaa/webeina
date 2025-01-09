<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubmitService\RequestSubmitService;
use App\Services\SubmitServices\SubmitServicesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitServiceController extends Controller
{
    protected $submitService;

    public function __construct(SubmitServicesService $submitService)
    {
        $this->submitService = $submitService;
    }

    public function store(RequestSubmitService $request)
    {
        $user_id = auth()->user()->id;
        $exists = DB::table('submit_services')
            ->where('user_id', $user_id)
            ->where('service_id', $request->service_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted this service.'
            ], 400);
        }
        $data = $this->submitService->SubmitServicesStore($request);

        return response()->json([
            'success' => 'Service submitted successfully',
            'data' => $data,
        ], 200);
    }

    public function getAllRequest()
    {
        $data = $this->submitService->getAllRequest();

        return view('admin.request.index', compact('data'));
    }
}
