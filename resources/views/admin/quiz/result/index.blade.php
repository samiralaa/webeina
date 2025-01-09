@extends('dashboard.layouts.app')
<style>
    .pagination .page-item.active .page-link {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .pagination .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
    }

    .pagination .page-link:hover {
        color: #0056b3;
        background-color: #e9ecef;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Quiz Results</h2>

            <!-- Success Message -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Add New Button -->
            <a href="{{ route('results.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Add New Result
            </a>

            <!-- Results Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->customer->name ?? 'N/A' }}</td>
                        <td>{{ $result->question->question_en }}</td>
                        <td>{{ $result->answer->answer_en }}</td>
                        <td>
                            <a href="{{ route('results.edit', $result->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('results.destroy', $result->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this result?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Quiz Results Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                <ul class="pagination pagination-sm">
                    {{-- Previous Page Link --}}
                    @if ($results->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">«</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $results->previousPageUrl() }}" rel="prev">«</a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
                    <li class="page-item {{ $results->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($results->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $results->nextPageUrl() }}" rel="next">»</a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link">»</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
