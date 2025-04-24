<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileEmployee extends Model
{
    protected $table = 'profile_employee';
    protected $fillable = ['name', 'position', 'image', 'description'];
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
