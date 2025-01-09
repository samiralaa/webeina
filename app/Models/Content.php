<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'title',
        'description',
        'service_id',
        'image',
        'questions',
        'color',
        'type',
        'link',
        'sub_title',
        'order',
        'status',
    ];



    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'sub_title' => 'array',
        'status' => 'array',
        'qustion' => 'array',
    ];
    public function services()
    {
        return $this->belongsTo(Service::class);
    }
}
