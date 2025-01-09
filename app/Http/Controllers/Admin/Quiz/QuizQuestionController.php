<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\Question\QuestionStoreRequest;
use App\Services\Quiz\QuizQuestionService;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    protected $quizQuestion;
    public function __construct(QuizQuestionService $quizQuestion)
    {
        $this->quizQuestion = $quizQuestion;
    }
    public function index()
    {
        $questions = $this->quizQuestion->getAllData();
        return view('admin.quiz.question.index', compact('questions'));
    }
    public function create()
    {
        return view('admin.quiz.question.create');
    }

    public function store(QuestionStoreRequest $request)
    {
        $data = $request->all();
        $this->quizQuestion->create($data);
        return redirect()->route('questions.index')->with('success', 'Question created successfully');
    }
    public function edit($id)
    {
        $question = $this->quizQuestion->getById($id);
        return view('admin.quiz.question.edit', compact('question'));
    }
    public function update(QuestionStoreRequest $request, $id)
    {
        $data = $request->all();
        $this->quizQuestion->update($id, $data);
        return redirect()->route('admin.quiz.question.index')->with('success', 'Question updated successfully');
    }
    public function destroy($id)
    {
        $this->quizQuestion->delete($id);
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }
}
