<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['name',
     'icon',
     'description',
     'slug',
     'image_banar',
     'order_by'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function users()
    {
        // A service can belong to many users via the pivot table 'submit_services'
        return $this->belongsToMany(User::class, 'submit_services', 'service_id', 'user_id');
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function steps()
    {
        return $this->hasMany(Steps::class);
    }

    public function choose()
    {
        return $this->hasMany(Choose::class);
    }
}
