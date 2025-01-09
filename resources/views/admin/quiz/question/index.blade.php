<!-- resources/views/quiz/questions/index.blade.php -->
@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>All Quiz Questions</h2>
            <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Add New Question</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question (EN)</th>
                        <th>Question (AR)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->question_en }}</td>
                            <td>{{ $question->question_ar }}</td>
                            <td>
                                <a href="{{ route('questions.show', $question->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
