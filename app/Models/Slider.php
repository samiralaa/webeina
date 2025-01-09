<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'sub_title',
        'section_id',
        'image_direction'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'sub_title' => 'array',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
