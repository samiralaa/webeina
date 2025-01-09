@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-5">
    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center fw-bold">Packages Table</h2>
        <a href="{{ route('package.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Package
        </a>
    </div>

    {{-- Table Section --}}
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Subtitle</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $package)
                <tr>
                    {{-- ID --}}
                    <td class="text-center">{{ $package->id }}</td>

                    {{-- Localized Title --}}
                    <td>{{ $package->title[app()->getLocale()] ?? 'N/A' }}</td>

                    {{-- Localized Description (Truncated) --}}
                    <td>{{ Str::limit($package->description[app()->getLocale()] ?? 'N/A', 50) }}</td>

                    {{-- Localized Subtitle --}}
                    <td>{{ $package->sun_title[app()->getLocale()] ?? 'N/A' }}</td>

                    {{-- Image --}}
                    <td class="text-center">
                        <img src="{{ asset('public/storage/' . $package->image) }}"
                             alt="{{ $package->image }}"
                             class="img-thumbnail rounded-circle"
                             style="width: 80px; height: 80px;">
                    </td>

                    {{-- Actions --}}
                    <td class="text-center">
                        {{-- Edit Button --}}
                        <a href="{{ route('package.edit', $package->id) }}"
                           class="btn btn-sm btn-outline-info me-2">
                           <i class="fas fa-edit"></i> Edit
                        </a>

                        {{-- Delete Button Component --}}
                        <x-delete-button :id="$package->id" :url="route('package.delete', $package->id)" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted fw-light">
                        No packages available.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
