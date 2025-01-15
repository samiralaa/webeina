<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

@if (app()->getLocale() === 'ar')
<link rel="stylesheet" href="{{ asset('assets/css/bannerAr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endif

<link rel="stylesheet" href="assets\css\index.css">
<main>

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
                                {{ $section->description[app()->getLocale()] ?? 'We are a leading digital agency with a
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
                            {{ $section->title[app()->getLocale()] ?? 'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h2>
                        <div class="paragraph ">
                            <p class="text-white-50">
                                {{ $section->description[app()->getLocale()] ?? 'We are a leading digital agency with a
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
                            {{ $slider->title[app()->getLocale()] ?? 'State-of-the-art digital solutions tailored to
                            your business needs' }}

                        </h2>
                        <div class="paragraph ">
                            <p class="text-white-50">
                                {{ $slider->description[app()->getLocale()] ?? 'We are a leading digital agency with a
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
                                {{ $section->description[app()->getLocale()] ?? 'We help you take your business to the
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




{{-- new sections  --}}
<div class="space" style="height: 500px"></div>




{{-- start article --}}
<article class="caption-single container">
    <div class="row">
                        <div class="col-12 col-lg-9">

                                                    <h2 class="title"><div class="line " style="display: block; text-align: left; width: 100%; opacity: 1;">Digitalagentur in Zürich, Berlin und Bozen mit Fokus auf </div><div class="line " style="display: block; text-align: left; width: 100%; transform: translateY(0%); opacity: 1;">ROI </div></h2><div class="description " style=" opacity: 1;">
                <div><div class="flex-1 overflow-hidden"><div ><div ><div class="flex flex-col text-sm pb-9"><div class="w-full " dir="auto" data-testid="conversation-turn-131"><div class="px-4 py-2 justify-center text-base md:gap-6 m-auto"><div class="flex flex-1 text-base mx-auto gap-3 juice:gap-4 juice:md:gap-6 md:px-5 lg:px-1 xl:px-5 md:max-w-3xl lg:max-w-[40rem] xl:max-w-[48rem]"><div class="relative flex w-full min-w-0 flex-col agent-turn"><div class="flex-col gap-1 md:gap-3"><div class="flex flex-grow flex-col max-w-full"><div class="min-h-[20px] text-message flex flex-col items-start gap-3 whitespace-pre-wrap break-words [.text-message+&amp;]:mt-5 overflow-x-auto" dir="auto" data-message-author-role="assistant" data-message-id="83858ec7-43b5-4c84-838a-290089c3b8f6"><div class="markdown prose w-full break-words dark:prose-invert light"><p>Seit 2016 entwickeln wir als preisgekrönte Digitalagentur in Zürich, Berlin und Bozen mit nutzerzentriertem Design und moderner Softwareentwicklung innovative Lösungen für Unternehmen und Start-ups. Mit einem Team von 50+ schlauen Köpfen und dem Einsatz moderner Web, Software- und KI-Technologien sind wir der Partner, mit dem Sie Ihre digitale Zukunft gestalten - kosteneffizient, ganzheitlich und stets am Puls der Zeit.</p></div></div></div></div></div></div></div></div></div></div></div></div></div>
            </div>
                            </div>
    </div>
</article>
{{-- end article --}}


<div class="descripation container pt-5 pb-5">
<div class="row">

{{-- text section --}}
    <div class="big_title col-sm-12 col-md-6">
        <h1 class="text-uppercase " style="font-weight: 900">
            LeverX Is Your Trusted Partner Within the SAP Ecosystem
        </h1>
    </div>

    <div class="sub_title col-sm-12 col-md-6">
        <p class="text-captilze text-black-50" >
            LeverX is a global system integrator and a top-tier SAP consultancy
            dedicated to delivering professional, customer-centric solutions and
            services. Founded in 2003 on the principles of technological excellence
            and personalized service, LeverX has established itself as a trusted partner
            in the digital transformation journey of Fortune 500 clients worldwide.
        </p>
    </div>

{{-- count numbers section --}}
<div class="couunt col-12 d-flex  pt-5 pb-5">
    <div class="cards-block__item col-sm-3 " >
        <h1 class="card-block__title fw-bold">950+</h1>
        <div class="card-block__content">successful projects</div>
    </div>
    <div class="cards-block__item col-sm-3  " >
        <h1 class="card-block__title fw-bold pb-">15+</h1>
        <div class="card-block__content">offices in 11 countries</div>
    </div>
    <div class="cards-block__item col-sm-3 " >
        <h1 class="card-block__title fw-bold">1,800+</h1>
        <div class="card-block__content">employees</div>
    </div>
    <div class="cards-block__item col-sm-3  " >
        <h1 class="card-block__title fw-bold">500+</h1>
        <div class="card-block__content">SAP-certified experts</div>
    </div>
</div>








 </div>
</div>



</div>

<div class="space" style="height: 500px"></div>
{{-- end new sections   --}}






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
