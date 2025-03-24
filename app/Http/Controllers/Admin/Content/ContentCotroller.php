<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\StoreContentRequest;
use App\Http\Requests\Content\UpdateContentRequest;
use App\Models\Content;
use App\Models\Service;
use App\Services\Content\ContectHomePage\ContentService;
use Illuminate\Http\Request;

class ContentCotroller extends Controller
{
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    // Store new content
    public function store(StoreContentRequest $request, $id)
    {




        $data = $request->validated();
        if (isset($data['questions'])) {
            $data['questions'] = json_encode($data['questions']);
        }
        $data['service_id'] = $id;

        $content = $this->contentService->createToServesContent($data);

        return redirect()->route('services.index.content', ['id' => $id])->with('success', 'Content created successfully.');
    }

    // Get all content
    public function index($id)
    {
        $contents = $this->contentService->getAllContent($id);

        return view('admin.content.index', compact('contents'));
    }

    // Get content by ID
    public function show($id)
    {
        $content = $this->contentService->getContentById($id);

        if (!$content) {
            return response()->json(['success' => false, 'message' => 'Content not found'], 404);
        }

        return view('admin.content.show', compact('content'));
    }

    // Update content
    public function update(UpdateContentRequest $request, Content $content)
    {
        // Validate and retrieve data
        $data = $request->validated();

        // Update content using the service layer
        $updatedContent = $this->contentService->updateContent($content, $data);

        // Redirect to index page with success message
        return redirect()->route('services.index.content', $updatedContent->service_id)
            ->with('success', 'Content updated successfully');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);

        // Ensure title, description, and sub_title are decoded before passing to Blade
        $content->title = is_string($content->title) ? json_decode($content->title, true) : $content->title;
        $content->description = is_string($content->description) ? json_decode($content->description, true) : $content->description;
        $content->sub_title = is_string($content->sub_title) ? json_decode($content->sub_title, true) : $content->sub_title;

        return view('admin.content.edit', compact('content'));
    }

    // Delete content
    public function destroy(Content $content)
    {
        $this->contentService->deleteContent($content);

        return response()->json(['success' => true], 200);
    }

    public function create($id)
    {
        $service = Service::findOrFail($id); // Fetch the service or throw 404 if not found
        return view('admin.content.create', compact('service'));
    }
}
