<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentImage extends Model
{
    protected $fillable = ['section_id', 'image_path'];

    protected $table = 'section_images';
    public function content()
    {
        return $this->belongsTo(Section::class);
    }
}
