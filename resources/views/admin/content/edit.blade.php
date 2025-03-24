@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Content</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('services.update.content', $content->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            

            <div class="mb-3">
                <label for="title_en" class="form-label">Title (EN)</label>
                <input type="text" name="title[en]" class="form-control"
                       value="{{ $content->title['en'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="title_ar" class="form-label">Title (AR)</label>
                <input type="text" name="title[ar]" class="form-control"
                       value="{{ $content->title['ar'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="description_en" class="form-label">Description (EN)</label>
                <textarea name="description[en]" class="form-control">{{ $content->description['en'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">Description (AR)</label>
                <textarea name="description[ar]" class="form-control">{{ $content->description['ar'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $content->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$content->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Content</button>
            <a href="{{ route('services.index.content', $content->service_id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
