<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Upload an image to the specified disk.
     *
     * @param UploadedFile $file
     * @param string $disk
     * @param string $directory
     * @return string $path
     */
    public function uploadImage($image, $disk = 'public', $path = 'uploads')
    {
        // Generate a unique filename
        $filename = time() . '_' . $image->getClientOriginalName();
        
        // Store the image in the specified disk and path
        $imagePath = $image->storeAs($path, $filename, $disk);

        return $imagePath;
    }

    /**
     * Delete an image from the specified disk.
     *
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public function deleteImage(string $path, string $disk = 'public'): bool
    {
        // Check if the file exists, then delete it
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }
}
