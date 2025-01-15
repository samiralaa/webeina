@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Add New FAQ</h1>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf

        {{-- English Fields --}}
        <div class="mb-3">
            <label for="question_en" class="form-label">Question (English)</label>
            <input type="text" id="question_en" name="question[en]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="answer_en" class="form-label">Answer (English)</label>
            <textarea id="answer_en" name="answer[en]" class="form-control" rows="4" required></textarea>
        </div>

        {{-- Arabic Fields --}}
        <div class="mb-3">
            <label for="question_ar" class="form-label">Question (Arabic)</label>
            <input type="text" id="question_ar" name="question[ar]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="answer_ar" class="form-label">Answer (Arabic)</label>
            <textarea id="answer_ar" name="answer[ar]" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add FAQ</button>
    </form>
</div>
@endsection
