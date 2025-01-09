<?php

namespace App\Models;

use App\Models\ContentImage;
use App\Models\SectionInfo;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'image',
        'link',
        'status',
        'link_text',
        'bottom_text',
        'subtitle',
        'slider_name',
        'slider_link',
        'order',
        'page_type'
    ];
    protected $table = 'sections';


    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'link_text' => 'array',
        'bottom_text' => 'array',
        'subtitle' => 'array',
        'slider_name' => 'array',
        'slider_link' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(ContentImage::class);
    }

    public function section_info()
    {
        return $this->hasMany(SectionInfo::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
}
