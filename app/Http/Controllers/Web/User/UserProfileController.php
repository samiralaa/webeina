<?php

namespace App\Http\Controllers\web\User;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\UserProfile\UserServices;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function index()
    {
        $serves = Service::get();

        $packages = $this->userServices->getPackageServices();
        
        return view('website.service', compact('serves', 'packages'));
    }
}
