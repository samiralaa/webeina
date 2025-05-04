@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Edit Industrial</h2>

        <form action="{{ route('admin.industrial.update', $industrial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- English Title -->
                <div class="col-md-6 mb-3">
                    <label for="title_en" class="form-label fw-bold">Title (English)</label>
                    <input type="text" name="title[en]" id="title_en" class="form-control"
                           value="{{ old('title.en', $industrial->title['en'] ?? '') }}" required>
                </div>

                <!-- Arabic Title -->
                <div class="col-md-6 mb-3">
                    <label for="title_ar" class="form-label fw-bold">Title (Arabic)</label>
                    <input type="text" name="title[ar]" id="title_ar" class="form-control text-end"
                           value="{{ old('title.ar', $industrial->title['ar'] ?? '') }}" required>
                </div>
            </div>

            <div class="row">
                <!-- English Description -->
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label fw-bold">Description (English)</label>
                    <textarea name="description[en]" id="description_en" class="form-control" rows="4" required>{{ old('description.en', $industrial->description['en'] ?? '') }}</textarea>
                </div>

                <!-- Arabic Description -->
                <div class="col-md-6 mb-3">
                    <label for="description_ar" class="form-label fw-bold">Description (Arabic)</label>
                    <textarea name="description[ar]" id="description_ar" class="form-control text-end" rows="4" required>{{ old('description.ar', $industrial->description['ar'] ?? '') }}</textarea>
                </div>
            </div>

            <div class="row">
                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $industrial->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $industrial->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Icon Upload -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Icon</label><br>
                    @if($industrial->icon)
                        <img src="{{ asset('storage/' . $industrial->icon) }}" alt="Current Icon" width="80" class="mb-2 d-block">
                    @endif
                    <input type="file" name="icon" class="form-control">
                </div>
            </div>

            <input type="hidden" name="service_id" value="{{ $industrial->service_id }}">

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.industrial.index', $industrial->service_id) }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Industrial</button>
            </div>
        </form>
    </div>
</div>
@endsection
