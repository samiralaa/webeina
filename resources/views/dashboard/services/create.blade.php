@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">{{ isset($service) ? 'Edit Service' : 'Add Service' }}</h1>
        <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
            @csrf
            @if(isset($service))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="banner" class="form-label">Service Banner</label>
                <input type="file" class="form-control" id="banner" name="image_banar" accept="image/*">
                @error('banner')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name_ar" class="form-label">Service Name (Arabic)</label>
                <input type="text" class="form-control" id="name_ar" name="name[ar]" value="{{ old('name.ar', $service->name['ar'] ?? '') }}" required>
                @error('name.ar')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name_en" class="form-label">Service Name (English)</label>
                <input type="text" class="form-control" id="name_en" name="name[en]" value="{{ old('name.en', $service->name['en'] ?? '') }}" required>
                @error('name.en')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="icon" class="form-label">Service Icon</label>
                <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
                @error('icon')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="description_en" class="form-label">Service Description (English)</label>
                        <textarea class="form-control" id="description_en" name="description[en]" rows="3" required>{{ old('description.en', $service->description['en'] ?? '') }}</textarea>
                        @error('description.en')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="description_ar" class="form-label">Service Description (Arabic)</label>
                        <textarea class="form-control" id="description_ar" name="description[ar]" rows="3" required>{{ old('description.ar', $service->description['ar'] ?? '') }}</textarea>
                        @error('description.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{ isset($service) ? 'Update' : 'Create' }}</button>
            </div>
        </form>
    </div>
@endsection
