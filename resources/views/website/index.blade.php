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


                        <h1 class="text-uppercase text-start fw-9 mb-0 title-anim">
                            {{ $section->title[app()->getLocale()] ?? 'Digital Agency in Your City' }}


                            <!-- digital agency -->

                            </span>
                        </h1>

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
                <h1 class="text-white text-center text-uppercase mt-5 " id="about">about us</h1>
                <div class="col-12 col-lg-6">
                    <div class="agency__thumb">

                        @foreach ($section->images as $image)
                        <div class="sponsor__slider-item">
                            <img src="{{ 'public/' . $image->image_path }}" alt="Image" />
                        </div>
                        @endforeach
                        {{-- <img src="" alt="Image" class="thumb-one fade-left" />
                        <img src="assets/images/agency/Untitled-2-removebg-preview.png" alt="Image"
                            class="thumb-two my-2 fade-right" /> --}}
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="agency__content section__content">

                        <h2 class="title title-anim mb-3">
                            {{ $section->title[app()->getLocale()] ??
                            'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h2>
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
                <h1 class="text-white-50 text-center text-uppercase mt-5">Services </h1>
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

                        <h2 class="title title-anim mb-3">
                            {{ $slider->title[app()->getLocale()] ??
                            'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h2>
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
                        <h2 class="title title-anim">
                            {{ $section->title[app()->getLocale()] ?? 'Great Ideas for your business' }}
                        </h2>

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
                            <h2>
                                <a href="{{ 'public/' . $image->image_path }}">
                                    {{ $cta->info_name[app()->getLocale()] }}
                                    <i class="fa-sharp fa-solid fa-arrow-up-right"></i>
                                </a>
                            </h2>
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
                                            <h4 class="text-white-50 pb-0">
                                                {{ $slider->description[app()->getLocale()] }}
                                            </h4>
                                        </div>
                                        <div class="content-cta">
                                            <h3 class="text-uppercase">
                                                {{ $slider->title[app()->getLocale()] }}</h3>
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
            <img class="other-section-image" src="assets/images/testimonial/s-thumb.png" alt="Next Slide Image" />
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
                    <h2 class="h1">
                        <a href="{{ $section->slider_link[app()->getLocale()][$index] ?? '#' }}">
                            {{ $sliderName }}
                            <i class="fa-sharp fa-solid fa-arrow-down-right"></i>
                        </a>
                    </h2>
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
                            <img src="{{ 'public/' . $image->image_path }}" alt="Image" />
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
                <img class="img-fluid" style="border-radius: 8px;" src="{{ asset('public/storage/' . $slider->image) }}"
                    alt="">
            </div>
            <div class="main text"
                style="display: flex; justify-content: space-between; align-items: center;flex-wrap: wrap;; padding: 10px;">
                <h3 class="main-title text-uppercase">{{ $slider->title[app()->getLocale()] }}</h3>
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
                <img class="img-fluid " src="{{ 'public/' . $image->image_path }}" alt="" style="border-radius: 20px;">
                @endforeach
                <div class="text"></div>
                <div class="contnet text-sm-center text-center text-md-start d-block " style="">
                    <h3 class="text-white text-uppercas ">{{ $section->title[app()->getLocale()] }}</h3>
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
        <h3 class="text-white-50 text-uppercase text-center pt-5 pb-5">portfolio</h3>
        <div class="list">
            @foreach ($section->images as $image)
            <div class="item"><a href=""><img src="{{ $image->image_path }}" alt="">
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
                    <h3 class="text-uppercase text-white">{{ $slider->title[app()->getLocale()] }}
                    </h3>
                    <p class="text-white-50">{{ $slider->description[app()->getLocale()] }}</p>
                    <div class="link mt-3"><a href="#" class="text-capitalize">explore more
                            &nbsp;
                            <i class="fa-sharp fa-solid fa-arrow-up"></i></a></div><br>
                    <button class="btn mb-5 mt-5 btn btn--primary">know more</button>
                </div>
                <div class="img col-lg-6 col-md-4 d-flex justify-content-end">
                    <img class="img-fluid" style="border-radius: 8px;"
                        src="{{ asset('public/storage/' . $slider->image) }}" alt="">
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
                        src="{{ asset('public/storage/' . $slider->image) }}" alt="">
                </div>

                <div class="text col-lg-6 col-md-4">
                    <h3 class="text-uppercase text-white">{{ $slider->title[app()->getLocale()] }}
                    </h3>
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
        <h3 class="text-white-50 text-uppercase text-center pt-5 pb-5">portfolio</h3>
        <div class="list">
            @foreach ($section->images as $image)
            <div class="item"><a href=""><img src="{{ 'public/' . $image->image_path }}" alt="">
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
    <div class="container--0-">
        <video autoplay muted loop class="background-video">
            <source src="{{ asset('assets/Videos/B-works-Schweiz-Video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="container-0-1-0">
            <div class="container-1-2-0">
                <div class="text-2-3-0">{{ __('messages.hero_title') }}</div>
                <div class="text-2-3-1">{{ __('messages.hero_subtitle') }}</div>
            </div>
        </div>
    </div>







    <div class="descripation container pt-5 pb-5">
        <div class="row">

            {{-- text section --}}
            <div class="big_title col-sm-12 col-md-6">
                <h1 class="text-uppercase " style="font-weight: 900">
                    Top-rated Digital Marketing, Web, And Mobile App Development Company
                </h1>
            </div>

            <div class="sub_title col-sm-12 col-md-6">
                <p class="text-captilze text-black-50">
                    A leading full-service Web Solutions and Digital Marketing agency, providing a comprehensive range
                    of professional services such as Digital transformation, web design, web development, mobile app
                    development, search engine optimization (SEO), e-commerce solutions, UI/UX design, pay-per-click
                    advertising (PPC), social media marketing, video production, content creation, email marketing, and
                    marketing automation.
                </p>
            </div>

            {{-- count numbers section --}}
            <div class="couunt col-12 d-flex  pt-5 pb-5">
                <div class="cards-block__item col-sm-3 ">
                    <h1 class="card-block__title fw-bold">950+</h1>
                    <div class="card-block__content">successful projects</div>
                </div>
                <div class="cards-block__item col-sm-3  ">
                    <h1 class="card-block__title fw-bold pb-">15+</h1>
                    <div class="card-block__content">work in porject</div>
                </div>
                <div class="cards-block__item col-sm-3 ">
                    <h1 class="card-block__title fw-bold">1,800+</h1>
                    <div class="card-block__content">employees</div>
                </div>
                <div class="cards-block__item col-sm-3  ">
                    <h1 class="card-block__title fw-bold">500+</h1>
                    <div class="card-block__content">Web.
                        Mobile.
                        Graphic.</div>
                </div>
            </div>
        </div>
    </div>



    <div class="our_servsis container-fluid container mb--2 pt-5 pb-5">
        <h1 class="text-capitalize mb-5 mt-5">{{ __('messages.our_services') }}</h1>
        <div class="row">
            <!-- itemCard -->
            @if($service)
            @foreach ($service as $item)


            <div class="servsis-items col-12 col-sm-12 col-lg-6 col-xl-4 itemService pb-5 pb-md-3">
                <div class="itemCard__imageWrap">
                    <img class="itemCard__image  lazyloaded"
                        src="https://b-works.io/wp-content/uploads/2021/03/CMS-Drupal-B-works.jpg"
                        alt="Drupal Entwicklung und Migration">
                </div>
                <div class="itemCard__header">
                    <h3 class="title title--h5 itemCard__title mt-3 mb-3">{{ $item->name[app()->getLocale()] }}
                    </h3>
                    <div class="flex max-w-full flex-col flex-grow">
                        <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal "
                            dir="auto">
                            <div class="flex w-full flex-col gap-1 empty:hidden">
                                <div class="markdown prose w-full break-words dark:prose-invert light">
                                    <p>{{ $item->description[app()->getLocale()] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn-link" href="">{{
                        $item->name[app()->getLocale()] }} <i class=" fa-solid fa-arrow-right"></i></a>
                </div>


            </div>

            @endforeach
            <a href="{{ route('user-profile') }}" class="request-quote-btn quote" style="max-width: 200px">
                <span>See More</span>
            </a>
            @endif

        </div>
    </div>


    {{-- Partners --}}
    <div class="partner section py-5">
        <div class="container pt-5 pb-5">
            <h1 class="text-captlize pb-4">{{ __('messages.our_partners') }}</h1>
        </div>
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="partner__slider">
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/odoo.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/google.png') }}" alt="Image">
                        </div>
                        <div class="partner__slider-item slick-slide">
                            <img src="{{ asset('assets/partner/micro.png') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Technologies --}}
    <div class="container m4">
        <h1 class="text-captlize pb-4">{{ __('messages.technologies') }}</h1>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Vue.js.png') }}" alt="Vue.js Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/angular.png') }}" alt="Angular Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/php.png') }}" alt="PHP Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/python.png') }}" alt="Python Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Laravel.png') }}" alt="Laravel Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/django.png') }}" alt="Django Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/flutter.png') }}" alt="Flutter Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/swift-ios.png') }}" alt="Swift Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/Android.png') }}" alt="Android Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/.net.png') }}" alt=".NET Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/SQL-Server.png') }}" alt="SQL Server Logo">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="grid-card p-5 bg-white shadow-sm text-center">
                    <img class="img-fluid my-4" src="{{ asset('assets/technologies/mysql.png') }}" alt="MySQL Logo">
                </div>
            </div>
        </div>
    </div>

