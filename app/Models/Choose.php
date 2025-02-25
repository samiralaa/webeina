<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choose extends Model
{
    protected $fillable = ['main_description', 'title', 'description', 'icone', 'service_id'];

    protected $casts = [
        'description' => 'array',
        'title' => 'array'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
