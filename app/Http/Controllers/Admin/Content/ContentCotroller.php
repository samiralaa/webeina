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

        return view('admin.content.index', compact('content'));
    }

    // Get all content
    public function index()
    {
        $contents = $this->contentService->getAllContent();

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
        $data = $request->validated();

        $updatedContent = $this->contentService->updateContent($content, $data);

        return view('admin.content.show', compact('updatedContent'));
    }
    public function edit(Content $content)
    {
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
