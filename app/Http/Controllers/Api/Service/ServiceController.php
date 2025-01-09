<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Service\StoreServiceRequest;
use App\Models\ActivityLog;
use App\Models\Service;
use App\Models\SubmitService;
use App\Repositories\ServiceRepositoryInterface;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use JsonResponseTrait;
    protected $serviceRepository;
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index($id)
    {

        $language = $id;


        $services = $this->serviceRepository->getAll();
        $formattedServices = $services->map(function ($service) use ($language) {
            // Fetch the service name based on the selected language
            $serviceName = $service->name[$language] ?? $service->name['en']; // Default to 'en' if the requested lang is not available

            return [
                'id' => $service->id,
                'service' => $serviceName,

                'icon' =>  asset('public/storage/' . $service->icon)
            ];
        });

        // Return the success response with the formatted data
        return response()->json([
            'success' => true,
            'data' => $formattedServices,
        ]);
    }

    public function create()
    {

        return view('dashboard.services.create');
    }
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        $service = $this->serviceRepository->create($data);
        return view('dashboard.services.show', compact('service'));
    }

    public function show($id, $language)
    {
        // Fetch the service with its packages
        $service = Service::with(['packages' => function ($query) {
            $query->select('id', 'service_id', 'title', 'description', 'image', 'price', 'sun_title', 'features');
        }])->findOrFail($id);

        // Handle multilingual fields for the service
        $service->name = $service->name[$language] ?? $service->name['en'] ?? null;
        $service->description = $service->description[$language] ?? $service->description['en'] ?? null;

        if (is_string($service->title)) {
            $decodedTitle = json_decode($service->title, true);
            $service->title = $decodedTitle[$language] ?? $decodedTitle['en'] ?? null;
        }

        // Decode features JSON
        if (is_string($service->features)) {
            $decodedFeatures = json_decode($service->features, true);
            $service->features = $decodedFeatures[$language] ?? $decodedFeatures['en'] ?? [];
        }

        // Handle icon path
        $service->icon = asset('public/storage/' . $service->icon);

        // Process each package
        $service->packages->each(function ($package) use ($language) {
            if (is_string($package->title)) {
                $decodedTitle = json_decode($package->title, true);
                $package->title = $decodedTitle[$language] ?? $decodedTitle['en'] ?? null;
            }

            if (is_string($package->description)) {
                $decodedDescription = json_decode($package->description, true);
                $package->description = $decodedDescription[$language] ?? $decodedDescription['en'] ?? null;
            }

            if (is_string($package->sun_title)) {
                $decodedSunTitle = json_decode($package->sun_title, true);
                $package->sun_title = $decodedSunTitle[$language] ?? $decodedSunTitle['en'] ?? null;
            }

            // Decode features JSON for packages if it exists
            if (isset($package->features) && is_string($package->features)) {
                $decodedFeatures = json_decode($package->features, true);
                $package->features = $decodedFeatures[$language] ?? $decodedFeatures['en'] ?? [];
            }

            // Handle image path and price
            $package->image = asset('public/storage/' . $package->image);
            $package->price = number_format($package->price, 2);
        });

        return response()->json($service);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $service = $this->serviceRepository->update($id, $data);
        return response()->json($service);
    }

    public function destroy($id)
    {
        $this->serviceRepository->delete($id);
        return response()->json(['message' => 'Service deleted successfully']);
    }

    public function getServicesForUser($lang)
    {
        $services = $this->serviceRepository->getServicesForUser($lang);

        // Loop through the services to apply language selection to each field
        $services->each(function ($service) use ($lang) {
            // Handle multilingual fields for name and description
            $service->name = $service->name[$lang] ?? $service->name['en'] ?? null;
            $service->description = $service->description[$lang] ?? $service->description['en'] ?? null;

            // Optionally, handle other multilingual fields like icon or any other attributes
            // In case the icon field needs a dynamic path or processing
            $service->icon = asset('public/storage/' . $service->icon);

            // Handle pivot data if necessary (e.g., user_id and service_id)
            $service->pivot_user_id = $service->pivot->user_id;
            $service->pivot_service_id = $service->pivot->service_id;
        });

        return response()->json($services);
    }

    public function delete_service($id)
    {

        $data = SubmitService::where('service_id', $id)
            ->where('user_id', auth()->user()->id)->first();
        if (!isset($data)) {
            return response()->json(['message' => 'Service not found']);
        }
        $actove_log = ActivityLog::where('service_id', $id)
            ->where('user_id', auth()->user()->id)->first();
        if (isset($actove_log)) {
            $actove_log->delete();
        }
        $data->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }
}
