@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Footer</h2>

        <!-- Form to edit footer -->
        <form action="{{ route('footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Logo Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Logo</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="logo" class="font-weight-bold">Upload Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        @if($footer->logo)
                            <img src="{{ asset('public/storage/' . $footer->logo) }}" alt="Logo" width="150" class="mt-2">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Description</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="description_en" class="font-weight-bold">Description (English)</label>
                        <textarea class="form-control" id="description_en" name="description[en]" rows="4">{{ old('description.en', $footer->description['en']) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description_ar" class="font-weight-bold">Description (Arabic)</label>
                        <textarea class="form-control" id="description_ar" name="description[ar]" rows="4">{{ old('description.ar', $footer->description['ar']) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Title Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Title</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="title_en" class="font-weight-bold">Title (English)</label>
                        <input type="text" class="form-control" id="title_en" name="title[en]" value="{{ old('title.en', $footer->title['en']) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="title_ar" class="font-weight-bold">Title (Arabic)</label>
                        <input type="text" class="form-control" id="title_ar" name="title[ar]" value="{{ old('title.ar', $footer->title['ar']) }}">
                    </div>
                </div>
            </div>

            <!-- Location Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Location</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="location_en" class="font-weight-bold">Location (English)</label>
                        <input type="text" class="form-control" id="location_en" name="location[en]" value="{{ old('location.en', $footer->location['en']) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="location_ar" class="font-weight-bold">Location (Arabic)</label>
                        <input type="text" class="form-control" id="location_ar" name="location[ar]" value="{{ old('location.ar', $footer->location['ar']) }}">
                    </div>
                </div>
            </div>

            <!-- Contact Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Contact Details</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $footer->email) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone" class="font-weight-bold">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $footer->phone) }}">
                    </div>
                </div>
            </div>

            <!-- Social Links Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Social Media Links</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="facebook_link" class="font-weight-bold">Facebook Link</label>
                        <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $footer->facebook_link) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="twitter_link" class="font-weight-bold">Twitter Link</label>
                        <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $footer->twitter_link) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="linkedin_link" class="font-weight-bold">LinkedIn Link</label>
                        <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $footer->linkedin_link) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="instagram_link" class="font-weight-bold">Instagram Link</label>
                        <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ old('instagram_link', $footer->instagram_link) }}">
                    </div>
                </div>
            </div>

            <!-- Pages Links Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Pages</h5>
                </div>
                <div class="card-body">
                    <div id="pages-container">
                        @foreach($footer->page ?? [] as $index => $page)
                            <div class="card mb-3" id="page_{{ $index }}">
                                <div class="card-header">
                                    <h6 class="text-primary">Page {{ $index + 1 }}:</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="page_name_{{ $index }}" class="font-weight-bold">Page Name</label>
                                        <input type="text" class="form-control mb-2" id="page_name_{{ $index }}" name="pages[{{ $index }}][name]" value="{{ old('pages.' . $index . '.name', $page['name']) }}">

                                        <label for="page_link_{{ $index }}" class="font-weight-bold">Page Link</label>
                                        <input type="url" class="form-control mb-2" id="page_link_{{ $index }}" name="pages[{{ $index }}][link]" value="{{ old('pages.' . $index . '.link', $page['link']) }}">

                                        <label for="page_content_en_{{ $index }}" class="font-weight-bold">Page Content (English)</label>
                                        <textarea class="form-control mb-2" id="page_content_en_{{ $index }}" name="pages[{{ $index }}][content][en]" rows="3">{{ old('pages.' . $index . '.content.en', $page['content']['en']) }}</textarea>

                                        <label for="page_content_ar_{{ $index }}" class="font-weight-bold">Page Content (Arabic)</label>
                                        <textarea class="form-control mb-2" id="page_content_ar_{{ $index }}" name="pages[{{ $index }}][content][ar]" rows="3">{{ old('pages.' . $index . '.content.ar', $page['content']['ar']) }}</textarea>

                                        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removePage({{ $index }})">Remove Page</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-page" class="btn btn-secondary mt-3">Add Page</button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success">Save Footer</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let pageIndex = {{ count($footer->page ?? []) }};
        document.getElementById('add-page').addEventListener('click', function() {
            const newPageDiv = document.createElement('div');
            newPageDiv.classList.add('card', 'mb-3');
            newPageDiv.id = `page_${pageIndex}`;

            newPageDiv.innerHTML = `
                <div class="card-header">
                    <h6 class="text-primary">Page ${pageIndex + 1}:</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="page_name_${pageIndex}" class="font-weight-bold">Page Name</label>
                        <input type="text" class="form-control mb-2" id="page_name_${pageIndex}" name="pages[${pageIndex}][name]" value="">

                        <label for="page_link_${pageIndex}" class="font-weight-bold">Page Link</label>
                        <input type="url" class="form-control mb-2" id="page_link_${pageIndex}" name="pages[${pageIndex}][link]" value="">

                        <label for="page_content_en_${pageIndex}" class="font-weight-bold">Page Content (English)</label>
                        <textarea class="form-control mb-2" id="page_content_en_${pageIndex}" name="pages[${pageIndex}][content][en]" rows="3"></textarea>

                        <label for="page_content_ar_${pageIndex}" class="font-weight-bold">Page Content (Arabic)</label>
                        <textarea class="form-control mb-2" id="page_content_ar_${pageIndex}" name="pages[${pageIndex}][content][ar]" rows="3"></textarea>

                        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removePage(${pageIndex})">Remove Page</button>
                    </div>
                </div>
            `;
            document.getElementById('pages-container').appendChild(newPageDiv);
            pageIndex++;
        });

        function removePage(index) {
            const pageDiv = document.getElementById(`page_${index}`);
            pageDiv.remove();
        }
    </script>
@endsection
