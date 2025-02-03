<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
@section('title', 'Home Page')

@section('content')


    @foreach ($sections as $section)
    @if ($section->type == 'banner')
    <section class="banner">

        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="banner__content">


                        <div class="play">
                            <a href=""><i class="fa-solid fas fa-circle" style="color: #18cfa160;
                                position: absolute;
                                font-size: 90px;
                                bottom: 181px;">
                                    <i class="iconplay fa-solid fa-play"></i>
                                </i>

                            </a>
                        </div>


                        <h2 class="text-uppercase text-start fw-9 mb-0 title-anim">
                            {{ $section->title[app()->getLocale()] ?? 'Digital Agency in Your City' }}


                            <!-- digital agency -->

                            </span>
                        </h2>

                        <div class="banner__content-inner">
                            <p>
                                {{ $section->description[app()->getLocale()] ??
                                'We are a leading digital agency with a
                                team of experienced professionals. We offer a wide range of services including web
                                design, development, and digital marketing. Our team is dedicated to providing you with
                                the best solutions for your business needs.' }}
                            </p>


                            <div class="cta section__content-cta">
                                @foreach ($section->section_info as $cta)
                                <div class="single">
                                    <h5 class="fw-7">{{ $cta->info_value[app()->getLocale()] }}</h5>
                                    <p class="fw-5">{{ $cta->info_name[app()->getLocale()] }}</p>
                                </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($section->images as $image)
        <img src="{{ asset('public/' . $image->image_path) }}" alt="Image"
            class="banner-one-thumb d-none d-sm-block g-ban-one" />
        @endforeach
        {{-- <img src="assets/images/star.png" alt="Image" class="star" /> --}}
        <div class="banner-left-text banner-social-text d-none d-md-flex">
            <a href="mailto:info@webenia.com">mail : info@webenia.com</a>
            <a href="tel:99-2158-003-6980">Call : +99 2158 003 6980</a>
        </div>
        <div class="banner-right-text banner-social-text d-none d-md-flex">
            <a href="https://www.instagram.com/webeniaagency/" target="_blank">
                instagram
            </a>
            <a href="https://www.linkedin.com/company/webenia/posts/?feedView=all" target="_blank">
                Linkedin
            </a>
            <a href="https://www.facebook.com/webenia" target="_blank">
                facebook
            </a>
        </div>

    </section>
    @endif
    <!-- ==== / banner end ==== -->
    <!-- ==== agency start ==== -->
    @if ($section->type == 'agency')
    <section id="agency" class="section agency pt-5 pb-5 mt-5 mb-5">
        <div class="container">
            <div class="row gaper align-items-center">
                <h2 class="text-white text-center text-uppercase mt-5 " id="about">about us</h2>
                <div class="col-12 col-lg-6">
                    <div class="agency__thumb">

                        @foreach ($section->images as $image)
                        <div class="sponsor__slider-item">
                            <img src="{{ 'public/' . $image->image_path }}" loading="lazy" alt="Image" />
                        </div>
                        @endforeach
                        {{-- <img src="" alt="Image" class="thumb-one fade-left" />
                        <img src="assets/images/agency/Untitled-2-removebg-preview.png" alt="Image"
                            class="thumb-two my-2 fade-right" /> --}}
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="agency__content section__content">

                        <h3 class="title title-anim mb-3">
                            {{ $section->title[app()->getLocale()] ??
                            'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h3>
                        <div class="paragraph ">
                            <p class="text-white-50">
                                {{ $section->description[app()->getLocale()] ??
                                'We are a leading digital agency with a
                                team of experienced professionals. We offer a wide range of services including web
                                design, development, and digital marketing. Our team is dedicated to providing you with
                                the best solutions for your business needs.' }}
                            </p>
                        </div>

                        <div class="section__content-cta">
                            <a href="{{ $section->link }}" class="btn btn--primary">{{
                                $section->button_text[app()->getLocale()] ?? 'download resume' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <img src="assets/images/star.png" alt="Image" class="star" />
        <img src="assets/images//agency/dot-large.png" alt="Image" class="dot-large" /> --}}
    </section>
    @endif



    @if ($section->sliders->isNotEmpty() && $section->type == 'serves')
    <section id="agency" class="section agency pt-5 pb-5 mt-5 mb-5">

        <div class="container">
            <div class="row gaper align-items-center">
                <h2 class="text-white-50 text-center text-uppercase mt-5">Services </h2>
                @foreach ($section->sliders as $slider)
                <div class="col-12 col-lg-6">
                    <div class="agency__thumb">
                        @if ($slider->image_direction == 'left')
                        <p>image direction left</p>
                        <div class="sponsor__slider-item">
                            <img src="{{ asset('storage/' . $slider->image) }}" />
                        </div>
                        @else
                        <p>image direction right class to right</p>
                        <div class="sponsor__slider-item">
                            <img src="{{ asset('storage/' . $slider->image) }}" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="agency__content section__content">

                        <h3 class="title title-anim mb-3">
                            {{ $slider->title[app()->getLocale()] ??
                            'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h3>
                        <div class="paragraph ">
                            <p class="text-white-50">
                                {{ $slider->description[app()->getLocale()] ??
                                'We are a leading digital agency with a
                                team of experienced professionals. We offer a wide range of services including web
                                design, development, and digital marketing. Our team is dedicated to providing you with
                                the best solutions for your business needs.' }}
                            </p>
                        </div>

                        <div class="section__content-cta">
                            <a href="{{ $slider->link }}" class="btn btn--primary">{{
                                $slider->button_text[app()->getLocale()] ?? 'download resume' }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <img src="assets/images/star.png" alt="Image" class="star" />
        <img src="assets/images//agency/dot-large.png" alt="Image" class="dot-large" />
    </section>
    @endif
    <!-- ==== / agency end ==== -->
    <!-- ==== portfolio start ==== -->




    <!-- ==== / portfolio end ==== -->
    <!-- ==== offer start ==== -->
    @if ($section->type == 'portfolio')
    <section class="section offer fade-wrapper light pt-5 pb-5 mt-5 mb-5">
        <div class="container">
            <div class="row gaper">
                <div class="col-12 col-lg-5">
                    <div class="offer__content section__content">

                        <!-- Display title in the current language -->
                        <h3 class="title title-anim">
                            {{ $section->title[app()->getLocale()] ?? 'Great Ideas for your business' }}
                        </h3>

                        <!-- Display description in the current language -->
                        <div class="paragraph">
                            <p>
                                {{ $section->description[app()->getLocale()] ??
                                'We help you take your business to the
                                next digital level. We offer you end-to-end digital solutions that help you streamline
                                your products and services and create a seamless and unique experience for your
                                customers.' }}
                            </p>
                        </div>

                        <!-- Display bottom text with dynamic link -->
                        <div class="section__content-cta">
                            <a href="{{ $section->link }}" class="btn btn--secondary">
                                {{ $section->bottom_text[app()->getLocale()] ?? 'View All Services' }}
                            </a>
                        </div>
                    </div>
                </div>



                <!-- Images Section -->
                <div class="col-12 col-lg-7 col-xl-6 offset-xl-1">
                    <div class="offer__cta">

                        @foreach ($section->images as $image)
                        @foreach ($section->section_info as $cta)
                        <div class="offer__cta-single fade-top">
                            <span class="sub-title">
                                {{ $cta->info_value[app()->getLocale()] }}
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                            <h3>
                                <a href="{{ 'public/' . $image->image_path }}">
                                    {{ $cta->info_name[app()->getLocale()] }}
                                    <i class="fa-sharp fa-solid fa-arrow-up-right"></i>
                                </a>
                            </h3>
                            <!-- Display image dynamically -->
                            <div class="offer-thumb-hover d-none d-md-block"
                                style="background-image: url('{{ 'public/' . $image->image_path }}')">
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('assets/images/offer/star.png') }}" alt="Image" class="star" />

    </section>
    @endif

    @if ($section->sliders->isNotEmpty() && $section->type == 'slider')
    <section class="section testimonial pt-0 position-relative">
        <div class="testimonial__text-slider">

        </div>

        <div class="  container position-relative pt-5 pb-5 mt-5 mb-5">
            <div class="row">
                <div class="col-12 col-xxl-10">
                    <div class="testimonial-s__slider">
                        @foreach ($section->sliders as $slider)
                        <div class="testimonial-s__slider-single">
                            <div class="row gaper align-items-center">
                                <div class="col-12 col-lg-4 col-xxl-4">
                                    <div class="thumb">
                                        <img src="{{ asset('public/storage/' . $slider->image) }}" alt="Slider Image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="322"
                                            viewBox="0 0 44 322" fill="none" class="d-none ">
                                            <path d="M43 -0.000976562V151.999L2 192.999H43V321.999" stroke="#414141" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="testmonion col-12 col-lg-7 offset-lg-1 col-xxl-7 offset-xxl-1">
                                    <div class="testimonial-s__content">
                                        <div class="quote">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>
                                        <div class="content ">
                                            <h5 class="text-white-50 pb-0">
                                                {{ $slider->description[app()->getLocale()] }}
                                            </h5>
                                        </div>
                                        <div class="content-cta">
                                            <h4 class="text-uppercase">
                                                {{ $slider->title[app()->getLocale()] }}</h4>
                                            <p>{{ $slider->sub_title[app()->getLocale()] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- slide-group -->
            <div class=" slide pt-5 pb-5 mt-5 mb-5">
                <a href="javascript:void(0)" aria-label="previous item" class="slide-btn prev-testimonial-three">
                    <i class="fa-light fa-angle-left"></i>
                </a>
                <a href="javascript:void(0)" aria-label="next item" class="slide-btn next-testimonial-three">
                    <i class="fa-light fa-angle-right"></i>
                </a>
            </div>
        </div>

        <div class="other-section d-none">
            <img class="other-section-image" src="assets/images/testimonial/s-thumb.png" loading="lazy" alt="Next Slide Image" />
        </div>
    </section>
    @endif
    @if ($section->type == 'swipers')
    <section class="section next-page">
        <div class="container">
            <div class="row justify-content-center">

            </div>
        </div>
        <div class="next__text-slider">
            <div class="next__text-slider">
                @foreach ($section->slider_name[app()->getLocale()] as $index => $sliderName)
                <div class="next__text-slider-single">
                    <h3 class="h1">
                        <a href="{{ $section->slider_link[app()->getLocale()][$index] ?? '#' }}">
                            {{ $sliderName }}
                            <i class="fa-sharp fa-solid fa-arrow-down-right"></i>
                        </a>
                    </h3>
                </div>
                @endforeach
            </div>

        </div>

    </section>
    @endif
    <!-- ==== / next page end ==== -->
    <!-- ==== sponsor start ==== -->
    @if ($section->type == 'sponsor')
    <div class="sponsor section pb-5">
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="sponsor__slider">
                        @foreach ($section->images as $image)
                        <div class="sponsor__slider-item">
                            <img src="{{ 'public/' . $image->image_path }}" loading="lazy" alt="Image" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif

    @if ($section->sliders->isNotEmpty() && $section->type == 'blog')
    <div class="container" style="display: flex; justify-content: space-evenly; flex-wrap: wrap;">

        @foreach ($section->sliders as $slider)
        <div class="blog pt-5 pb-5 mt-5 mb-5">
            <div class="img">
                <img class="img-fluid" style="border-radius: 8px;" loading="lazy" src="{{ asset('public/storage/' . $slider->image) }}"
                    alt="">
            </div>
            <div class="main text"
                style="display: flex; justify-content: space-between; align-items: center;flex-wrap: wrap;; padding: 10px;">
                <h4 class="main-title text-uppercase">{{ $slider->title[app()->getLocale()] }}</h4>
                <span style="color: var(--barnd-hover-color);">{{ $slider->created_at->format('d M Y') }}</span>
            </div>
            <div class="sub">
                <p>{{ $slider->description[app()->getLocale()] }}</p>
                <div class="link pb-3">
                    <a href="{{ $slider->link }}" class="text-capitalize">{{ $slider->sub_title[app()->getLocale()] }}
                    </a>&nbsp; <i class="fa-sharp fa-solid fa-arrow-up"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- start contact that display on the taplet and larg screen --}}
    @if ($section->type == 'contact')
    <div class="secend pt-5 pb-5 mt-5 mb-5">
        <div class="consultation container pt-5 pb-5">
            <div class="main d-none d-md-block">
                @foreach ($section->images as $image)
                <img class="img-fluid " src="{{ 'public/' . $image->image_path }}" alt="" loading="lazy" style="border-radius: 20px;">
                @endforeach
                <div class="text"></div>
                <div class="contnet text-sm-center text-center text-md-start d-block " style="">
                    <h4 class="text-white text-uppercas ">{{ $section->title[app()->getLocale()] }}</h4>
                    <p class="w-75 text-white-50 text-start">{{ $section->description[app()->getLocale()] }}
                    </p>
                    <button class="btn mt-3 mb-3 ">{{ $section->bottom_text[app()->getLocale()] ?? 'View All Services'
                        }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif



    @if ($section->type == 'protfolio pt-5 pb-5')
    <div class="container mt-5 mb-5 main-prtofolio">
        <h4 class="text-white-50 text-uppercase text-center pt-5 pb-5">portfolio</h4>
        <div class="list">
            @foreach ($section->images as $image)
            <div class="item"><a href=""><img src="{{ $image->image_path }}" loading="lazy" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    </div>

    <!-- start right servses -->
    @if ($section->type == 'service' && $section->sliders->isNotEmpty())
    @foreach ($section->sliders as $slider)
    @if ($slider->image_direction == 'right')
    <div class="serves secend pt-5 pb-5">

        <div class="container pt-5 pb-5">
            <div class=" row">
                <div class="text col-lg-6 col-md-4">
                    <h4 class="text-uppercase text-white">{{ $slider->title[app()->getLocale()] }}
                    </h4>
                    <p class="text-white-50">{{ $slider->description[app()->getLocale()] }}</p>
                    <div class="link mt-3"><a href="#" class="text-capitalize">explore more
                            &nbsp;
                            <i class="fa-sharp fa-solid fa-arrow-up"></i></a></div><br>
                    <button class="btn mb-5 mt-5 btn btn--primary">know more</button>
                </div>
                <div class="img col-lg-6 col-md-4 d-flex justify-content-end">
                    <img class="img-fluid" style="border-radius: 8px;"
                        src="{{ asset('public/storage/' . $slider->image) }}" loading="lazy" alt="">
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="serves dark pt-5 pb-5">
        <div class="container">
            <div class=" row">
                <div class="img col-lg-6 col-md-4 d-flex justify-content-start">
                    <img class="img-fluid" style="border-radius: 8px;"
                        src="{{ asset('public/storage/' . $slider->image) }}" loading="lazy" alt="">
                </div>

                <div class="text col-lg-6 col-md-4">
                    <h4 class="text-uppercase text-white">{{ $slider->title[app()->getLocale()] }}
                    </h4>
                    <p class="text-white-50">{{ $slider->description[app()->getLocale()] }}</p>
                    <div class="link mt-3"><a href="#" class="text-capitalize">{{ $slider->sub_title[app()->getLocale()]
                            }}
                            &nbsp; <i class="fa-sharp fa-solid fa-arrow-up"></i></a></div><br>
                    <button class="btn mb-5 mt-5 btn btn--primary">know more</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif


    @if ($section->type == 'protfolioImage')
    <div class="container mt-5 mb-5 main-prtofolio">
        <h4 class="text-white-50 text-uppercase text-center pt-5 pb-5">portfolio</h4>
        <div class="list">
            @foreach ($section->images as $image)
            <div class="item"><a href=""><img src="{{ 'public/' . $image->image_path }}" loading="lazy" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif


    <!-- start right servses -->

    <!--end serves right -->
    @endforeach




    {{-- hero --}}
    <section class="hero" role="banner">
        <div class="container--0-">
            <video autoplay muted loop class="background-video" aria-label="Background video" title="Background video showcasing our services" preload="auto" poster="{{ asset('assets/images/video-thumbnail.jpg') }}">
                <source src="{{ asset('assets/Videos/B-works-Schweiz-Video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="container-0-1-0" aria-hidden="true">
                <div class="container-1-2-0">
                    <h2 class="text-2-3-0">{{ __('messages.hero_title') }}</h2>
                    <p class="text-2-3-1">{{ __('messages.hero_subtitle') }}</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Description --}}
    <section class="description container pt-5 pb-5" role="region" aria-label="Description Section">
    <div class="row">
        {{-- Text Section --}}
        <div class="big_title col-sm-12 col-md-6" role="heading" aria-level="1">
            <h2 class="text-uppercase" style="font-weight: 900" title="Top-rated Digital Marketing, Web, And Mobile App Development Company">
                Top-rated Digital Marketing, Web, And Mobile App Development Company
            </h2>
        </div>

        <div class="sub_title col-sm-12 col-md-6" role="contentinfo">
            <p class="text-capitalize text-black-50">
                A leading full-service Web Solutions and Digital Marketing agency, providing a comprehensive range
                of professional services such as Digital transformation, web design, web development, mobile app
                development, search engine optimization (SEO), e-commerce solutions, UI/UX design, pay-per-click
                advertising (PPC), social media marketing, video production, content creation, email marketing, and
                marketing automation.
            </p>
        </div>

        {{-- Count Numbers Section --}}
        <div class="count col-12 d-flex pt-5 pb-5" role="group" aria-label="Statistics">
            <div class="cards-block__item col-sm-3" role="listitem">
                <h3 class="card-block__title fw-bold">950+</h3>
                <div class="card-block__content">successful projects</div>
            </div>
            <div class="cards-block__item col-sm-3" role="listitem">
                <h3 class="card-block__title fw-bold">15+</h3>
                <div class="card-block__content">work in progress</div>
            </div>
            <div class="cards-block__item col-sm-3" role="listitem">
                <h3 class="card-block__title fw-bold">1,800+</h3>
                <div class="card-block__content">employees</div>
            </div>
            <div class="cards-block__item col-sm-3" role="listitem">
                <h3 class="card-block__title fw-bold">500+</h3>
                <div class="card-block__content">Web. Mobile. Graphic.</div>
            </div>
        </div>
    </div>
</section>


    {{-- Services --}}
    <section class="our_services container-fluid container mb--2 pt-5 pb-5" role="region" aria-label="Our Services Section">
        <h2 class="text-capitalize mb-5 mt-5">{{ __('messages.our_services') }}</h2>
        <div class="row">
            <!-- itemCard -->
            @if($service)
            @foreach ($service as $item)
            <article class="services-items col-12 col-sm-12 col-lg-6 col-xl-4 itemService pb-5 pb-md-3" role="article" aria-label="{{ $item->name[app()->getLocale()] }}">
                <div class="itemCard__imageWrap">
                    <img class="itemCard__image lazyloaded" loading="lazy"
                         src="https://b-works.io/wp-content/uploads/2021/03/CMS-Drupal-B-works.jpg"
                         alt="{{ $item->name[app()->getLocale()] }} - {{ __('messages.service_image') }}" title="{{ $item->name[app()->getLocale()] }}">
                </div>
                <div class="itemCard__header">
                    <h3 class="title title--h5 itemCard__title mt-3 mb-3">{{ $item->name[app()->getLocale()] }}</h3>
                    <div class="flex max-w-full flex-col flex-grow">
                        <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal" dir="auto">
                            <div class="flex w-full flex-col gap-1 empty:hidden">
                                <div class="markdown prose w-full break-words dark:prose-invert light">
                                    <p>{{ $item->description[app()->getLocale()] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn-link" href="{{ route('serves.details', ['id' => $item->id]) }}" title="{{ $item->name[app()->getLocale()] }}">
                        {{ $item->name[app()->getLocale()] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>
            @endforeach
            <div class="col-12">
                <a href="{{ route('user-profile') }}" class="request-quote-btn quote" style="max-width: 200px" title="See More Services">
                    <span>See More</span>
                </a>
            </div>
            @endif
        </div>
    </section>



    {{-- Partners --}}
    <section class="partner section py-5" role="region" aria-label="Our Partners Section">
        <div class="container pt-5 pb-5">
            <h2 class="text-capitalize pb-4">{{ __('messages.our_partners') }}</h2>
        </div>
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="partner__slider" role="list" aria-label="List of Partners">
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Odoo">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Odoo Official Logo" title="Odoo Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Google">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Google Official Logo" title="Google Official Logo" loading="lazy">
                        </div>
                        <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Microsoft Official Logo" title="Microsoft Official Logo" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Technologies --}}
    <section class="container m4" role="region" aria-label="Technologies Section">
        <h1 class="text-capitalize pb-4">{{ __('messages.technologies') }}</h1>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Vue.js">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Vue.js.png') }}" loading="lazy" alt="Vue.js official logo" title="Vue.js Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Angular">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/angular.png') }}" loading="lazy" alt="Angular official logo" title="Angular Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="PHP">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/php.png') }}" loading="lazy" alt="PHP official logo" title="PHP Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Python">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/python.png') }}" loading="lazy" alt="Python official logo" title="Python Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Laravel">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Laravel.png') }}" loading="lazy" alt="Laravel official logo" title="Laravel Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Django">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/django.png') }}" loading="lazy" alt="Django official logo" title="Django Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Flutter">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/flutter.png') }}" loading="lazy" alt="Flutter official logo" title="Flutter Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Swift">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/swift-ios.png') }}" loading="lazy" alt="Swift official logo" title="Swift Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Android">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Android.png') }}" loading="lazy" alt="Android official logo" title="Android Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label=".NET">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/.net.png') }}" loading="lazy" alt=".NET official logo" title=".NET Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="SQL Server">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/SQL-Server.png') }}" loading="lazy" alt="SQL Server official logo" title="SQL Server Official Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="MySQL">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/mysql.png') }}" loading="lazy" alt="MySQL official logo" title="MySQL Official Logo">
                </div>
            </div>
        </div>
    </section>


    {{-- why work with webenia --}}
    <section class="work pt-5 pb-5 mt-5 mb-5 bg-light" role="region" aria-label="Why Work with Webenia Section">
        <h2 class="text-capitalize text-center">{{ __('messages.why_webenia') }}</h2>
        <div class="main-work container pt-5 d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="row about-us-section text-white">
                    <!-- Left Column -->
                    <div class="col-md-6 d-flex flex-column align-items-end about-content-hover">
                        <!-- Section 1 -->
                        <article class="col-md-9 col-12 mb-5" role="article" aria-label="Experience Section">
                            <div class="about-content-section rounded-4 p-4 about-content-first secend-color">
                                <img alt="Experience Icon" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon.svg" loading="lazy" title="Experience Icon">
                                <h3 class="text-white text-capitalize">We have a lot of experience</h3>
                                <p>which means you will get the best results</p>
                            </div>
                        </article>
                        <!-- Section 2 -->
                        <article class="col-md-9 col-12" role="article" aria-label="Projects Launched Section">
                            <div class="about-content-section rounded-4 p-4 about-content-third main-color">
                                <div class="d-flex align-items-center">
                                    <h3 class="text-white counter me-2 odometer" data-target="3000">200</h3>
                                    <b>+</b>
                                </div>
                                <h4 class="text-white">Projects Launched</h4>
                                <p>With all these projects, we guarantee excellence</p>
                            </div>
                        </article>
                    </div>
                    <!-- Right Column -->
                    <div class="col-md-6 about-content-hover-end">
                        <!-- Section 3 -->
                        <article class="col-md-9 col-12 mb-5" role="article" aria-label="Leading IT Service Firm Section">
                            <div class="about-content-section rounded-4 p-4 mt-5 about-content-second main-color">
                                <img alt="Leading IT Service Icon" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon-2.png" loading="lazy" title="Leading IT Service Icon">
                                <h3 class="text-white text-capitalize">Leading IT Service Firm</h3>
                                <p>Expertise in serving a wide variety of industries for technological advancement.</p>
                            </div>
                        </article>
                        <!-- Section 4 -->
                        <article class="col-md-9 col-12" role="article" aria-label="Attention to Detail Section">
                            <div class="about-content-section rounded-4 p-4 about-content-fourth secend-color">
                                <h3 class="text-white text-capitalize">We care about the smallest details</h3>
                                <p>We care about everything about your product to make it the best in your field</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Linkedin --}}
    <section class="main-wrapper" role="region" aria-label="LinkedIn Section">
        <div class="section slideStyle">
            <div class="container pt-5">
                <h2 class="text-capitalize pb-4">{{ __('messages.linkedin') }}</h2>
            </div>
            <div class="swiper swiperParallax is-gallery mb-4">
                <div role="list" class="swiper-wrapper is-gallery">
                    <!-- Slide 1 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 6 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 7 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 8 -->
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy" alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>July 8, 2025</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
                                        </a>
                                    </div>
                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share" aria-hidden="true"></i>
                                            <span>Share</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev" aria-label="Previous Slide"></div>
                <div class="swiper-button-next" aria-label="Next Slide"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination pb-4 mt-4" role="navigation" aria-label="Slide Pagination"></div>
        </div>
    </section>
