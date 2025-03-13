<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industiral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustiralController extends Controller
{
    public function index() {
        $industrial =Industiral::get();
        return view('admin.industrial.index',compact('industrial'));
   }
   public function create($id) {
       return view('admin.industrial.create',compact('id'));
   }

   public function store(Request $request) {
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

       return redirect()->route('admin.industrial.store')->with('success','Industrial added successfully');
   }
   public function edit($id) {


       $industrial = Industiral::find($id);
       return view('admin.industrial.edit',compact('industrial'));
   }
   public function update(Request $request, $id) {
       $industrial = Industiral::find($id);
       $industrial->update($request->all());
       return redirect()->route('industrial.index')->with('success','Industrial updated successfully');
   }
   public function destroy($id) {
       Industiral::find($id)->delete();
       return redirect()->route('admin.industrial.index')->with('success','Industrial deleted successfully');
   }
}
