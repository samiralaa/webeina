<?php

namespace App\Http\Controllers\Admin\Project;

use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Projects\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('admin.project.index', compact('projects'));
    }

    public function show($id)
    {
        return response()->json($this->projectService->getProjectById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|array',
            'description' => 'required|array',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048', // Single image
            'images' => 'nullable|array', // Ensure images is an array
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10048', // Multiple images
        ]);

        // Upload main image if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = $path;
        }

        // Create the project
        $project = $this->projectService->createProject($data);

        // Upload multiple images if present
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $project->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function create()
    {
        return view('admin.project.create');
    }
}
