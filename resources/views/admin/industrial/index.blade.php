@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h2>Industrial List</h2>

    <!-- Add New Button -->
    <div class="mb-3">
        <a href="{{ route('admin.industrial.create',$id) }}" class="btn btn-success">Add New</a>
    </div>

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
            @foreach($industrial as $step)
            <tr>
                <td>{{ $step->id }}</td>
                <td>{{ json_encode($step->title['en']) }}</td>
                <td>{{ json_encode($step->description['en']) }}</td>
                <td>{{ $step->service_id }}</td>
                <td>
                    <a href="{{ route('admin.industrial.edit', $step->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.industrial.destroy', $step->id) }}" method="POST" style="display:inline;">
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
