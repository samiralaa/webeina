<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;

use App\Http\Requests\Web\Package\RequestPackage;
use App\Services\RequestPackage\RequestPackageService;
use Illuminate\Http\Request;

class PackageRequestController extends Controller
{
    protected $order_package_service;
    public function __construct(RequestPackageService $order_package_service)
    {
        $this->order_package_service = $order_package_service;
    }

    public function index()
    {
        $packageRequests = $this->order_package_service->getAllPackages();
        
        return view('admin.package.request.index', compact('packageRequests'));
    }
    public function requestPackage(RequestPackage $request)
    {
        $data = $request->all();
        $this->order_package_service->createPackageRequest($data);
        return redirect()->back()->with('success', 'Package request sent successfully');
    }
}

