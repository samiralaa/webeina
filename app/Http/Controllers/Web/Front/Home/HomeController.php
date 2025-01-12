<?php

namespace App\Http\Controllers\Web\Front\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function aboutUs()
	{
		return view('website.about-us');
	}
}