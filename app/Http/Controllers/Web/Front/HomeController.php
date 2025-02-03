<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContectHome\StoreContentRequest;
use App\Models\ContentImage;
use App\Models\Section;
use App\Models\SectionInfo;
use App\Models\Service;
use App\Models\Slider;
use App\Services\Content\ContectHomePage\ContentService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(ContentService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return view('website.index');
    }

    public function aboutUs()
    {
        return view('website.about-us');
    }

    public function getServices()
    {
        return view('website.service');
    }

    public function servesDetails($slug)
    {
        $service = Service::where('slug', $slug)->with('contents')->first();
        return view('website.serves-details', compact('service'));
    }

    protected $service;


    public function store(StoreContentRequest $request)
    {
        $validatedData = $request->validated();

        // Prepare slider_name and slider_link
        $sliderNames = [
            'ar' => $validatedData['slider_name']['ar'] ?? [],
            'en' => $validatedData['slider_name']['en'] ?? [],
        ];

        $sliderLinks = [
            'ar' => $validatedData['slider_link']['ar'] ?? [],
            'en' => $validatedData['slider_link']['en'] ?? [],
        ];

        // Save content with slider data
        $content = $this->service->createContent(array_merge($validatedData, [
            'slider_name' => $sliderNames,
            'slider_link' => $sliderLinks,
        ]));
        //  return response()->json($validatedData);
        // Handle images

        if ($request->hasFile('images')) {


            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                if (!$image->isValid()) {
                    return response()->json(['error' => 'One or more uploaded files are invalid.'], 400);
                }

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('home', $imageName, 'public');
                $imagePaths[] = 'storage/home/' . $imageName;
            }

            foreach ($imagePaths as $path) {
                \App\Models\ContentImage::create([
                    'section_id' => $content->id,
                    'image_path' => $path,
                ]);
            }
        }

        if ($request->has('info_name') && is_array($request->info_name)) {
            foreach ($request->info_name['ar'] as $index => $infoNameAr) {
                // Check if the corresponding English info_value exists
                $infoNameEn = $request->info_name['en'][$index] ?? null;
                $infoValueAr = $request->info_value['ar'][$index] ?? null;
                $infoValueEn = $request->info_value['en'][$index] ?? null;

                \App\Models\SectionInfo::create([
                    'info_name' => [
                        'ar' => $infoNameAr,
                        'en' => $infoNameEn,
                    ],
                    'info_value' => [
                        'ar' => $infoValueAr,
                        'en' => $infoValueEn,
                    ],
                    'section_id' => $content->id,  // Assuming $content is available
                ]);
            }
        }

        if ($request->has('sliders') && is_array($request->sliders) || $request->has('blog')) {

            $data = $request->validate([
                'sliders' => 'required|array',
                'sliders.*.title' => 'required|array',
                'sliders.*.description' => 'required|array',
                'sliders.*.sub_title' => 'nullable|array',
                'sliders.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'sliders.*.link' => 'nullable|string',
                'sliders.*.image_direction' => 'nullable|string',
                'sliders.*.section_id' => 'nullable|integer',
            ]);

            $section_id = $content->id;
            // marge data with section_id
            $data['sliders'] = array_map(function ($slider) use ($section_id) {
                $slider['section_id'] = $section_id;
                return $slider;
            }, $data['sliders']);

            foreach ($data['sliders'] as $slider) {
                $sliderData = [
                    'title' => $slider['title'],
                    'description' => $slider['description'],
                    'sub_title' => $slider['sub_title'] ?? null,
                    'link' => $slider['link'] ?? null,
                    'image_direction' => $slider['image_direction'] ?? null,
                    'section_id' => $slider['section_id'] ?? null,
                ];

                // Handle image upload for each slider
                if (isset($slider['image']) && $slider['image']->isValid()) {
                    $sliderData['image'] = $slider['image']->store('sliders', 'public');
                }

                // Create each slider record
                Slider::create($sliderData);
            }
            return redirect()->route('home-page');
        }
        return redirect()->route('home-page');
    }
    public function createSection()
    {
        return view('dashboard.sections.create');
    }

    public function getAll()
    {
        $sections =  Section::with(['section_info', 'images', 'sliders'])
            ->orderBy('order', 'asc') // ترتيب تصاعدي (قم بتغيير asc إلى desc إذا كنت تريد تنازلياً)
            ->get();
        $service = Service::paginate(3);

        // dd($sections);
        return view('website.index', compact('sections', 'service'));
    }
}
