@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($service) ? 'Edit Service' : 'Add Service' }}</h1>
        <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($service))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="banner" class="form-label">Service Banner</label>
                <input type="file" class="form-control" id="banner" name="image_banar" accept="image/*">
                @error('banner')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name_ar" class="form-label">Service Name Ar</label>
                <input type="text" class="form-control" id="name_ar" name="name[ar]"
                    value="{{ old('name.ar', $service->name['ar'] ?? '') }}" required>
                @error('name.ar')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name_en" class="form-label">Service Name En</label>
                <input type="text" class="form-control" id="name_en" name="name[en]"
                    value="{{ old('name.en', $service->name['en'] ?? '') }}" required>
                @error('name.en')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icon" class="form-label">Service Icon</label>
                <input type="file" class="form-control" id="icon" name="icon"
                    value="{{ old('icon', $service->icon ?? '') }}">
                @error('icon')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">

                {{-- description ar  --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="description_ar" class="form-label">Service Description Ar</label>
                        <textarea class="form-control" id="description_ar" name="description[ar]" rows="3">{{ old('description.ar', $service->description['ar'] ?? '') }}</textarea>
                        @error('description.ar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="short_description_ar" class="form-label">Service  Description En</label>
                        <textarea class="form-control" id="description_en" name="description[en]" rows="3">{{ old('short_description.ar', $service->description['en'] ?? '') }}</textarea>
                        @error('_description.en')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">{{ isset($service) ? 'Update' : 'Create' }}</button>
        </form>

    </div>
@endsection
