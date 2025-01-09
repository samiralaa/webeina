<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Footer\FooterRequest;
use App\Models\Footer;
use App\Services\Footer\FooterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    protected $footerService;

    public function __construct(FooterService $footerService)
    {
        $this->footerService = $footerService;
    }

    public function index()
    {
        $footers = $this->footerService->index($this->footerService->model,['id','logo','email','phone']);
        return view('admin.footer.index', compact('footers'));
    }


    public function store(FooterRequest $request)
    {
        $data = $this->footerService->formatData($request->validated());
        $this->footerService->store($data);

        return redirect()->route('footer.index')->with('success', 'Footer created successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'description' => 'required|array',
            'title' => 'required|array',
            'location' => 'required|array',
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'pages' => 'nullable|array',
            'logo' => 'nullable|image|max:2048',
        ]);

        // Find the footer entry by ID
        $footer = Footer::findOrFail($id);

        // Update the footer fields
        $footer->description = json_encode($request->description);
        $footer->title = json_encode($request->title);
        $footer->location = json_encode($request->location);
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->facebook_link = $request->facebook_link;
        $footer->twitter_link = $request->twitter_link;
        $footer->linkedin_link = $request->linkedin_link;
        $footer->instagram_link = $request->instagram_link;

        // Update pages if provided
        if ($request->has('pages')) {
            $footer->page = json_encode($request->pages);
        }
        if ($request->hasFile('logo')) {

            // Check if the footer already has an image
            if ($footer->logo) {
                // Delete the old image from storage
                Storage::disk('public')->delete($footer->logo);
            }

            // Store the new image and save the path to the database
            $footer->logo = $request->file('logo')->store('images', 'public');
        }
        // Save the updated footer
        $footer->save();

        // Return a response or redirect
        return redirect()->route('footer.index')->with('success', 'Footer updated successfully.');
    }

    public function edit($id)
    {
        $footer =Footer::find($id);
        $footer->description = json_decode($footer->description, true);
        $footer->title = json_decode($footer->title, true);
        $footer->page = json_decode($footer->page, true);
        $footer->location = json_decode($footer->location, true);

        return view('admin.footer.edit', compact('footer'));
    }
}
