@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h1>Footer Settings</h1>
    <a href="{{ route('footer.create') }}" class="btn btn-primary mb-3">Add New Footer</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Title</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($footers as $footer)
                <tr>
                    <td>
                        @if($footer->logo)
                            <img src="{{ asset('public/storage/' . $footer->logo) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $footer->title['en'] ?? '' }}</td>
                    <td>{{ $footer->email }}</td>
                    <td>{{ $footer->phone }}</td>
                    <td>
                        <a href="{{ route('footer.edit', $footer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('footer.destroy', $footer->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
