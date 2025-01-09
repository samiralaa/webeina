<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Package\StorePackageRequest;
use App\Http\Requests\Package\UpdatePackageRequest;
use App\Models\Package;
use App\Services\Package\PackageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update(UpdatePackageRequest  $request,  $id)
    {

        $package = Package::findOrFail($id);

        // Update package details
        $package->update([
            'title' => json_encode($request->input('title')),
            'sun_title' => json_encode($request->input('sun_title')),
            'description' => json_encode($request->input('description')),
            'price' => $request->input('price'),
            'service_id' => $request->input('service_id'),
            'subscription_time' => $request->input('subscription_time'),
            'features' => json_encode($request->input('features')),
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($package->image) {
                Storage::delete('public/' . $package->image);
            }

            // Store the new image and update the package's image path
            $package->image = $request->file('image')->store('packages', 'public');
        }

        // Save the updated package
        $package->save();

        // Redirect with success message
        return redirect()->route('package.index')->with('success', 'Package updated successfully.');
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
        return redirect()->route('package.index');
    }

    public function orderPackage(Request $request)
    {
        dd($request->all());
    }
}
