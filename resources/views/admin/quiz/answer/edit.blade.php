<!-- resources/views/quiz/answers/edit.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Answer</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="question_id">Question</label>
                    <select name="question_id" id="question_id" class="form-control" required>
                        <option value="" disabled>Select a question</option>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}" {{ $answer->question_id == $question->id ? 'selected' : '' }}>
                                {{ $question->question_en }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="answer_en">Answer (EN)</label>
                    <input type="text" name="answer_en" id="answer_en" class="form-control" value="{{ old('answer_en', $answer->answer_en) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="answer_ar">Answer (AR)</label>
                    <input type="text" name="answer_ar" id="answer_ar" class="form-control" value="{{ old('answer_ar', $answer->answer_ar) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Answer</button>
                <a href="{{ route('answers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
