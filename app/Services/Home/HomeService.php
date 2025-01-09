<?php

namespace App\Services\Home;

use App\Models\Section;

class HomeService
{
    public function getSections()
{
    return Section::with(['section_info', 'images', 'sliders'])->get();
}


    public function getSection($id)
    {
        return Section::with(['section_info', 'images'])->find($id);
    }

    public function updateSection($request, $id)
    {
        return $id;
    }
}
