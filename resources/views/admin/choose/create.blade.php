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
            <h3>steps </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.choose.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title (EN):</label>
                    <input type="text" name="title[en]" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Title (AR):</label>
                    <input type="text" name="title[ar]" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description (EN):</label>
                    <textarea name="description[en]" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description (AR):</label>
                    <textarea name="description[ar]" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <!-- service_id -->
                <input type="hidden" name="service_id" value="{{ $id }}">
                <!-- icone -->

                <label for="">icone</label>
                <input type="file" name="icon">
                <!-- steps -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save UX Process</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
