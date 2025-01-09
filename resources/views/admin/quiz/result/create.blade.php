<!-- resources/views/quiz/results/create.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Create Quiz Result</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('results.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="" disabled selected>Select a customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

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
                    <label for="answer_id">Answer</label>
                    <select name="answer_id" id="answer_id" class="form-control" required>
                        <option value="" disabled selected>Select an answer</option>
                        @foreach ($answers as $answer)
                            <option value="{{ $answer->id }}">{{ $answer->answer_en }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Result</button>
                <a href="{{ route('results.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
