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
                <h2 class="fw-bold text-success mb-4">Our History</h2>
                <p class="text-muted">
                Since our establishment in 2017 as a government sector ERP contractor, we have broadened our services to align with the evolving UAE digital landscape. This includes adding, refining, and customizing our digital solutions to meet the needs of a wide range of businesses and organizations. We enthusiastically embrace digital transformation and endeavor to be a leader in realizing the strategic digital vision of the Gulf region
                </p>
                <p class="text-muted">
                 <span class="fw-bold">Vision Statement</span> <br>
To be the undisputed leader in facilitating digital transformation within the region, setting the benchmark for innovation and excellence.
</p>
<p class="text-muted">
                 <span class="fw-bold">Mission Statement</span> <br>
                 We are committed to empowering businesses to reach their full potential by leveraging cutting-edge digital technologies and strategies.</p>
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
                <h2 class="fw-bold text-success  mb-4">Our Mission Encompasses:</h2>

                <p class="text-muted">
                 <span class="fw-bold">Guiding and Supporting Businesses through Digital Transformation:</span> <br>
                 We will act as a trusted partner, providing comprehensive guidance and support to businesses at every stage of their digital transformation journey.
                 </p>

                 <p class="text-muted">
                 <span class="fw-bold">Crafting Tailored Digital Transformation Strategies:</span> <br>
                 We recognize that each business is unique. Our team of experts will collaborate closely with clients to develop and implement customized digital transformation plans that align with their specific needs and objectives.
                </p>

                 <p class="text-muted">
                 <span class="fw-bold">Driving Sustainable Growth:</span> <br>
                 We are focused on delivering solutions that generate measurable and sustainable growth for our clients, enabling them to thrive in the digital age.
                </p>

                 <p class="text-muted">
                 <span class="fw-bold">Collaborating with Diverse Organizations</span> <br>
                 We are committed to working with a wide range of organizations, including both private and public sector entities, to drive digital transformation across all sectors of the economy.
                 </p>

                 <p class="text-muted">
                 <span class="fw-bold">Maximizing the Benefits of Digital Transformation:</span> <br>
                 Our goal is to ensure that our clients fully realize the transformative potential of digital technologies, achieving optimal outcomes and maximizing their return on investment.
                 </p>


            </div>
        </div>
    </div>
</section>
@endsection
