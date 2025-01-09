<!-- resources/views/quiz/answers/create.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Create Answer</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('answers.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="question_id">Question</label>
                    <select name="question_id" id="question_id" class="form-control" required>
                        <option value="" disabled selected>Select a question</option>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->question_en }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="answer_en">Answer (EN)</label>
                    <input type="text" name="answer_en" id="answer_en" class="form-control" value="{{ old('answer_en') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="answer_ar">Answer (AR)</label>
                    <input type="text" name="answer_ar" id="answer_ar" class="form-control" value="{{ old('answer_ar') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Answer</button>
                <a href="{{ route('answers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
