<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\Result\ResultStoreRequest;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;
use App\Services\Quiz\QuizResultService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResuiltController extends Controller
{
    protected $quizResult;
    public function __construct(QuizResultService $quizAnswer)
    {
        $this->quizResult = $quizAnswer;
    }
    public function index()
    {
        $results  = $this->quizResult->getAllData();

        return response()->json([
            'status' => 200,
            'message' => 'Quiz Result List',
            'data' => $results
        ]);
    }


    public function store(ResultStoreRequest $request)
    {
        $data = $request->all();
        $this->quizResult->create($data);
        return response()->json([
            'status' => 200,
            'message' => 'Quiz Result Created Successfully',
            'data' => []
        ]);
    }

    public function getAllQuestionByQuizByLangForMobile($lang)
    {
        $data =  $this->quizResult->getAllQuestionByQuizLang($lang);
        return $data;
    }


    public function storeMultipleResults(Request $request)
    {
        $validatedData = $request->validate([
            'results' => 'required|array',
            'results.*.question_id' => 'required|exists:quiz_questions,id',
            'results.*.answer_id' => 'required|exists:quiz_answers,id',
        ]);


        // Get the authenticated user's ID
        $customerId = Auth::id();
        $existingResults = $this->quizResult->checkExistingResults($customerId);

        if ($existingResults) {
            return response()->json(['message' => 'You have already submitted your results.'], 403);
        }
        // Delegate the saving logic to the service
        $this->quizResult->storeMultipleResults($validatedData['results'], $customerId);

        // Return a success response
        return response()->json(['message' => 'All results saved successfully.'], 201);
    }
}
