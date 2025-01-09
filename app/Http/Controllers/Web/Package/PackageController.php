<?php

namespace App\Http\Controllers\Web\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Package\StorePackageRequest;
use App\Models\Package;
use App\Services\Package\PackageService;
use Illuminate\Http\Request;

class PackageController
{

    protected $packageService;
    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function index()
    {
        $packages = Package::all()->map(function ($package) {
            $package->title = json_decode($package->title, true);
            $package->sun_title = json_decode($package->sun_title, true);
            $package->description = json_decode($package->description, true);
            $package->features = json_decode($package->features, true);

            return $package;
        });
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {

        $serves = $this->packageService->getServes();

        return view('admin.package.create', compact('serves'));
    }


    public function store(StorePackageRequest $request)
    {
        $this->packageService->store($request->validated());

        return redirect()->route('package.index')->with('success', 'Package created successfully.');
    }

    /**
     * Update the specified package.
     *
     * @param UpdatePackageRequest $request
     * @param Package $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Package $package)
    {
        $this->packageService->update($package, $request->validated());

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function edit($id)
    {
        $package = Package::find($id);

        $package['title'] = json_decode($package->title, true);
        $package['sun_title'] = json_decode($package->sun_title, true);
        $package['description'] = json_decode($package->description, true);
        $package['features'] = json_decode($package->features, true);

        // $package->sun_title = json_decode($package->sun_title, true);
        // $package->description = json_decode($package->description, true);
        // $package->features = json_decode($package->features, true);

        // Fetch services (assuming your service fetching method works fine)
        $serves = $this->packageService->getServes();

        return view('admin.package.edit', compact('package', 'serves'));
    }





    public function show($id)
    {
        $package = $this->packageService->getPackageById($id);
        return view('admin.package.show', compact('package'));
    }

    public function destroy($id)
    {
        $this->packageService->deletePackage($id);
        return redirect()->route('admin.package.index');
    }

   
}
