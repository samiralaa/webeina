<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    public $timestamps = false; // Make this public to override the default behavior

    protected $fillable = ['customer_id', 'question_id', 'answer_id'];

    // Relationships
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function answer()
    {
        return $this->belongsTo(QuizAnswer::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class); // Assuming Customer model exists
    }
}
