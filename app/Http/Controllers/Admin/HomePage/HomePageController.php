<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContectHome\UpdateContentRequest;
use App\Models\ContentImage;
use App\Models\Section;
use App\Models\SectionInfo;
use App\Models\Slider;
use App\Services\Home\HomeService;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $HomeServices;
    public function __construct(HomeService $HomeServices)
    {
        $this->HomeServices = $HomeServices;
    }

    public function index()
    {
        $sections  = $this->HomeServices->getSections();


        return view('admin.home.index', compact('sections'));
    }



    public function edit($id)
    {
        $section = $this->HomeServices->getSection($id);

        //return response()->json(['section' => $section]);
        return view('admin.home.edit', compact('section'));
    }

    public function update(UpdateContentRequest $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Find the existing content
        $content = $this->HomeServices->getSection($id);

        if (!$content) {
            return response()->json(['error' => 'Content not found.'], 404);
        }

        // Prepare slider_name and slider_link
        $sliderNames = [
            'ar' => $validatedData['slider_name']['ar'] ?? [],
            'en' => $validatedData['slider_name']['en'] ?? [],
        ];

        $sliderLinks = [
            'ar' => $validatedData['slider_link']['ar'] ?? [],
            'en' => $validatedData['slider_link']['en'] ?? [],
        ];

        // Update content with slider data
        $content->update(array_merge($validatedData, [
            'slider_name' => $sliderNames,
            'slider_link' => $sliderLinks,
        ]));

        // Handle images
        if ($request->hasFile('images')) {
            dd("testing");
            // احصل على جميع الصور القديمة
            $existingImages = ContentImage::where('section_id', $content->id)->get();

            // حذف الصور القديمة من التخزين
            foreach ($existingImages as $existingImage) {
                $filePath = public_path($existingImage->image_path);
                if (file_exists($filePath)) {
                    unlink($filePath); // حذف الصورة من التخزين
                }
                $existingImage->delete(); // حذف السجل من قاعدة البيانات
            }

            // معالجة الصور الجديدة
            foreach ($request->file('images') as $image) {
                if (!$image->isValid()) {
                    return response()->json(['error' => 'One or more uploaded files are invalid.'], 400);
                }

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                ContentImage::create([
                    'section_id' => $content->id,
                    'image_path' => 'images/' . $imageName,
                ]);
            }
        }

        // Update section info
        if ($request->has('info_name') && is_array($request->info_name)) {
            SectionInfo::where('section_id', $content->id)->delete(); // Optionally clear existing info

            foreach ($request->info_name['ar'] as $index => $infoNameAr) {
                $infoNameEn = $request->info_name['en'][$index] ?? null;
                $infoValueAr = $request->info_value['ar'][$index] ?? null;
                $infoValueEn = $request->info_value['en'][$index] ?? null;

                SectionInfo::create([
                    'info_name' => [
                        'ar' => $infoNameAr,
                        'en' => $infoNameEn,
                    ],
                    'info_value' => [
                        'ar' => $infoValueAr,
                        'en' => $infoValueEn,
                    ],
                    'section_id' => $content->id,
                ]);
            }
        }

        // Update sliders
        if ($request->has('sliders') && is_array($request->sliders)) {
            $data = $request->validate([
                'sliders' => 'required|array',
                'sliders.*.id' => 'required|integer', // Ensure each slider has an ID
                'sliders.*.title' => 'required|array',
                'sliders.*.description' => 'required|array',
                'sliders.*.sub_title' => 'nullable|array',
                'sliders.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'sliders.*.link' => 'nullable|string',
                'sliders.*.image_direction' => 'nullable|string',
            ]);

            foreach ($data['sliders'] as $slider) {
                // Find the existing slider by ID
                $existingSlider = Slider::find($slider['id']);

                // Prepare the data for update or create
                $sliderData = [
                    'title' => $slider['title'],
                    'description' => $slider['description'],
                    'sub_title' => $slider['sub_title'] ?? null,
                    'link' => $slider['link'] ?? null,
                    'image_direction' => $slider['image_direction'] ?? null,
                    'section_id' => $content->id,
                ];

                // Handle image upload for each slider
                if (isset($slider['image']) && $slider['image']->isValid()) {

                    dd($slider['image']);
                    $sliderData['image'] = $slider['image']->store('sliders', 'public');
                }

                // Update existing slider or create a new one
                if ($existingSlider) {
                    $existingSlider->update($sliderData);
                } else {
                    Slider::create($sliderData);
                }
            }
        }

        return redirect()->route('home-page');
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()->back();
    }
}
