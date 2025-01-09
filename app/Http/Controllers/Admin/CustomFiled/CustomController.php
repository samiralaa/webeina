<?php

namespace App\Http\Controllers\Admin\CustomFiled;

use App\Http\Controllers\Controller;

use App\Http\Requests\Attribute\StoreAttributeRequest;
use App\Models\Attribute;
use App\Services\AttributeService\AttributeService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomController extends Controller
{

    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function store(StoreAttributeRequest $request)
    {
        // The request is already validated at this point.
        $validated = $request->validated();

        // Call the service to save the data
        $attribute = $this->attributeService->save($validated);

        // Redirect or return a response
        return redirect()->route('custom.index')->with('success', 'Attribute created successfully!');
    }
    public function index()
    {
        // Assuming 'attributeService' fetches all the attributes
        $attributes = $this->attributeService->getAll();

        // Return the view with the attributes data
        return view('admin.custom.index', compact('attributes'));
    }
    public function show($model)
    {
        // Assuming 'attributeService' fetches the attribute by id
        $attributes = $this->attributeService->getByModel($model);
        $data = $model::get();

        return view('admin.custom.show', compact('attributes', 'data'));
    }

    public function create()
    {
        $models = $this->getAllModels();

        // Pass the models to the view
        return view('admin.custom.create', compact('models'));
    }

    /**
     * Fetch all model class names from the app/Models directory.
     *
     * @return array
     */
    private function getAllModels(): array
    {
        $modelPath = app_path('Models');

        return collect(File::allFiles($modelPath))
            ->map(fn($file) => 'App\\Models\\' . pathinfo($file->getFilename(), PATHINFO_FILENAME))
            ->filter(fn($class) => class_exists($class))
            ->values()
            ->toArray();
    }

    public function destroy($id)
    {
        $attribute = $this->attributeService->deleteById($id);
        return redirect()->route('custom.index')->with('success', 'Attribute deleted successfully!');
    }
}
