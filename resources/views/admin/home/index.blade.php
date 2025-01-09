@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- add section button  --}}
        <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">Add Section</a>
        <h2 class="text-center">Sections Table</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Link</th>
                        <th>Subtitle</th>
                        <th>Section Info</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td> {{ $section->type }}</td>
                            <td> {{ $section->title[app()->getLocale()] ?? 'No Title' }}</td>
                            <td> {{ $section->description[app()->getLocale()] ?? 'No Description' }}</td>
                            <td> {{ $section->status }}</td>
                            <td> {{ $section->link }}</td>
                            <td> {{ $section->subtitle[app()->getLocale()] ?? 'No Subtitle' }}</td>
                            <td> {{ $section->section_info[app()->getLocale()] ?? 'No Section Info' }}</td>
                            <td>
                                @foreach ($section->images as $image)
                                    <img src="{{ asset($image->image) }}" alt="{{ $image->image }}" width="100">
                                @endforeach
                            </td>
                            {{-- action --}}
                            <td>
                                <a href="{{ route('home-page.edit', $section->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('home-page.destroy', $section->id) }}"
                                    class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            <td>
                        </tr>
                        <tr>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No sections available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
