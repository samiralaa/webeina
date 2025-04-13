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
    
    public function aboutUsCreate()
    {
        return view('admin.about.create');
    }

}
