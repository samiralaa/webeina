<?php

namespace App\Services\Quiz;

use App\Models\QuizQuestion;

class QuizQuestionService
{
    public function getAllData()
    {
        return QuizQuestion::all();
    }


    public function create(array $data): QuizQuestion
    {
        return QuizQuestion::create($data);
    }

    public function update(QuizQuestion $quizQuestion, array $data): QuizQuestion
    {
        $quizQuestion->update($data);

        return $quizQuestion;
    }

    public function delete( $quizQuestion): void
    {
        $quizQuestion = QuizQuestion::find($quizQuestion);
        $quizQuestion->delete();
    }
    public function getById(int $id): QuizQuestion
    {
        return QuizQuestion::find($id);
    }
}
