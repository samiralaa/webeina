<?php

namespace App\Services\Content\ContectHomePage;

use App\Models\Content;
use App\Repositories\Content\ContectHomePage\ContentRepository;
use App\Traits\CrudTrait;

class ContentService
{
    use CrudTrait;
    protected $repository;
    protected $model;
    public function __construct(ContentRepository $repository, Content $model)
    {
        $this->repository = $repository;
        $this->model = $model;
    }

    public function createContent(array $data)
    {
        // Check if 'images' key is set and is an array (i.e., multiple files uploaded)
        if (isset($data['images']) && is_array($data['images'])) {
            $imagePaths = []; // Array to hold the paths of uploaded images

            foreach ($data['images'] as $image) {
                // Store each image in the 'public' disk (adjust the disk if needed)
                $imagePath = $image->store('images', 'public'); // Store the image in the 'images' folder

                // Add the image path to the array
                $imagePaths[] = $imagePath;
            }

            // Store the image paths as a JSON array in the database
            $data['images'] = json_encode($imagePaths);
        }

        // Create the content in the repository and return the result
        return $this->repository->create($data);
    }

    public function createContentToServes(array $data): Content
    {
        return Content::create($data);
    }

    public function updateContent(Content $content, array $data): Content
    {
        // Convert title and description into JSON format
        $data['title'] = json_encode(['en' => $data['title_en'], 'ar' => $data['title_ar']]);
        $data['description'] = json_encode(['en' => $data['description_en'], 'ar' => $data['description_ar']]);

        // Update content
        $content->update($data);

        return $content;
    }


    public function deleteContent(Content $content): bool
    {
        // Deleting the content from the database
        return $content->delete();
    }

    public function getAllContent($id)
    {
        return Content::where('service_id', $id)->get();
    }

    public function getContentById(int $id): ?Content
    {
        // Fetch content by its ID
        return Content::find($id);
    }

    public function createToServesContent(array $data)
    {
        if (isset($data['image'])) {
            // Store the image in the 'content' folder in the public disk
            $imagePath = $data['image']->store('content', 'public'); // Store the image

            // Store the image path in the database
            $data['image'] = $imagePath; // You can store the direct path or encode it as needed

            // Create the content in the repository and return the result
            return $this->store($data, $this->model);
        }

        // Handle the case where no image is uploaded (if needed)
        return $this->store($data, $this->model); // Proceed without image if not set
    }
}
