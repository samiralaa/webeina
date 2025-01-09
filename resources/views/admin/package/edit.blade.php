@extends('dashboard.layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Package</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('package.update', $package->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-4">
                    <h6 class="form-label">Title</h6>
                    @foreach(['en', 'ar'] as $locale)
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="title_{{ $locale }}"
                               name="title[{{ $locale }}]"
                               placeholder="Enter Title ({{ strtoupper($locale) }})"
                               value="{{ old('title.' . $locale, $package->title[$locale] ?? '') }}">
                        <label for="title_{{ $locale }}">Title ({{ strtoupper($locale) }})</label>
                    </div>
                    @endforeach
                </div>

                <!-- Subtitle -->
                <div class="mb-4">
                    <h6 class="form-label">Subtitle</h6>
                    @foreach(['en', 'ar'] as $locale)
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="subtitle_{{ $locale }}"
                               name="sun_title[{{ $locale }}]"
                               placeholder="Enter Subtitle ({{ strtoupper($locale) }})"
                               value="{{ old('sun_title.' . $locale, $package->sun_title[$locale] ?? '') }}">
                        <label for="subtitle_{{ $locale }}">Subtitle ({{ strtoupper($locale) }})</label>
                    </div>
                    @endforeach
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <h6 class="form-label">Description</h6>
                    @foreach(['en', 'ar'] as $locale)
                    <div class="form-floating mb-2">
                        <textarea class="form-control" id="description_{{ $locale }}"
                                  name="description[{{ $locale }}]"
                                  placeholder="Enter Description ({{ strtoupper($locale) }})"
                                  style="height: 100px;">{{ old('description.' . $locale, $package->description[$locale] ?? '') }}</textarea>
                        <label for="description_{{ $locale }}">Description ({{ strtoupper($locale) }})</label>
                    </div>
                    @endforeach
                </div>

                <!-- Features -->
                <div class="mb-4">
                    <h6 class="form-label">Features</h6>
                    <div id="features-container">
                        @foreach(['en', 'ar'] as $locale)
                        <div class="features-locale-container" id="features-{{ $locale }}">
                            <h6 class="text-muted mb-2">Features ({{ strtoupper($locale) }})</h6>
                            @foreach($package->features[$locale] ?? [] as $feature)
                            <div class="input-group mb-2 feature-item">
                                <input type="text" class="form-control"
                                       name="features[{{ $locale }}][]"
                                       placeholder="Feature ({{ strtoupper($locale) }})"
                                       value="{{ old('features.' . $locale . '[]', $feature) }}">
                                <button type="button" class="btn btn-outline-danger remove-feature">Remove</button>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-feature-btn">Add Feature</button>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price"
                           name="price" placeholder="Enter Price"
                           value="{{ old('price', $package->price) }}">
                </div>

                <!-- Serves -->
                <div class="mb-4">
                    <label for="service_id" class="form-label">Serves</label>
                    <select class="form-select" id="service_id" name="service_id">
                        <option value="">Select Serves</option>
                        @foreach ($serves as $serve)
                        <option value="{{ $serve->id }}" {{ old('service_id', $package->service_id) == $serve->id ? 'selected' : '' }}>
                            {{ $serve->name[app()->getLocale()] }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($package->image)
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="width: 120px;">
                    @endif
                </div>

                <!-- Subscription Time -->
                <div class="mb-4">
                    <label for="subscription_time" class="form-label">Subscription Time (in days)</label>
                    <input type="number" class="form-control" id="subscription_time"
                           name="subscription_time"
                           placeholder="Enter Subscription Time"
                           value="{{ old('subscription_time', $package->subscription_time) }}">
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Package</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle adding new feature input fields dynamically for both languages
        document.getElementById('add-feature-btn').addEventListener('click', function() {
            const languages = ['en', 'ar']; // Supported locales

            languages.forEach(locale => {
                const featureContainer = document.getElementById(`features-${locale}`);
                const newFeatureHTML = `
                    <div class="input-group mb-2 feature-item">
                        <input type="text" class="form-control" name="features[${locale}][]" placeholder="Feature (${locale.toUpperCase()})">
                        <button type="button" class="btn btn-outline-danger remove-feature">Remove</button>
                    </div>
                `;
                featureContainer.insertAdjacentHTML('beforeend', newFeatureHTML);
            });
        });

        // Handle removing feature input fields
        document.getElementById('features-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-feature')) {
                event.target.closest('.feature-item').remove();
            }
        });
    });
</script>
@endsection
