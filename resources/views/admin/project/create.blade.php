@extends('dashboard.layouts.app')
@section('content')
<h2>Add New Project</h2>

<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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

            </div>
            <div class="mb-3">
                <label>Images (Multiple)</label>
                <input type="file" name="images[]" class="form-control" multiple>
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
    <div class="mb-3">
        <label>image</label>
        <input type="file" name="image" class="form-control">
        <label>Link</label>
        <input type="text" name="link" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection