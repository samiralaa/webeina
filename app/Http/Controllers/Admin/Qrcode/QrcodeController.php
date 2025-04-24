<?php

namespace App\Http\Controllers\Admin\Qrcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    public function index()
    {
        return view('website.profileEmployee');
    }
    public function create()
    {
        return view('admin.qrcode.create');
    }
    public function store(Request $request)
    {
        
    }

    public function edit()
    {
        return view('admin.qrcode.edit');
    }
    public function update(Request $request)
    {
        
    }
}