{{-- why work with webenia --}}

<div class="work pt-5 pb-5 mt-5 mb-5 bg-light">
    <h2 class="text-capitalize text-center">{{ __('messages.why_webenia') }}</h2>
    <div class="main-work container pt-5 d-flex justify-content-center">
        <div class="col-lg-12">
            <div class="row about-us-section text-white">
                <!-- Left Column -->
                <div class="col-md-6 d-flex flex-column align-items-end about-content-hover ">
                    <!-- Section 1 -->
                    <div class="col-md-9 col-12 mb-5">
                        <div class="about-content-section rounded-4 p-4 about-content-first secend-color">
                            <img alt="Pic" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon.svg">
                            <h3 class="text-white text-capitalize" >We have a lot of experience</h3>
                            <p>which means you will get the best results</p>
                        </div>
                    </div>
                    <!-- Section 2 -->
                    <div class="col-md-9 col-12">
                        <div class="about-content-section rounded-4 p-4 about-content-third main-color">
                            <div class="d-flex align-items-center">
                                <h2 class="text-white counter me-2 odometer" data-target="3000">200</h2>
                                <b>+</b>
                            </div>
                            <h3 class="text-white">Projects Launched</h3>
                            <p>With all these projects, we guarantee excellence</p>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-md-6 about-content-hover-end">
                    <!-- Section 3 -->
                    <div class="col-md-9 col-12 mb-5">
                        <div class="about-content-section rounded-4 p-4 mt-5 about-content-second  main-color" >
                            <img alt="Pic" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon-2.png">
                            <h3 class="text-white text-capitalize">Leading IT Service Firm</h3>
                            <p>Expertise in serving a wide variety of industries for technological advancement.</p>
                        </div>
                    </div>
                    <!-- Section 4 -->
                    <div class="col-md-9 col-12">
                        <div class="about-content-section rounded-4 p-4 about-content-fourth secend-color " >
                            <h3 class="text-white text-capitalize">We care about the smallest details</h3>
                            <div class="d-flex align-items-center">
                                {{-- <h2 class="text-white counter me-2 odometer" data-target="2007">0</h2> --}}
                            </div>
                            <p>We care about everything about your product to make it the best in your field</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- <div class="work pt-5 pb-5 mt-5 mb-5 " style="background-color: rgb(221, 221, 221)">
    <h2 class="text-captlize text-center">why work with  webenia</h2>
    <div class="main-work container display: flex; justify-content: center; ">

        <div class="col-lg-12 ">
            <div class="row about-us-section text-white">
                <div class="col-sm-12 col-md-6 about-content-hover" style="
    display: flex;
    align-items: flex-end;
    flex-direction: column;
