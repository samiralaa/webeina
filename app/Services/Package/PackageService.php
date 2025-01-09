<?php

namespace App\Services\Package;

use App\Models\Package;
use App\Models\Service;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageService
{
    use CrudTrait;

    protected $model;

    public function __construct(Package $package)
    {
        $this->model = $package;
    }

    public function getAllPackages($select = ['*'])
    {
        return $this->index($this->model, $select); // Call the CrudTrait's index method
    }

    public function getPackageById($id, $select = ['*'])
    {
        return $this->show($this->model, $id, $select); // Call the CrudTrait's show method
    }

    public function store(array $data)
    {
        // Handle image upload if exists
        if (isset($data['image']) && $data['image']->isValid()) {
            $data['image'] = $data['image']->store('packages', 'public');
        }

        // Encode JSON fields
        $data['title'] = json_encode($data['title']);
        $data['sun_title'] = isset($data['sun_title']) ? json_encode($data['sun_title']) : null;
        $data['description'] = isset($data['description']) ? json_encode($data['description']) : null;
        $data['features'] = isset($data['features']) ? json_encode($data['features']) : null;

        // Save the package
        return Package::create($data);
    }

    /**
     * Update an existing package.
     *
     * @param Package $package
     * @param array $data
     * @return Package
     */

    // Handle image upload and delete the old one if exists
    public function update($request, $id)
    {
        // Validate the input data (done on the request, not on the model)
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'sun_title.en' => 'nullable|string|max:255',
            'sun_title.ar' => 'nullable|string|max:255',
            'description.en' => 'required|string|max:1000',
            'description.ar' => 'required|string|max:1000',
            'features.en' => 'nullable|array',
            'features.ar' => 'nullable|array',
            'price' => 'required|numeric',
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subscription_time' => 'required|integer',
        ]);

        // Find the package by ID, or fail if not found
        $package = Package::findOrFail($id);

        // Update package details
        $package->update([
            'title' => $validated['title'],
            'sun_title' => $validated['sun_title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'service_id' => $validated['service_id'],
            'subscription_time' => $validated['subscription_time'],
            'features' => [
                'en' => $validated['features']['en'] ?? [],
                'ar' => $validated['features']['ar'] ?? [],
            ],
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($package->image) {
                Storage::delete('public/' . $package->image);
            }

            // Store the new image and update the package's image path
            $package->image = $request->file('image')->store('packages', 'public');
        }

        // Save the updated package
        $package->save();

        // Redirect with success message
        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }




    public function deletePackage($id)
    {
        return $this->delete($this->model, $id); // Call the CrudTrait's delete method
    }

    public function getServes()
    {
        return Service::all();
    }
}
