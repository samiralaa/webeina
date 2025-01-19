<?php

namespace App\Http\Controllers\Web\Front\Home;

use App\Http\Controllers\Controller;
use App\Models\FAQ;

class HomeController extends Controller
{
	public function aboutUs()
	{
		return view('website.about-us');
	}

    public function faqs()
    {
      $faqs = FAQ::all();
        return view('website.faq',compact('faqs'));
    }
}
