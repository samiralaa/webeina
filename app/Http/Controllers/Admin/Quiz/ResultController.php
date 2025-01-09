<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\Answer\AnswerStoreRequest;
use App\Http\Requests\Quiz\Result\ResultStoreRequest;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;
use App\Services\Quiz\QuizResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $quizResult;
    public function __construct(QuizResultService $quizAnswer)
    {
        $this->quizResult = $quizAnswer;
    }
    public function index()
    {
        $results  = $this->quizResult->getAllData();
     
        return view('admin.quiz.result.index', compact('results'));
    }
    public function create()
    {
        // Fetch all questions to associate answers
        $customers = User::all(); // Fetch all customers
        $questions = QuizQuestion::all(); // Fetch all questions
        $answers = QuizAnswer::all(); // Fetch all answers

        return view('admin.quiz.result.create', compact('questions', 'answers', 'customers'));
    }

    public function store(ResultStoreRequest $request)
    {
        $data = $request->all();
        $this->quizResult->create($data);
        return redirect()->route('results.index')->with('success', 'Question created successfully');
    }
    public function edit($id)
    {
        $answer = $this->quizResult->getById($id);
       
        $questions = QuizQuestion::all();
        return view('admin.quiz.answer.edit', compact('answer','questions'));
    }
    public function update(ResultStoreRequest $request, $id)
    {
        $data = $request->all();

        $result = $this->quizResult->getById($id);
        $this->quizResult->update($result, $data);
        return redirect()->route('results.index')->with('success', 'Question updated successfully');
    }
    public function destroy($id)
    {
        $this->quizResult->delete($id);
        return redirect()->route('results.index')->with('success', 'Question deleted successfully');
    }
}
