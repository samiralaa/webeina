@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('services.create.content',  $id ) }}" class="btn btn-success">Add New Content</a>

        <h2>Features
        </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service ID</th>
                    <th>Title (EN)</th>
                    <th>Title (AR)</th>
                    <th>Description (EN)</th>
                    <th>Description (AR)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->service_id }}</td>
                        <td>{{ $content->title['en'] ?? '' }}</td>
                        <td>{{ $content->title['ar'] ?? '' }}</td>
                        <td>{{ $content->description['en'] ?? '' }}</td>
                        <td>{{ $content->description['ar'] ?? '' }}</td>
                        <td>{{ $content->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('services.edit.content', $content->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('services.delete.content', $content->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this content?');">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add New Content Button -->
    </div>
@endsection
