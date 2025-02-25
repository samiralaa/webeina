@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Edit Step</h2>

        <form action="{{ route('admin.steps.update', $step->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- English Title -->
                <div class="col-md-6 mb-3">
                    <label for="title_en" class="form-label fw-bold">Title (English)</label>
                    <input type="text" name="title[en]" id="title_en" class="form-control"
                           value="{{ $step->title['en'] ?? '' }}" required>
                </div>

                <!-- Arabic Title -->
                <div class="col-md-6 mb-3">
                    <label for="title_ar" class="form-label fw-bold">Title (Arabic)</label>
                    <input type="text" name="title[ar]" id="title_ar" class="form-control text-end"
                           value="{{ $step->title['ar'] ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <!-- English Description -->
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label fw-bold">Description (English)</label>
                    <textarea name="description[en]" id="description_en" class="form-control" rows="4" required>{{ $step->description['en'] ?? '' }}</textarea>
                </div>

                <!-- Arabic Description -->
                <div class="col-md-6 mb-3">
                    <label for="description_ar" class="form-label fw-bold">Description (Arabic)</label>
                    <textarea name="description[ar]" id="description_ar" class="form-control text-end" rows="4" required>{{ $step->description['ar'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('admin.steps.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Step</button>
            </div>
        </form>
    </div>
</div>
@endsection
