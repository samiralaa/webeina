<?php

namespace App\Services\Quiz;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;

class QuizResultService
{


    public function getAllData()
    {
        return QuizResult::with(['customer', 'question', 'answer'])->paginate(10);
    }


    public function create(array $data): QuizResult
    {
        return QuizResult::create($data);
    }

    public function update(QuizResult $quizResult, array $data): QuizResult
    {

        $quizResult->update($data);

        return $quizResult;
    }

    public function delete($quizResult): void
    {
        $quizResult = QuizResult::find($quizResult);
        $quizResult->delete();
    }
    public function getById(int $id): QuizResult
    {
        return QuizResult::find($id);
    }


    public function getAllQuestionByQuizLang($lang)
    {
        // Fetch questions along with their answers
        $questions = QuizQuestion::with('answers')->get();

        // Create an array to hold the formatted questions and answers
        $formattedQuestions = [];

        // Iterate through each question
        foreach ($questions as $question) {
            // Create an array for the current question
            $formattedQuestion = [
                'id' => $question->id,
                'question_' . $lang => $question->{'question_' . $lang}, // Dynamically get the question in the specified language
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'answers' => [],
            ];

            // Iterate through the answers for the current question
            foreach ($question->answers as $answer) {
                // Add the answer in the specified language
                $formattedQuestion['answers'][] = [
                    'id' => $answer->id,
                    'question_id' => $answer->question_id,
                    'answer_' . $lang => $answer->{'answer_' . $lang}, // Dynamically get the answer in the specified language

                ];
            }

            // Add the formatted question to the result array
            $formattedQuestions[] = $formattedQuestion;
        }

        // Return the formatted questions with answers in the specified language
        return response()->json($formattedQuestions);
    }

    public function storeMultipleResults(array $results, int $customerId): void
    {
        // Transform the results to include the customer_id
        $resultsWithCustomerId = collect($results)->map(function ($result) use ($customerId) {
            return [
                'customer_id' => $customerId,
                'question_id' => $result['question_id'],
                'answer_id' => $result['answer_id'],
                'created_at' => now(), // Optional for tracking when records were inserted
                'updated_at' => now(), // Optional for tracking updates
            ];
        })->toArray();

        // Perform bulk insertion for efficiency
        QuizResult::insert($resultsWithCustomerId);
    }

    public function checkExistingResults($customerId)
    {
        return QuizResult::where('customer_id', $customerId)->exists();
    }
}
