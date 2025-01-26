@extends('website.layouts.main')

@section('title', $service->name[app()->getLocale()])

@section('content')
<div class="container my-5">
    <!-- Service Title -->
    <h1 class="text-center mb-4">{{ $service->name[app()->getLocale()] }}</h1>
    <!-- Service Description -->
    <p class="text-center">{{ $service->description[app()->getLocale()] }}</p>

    <!-- Contents -->
    @if ($service->contents->count() > 0)
        @foreach ($service->contents as $content)
            <div class="content-item my-4">
                <!-- Content Title -->
                <h2 class="text-primary">{{ $content->title[app()->getLocale()] ?? $content->title['en'] }}</h2>
                <!-- Content Description -->
                <p>{{ $content->description[app()->getLocale()] }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
