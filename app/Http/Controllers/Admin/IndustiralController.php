<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industiral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustiralController extends Controller
{
    public function index($id)
    {
        $industrial = Industiral::where('service_id', $id)->get();

        return view('admin.industrial.index', compact('industrial','id'));
    }
    public function create($id)
    {

        return view('admin.industrial.create', compact('id'));
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

        $step = new Industiral();
        $step->service_id = $request->service_id;
        $step->icon = $path;
        $step->title = $request->title; // JSON format
        $step->description = $request->description; // JSON format
        $step->save();

        return redirect()->route('admin.industrial.index',$step->service_id)->with('success', 'Industrial added successfully');
    }
    public function edit($id)
    {


        $industrial = Industiral::find($id);
        return view('admin.industrial.edit', compact('industrial'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $industrial = Industiral::find($id);
        
        if ($request->hasFile('icon')) {
            // Delete old image if exists
            if ($industrial->icon && file_exists(storage_path('app/public/' . $industrial->icon))) {
                unlink(storage_path('app/public/' . $industrial->icon));
            }
            // Store new image
            $path = $request->file('icon')->store('uploads', 'public');
            $industrial->icon = $path;
        }

        $industrial->title = $request->title;
        $industrial->description = $request->description;
        $industrial->save();

        return redirect()->route('admin.industrial.index', $industrial->service_id)->with('success', 'Industrial updated successfully');
    }
    public function destroy($id)
    {
    $industrial = Industiral::find($id);
    $industrial->delete();
        return redirect()->route('admin.industrial.index',$industrial->service_id)->with('success', 'Industrial deleted successfully');
    }
}
