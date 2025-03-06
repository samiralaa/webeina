@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
@section('title', 'Home Page')

@section('content')
<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/faq-hero.png') }}" alt="portfolio">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.portfolio') }}</div>
        </div>
    </div>
</div>

<!-- Projects -->
<section class="projects">
    <div class="container pt-5">
        <h2 class="text-capitalize pb-4">{{ __('messages.projects') }}</h2>
    </div>
        <div class="container">
            <div class="row" >
                @foreach ($projects as $project)
                <div class="project-card col-6 d-flex flex-column">
                    <!-- Static img That Appear -->
                    <div class="project-img">
                        <img src="{{ asset('public/storage/' . $project->image) }}" alt="Project Image">
                    </div>
                    <!-- img slider that appear when hover -->
                    <div class="slideshow">
                        <div class="slider">
                            @foreach ($project->images as $image)
                            <div class="item">
                                <img src="{{ asset('public/storage/' . $image->path) }}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- The Content -->
                    <div class="project-content p-4">
                       <h2 class="project-title">{{ $project->title[app()->getLocale()] ?? $project->title['en'] }}</h2>
                       <p>{{ $project->description[app()->getLocale()] ?? $project->description['en'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </section>

@endsection
