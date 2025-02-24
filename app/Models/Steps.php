<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
   protected $fillable =['title', 'description','service_id'];
    protected $casts = [
        'description' => 'array',
        'title' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
