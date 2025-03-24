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

        if ($request->hasFile('icon')) {
            $data['icon'] = $this->uploadImage($request->file('icon'), 'public', 'services');
        }

        if ($request->hasFile('image_banar')) {
            $data['image_banar'] = $this->uploadImage($request->file('image_banar'), 'public', 'services');
        }

        $data['slug'] = Str::slug($request->name['en']);

        // تحديد الترتيب بناءً على آخر قيمة
        $lastOrder = Service::max('order_by') ?? 0;
        $data['order_by'] = $lastOrder + 1;

        $service = $this->serviceRepository->create($data);

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
        $service = Service::with('contents')->findOrFail($id); // This ensures the contents are loaded along with the service

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
        if ($request->hasFile('image_banar')) {
            // Delete old image if exists
            if ($service->image_banar) {
                Storage::disk('public')->delete($service->image_banar);
            }

            // Upload the new image and get the path
            $imagePath = $this->uploadImage($request->file('image_banar'), 'public', 'services');
            $data['image_banar'] = $imagePath;
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

    public function updateOrder(Request $request)
    {
        // Validate that 'order_by' is an array and contains the required fields
        $validated = $request->validate([
            'order_by' => 'required|array',
            'order_by.*.id' => 'required|exists:services,id',
            'order_by.*.order' => 'required|integer',
        ]);

        foreach ($validated['order_by'] as $item) {
            Service::where('id', $item['id'])->update(['order_by' => $item['order']]);
        }

        return response()->json(['success' => true, 'message' => 'Order updated successfully']);
    }

    public function getContentToServes($id)
    {
        $service = Service::with('contents')->findOrFail($id);
        return view('dashboard.services.data.content.index', compact('service'));
    }

    public function createContent($id)
    {
        $service = Service::with('contents')->findOrFail($id);
        return view('dashboard.services.data.content.edit', compact('service'));
    }
}
