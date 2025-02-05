<?php

namespace App\Http\Controllers\Web\Portfolio;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {

        $projects = Project::with('images')->get();
        return view('website.portfolio', compact('projects'));
    }
}
