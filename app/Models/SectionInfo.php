<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionInfo extends Model
{
    protected $table = 'section_infos';
    protected $fillable = ['info_name', 'info_value', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected $casts = [
        'info_name' => 'array',
        'info_value' => 'array',
    ];
}
