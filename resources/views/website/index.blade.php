<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
@section('title', 'Home Page')

@section('content')




    <!-- ////////////////////////////////////////////// samir new  -->
    <section class="hero" role="banner">
        <div class="container--0-">
            <video autoplay muted loop class="background-video" aria-label="Background video"
                title="Background video showcasing our services" preload="auto"
                poster="{{ asset('assets/images/video-thumbnail.jpg') }}">
                <source src="{{ asset('assets/Videos/wbsite vid final.mp4') }}" type="video/mp4">
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

    <section class="description container pt-5 pb-5" role="region" aria-label="Description Section">
        <div class="row">
            {{-- Text Section --}}
            <div class="big_title col-sm-12 col-md-6" role="heading" aria-level="1">
                <h2 class="text-uppercase" style="font-weight: 900"
                    title="Top-rated Digital Marketing, Web, And Mobile App Development Company">
                    State-of-the-art digital solutions tailored to your business needs
                </h2>
            </div>

            <div class="sub_title col-sm-12 col-md-6" role="contentinfo">
                <p class="text-capitalize text-black-50">
                A leading digital house, providing a comprehensive range of professional ranging from digital transformation, web design, web development, mobile app development, search engine optimization (SEO), e-commerce solutions, UI/UX design, pay-per-click advertising (PPC), social media marketing, video production, content creation, email marketing, and marketing automation.
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
    <section class="our_services container-fluid container mb--2 pt-5 pb-5" role="region"
        aria-label="Our Services Section">
        <h2 class="text-capitalize mb-5 mt-5">{{ __('messages.our_services') }}</h2>
        <div class="row">
            <!-- itemCard -->
            @if ($service)
                @foreach ($service as $item)
                    <article class="services-items col-12 col-sm-12 col-lg-6 col-xl-4 itemService pb-5 pb-md-3"
                        role="article" aria-label="{{ $item->name[app()->getLocale()] }}">
                        <div class="itemCard__imageWrap">
                            <img class="itemCard__image lazyloaded" loading="lazy"
                                src="https://b-works.io/wp-content/uploads/2021/03/CMS-Drupal-B-works.jpg"
                                alt="{{ $item->name[app()->getLocale()] }} - {{ __('messages.service_image') }}"
                                title="{{ $item->name[app()->getLocale()] }}">
                        </div>
                        <div class="itemCard__header">
                            <h3 class="title title--h5 itemCard__title mt-3 mb-3">{{ $item->name[app()->getLocale()] }}
                            </h3>
                            <div class="flex max-w-full flex-col flex-grow">
                                <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal"
                                    dir="auto">
                                    <div class="flex w-full flex-col gap-1 empty:hidden">
                                        <div class="markdown prose w-full break-words dark:prose-invert light">
                                            <p>{{ $item->description[app()->getLocale()] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-link" href="{{ route('serves.details', ['id' => $item->slug]) }}"
                                title="{{ $item->name[app()->getLocale()] }}">
                                {{ $item->name[app()->getLocale()] }} <i class="fa-solid fa-arrow-right"
                                    aria-hidden="true"></i>
                            </a>
                        </div>

                    </article>
                @endforeach
                <div class="col-12 d-flex justify-content-center pt-3">
                    <a href="{{ route('user-profile') }}" class="request-quote-btn quote" style="max-width: 200px"
                        title="See More Services">
                        <span>See More</span>
                    </a>



                    {{-- <a href="{{ route('user-profile') }}" >All services</a> --}}
            @endif


        </div>

        </div>
    </section>

    @foreach ($sections as $section)
        {{-- hero --}}


        {{-- Description --}}


        {{-- Services --}}


        @if ($section->type == 'sponsor')
            {{-- Partners --}}
            <section class="partner section py-5" role="region" aria-label="Our Partners Section">
                <div class="container pt-5 pb-5">
                    <h2 class="text-capitalize pb-4">{{ __('messages.our_partners') }}</h2>
                </div>


                <div class="container-fluid pb-5">
                    <div class="row justify-content-center">
                        <div class="col-12">



                            <div class="partner__slider" role="list" aria-label="List of Partners">
                                @foreach ($section->images as $image)
                                    <div class="partner__slider-item slick-slide" role="listitem" aria-label="Microsoft">
                                    <img src="{{ asset('public/' . $image->image_path) }}" alt="Microsoft Official Logo">

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if ($section->type == 'protfolioImage')
            {{-- Technologies --}}
            <section class="container m4" role="region" aria-label="Technologies Section">
                <h1 class="text-capitalize pb-4">{{ __('messages.technologies') }}</h1>
                <div class="row g-4">
                    @foreach ($section->images as $image)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="grid-card p-5 bg-white shadow-sm text-center" role="article" aria-label="Vue.js">
                                <img class="img-fluid my-4" src="{{ asset('public/' . $image->image_path) }}" loading="lazy"
                                    alt="Vue.js official logo" title="Vue.js Official Logo">


                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif



        {{-- Linkedin --}}
    @endforeach
    {{-- why work with webenia --}}

    <section class="work pt-5 pb-5 bg-light" role="region" aria-label="Why Work with Webenia Section">
        <h2 class="text-capitalize text-center">{{ __('messages.why_webenia') }}</h2>
        <div class="main-work container pt-5 d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="row about-us-section text-white">
                    <!-- Left Column -->
                    <div class="col-md-6 d-flex flex-column align-items-end about-content-hover">
                        <!-- Section 1 -->
                        <article class="col-md-9 col-12 mb-5" role="article" aria-label="Experience Section">
                            <div class="about-content-section rounded-4 p-4 about-content-first secend-color">
                                <img alt="Experience Icon" class="mb-2 img-fluid"
                                    src="https://www.ipixtechnologies.com/images/web/images/menon.svg" loading="lazy"
                                    title="Experience Icon">
                                <h3 class="text-white text-capitalize">Collaboration</h3>
                                <p> Fostering teamwork and open communication within the organization and with clients</p>
                            </div>
                        </article>
                        <!-- Section 2 -->
                        <article class="col-md-9 col-12" role="article" aria-label="Projects Launched Section">
                            <div class="about-content-section rounded-4 p-4 about-content-third main-color">
                                <div class="d-flex align-items-center">
                                    <h3 class="text-white counter me-2 odometer" data-target="3000"> </h3>
                                    <b> </b>
                                </div>
                                <h4 class="text-white">Excellence</h4>
                                <p> Striving for the highest quality in all aspects of the business
                                </p>
                            </div>
                        </article>
                    </div>
                    <!-- Right Column -->
                    <div class="col-md-6 about-content-hover-end">
                        <!-- Section 3 -->
                        <article class="col-md-9 col-12 mb-5" role="article"
                            aria-label="Leading IT Service Firm Section">
                            <div class="about-content-section rounded-4 p-4 mt-5 about-content-second main-color">
                                <img alt="Leading IT Service Icon" class="mb-2 img-fluid"
                                    src="https://www.ipixtechnologies.com/images/web/images/menon-2.png" loading="lazy"
                                    title="Leading IT Service Icon">
                                <h3 class="text-white text-capitalize">Results-Oriented</h3>
                                <p> Focusing on delivering tangible outcomes and measurable results
                                </p>
                            </div>
                        </article>
                        <!-- Section 4 -->
                        <article class="col-md-9 col-12" role="article" aria-label="Attention to Detail Section">
                            <div class="about-content-section rounded-4 p-4 about-content-fourth secend-color">
                                <h3 class="text-white text-capitalize">Ethical Responsibility</h3>
                                <p>Conducting business with integrity and considering the social and environmental impact</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
                            <div class="main slider mt-2 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <article class="post" role="article" aria-label="LinkedIn Post 1">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img">
                                                <img src="http://127.0.0.1:8000/assets/images/logo.png" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
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
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                loading="lazy" alt="LinkedIn Post Image" title="LinkedIn Post Image">
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
