<?php

namespace App\Http\Controllers\Web\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() 
    {
        return view('website.portfolio');
    }
}
