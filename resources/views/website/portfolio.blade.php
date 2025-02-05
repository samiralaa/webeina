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
<div class="container py-5">
    <div class="row">
        <div class="project-card col-6 d-flex flex-column">
            <div class="project-img">
                <img src="https://innowise.com/wp-content/uploads/2025/01/Small-Cover-Automated-environmental-data-collection_-25-reduction-in-certification-costs-Anya-Kh.-Dasha-Tr.png" alt="">
            </div>

            <div class="project-content p-4">
                <h2 class="project-title">Automated environmental data collection</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus quo inventore eius ipsam itaque earum tempore voluptate nostrum dicta sed?</p>
            </div>
        </div>
        <div class="project-card col-6 d-flex flex-column">
            <div class="project-img">
                <img src="https://innowise.com/wp-content/uploads/2025/01/Small-Cover-Automated-environmental-data-collection_-25-reduction-in-certification-costs-Anya-Kh.-Dasha-Tr.png" alt="">
            </div>

            <div class="project-content p-4">
                <h2 class="project-title">Automated environmental data collection</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus quo inventore eius ipsam itaque earum tempore voluptate nostrum dicta sed?</p>
            </div>
        </div>
    </div>
</div>





@endsection
