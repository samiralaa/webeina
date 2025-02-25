<?php

namespace App\Http\Controllers\Admin\Choose;

use App\Http\Controllers\Controller;
use App\Models\Choose;
use Illuminate\Http\Request;

class ChooseController extends Controller
{
    public function index()
    {
        $data =  Choose::get();
        return view('admin.choose.index', compact('data'));
    }



    public function create($id)
    {
        // Fetch the service or throw 404 if not found
        return view('admin.choose.create', compact('id'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
            'icon' => 'required'
        ]);
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('uploads', 'public');
        }

        $step = new Choose();
        $step->service_id = $request->service_id;
        $step->icon = $path;
        $step->title = $request->title; // JSON format
        $step->description = $request->description; // JSON format
        $step->save();

        return redirect()->route('admin.choose.index')->with('success', 'Choose created successfully!');
    }
    public function edit($id)
    {
        $step = Choose::findOrFail($id);


        return view('admin.steps.edit', compact('step'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        $step = Choose::findOrFail($id);
        $step->title = $request->title; // JSON format
        $step->description = $request->description; // JSON format
        $step->save();

        return redirect()->route('admin.choose.index')->with('success', 'Choose updated successfully!');
    }
    public function destroy($id)
    {
        Choose::destroy($id);
        return redirect()->route('admin.choose.index')->with('success', 'Choose deleted successfully!');
    }
}