">
                    <!-- Section 1 -->
                    <div class="col-md-7 col-12 ">
                        <div class="about-content-section rounded-4 p-5 about-content-first">
                            <img alt="Pic" class="mb-2" src="https://www.ipixtechnologies.com/images/web/images/menon.svg">
                            <h3 class="text-white">IT ARM of Kreston Menon</h3>
                            <p>The superbrand award winner for 10 consecutive times..!</p>
                        </div>
                    </div>
                    <!-- Section 2 -->
                    <div class="col-md-7 col-12 ">
                        <div class="about-content-section rounded-4 p-5 about-content-third">
                            <div class="d-flex">
                                <h2 class="text-white counter me-2 odometer" data-target="3000">0</h2>
                                <b>+</b>
                            </div>
                            <h3 class="text-white">Projects Launched</h3>
                            <p>Completed the projects successfully with a high level of excellence and dedication.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 about-content-hover-end">
                    <!-- Section 3 -->
                    <div class="col-md-7 col-12">
                        <div class="about-content-section rounded-4 p-5 about-content-second">
                            <img alt="Pic" class="mb-2" src="https://www.ipixtechnologies.com/images/web/images/menon-2.png">
                            <h3 class="text-white">Leading IT Service Firm</h3>
                            <p>Expertise in serving a wide variety of industries for technological advancement.</p>
                        </div>
                    </div>
                    <!-- Section 4 -->
                    <div class="col-md-7 col-12">
                        <div class="about-content-section rounded-4 p-5 about-content-fourth">
                            <h3 class="text-white">Serving Industries Since</h3>
                            <div class="d-flex">
                                <h2 class="text-white counter me-2 odometer" data-target="2007">0</h2>
                            </div>
                            <p>More than a decade of excellence that entitled us as the best IT solutions provider.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div> --}}
{{-- why work with webania --}}

    {{-- Linkedin --}}
    <div class="main-wrapper">
        <div class="section slideStyle">
            <div class="container pt-5">
                <h1 class="text-captlize pb-4">{{ __('messages.linkedin') }}</h1>
            </div>
            <div class="swiper swiperParallax is-gallery mb-4">
                <div role="list" class="swiper-wrapper is-gallery">
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="swiper-slide is-gallery">
                        <div class="gallery-img__wrapper">
                            <div class="main slider  mt-5 gallery-img" data-swiper-parallax-x="0" loading="lazy">
                                <div class="post ">
                                    <div class="head_main">
                                        <div class="head-info">
                                            <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                                            <div class="puplish-info">
                                                <div class="poplish "><span>webania</span></div>
                                                <div class="time"><span>july 8,2025</span></div>
                                            </div>

                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin "></i>
                                        </div>
                                    </div>

                                    <div class="text_content">
                                        <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                                        <a href="#" class="toggle_link">Read more</a>
                                    </div>

                                    <div class="img_content">
                                        <a href="">
                                            <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                        </a></div>

                                    <div class="call_to_action">
                                        <div class="like">
                                            <i class="fa-regular fa-heart"></i>

                                        </div>
                                        <div class="share">
                                            <i class="fa-solid fa-share"></i>
                                            share
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination pb-4 mt-4"></div>
        </div>
    </div>






  {{-- <div class="title container pt-5">
    <h1 class="text-capitalize">our Linkedin</h1>
  </div>
  <div style="display:flex ;" id="carouselExampleControlsNoTouching" class="carousel slide pb-5" data-bs-touch="false" data-bs-interval="false">

    <div class="carousel-inner ">
        <div class="carousel-item   active">
            <div >

              <div class="main slider  mt-5">

                <div class="post sm-carousel-item">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                <div class="post  d-none d-md-block">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                  <div class="post d-none d-lg-block ">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>
                </div>

            </div>
          </div>
          <div class="carousel-item   ">
            <div >

              <div class="main slider  mt-5">

                <div class="post sm-carousel-item">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                <div class="post d-none d-md-block">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                  <div class="post d-none d-lg-block">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>
                </div>

            </div>
          </div>
          <div class="carousel-item   ">
            <div >

              <div class="main slider  mt-5">

                <div class="post sm-carousel-item">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                <div class="post d-none d-md-block">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>

                  <div class="post d-none d-lg-block">
                  <div class="head_main">
                    <div class="head-info">
                      <div class="head_img"> <img src="http://127.0.0.1:8000/assets/images/logo.png" alt=""></div>
                      <div class="puplish-info">
                        <div class="poplish "><span>webania</span></div>
                        <div class="time"><span>july 8,2025</span></div>
                      </div>

                    </div>
                    <div class="icon">
                      <i class="fa-brands fa-linkedin "></i>
                    </div>
                  </div>

                  <div class="text_content">
                    <p    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad</p>
                    <a href="#" class="toggle_link">Read more</a>
                  </div>

                  <div class="img_content">
                  <a href="">
                   <img src="https://images.unsplash.com/photo-1616161560065-4bbfa1103fde?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                  </a></div>

                  <div class="call_to_action">
                    <div class="like">
                      <i class="fa-regular fa-heart"></i>

                    </div>
                    <div class="share">
                      <i class="fa-solid fa-share"></i>
                      share
                    </div>
                  </div>
                </div>
                </div>

            </div>
          </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <i class="fa-solid fa-arrow-left"
        style="
        background-color: black;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
    "></i>

    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <i class="fa-solid fa-arrow-right" style="
        background-color: black;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
    "></i>
    </button>
  </div> --}}


