<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\Answer\AnswerStoreRequest;
use App\Http\Requests\Quiz\Question\QuestionStoreRequest;
use App\Models\QuizQuestion;
use App\Services\Quiz\QuizAnswerService;
use Illuminate\Http\Request;
use App\Models\QuizAnswer;

class AnswerController extends Controller
{
    protected $quizAnswer;
    public function __construct(QuizAnswerService $quizAnswer)
    {
        $this->quizAnswer = $quizAnswer;
    }
    public function index()
    {
        $answers = $this->quizAnswer->getAllData();
        return view('admin.quiz.answer.index', compact('answers'));
    }
    public function create()
    {
        // Fetch all questions to associate answers
        $questions = QuizQuestion::all();

        return view('admin.quiz.answer.create', compact('questions'));
    }

    public function store(AnswerStoreRequest $request)
    {
        $data = $request->all();
        $this->quizAnswer->create($data);
        return redirect()->route('answers.index')->with('success', 'Question created successfully');
    }
    public function edit($id)
    {
        $answer = $this->quizAnswer->getById($id);
       
        $questions = QuizQuestion::all();
        return view('admin.quiz.answer.edit', compact('answer','questions'));
    }
    public function update(AnswerStoreRequest $request, $id)
    {
        $data = $request->all();
        $answer = $this->quizAnswer->getById($id);
        $this->quizAnswer->update($answer, $data);
        return redirect()->route('answers.index')->with('success', 'Question updated successfully');
    }
    public function destroy($id)
    {
        $this->quizAnswer->delete($id);
        return redirect()->route('answers.index')->with('success', 'Question deleted successfully');
    }
}
