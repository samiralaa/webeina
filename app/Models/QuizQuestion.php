<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = ['question_en', 'question_ar'];

    // Relationships
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class,'question_id');
    }

    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }
}
