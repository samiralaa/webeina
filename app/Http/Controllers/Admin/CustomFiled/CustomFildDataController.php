<?php

namespace App\Http\Controllers\Admin\CustomFiled;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomField\CustomFieldRequest;
use App\Models\CustomFildData;
use App\Services\CustomFildData\CustomFildDataService;
use Illuminate\Http\Request;

class CustomFildDataController extends Controller
{

    public $CustomFildDataService;
    public function __construct(CustomFildDataService $CustomFildDataService)
    {
        $this->CustomFildDataService = $CustomFildDataService;
    }
    public function index()
    {

        return redirect()->route('custom.index');
    }

    public function store(CustomFieldRequest $request)
    {

        $data =  $this->CustomFildDataService->createCustomFildData($request->all());
        return redirect()->route('custom.index')->with('success', 'Custom Field Data Created Successfully');
    }
}