{{-- social madia --}}



{{--
    <div class="news container pt-5 pb-5">
        <h1 class="text-captlize pb-4">Social networking</h1>






        <div class="main">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e1603c5"
                data-id="e1603c5" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-d6388f6 elementor-align-left elementor-widget elementor-widget-artem-about-headings"
                        data-id="d6388f6" data-element_type="widget" data-widget_type="artem-about-headings.default">
                        <div class="elementor-widget-container">

                            <!-- Heading -->
                            <article class="caption-single container">
                                <div class="row">
                                    <div class="col-12 col-lg-9">
                                        <h2 class="title title--h4 js-lines">

                                    </div>
                            </article>

                        </div>
                    </div>
                    <div class="elementor-element elementor-element-90a4f54 elementor-widget elementor-widget-spacer"
                        data-id="90a4f54" data-element_type="widget" data-widget_type="spacer.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-spacer">
                                <div class="elementor-spacer-inner"></div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-f90ca77 elementor-widget elementor-widget-html"
                        data-id="f90ca77" data-element_type="widget" data-widget_type="html.default">
                        <div class="elementor-widget-container">
                            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core=""
                                defer=""></script>
                            <div class="elfsight-app-0dbed9cd-815d-40bc-9fdf-6f5bdf29469d" data-elfsight-app-lazy="">
                                <div id="eapps-linkedin-feed-0dbed9cd-815d-40bc-9fdf-6f5bdf29469d"
                                    class="RootLayout__RootComponent-sc-1doisyz-0 cvBsnK eapps-linkedin-feed-0dbed9cd-815d-40bc-9fdf-6f5bdf29469d-custom-css-hook"
                                    data-app="eapps-linkedin-feed" data-app-version="2.26.57">
                                    <div class="Main__Inner-sc-129s5zi-0 eFUpYn" style="max-width: 1280px;">
                                        <div class="WidgetBackground__Container-sc-1ho7q3r-0 iBiJkF WidgetBackground__StyledWidgetBackground-sc-lpqk8h-0"
                                            style="border-radius: 0px; padding: 0px;">
                                            <div class="Background__Container-sc-4lq1r6-0 sJhos">
                                                <div class="Background__Base-sc-4lq1r6-1 cGzsWo"
                                                    style="border-radius: 0px; display: block; background-color: transparent;">
                                                </div>
                                                <div class="Background__Overlay-sc-4lq1r6-2 djWGwD"
                                                    style="display: block; background-color: rgba(255, 255, 255, 0);">
                                                </div>
                                            </div>
                                            <div class="WidgetBackground__ContentContainer-sc-1ho7q3r-1 jUKeJm">
                                                <div class="WidgetBackground__Content-sc-1ho7q3r-2 ciCnpO">
                                                    <div class="Layout__LayoutContainer-sc-kw8iuy-0 febHFm">
                                                        <div class="CarouselLayout__CarouselContainer-sc-1cwaio7-1 dQSAoS es-carousel-layout-container"
                                                            style="">
                                                            <div
                                                                class="CarouselLayout__CarouselWrapper-sc-1cwaio7-0 iNHUFv es-carousel-layout-wrapper">
                                                                <div class="Carousel__CarouselContainer-sc-f2ox7y-0 jzjenX es-carousel-layout"
                                                                    style="gap: 20px;">
                                                                    <div
                                                                        class="Carousel__CarouselOuter-sc-f2ox7y-1 bhIphO">
                                                                        <div aria-label="Previous" aria-hidden="true"
                                                                            role="button"
                                                                            class="Carousel__CarouselArrowControlContainer-sc-f2ox7y-8 iqPsnt"
                                                                            style="width: 32px; height: 32px; flex-basis: 32px; margin-left: 8px;">
                                                                        </div>
                                                                        <div aria-label="Carousel"
                                                                            class="Carousel__CarouselInner-sc-f2ox7y-2 bMMjYH">
                                                                            <div
                                                                                class="Carousel__CarouselSwiperWrapper-sc-f2ox7y-10 bTZisO">
                                                                                <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-autoheight swiper-watch-progress swiper-backface-hidden"
                                                                                    dir="ltr">
                                                                                    <div class="swiper-wrapper"
                                                                                        style="height: 384px; transform: translate3d(0px, 0px, 0px);">
                                                                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active"
                                                                                            style="width: 240px; margin-right: 20px;">
                                                                                            <div
                                                                                                class="CarouselItem__CarouselItemContainer-sc-jpfz5q-0 VXphV es-carousel-layout-item">
                                                                                                <div>
                                                                                                    <div
                                                                                                        class="Container-sc-119keog-1 CardContainer-sc-1afuoaq-0 hKptij">
                                                                                                        <div
                                                                                                            class="Block-sc-3maawy-0 Block__RegularBlock-sc-3maawy-1 dCXpzK CardUserBlock__UserBlock-sc-pc45he-2 kmiPHJ">
                                                                                                            <div
                                                                                                                class="CardUserBlock__UserContainer-sc-pc45he-0 ifwhbv">
                                                                                                                <div
                                                                                                                    class="User__Container-sc-1ca5sko-6 cyVpEs CardUserBlock__StyledUser-sc-pc45he-3 jyrriv">
                                                                                                                    <a class="Link__A-sc-dy0nar-0 bvdXPA User__AvatarLink-sc-1ca5sko-5 hxFaXM"
                                                                                                                        href="https://www.linkedin.com/company/b-works/posts"
                                                                                                                        target="_blank"
                                                                                                                        rel="noopener noreferrer nofollow">
                                                                                                                        <div
                                                                                                                            class="Avatar__Container-sc-9uf7h8-0 fSqTlR User__StyledAvatar-sc-1ca5sko-0 liNVMM">
                                                                                                                            <div
                                                                                                                                class="Avatar__Background-sc-9uf7h8-1 gJOYgw">
                                                                                                                                <img src="https://phosphor.utils.elfsightcdn.com/?url=https%3A%2F%2Fmedia.licdn.com%2Fdms%2Fimage%2Fv2%2FC4D0BAQFRpyJFdXJBYQ%2Fcompany-logo_400_400%2Fcompany-logo_400_400%2F0%2F1631311809515%3Fe%3D1744848000%26v%3Dbeta%26t%3DvluYllFjYa8idRy6Pw8FF3Ch_p_VeaSRm986pz2asfM"
                                                                                                                                    alt="B-works avatar image"
                                                                                                                                    class="Avatar__StyledAvatar-sc-9uf7h8-2 UobXQ">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </a>
                                                                                                                    <div class="User__Info-sc-1ca5sko-1 cfzYhB"
                                                                                                                        style="max-width: calc(100% - 40px);">
                                                                                                                        <a class="Link__A-sc-dy0nar-0 bvdXPA User__NameLink-sc-1ca5sko-3 cEobiQ"
                                                                                                                            href="https://www.linkedin.com/company/b-works/posts"
                                                                                                                            target="_blank"
                                                                                                                            rel="noopener noreferrer nofollow">
                                                                                                                            <div
                                                                                                                                class="User__NameAndBadge-sc-1ca5sko-4 kEhogP">
                                                                                                                                <div
                                                                                                                                    class="Ellipsis__Wrapper-sc-1b8wrxx-0 fsSdUl User__Name-sc-1ca5sko-2 fytFEp">
                                                                                                                                    B-works
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                        <div
                                                                                                                            class="Ellipsis__Wrapper-sc-1b8wrxx-0 fsSdUl User__Caption-sc-1ca5sko-8 hSjWbi">
                                                                                                                            <span>
                                                                                                                                <div datetime="October 15, 2024 at 1:13 AM GMT-12"
                                                                                                                                    class="DateTime__Time-sc-13gi7wj-0 dXelQe">
                                                                                                                                    October&nbsp;15,&nbsp;2024
                                                                                                                                </div>
                                                                                                                            </span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="CardUserBlock__SourceContainer-sc-pc45he-1 jPsRFu">
                                                                                                                    <a aria-label="Posted on LinkedIn"
                                                                                                                        class="Link__A-sc-dy0nar-0 bvdXPA SourceLink__StyledLink-sc-1dqbr9-0 izEtCC"
                                                                                                                        href="https://www.linkedin.com/posts/b-works_drupal7upgrade-businessgrowth-marketinginnovation-activity-7251935775334817794-1UX_"
                                                                                                                        target="_blank"
                                                                                                                        rel="noopener noreferrer nofollow">
                                                                                                                        <div alt="LinkedIn"
                                                                                                                            class="Icon__IconContainer-sc-11wrh3u-0 lngOUN ShadowIcon-sc-i73tf8-0 hPRlMn">
                                                                                                                            <div>
                                                                                                                                <div>
                                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                        fill="none"
                                                                                                                                        viewBox="0 0 24 24"
                                                                                                                                        class="injected-svg"
                                                                                                                                        data-src="https://static.elfsight.com/icons/app-social-feed-sources-linkedin-multicolor.svg"
                                                                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                                                                        <path
                                                                                                                                            fill="#fff"
                                                                                                                                            d="M4.327 3h15.338l.001.002A1.32 1.32 0 0 1 21 4.298V19.7a1.323 1.323 0 0 1-1.334 1.3H4.327A1.32 1.32 0 0 1 3 19.701V4.299A1.32 1.32 0 0 1 4.327 3Z">
                                                                                                                                        </path>
                                                                                                                                        <path
                                                                                                                                            fill="#0A66C2"
                                                                                                                                            d="M19.042 19.042h-2.964V14.4c0-1.107-.02-2.532-1.541-2.532-1.544 0-1.78 1.207-1.78 2.45v4.724H9.793V9.497h2.845v1.305h.04a3.125 3.125 0 0 1 2.807-1.542c3.003 0 3.558 1.975 3.558 4.547l-.001 5.233v.002ZM6.45 8.192a1.728 1.728 0 0 1-1.72-1.719c0-.943.777-1.72 1.72-1.72a1.73 1.73 0 0 1 1.72 1.72c0 .944-.777 1.719-1.72 1.719Zm1.482 10.85H4.965V9.497h2.967v9.545ZM20.517 2H3.475A1.467 1.467 0 0 0 2 3.443v17.114A1.467 1.467 0 0 0 3.475 22h17.043A1.47 1.47 0 0 0 22 20.557V3.442a1.467 1.467 0 0 0-1.482-1.44L20.517 2Z">
                                                                                                                                        </path>
                                                                                                                                    </svg>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="Block-sc-3maawy-0 Block__RegularBlock-sc-3maawy-1 cIjtbQ">
                                                                                                            <div
                                                                                                                class="Text__Container-sc-1748e54-0 gXWJse">
                                                                                                                <div
                                                                                                                    class="SimpleShortener__Outer-sc-19xjxqz-0 ggMmfr">
                                                                                                                    <div
                                                                                                                        class="SimpleShortener__Inner-sc-19xjxqz-1 biILtm">
                                                                                                                        <div>
                                                                                                                            ☀
                                                                                                                            Drupal
                                                                                                                            7's
                                                                                                                            Swan
                                                                                                                            Song:
                                                                                                                            Is
                                                                                                                            your
                                                                                                                            company's
                                                                                                                            website
                                                                                                                            ready
                                                                                                                            for
                                                                                                                            a
                                                                                                                            2025
                                                                                                                            upgrade?
                                                                                                                            <br><br>Marketing
                                                                                                                            Managers
                                                                                                                            and
                                                                                                                            CEOs,
                                                                                                                            this
                                                                                                                            is
                                                                                                                            for
                                                                                                                            you!
                                                                                                                            If
                                                                                                                            your
                                                                                                                            company's
                                                                                                                            website
                                                                                                                            is
                                                                                                                            still
                                                                                                                            on
                                                                                                                            Drupal
                                                                                                                            7,
                                                                                                                            2025
                                                                                                                            is
                                                                                                                            your
                                                                                                                            deadline
                                                                                                                            for
                                                                                                                            action.
                                                                                                                            But
                                                                                                                            why
                                                                                                                            wait?
                                                                                                                            Here's
                                                                                                                            why
                                                                                                                            now
                                                                                                                            is
                                                                                                                            the
                                                                                                                            perfect
                                                                                                                            time
                                                                                                                            for
                                                                                                                            a
                                                                                                                            total
                                                                                                                            website
                                                                                                                            relaunch:<br><br>🔥
                                                                                                                            For
                                                                                                                            Drupal
                                                                                                                            7
                                                                                                                            CMS
                                                                                                                            Users:
                                                                                                                            <br>➡
                                                                                                                            Safety
                                                                                                                            First:
                                                                                                                            Post-January
                                                                                                                            2025,
                                                                                                                            your
                                                                                                                            site's
                                                                                                                            security
                                                                                                                            could
                                                                                                                            be
                                                                                                                            as
                                                                                                                            outdated
                                                                                                                            as
                                                                                                                            last
                                                                                                                            season's
                                                                                                                            marketing
                                                                                                                            strategy.
                                                                                                                            Time
                                                                                                                            to
                                                                                                                            upgrade!<br>➡
                                                                                                                            Boost
                                                                                                                            Performance:
                                                                                                                            Imagine
                                                                                                                            your
                                                                                                                            website
                                                                                                                            loading
                                                                                                                            at
                                                                                                                            the
                                                                                                                            speed
                                                                                                                            of
                                                                                                                            your
                                                                                                                            next
                                                                                                                            big
                                                                                                                            idea.
                                                                                                                            New
                                                                                                                            platforms
                                                                                                                            offer
                                                                                                                            just
                                                                                                                            that.<br>➡
                                                                                                                            Fresh
                                                                                                                            Features:
                                                                                                                            From
                                                                                                                            enhanced
                                                                                                                            SEO
                                                                                                                            tools
                                                                                                                            to
                                                                                                                            seamless
                                                                                                                            social
                                                                                                                            integration,
                                                                                                                            modern
                                                                                                                            CMS
                                                                                                                            platforms
                                                                                                                            are
                                                                                                                            like
                                                                                                                            the
                                                                                                                            Swiss
                                                                                                                            Army
                                                                                                                            knife
                                                                                                                            for
                                                                                                                            digital
                                                                                                                            marketers.<br><br>🚀
                                                                                                                            For
                                                                                                                            Every
                                                                                                                            Corporate
                                                                                                                            Leader:
                                                                                                                            <br>➡
                                                                                                                            Brand
                                                                                                                            Evolution:
                                                                                                                            Your
                                                                                                                            brand
                                                                                                                            has
                                                                                                                            grown;
                                                                                                                            shouldn't
                                                                                                                            your
                                                                                                                            website
                                                                                                                            reflect
                                                                                                                            that?
                                                                                                                            A
                                                                                                                            redesign
                                                                                                                            can
                                                                                                                            make
                                                                                                                            your
                                                                                                                            digital
                                                                                                                            presence
                                                                                                                            as
                                                                                                                            dynamic
                                                                                                                            as
                                                                                                                            your
                                                                                                                            business.<br>➡
                                                                                                                            Tech
                                                                                                                            Leap:
                                                                                                                            Leapfrog
                                                                                                                            into
                                                                                                                            cutting-edge
                                                                                                                            technology.
                                                                                                                            A
                                                                                                                            new
                                                                                                                            site
                                                                                                                            isn't
                                                                                                                            just
                                                                                                                            a
                                                                                                                            change;
                                                                                                                            it's
                                                                                                                            an
                                                                                                                            upgrade
                                                                                                                            to
                                                                                                                            your
                                                                                                                            business
                                                                                                                            toolkit.<br>➡
                                                                                                                            Engagement:
                                                                                                                            Modern
                                                                                                                            design
                                                                                                                            leads
                                                                                                                            to
                                                                                                                            better
                                                                                                                            user
                                                                                                                            engagement,
                                                                                                                            which
                                                                                                                            could
                                                                                                                            mean
                                                                                                                            more
                                                                                                                            leads,
                                                                                                                            more
                                                                                                                            sales,
                                                                                                                            and
                                                                                                                            more
                                                                                                                            growth.<br><br>Why
                                                                                                                            Choose
                                                                                                                            B-Works
                                                                                                                            for
                                                                                                                            Your
                                                                                                                            Digital
                                                                                                                            Leap?<br>🎯
                                                                                                                            Bespoke
                                                                                                                            Strategies:
                                                                                                                            Whether
                                                                                                                            you're
                                                                                                                            transitioning
                                                                                                                            from
                                                                                                                            Drupal
                                                                                                                            7
                                                                                                                            or
                                                                                                                            seeking
                                                                                                                            a
                                                                                                                            complete
                                                                                                                            overhaul,
                                                                                                                            we
                                                                                                                            craft
                                                                                                                            solutions
                                                                                                                            that
                                                                                                                            align
                                                                                                                            with
                                                                                                                            your
                                                                                                                            business
                                                                                                                            goals.<br>🔎
                                                                                                                            Market
                                                                                                                            Insight:
                                                                                                                            We
                                                                                                                            understand
                                                                                                                            what
                                                                                                                            drives
                                                                                                                            your
                                                                                                                            audience.
                                                                                                                            Let
                                                                                                                            us
                                                                                                                            harness
                                                                                                                            that
                                                                                                                            for
                                                                                                                            your
                                                                                                                            online
                                                                                                                            strategy.<br>🤩
                                                                                                                            Long-term
                                                                                                                            Vision:
                                                                                                                            We're
                                                                                                                            not
                                                                                                                            just
                                                                                                                            building
                                                                                                                            for
                                                                                                                            now;
                                                                                                                            we're
                                                                                                                            crafting
                                                                                                                            your
                                                                                                                            digital
                                                                                                                            future,
                                                                                                                            ensuring
                                                                                                                            your
                                                                                                                            website
                                                                                                                            is
                                                                                                                            ready
                                                                                                                            for
                                                                                                                            whatever
                                                                                                                            comes
                                                                                                                            next.<br><br>Take
                                                                                                                            Action
                                                                                                                            Before
                                                                                                                            the
                                                                                                                            New
                                                                                                                            Year's
                                                                                                                            Resolutions
                                                                                                                            Kick
                                                                                                                            In!<br>Don't
                                                                                                                            let
                                                                                                                            your
                                                                                                                            website
                                                                                                                            be
                                                                                                                            an
                                                                                                                            afterthought
                                                                                                                            in
                                                                                                                            your
                                                                                                                            business
                                                                                                                            strategy.
                                                                                                                            Contact
                                                                                                                            B-works
                                                                                                                            to
                                                                                                                            start
                                                                                                                            crafting
                                                                                                                            a
                                                                                                                            website
                                                                                                                            that's
                                                                                                                            not
                                                                                                                            just
                                                                                                                            current
                                                                                                                            but
                                                                                                                            cutting-edge.
                                                                                                                            <br><br>Let's
                                                                                                                            make
                                                                                                                            2025
                                                                                                                            the
                                                                                                                            year
                                                                                                                            your
                                                                                                                            website
                                                                                                                            becomes
                                                                                                                            your
                                                                                                                            strongest
                                                                                                                            marketing
                                                                                                                            tool
                                                                                                                            yet.
                                                                                                                            <br><br><a
                                                                                                                                href="https://www.linkedin.com/feed/hashtag/drupal7upgrade/"
                                                                                                                                target="_blank"
                                                                                                                                rel="noreferrer noopener nofollow">#Drupal7Upgrade</a>
                                                                                                                            <a href="https://www.linkedin.com/feed/hashtag/businessgrowth/"
                                                                                                                                target="_blank"
                                                                                                                                rel="noreferrer noopener nofollow">#BusinessGrowth</a>
                                                                                                                            <a href="https://www.linkedin.com/feed/hashtag/marketinginnovation/"
                                                                                                                                target="_blank"
                                                                                                                                rel="noreferrer noopener nofollow">#MarketingInnovation</a>
                                                                                                                            <a href="https://www.linkedin.com/feed/hashtag/drupal/"
                                                                                                                                target="_blank"
                                                                                                                                rel="noreferrer noopener nofollow">#Drupal</a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="Text__Control-sc-1748e54-2 dldPzO">
                                                                                                                    Read
                                                                                                                    more
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="Block-sc-3maawy-0 Block__OuterBlock-sc-3maawy-2 CardMediaBlock__MediaBlock-sc-1pdg002-0 cIjtbQ cqcdwQ">
                                                                                                            <div class="MediaContainer__Container-sc-1rcutn9-0 UhGqF MediaImage-sc-wmeaun-0 ggCXSi"
                                                                                                                style="padding-top: 198px; height: 0px;">
                                                                                                                <div
                                                                                                                    class="MediaContainer__Inner-sc-1rcutn9-2 fwddqm">
                                                                                                                    <div
                                                                                                                        class="MediaImage__Container-sc-1ghst31-0 cNpaPk">
                                                                                                                        <img src="https://phosphor.utils.elfsightcdn.com/?url=https%3A%2F%2Fmedia.licdn.com%2Fdms%2Fimage%2Fv2%2FD4D22AQHQu4FxOM0l_g%2Ffeedshare-shrink_2048_1536%2Ffeedshare-shrink_2048_1536%2F0%2F1728996221631%3Fe%3D1740009600%26v%3Dbeta%26t%3DIUh4EedCnqEo-UvzL9eSMy7s36l9xET72ASYQViSrSQ"
                                                                                                                            alt="☀ Drupal 7's Swan Song: Is your company's website ready for a 2025 upgrade? Marketing Managers an...">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="Layer-sc-15p239i-0 jqrbDx">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="Block-sc-3maawy-0 Block__RegularBlock-sc-3maawy-1 fQUaNu CardActionsBlock__CardLayoutBlock-sc-qzuptx-1 kDEeCy">
                                                                                                            <div
                                                                                                                class="Counters__Container-sc-15p075q-3 fWvuPt">
                                                                                                                <a aria-label="Like"
                                                                                                                    class="Link__A-sc-dy0nar-0 hVLWfU Counters__Counter-sc-15p075q-2 lhPJWq"
                                                                                                                    href="https://www.linkedin.com/posts/b-works_drupal7upgrade-businessgrowth-marketinginnovation-activity-7251935775334817794-1UX_"
                                                                                                                    target="_blank"
                                                                                                                    rel="noopener noreferrer nofollow">
                                                                                                                    <div
                                                                                                                        class="Icon__IconContainer-sc-11wrh3u-0 cjNBgd Counters__CounterIcon-sc-15p075q-0 dgPsDD">
                                                                                                                        <div>
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 16 16">
                                                                                                                                <path
                                                                                                                                    fill-rule="evenodd"
                                                                                                                                    d="M11.36 1.407A4.267 4.267 0 0 0 8.583 2.65l-.282.282-.283-.282a4.268 4.268 0 0 0-6.035 6.035l5.894 5.894a.6.6 0 0 0 .848 0l5.893-5.894A4.267 4.267 0 0 0 11.601 1.4l-.242.007ZM11.6 2.6a3.067 3.067 0 0 1 3.069 3.068l-.007.202a3.067 3.067 0 0 1-.892 1.967l-5.469 5.469-5.47-5.469A3.068 3.068 0 0 1 7.17 3.499l.707.706a.6.6 0 0 0 .848 0l.707-.706A3.067 3.067 0 0 1 11.6 2.6Z">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <span>
                                                                                                                        <div
                                                                                                                            class="Counters__Title-sc-15p075q-1 glEwdi">
                                                                                                                            0
                                                                                                                        </div>
                                                                                                                    </span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                            <div><button
                                                                                                                    aria-label="Share"
                                                                                                                    tabindex="0"
                                                                                                                    class="ShareButton__Button-sc-192me2e-0 fUkyoJ">
                                                                                                                    <div
                                                                                                                        class="Icon__IconContainer-sc-11wrh3u-0 cjNBgd">
                                                                                                                        <div>
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 16 16">
                                                                                                                                <path
                                                                                                                                    fill-rule="evenodd"
                                                                                                                                    d="M9.483 1.589a.933.933 0 0 0-.208.587v1.71l-.269.014C3.713 4.224.566 7.57.566 14c0 .678.923.818 1.154.234l.031-.098c.018-.075.08-.246.21-.48a4.391 4.391 0 0 1 1.036-1.228l.171-.138c1.285-1 3.22-1.638 5.944-1.738l.163-.005v2.071a.6.6 0 0 0 .397.565l.091.025c.089.017.306.088.4.094l.045.002c.185 0 .36-.074.49-.206l5.237-5.345a.6.6 0 0 0 .009-.83l-5.055-5.386a.933.933 0 0 0-1.32-.042l-.086.094Zm.992 1.261 4.199 4.474-4.199 4.286V9.939a.6.6 0 0 0-.6-.6c-3.53 0-6.027.805-7.65 2.171l-.196.17-.115.107.03-.202c.71-4.435 3.505-6.511 7.931-6.511a.6.6 0 0 0 .6-.6V2.85Z">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        Share
                                                                                                                    </div>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div></div></div></div> --}}



                                                                                        {{-- end new sections --}}
                                                                                        <script>
                                                                                            var locale = "{{ app()->getLocale() }}"; // Get the locale from PHP

            // Function to apply styles to the iconplay class
            function applyIconplayStyles() {
                var iconplay = document.querySelector('.iconplay'); // Select the iconplay element

                if (iconplay) {
                    iconplay.style.position = 'absolute';
                    iconplay.style.top = '50%';
                    iconplay.style.left = '45px';
                    iconplay.style.transform = 'translate(-50%, -50%)';
                    iconplay.style.color = 'white';
                    iconplay.style.display = 'flex';
                    iconplay.style.fontSize = '30px';
                    iconplay.style.justifyContent = 'center';
                }
            }

            // If locale is 'ar' (Arabic), apply the styles to the iconplay element
            if (locale === 'ar') {
                applyIconplayStyles();
            }
                                                                                        </script>



                                                                                        <script>
                                                                                            // Function to check screen width and apply animation
            function checkScreenWidth() {
                var egencySection = document.getElementById('agency');

                // If screen width is 320px or less
                if (window.innerWidth <= 620) {
                    // Add the animation class
                    egencySection.classList.add('moveegen');
                } else {
                    // Remove the animation class if the screen is larger than 320px
                    egencySection.classList.remove('moveegen');
                }
            }

            // Call checkScreenWidth on load and on window resize
            window.addEventListener('load', checkScreenWidth);
            window.addEventListener('resize', checkScreenWidth); // Update on resize
                                                                                        </script>




                                                                                        <script>
                                                                                            currentLocale = @json(app()->getLocale());

            if (currentLocale === 'ar') {
                document.getElementById("about").innerText = " عن الشركة "; // Arabic text
            } else if (currentLocale === 'en') {
                document.getElementById("about").innerText = "about us"; // English text
            }
                                                                                        </script>







</main>

@endsection
