@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Service Details</h1>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Services
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title">{{ $service->name['en'] }}</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $service->id }}</p>
                <p><strong>Name:</strong> {{ $service->name['en'] }}</p>
                <p><strong>Description:</strong> {{ $service->description['en'] }}</p>
                @if ($service->contents && $service->contents->isNotEmpty())
                    <h4 class="mt-4">Content Details:</h4>
                    @foreach ($service->contents as $content)
                        <div class="content-details mt-3">
                            <p><strong>Title:</strong> {{ $content->title['en'] ?? 'N/A' }}</p>
                            <p><strong>Description:</strong> {{ $content->description['en'] ?? 'N/A' }}</p>
                            <p><strong>Status:</strong> {{ $content->status }}</p>

                            @if ($content->image && isset($content->image))
                                <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image"
                                    class="img-fluid mt-2">
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>No content available for this service.</p>
                @endif
            </div>
            <div class="card-footer text-muted text-center">
                <p>Created at: {{ $service->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <a href="{{ route('services.create.content', $service->id) }}" class="btn btn-primary mt-3">
            <i class="fas fa-plus"></i> Add Content
        </a>
    </div>
@endsection
