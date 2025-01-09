<?php
namespace App\Repositories\Content\ContectHomePage;

use App\Models\Section;
class ContentRepository
{
    public function create(array $data): Section
    {
        return Section::create($data);
    }
}