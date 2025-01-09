<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = [
        'title',
        'sun_title',
        'description',
        'price',
        'features',
        'image',
        'service_id',
        'subscription_time'
    ];

    protected $casts = [
        'features' => 'array',
        'description' => 'array',
        'title' => 'array',
        'sun_title' => 'array',

    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
