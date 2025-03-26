@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h2>Why Opting In Section</h2>

    <!-- Add New Button -->
    <div class="mb-3">
        <a href="{{ route('admin.choose.create',$id) }}" class="btn btn-success">Add New</a>
    </div>

    <div class="row">
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
                @foreach($data as $choice)
                <tr>
                    <td>{{ $choice->id }}</td>
                    <td>{{ json_encode($choice->title['en']) }}</td>
                    <td>{{ json_encode($choice->description['en']) }}</td>
                    <td>{{ $choice->service_id }}</td>
                    <td>
                        <a href="{{ route('admin.choose.edit', $choice->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.choose.destroy', $choice->id) }}" method="POST"
                            style="display:inline;">
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
</div>
@endsection
