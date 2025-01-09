<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerForm()
    {

        return view('website.auth.regstration');
    }

    public function loginForm()
    {
        return view('website.auth.login');
    }
}
