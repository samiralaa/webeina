<!-- resources/views/quiz/questions/create.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Add New Question</h2>
            
            <!-- Form to create new question -->
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="question_en" class="form-label">Question (English)</label>
                    <input type="text" name="question_en" id="question_en" class="form-control @error('question_en') is-invalid @enderror" value="{{ old('question_en') }}">
                    @error('question_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="question_ar" class="form-label">Question (Arabic)</label>
                    <input type="text" name="question_ar" id="question_ar" class="form-control @error('question_ar') is-invalid @enderror" value="{{ old('question_ar') }}">
                    @error('question_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Question</button>
            </form>
        </div>
    </div>
</div>
@endsection
