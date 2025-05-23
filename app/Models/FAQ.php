<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'f_a_q_s';
    protected $fillable = ['question', 'answer'];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array'
    ];
}
