@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h2>Steps List</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Service ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $step)
            <tr>
                <td>{{ $step->id }}</td>
                <td>{{ json_encode($step->title) }}</td>
                <td>{{ json_encode($step->description) }}</td>
                <td>{{ $step->service_id }}</td>
                <td>
                    <a href="{{ route('admin.steps.edit', $step->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.steps.destroy', $step->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this step?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
