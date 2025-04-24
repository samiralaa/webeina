<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileEmployee extends Model
{
    protected $table = 'profile_employees';


    protected $fillable = [
        'type',
        'name',
        'job_title',
        'phone',
        'email',
        'location',
        'company_name',
        'company_website',
        'company_description',
        'company_logo_image_path',
        'company_banner_image_path',
        'company_cover_image_path',
        'facebook',
        'twitter',
        'linkedin',
        'website',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
