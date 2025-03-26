@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h3>Why Opting In Section</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.choose.update', $choose->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title (EN):</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ old('title.en', $choose->title['en'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Title (AR):</label>
                    <input type="text" name="title[ar]" class="form-control" value="{{ old('title.ar', $choose->title['ar'] ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description (EN):</label>
                    <textarea name="description[en]" class="form-control" rows="3">{{ old('description.en', $choose->description['en'] ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description (AR):</label>
                    <textarea name="description[ar]" class="form-control" rows="3">{{ old('description.ar', $choose->description['ar'] ?? '') }}</textarea>
                </div>

              

                <input type="hidden" name="service_id" value="{{ $choose->id }}">

                <div class="mb-3">
                    <label class="form-label">Icon:</label>
                    <input type="file" name="icon" class="form-control">
                    @if(isset($choose->icon))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $choose->icon) }}" alt="Icon" class="img-thumbnail" width="100">
                        </div>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
