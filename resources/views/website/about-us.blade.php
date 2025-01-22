<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@section('title', 'About-Us Page')

@section('content')
<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/about-hero.png') }}" alt="About-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">About Us</div>
        </div>
    </div>
</div>

<!-- About Section -->
<section class="pt-5">
    <div class="about container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 class="fw-bold text-success mb-4">Who We Are?</h2>
                <p class="text-muted">
                    Seyaha is dedicated to providing unparalleled travel experiences, bringing together adventure, luxury, and culture in unique ways. Our team of travel enthusiasts works tirelessly to curate packages that transform vacations into unforgettable journeys.
                </p>
                <p class="text-muted">
                    Our mission is simple: to inspire and connect people through travel, delivering personalized experiences that create lasting memories.
                </p>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/who-we-are.png') }}" alt="Our Story" class="img-fluid rounded">
            </div>
        </div>
    </div>
    <div class="about container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/why-choose-us.png') }}" alt="Our Story" class="img-fluid rounded">
            </div>
            <div class="col-lg-7">
                <h2 class="fw-bold text-success mb-4">Why Choose Us?</h2>
                <p class="text-muted">
                    At Webenia, we specialize in combining expert programming and innovative marketing strategies to create customized solutions that deliver results. From cutting-edge technology to user-friendly designs, our work is tailored to meet your unique needs and help your brand stand out in today’s competitive landscape.
                </p>
                <p class="text-muted">
                    With a proven track record and a client-first mindset, we’re committed to your success. Whether it’s building a seamless digital experience or driving data-driven marketing campaigns, Webenia is here to help your business thrive in the digital world.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
