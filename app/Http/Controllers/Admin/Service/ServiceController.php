<?php

namespace App\Http\Controllers\Admin\Service;

use App\Models\Service;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\Web\Service\StoreServiceRequest;
use App\Http\Requests\Web\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    use ImageUploadTrait;
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->getAll();

        return view('dashboard.services.index', compact('services'));
    }
    public function create()
    {

        return view('dashboard.services.create');
    }
    public function store(StoreServiceRequest $request)
    {

        $data = $request->validated();

        // Handle file upload if icon is present
        if ($request->hasFile('icon')) {
            // Upload the image and get the path
            $imagePath = $this->uploadImage($request->file('icon'), 'public', 'services');

            // Add the image path to the service data
            $data['icon'] = $imagePath;
        }
        $slug = Str::slug($request->name['en']);

        $data['slug'] = $slug;
        // Ensure the slug is unique


        // Create the service record with the data
        $service = $this->serviceRepository->create($data);

        // Return the service view with the created service
        return view('dashboard.services.show', compact('service'));
    }


    public function show($id)
    {

        $service = Service::with('contents')->findOrFail($id); // This ensures the contents are loaded along with the service
        return view('dashboard.services.show', compact('service'));
    }


    public function update(UpdateServiceRequest $request, $id)
    {
        $data = $request->validated();
        $service = $this->serviceRepository->find($id); // Retrieve the existing service

        if (!$service) {
            return redirect()->route('services.index')->with('error', 'Service not found.');
        }

        if ($request->hasFile('icon')) {
            // Delete old image if exists
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }

            // Upload the new image and get the path
            $imagePath = $this->uploadImage($request->file('icon'), 'public', 'services');
            $data['icon'] = $imagePath;
        }

        // Update the service
        $this->serviceRepository->update($id, $data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }


    public function destroy($id)
    {
        $this->serviceRepository->delete($id);
        return redirect()->route('services.index');
    }
    public function edit($id)
    {

        $service = Service::with('contents')->findOrFail($id);
        return view('dashboard.services.edit', compact('service'));
    }

    public function createSection()
    {
        return view('dashboard.services.create_section');
    }
}
