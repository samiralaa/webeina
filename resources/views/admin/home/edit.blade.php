@extends('dashboard.layouts.app')

@section('content')

<form action="{{ route('home-page.update', $section->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title (Arabic & English) -->
    @if (!empty($section->title['ar']))
    <div class="form-group">
        <label for="title_ar">Title (Arabic)</label>
        <input type="text" class="form-control" name="title[ar]"
            value="{{ old('title.ar', $section->title['ar'] ?? '') }}">
    </div>
    @endif

    @if (!empty($section->title['en']))
    <div class="form-group">
        <label for="title_en">Title (English)</label>
        <input type="text" class="form-control" name="title[en]"
            value="{{ old('title.en', $section->title['en'] ?? '') }}">
    </div>
    @endif

    <!-- Description (Arabic & English) -->
    @if (!empty($section->description['ar']))
    <div class="form-group">
        <label for="description_ar">Description (Arabic)</label>
        <textarea class="form-control"
            name="description[ar]">{{ old('description.ar', $section->description['ar'] ?? '') }}</textarea>
    </div>
    @endif

    @if (!empty($section->description['en']))
    <div class="form-group">
        <label for="description_en">Description (English)</label>
        <textarea class="form-control"
            name="description[en]">{{ old('description.en', $section->description['en'] ?? '') }}</textarea>
    </div>
    @endif

    <!-- Subtitle (Arabic & English) -->
    @if (!empty($section->subtitle['ar']))
    <div class="form-group">
        <label for="subtitle_ar">Subtitle (Arabic)</label>
        <input type="text" class="form-control" name="subtitle[ar]"
            value="{{ old('subtitle.ar', $section->subtitle['ar'] ?? '') }}">
    </div>
    @endif

    @if (!empty($section->subtitle['en']))
    <div class="form-group">
        <label for="subtitle_en">Subtitle (English)</label>
        <input type="text" class="form-control" name="subtitle[en]"
            value="{{ old('subtitle.en', $section->subtitle['en'] ?? '') }}">
    </div>
    @endif

    <!-- Section Info (Arabic & English) -->
    <div class="form-group">

        @foreach ($section->section_info as $info)
        @if (
        !empty($info->info_name['ar']) ||
        !empty($info->info_name['en']) ||
        !empty($info->info_value['ar']) ||
        !empty($info->info_value['en']))
        <div class="info-group">
            @if (!empty($info->info_name['ar']))
            <label for="info_name_ar_{{ $info->id }}">Info Name (Arabic)</label>
            <input type="text" class="form-control" name="info_name[ar][{{ $info->id }}]"
                value="{{ old('info_name.ar.' . $info->id, $info->info_name['ar'] ?? '') }}">
            @endif

            @if (!empty($info->info_name['en']))
            <label for="info_name_en_{{ $info->id }}">Info Name (English)</label>
            <input type="text" class="form-control" name="info_name[en][{{ $info->id }}]"
                value="{{ old('info_name.en.' . $info->id, $info->info_name['en'] ?? '') }}">
            @endif

            @if (!empty($info->info_value['ar']))
            <label for="info_value_ar_{{ $info->id }}">Info Value (Arabic)</label>
            <input type="text" class="form-control" name="info_value[ar][{{ $info->id }}]"
                value="{{ old('info_value.ar.' . $info->id, $info->info_value['ar'] ?? '') }}">
            @endif

            @if (!empty($info->info_value['en']))
            <label for="info_value_en_{{ $info->id }}">Info Value (English)</label>
            <input type="text" class="form-control" name="info_value[en][{{ $info->id }}]"
                value="{{ old('info_value.en.' . $info->id, $info->info_value['en'] ?? '') }}">
            @endif
        </div>
        @endif
        @endforeach
    </div>

    <!-- Slider Section -->
    @if (!empty($section->sliders))
    <div class="card mb-6">

        <div class="row">
            @foreach ($section->sliders as $slide)
            <div class="col-md-4 mb-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        @if ($slide->image)
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="Slide Image" class="img-fluid rounded"
                            style="max-height: 200px; max-width: 100%; object-fit: cover;">
                        @else
                        <p>No image uploaded</p>
                        @endif
                    </div>

                    <div class="card-footer text-center">
                        <div class="form-group">
                            <label for="slide_title_ar_{{ $slide->id }}" class="font-weight-bold">Slide
                                Title (Arabic)</label>
                            <input type="text" class="form-control" name="  sliders[$slide->id][title][ar]"
                                value="{{ old('slide_title.ar.' . $slide->id, $slide->title['ar'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="slide_title_en_{{ $slide->id }}" class="font-weight-bold">Slide
                                Title (English)</label>
                            <input type="text" class="form-control" name="sliders[$slide->id][title][en]"
                                value="{{ old('slide_title.en.' . $slide->id, $slide->title['en'] ?? '') }}">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <div class="form-group">
                            <label for="slide_description_ar_{{ $slide->id }}" class="font-weight-bold">Description
                                (Arabic)</label>
                            <input type="text" class="form-control" name="sliders[$slide->id][description][en]"
                                value="{{ old('slide_description.ar.' . $slide->id, $slide->description['ar'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="slide_description_en_{{ $slide->id }}" class="font-weight-bold">Description
                                (English)</label>
                            <input type="text" class="form-control" name="sliders[$slide->id][description][en]"
                                value="{{ old('slide_description.en.' . $slide->id, $slide->description['en'] ?? '') }}">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <div class="form-group">
                            <label for="image_directory" class="font-weight-bold">Image Directory</label>
                            <input type="text" name="sliders[{{ $slide->id }}][image_direction]"
                                value="{{ $slide->image_direction }}" class="form-control">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remove_slider[]" value="{{ $slide->id }}"
                                class="form-check-input" id="remove_slider_{{ $slide->id }}">
                            <label class="form-check-label" for="remove_slider_{{ $slide->id }}">Remove
                                this image</label>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <div class="form-group">
                            <label for="slider_images_{{ $slide->id }}" class="d-block font-weight-bold">Upload New
                                Image</label>
                            <input type="file" name="sliders[$slide->id ][image]" class="form-control"
                                id="slider_images_{{ $slide->id }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endif

    <!-- Optionally, upload new slider images -->


    <!-- Images -->
    @if (count($section->images) > 0)
    <div class="form-group">
        <h5>Images</h5>
        @foreach ($section->images as $image)
        <div class="image-item">
            <label>Current Image</label>
            <img src="{{ asset($image->image_path) }}" alt="Image" class="img-fluid" width="200">

            <div class="form-check">
                <input type="checkbox" name="remove_images[]" value="{{ $image->id }}" class="form-check-input">
                <label class="form-check-label" for="remove_images_{{ $image->id }}">Remove this
                    image</label>
            </div>


        </div>
        @endforeach
    </div>
    @endif

    <!-- Optionally, upload new images -->
    <div class="form-group">
        <label for="new_images">Upload New Images</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Section</button>
</form>

<script>
    // JavaScript to update the image size dynamically (if needed)
        function updateImageSize(slideId, size) {
            const imgElement = document.getElementById('slide_image_' + slideId);
            imgElement.style.maxWidth = size + 'px';
            imgElement.style.maxHeight = size + 'px';
        }
</script>

@endsection
