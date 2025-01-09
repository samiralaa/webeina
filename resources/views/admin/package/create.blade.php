@extends('dashboard.layouts.app')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Create Package</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Title</label>
                    <div id="titles">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title[en]" placeholder="Title (English)" value="{{ old('title.en') }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title[ar]" placeholder="Title (Arabic)" value="{{ old('title.ar') }}">
                            </div>
                            <div class="col-md-2 text-md-center">
                                <button type="button" class="btn btn-outline-success add-title">+ Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subtitle -->
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Subtitle</label>
                    <div id="subtitles">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="sun_title[en]" placeholder="Subtitle (English)" value="{{ old('sun_title.en') }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="sun_title[ar]" placeholder="Subtitle (Arabic)" value="{{ old('sun_title.ar') }}">
                            </div>
                            <div class="col-md-2 text-md-center">
                                <button type="button" class="btn btn-outline-success add-subtitle">+ Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- description --}}

                <div class="form-group mb-4">
                    <label class="font-weight-bold">Description</label>
                    <div id="descriptions">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-5">
                                <textarea class="form-control" name="description[en]" placeholder="Description (English)">{{ old('description.en') }}</textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea class="form-control" name="description[ar]" placeholder="Description (Arabic)">{{ old('description.ar') }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Features</label>
                    <div id="features">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="features[en][]" placeholder="Feature (English)">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="features[ar][]" placeholder="Feature (Arabic)">
                            </div>
                            <div class="col-md-2 text-md-center">
                                <button type="button" class="btn btn-outline-success add-feature">+ Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price & Serves -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Price</label>
                            <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="serves_id" class="font-weight-bold">Serves</label>
                            <select class="form-control" name="service_id" id="serves_id">
                                <option value="">Select Serves</option>
                                @foreach ($serves as $serve)
                                    <option value="{{ $serve->id }}" {{ old('serves_id') == $serve->id ? 'selected' : '' }}>
                                        {{ $serve->name[app()->getLocale()] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="form-group mb-4">
                    <label for="image" class="font-weight-bold">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <!-- Subscription Time -->
                <div class="form-group mb-4">
                    <label for="subscription_time" class="font-weight-bold">Subscription Time (in days)</label>
                    <input type="number" class="form-control" name="subscription_time" id="subscription_time" value="{{ old('subscription_time') }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Save Package</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add dynamic fields for Title
        document.querySelector('.add-title').addEventListener('click', function () {
            const container = document.getElementById('titles');
            const newRow = `
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="title[en]" placeholder="Title (English)">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="title[ar]" placeholder="Title (Arabic)">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', newRow);
        });

        // Add dynamic fields for Subtitle
        document.querySelector('.add-subtitle').addEventListener('click', function () {
            const container = document.getElementById('subtitles');
            const newRow = `
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="sun_title[en]" placeholder="Subtitle (English)">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="sun_title[ar]" placeholder="Subtitle (Arabic)">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', newRow);
        });

        // Add dynamic fields for Features
        document.querySelector('.add-feature').addEventListener('click', function () {
            const container = document.getElementById('features');
            const newRow = `
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="features[en][]" placeholder="Feature (English)">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="features[ar][]" placeholder="Feature (Arabic)">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', newRow);
        });

        // Remove dynamic rows
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.target.closest('.row').remove();
            }
        });
    });
</script>
@endsection
