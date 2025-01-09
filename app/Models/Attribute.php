<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'attributable_type',
        'field_type',
        'is_required',
        'show_in_table',
        'key',
        'options',
    ];

    protected $casts = [
        'key' => 'array',
        'options' => 'array',
    ];

    public function custom_filds()
    {
        return $this->hasMany(CustomFildData::class, 'custom_fild_id');
    }
}
