<?php

namespace App\Http\Controllers\Admin\Step;

use App\Models\Steps;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Steps\StepsService;

class StepController extends Controller
{
    protected $stepService;

    public function __construct(StepsService $stepService)
    {
        $this->stepService = $stepService;
    }

    public function index()
    {
        $data = $this->stepService->getAllSteps();
        return view('admin.Steps.index', compact('data'));
    }

    public function create($id)
    {
        // Fetch the service or throw 404 if not found
        return view('admin.steps.create', compact('id'));
    }
    public function show($id)
    {
        return response()->json($this->stepService->getStepsById($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
        ]);

        $step = new Steps();
        $step->service_id = $request->service_id;
        $step->title = $request->title; // JSON format
        $step->description = $request->description; // JSON format
        $step->save();

        return redirect()->route('admin.steps.index')->with('success', 'Step created successfully!');
    }
    public function edit($id)
    {
        $step = Steps::findOrFail($id);


        return view('admin.steps.edit', compact('step'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        $step = Steps::findOrFail($id);
        $step->title = $request->title; // JSON format
        $step->description = $request->description; // JSON format
        $step->save();

        return redirect()->route('admin.steps.index')->with('success', 'Step updated successfully!');
    }
    public function destroy($id)
    {
        Steps::destroy($id);
        return redirect()->route('admin.steps.index')->with('success', 'Step deleted successfully!');
    }

}
