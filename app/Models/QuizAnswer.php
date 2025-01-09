<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    protected $fillable = ['question_id', 'answer_en', 'answer_ar'];

    // Relationships
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }
}
