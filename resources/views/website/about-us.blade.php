<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@section('title', 'About-Us Page')

@section('content')
<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/about-hero.png') }}" loading="lazy" alt="About-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.about_us') }}</div>
        </div>
    </div>
</div>

<!-- About Section -->
<section class="pt-5">
    <div class="about container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 class="fw-bold text-success mb-4">{{ __('messages.our-history') }}</h2>
                <p class="text-muted">{{ __('messages.p-history') }}</p>
                <p class="text-muted">
                 <span class="fw-bold">{{ __('messages.vision-statement') }}</span> <br>{{ __('messages.p-vision') }}</p>
                <p class="text-muted">
                 <span class="fw-bold">{{ __('messages.mission-statement') }}</span> <br>{{ __('messages.p-mission') }}</p>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/who-we-are.png') }}" alt="Our Story" loading="lazy" class="img-fluid rounded">
            </div>
        </div>
    </div>
    <div class="about container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/why-choose-us.png') }}" alt="Our Story" loading="lazy" class="img-fluid rounded">
            </div>
            <div class="col-lg-7">
                <h2 class="fw-bold text-success mb-4">{{ __('messages.mission-encompasses') }}</h2>

                <p class="text-muted">
                    <span class="fw-bold">{{ __('messages.guiding-supporting-title') }}</span> <br>
                    {{ __('messages.guiding-supporting-text') }}
                </p>

                <p class="text-muted">
                    <span class="fw-bold">{{ __('messages.tailored-strategies-title') }}</span> <br>
                    {{ __('messages.tailored-strategies-text') }}
                </p>

                <p class="text-muted">
                    <span class="fw-bold">{{ __('messages.sustainable-growth-title') }}</span> <br>
                    {{ __('messages.sustainable-growth-text') }}
                </p>

                <p class="text-muted">
                    <span class="fw-bold">{{ __('messages.collaborating-organizations-title') }}</span> <br>
                    {{ __('messages.collaborating-organizations-text') }}
                </p>

                <p class="text-muted">
                    <span class="fw-bold">{{ __('messages.maximizing-benefits-title') }}</span> <br>
                    {{ __('messages.maximizing-benefits-text') }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
