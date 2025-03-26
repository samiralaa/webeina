<?php

namespace App\Http\Controllers\Admin\Choose;

use App\Models\Choose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChooseController extends Controller
{
    public function index($id)
    {

        $data =  Choose::where('service_id',$id)->get();

        return view('admin.choose.index', compact('data','id'));
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

        $choose = new Choose();
        $choose->service_id = $request->service_id;
        $choose->icon = $path;
        $choose->title = $request->title; // JSON format
        $choose->description = $request->description; // JSON format
        $choose->save();

        return redirect()->route('admin.choose.index',$choose->service_id)->with('success', 'Choose created successfully!');
    }
    public function edit($id)
    {
        $choose = Choose::findOrFail($id);

        return view('admin.choose.edit', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        $choose = Choose::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',

            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update fields
        $choose->title = $request->input('title');
        $choose->description = $request->input('description');


        // Handle icon upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($choose->icon) {
                Storage::delete('public/' . $choose->icon);
            }

            // Store new icon
            $path = $request->file('icon')->store('icons', 'public');
            $choose->icon = $path;
        }

        $choose->save();

        return redirect()->route('admin.choose.index',$choose->service_id)

        ->with('success', 'Opting In section updated successfully.');
    }

    public function destroy($id)
    {
        $choose= Choose::find($id);
        $choose->delete();
        return redirect()->route('admin.choose.index',$choose->service_id)->with('success', 'Choose deleted successfully!');
    }
}
