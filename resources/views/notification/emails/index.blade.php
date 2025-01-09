@extends('dashboard.layouts.app')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">📢 Notification Management</h1>

    <!-- Upload Excel File -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-file-earmark-spreadsheet"></i> Upload Excel File</h5>
            <i class="bi bi-cloud-upload-fill fs-4"></i>
        </div>
        <div class="card-body">
            <form action="{{ route('upload-excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="excel_file" class="form-label fw-bold">Choose an Excel File</label>
                    <input type="file" name="file" class="form-control" id="excel_file" required>
                </div>


        </div>
    </div>

    <!-- Send New Notification -->
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Notification Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label fw-bold">Notification Message</label>
                <textarea name="message" class="form-control" id="message" rows="4" placeholder="Write your message"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100"><i class="bi bi-send"></i> Send Notification</button>
            </form>
        </div>
    </div>
</div>
@endsection
