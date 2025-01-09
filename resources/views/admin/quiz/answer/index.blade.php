<!-- resources/views/quiz/answers/index.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Quiz Answers</h2>
                {{-- buttom to add new answer  --}}
                <a href="{{ route('answers.create') }}" class="btn btn-primary mb-3">Add New Answer</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question (EN)</th>
                            <th>Question (AR)</th>
                            <th>Answer (EN)</th>
                            <th>Answer (AR)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($answers as $answer)
                            <tr>
                                <td>{{ $answer->id }}</td>
                                <td>{{ $answer->question->question_en }}</td>
                                <td>{{ $answer->question->question_ar }}</td>
                                <td>{{ $answer->answer_en }}</td>
                                <td>{{ $answer->answer_ar }}</td>
                                <td>
                                    <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('answers.destroy', $answer->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No answers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
