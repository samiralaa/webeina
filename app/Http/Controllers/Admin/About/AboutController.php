<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Services\About\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $aboutService;
    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }
    public function aboutUsIndex()
    {
        $about = $this->aboutService->getAbout();
        return view('admin.about.about-us', compact('about'));
    }
    // public function aboutUsUpdate(Request $request)
    // {
    //     $this->aboutService->updateAbout($request);
    //     return redirect()->back()->with('success', 'About Us Updated Successfully!');
    // }
    public function aboutUsCreate()
    {
        return view('admin.about.create');
    }
    // public function createAbout(Request $request)
    // {
    //     $this->aboutService->createAbout($request);
    //     return redirect()->route('admin.about.index')->with('success', 'About Us Created Successfully!');
    // }
}
