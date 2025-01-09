<?php

namespace App\Services\Quiz;

use App\Models\QuizAnswer;

class QuizAnswerService
{
    public function getAllData()
    {
        return QuizAnswer::all();
    }


    public function create(array $data): QuizAnswer
    {
        return QuizAnswer::create($data);
    }

    public function update(QuizAnswer $quizAnswer, array $data): QuizAnswer
    {
        $quizAnswer->update($data);

        return $quizAnswer;
    }

    public function delete($quizAnswer): void
    {
        $QuizAnswer = QuizAnswer::find($quizAnswer);
        $QuizAnswer->delete();
    }
    public function getById(int $id): QuizAnswer
    {
        return QuizAnswer::find($id);
    }
}
