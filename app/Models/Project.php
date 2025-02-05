<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'image','link'];

    protected $casts = [
        'description' => 'array',
        'title' => 'array',
    
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
