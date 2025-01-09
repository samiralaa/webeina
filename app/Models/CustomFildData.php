<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFildData extends Model
{
    protected $table = 'custom_fild_data';
    protected $fillable = ['custom_fild_id', 'custom_fild_value'];
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'custom_fild_id');
    }
}
