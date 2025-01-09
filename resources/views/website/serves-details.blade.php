@extends('website.layouts.main')

@section('title', 'Home Page')
<link rel="stylesheet" href="{{ asset('assets/css/serves-details.css') }}">
@section('content')
<!-- ==== / header end ==== -->
<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- ==== main start ==== -->
        <main>
            <!-- ==== banner start ==== -->
            <section class="cmn-banner service-single-banner bg-img"
                data-background="assets/images/banner/cmn-banner-bg.png">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-5 col-xl-7">
                            <div class="text-center text-lg-start">
                                <h2 class="title title-anim"> {{ $service->name[app()->getLocale()] }}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">
                                                <i class="fa-solid fa-house"></i>
                                                Home
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="our-services.html"> Our Services </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ $service->name[app()->getLocale()] }}
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <p> {{ $service->description[app()->getLocale()] }}</p>
                        <div class="col-12 col-lg-7 col-xl-5">
                            <div class="slide-group justify-content-center justify-content-lg-end">
                                <a href="Digital-Marketing.html" aria-label="previous item" class="slide-btn">
                                    <i class="fa-light fa-angle-left"></i>
                                </a>
                                <a href="IT-Consulting.html" aria-label="next item" class="slide-btn">
                                    <i class="fa-light fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if ($service && $service->contents->count() > 0)


            <!-- ==== / banner end ==== -->
            <!-- ==== service details start ==== -->
            @foreach ($service->contents as $content)
            @if ($content->type == 'Banner')
            <section class="section service-details fade-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10">
                            <div class="service-details__slider">
                                <div class="service-details__slider-single">
                                    <div class="poster fade-top">
                                        <img class="radius" src="{{ asset('storage/' . $content->image) }}"
                                            alt="Image" />
                                    </div>
                                    <div class="details-group section__cta text-start">
                                        <!-- <h3 class="title-anim">Why do we use it?</h3> -->
                                        <p>
                                            {{ $content->description[app()->getLocale()] }}
                                        </p>

                                    </div>
                                    {{-- done in sebreded section --}}
                                    @if ($content->type == 'Overview')
                                    <div class="section__content-cta">
                                        <div class="row gaper">
                                            <div class="col-12 col-lg-7">
                                                <div class="details-group">
                                                    <h3 class="title-anim">
                                                        {{ $content->title[app()->getLocale()] }}</h3>
                                                    <p>
                                                        {{ $content->description[app()->getLocale()] }}
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <div class="poster-small">
                                                    <img class="radius" src="{{ asset('storage/' . $content->image) }}"
                                                        alt="Image" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="overview">
                                        @if ($content->type == 'Overview')
                                        <div class="section__content-cta">
                                            <div class="row gaper">
                                                <div class="col-12 col-lg-7">
                                                    <div class="details-group">
                                                        <h3 class="title-anim">
                                                            {{ $content->title[app()->getLocale()] }}
                                                        </h3>
                                                        <p>
                                                            {{ $content->description[app()->getLocale()] }}
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5">
                                                    <div class="poster-small">
                                                        <img class="radius"
                                                            src="{{ asset('storage/' . $content->image) }}"
                                                            alt="Image" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- ==== / service details end ==== -->
            <!-- ==== ux process start ==== -->
            @if ($content->type == 'Process')
            <section class="section ux-process bg-tertiary fade-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="section__header text-center">
                                <span class="sub-title">
                                    {{ $content->title[app()->getLocale()] }}
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                                <h2 class="title title-anim">{{ $content->sub_title[app()->getLocale()] }}
                                </h2>
                                <p>
                                    {{ $content->description[app()->getLocale()] }}
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </section>
            @endif


            @if ($content->type == 'answer_question')
            <section class="section ux-process bg-tertiary fade-wrapper">
                <div class="container">
                    <div class="row">
                        @foreach (json_decode($content->questions, true) as $question)
                        <div class="col-12">
                            <div class="service-f-wrapper">
                                <div class="service-f-single fade-top">
                                    <div class="single-item">
                                        <div class="intro-btn">
                                            <!-- Access question based on the current locale -->
                                            <h4>{{ $question['question'][app()->getLocale()] }}</h4>
                                        </div>
                                    </div>
                                    <div class="single-item p-single p-sm body-cn">
                                        <!-- Access answer based on the current locale -->
                                        <p>
                                            {{ $question['answer'][app()->getLocale()] }}
                                        </p>
                                    </div>
                                    <button class="toggle-service-f"></button>
                                </div>
                            </div>
                        </div>

                        <!-- Add the color style dynamically inside the loop -->
                        <style>
                            .ux-process .intro-btn h4::before {
                                content: "";
                                position: absolute;
                                top: 50%;
                                transform: translateY(-50%);
                                left: 0px;
                                width: 15px;
                                height: 15px;

                                background-color: {
                                        {
                                        $question['color']
                                    }
                                }

                                ;
                            }
                        </style>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif



            <!-- ==== / ux process end ==== -->
            <!-- ==== cta start ==== -->
            @if ($content->type == 'cta')
            <section class="cta-two section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xxl-11">
                            <div class="cta-two-wrapper bg-img" data-background="assets/images/cta-two-bg.png">
                                <div class="row gaper align-items-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="cta-two__content">
                                            <!-- <span>Hello !</span> -->
                                            <h2 class="title-anim">
                                                {{ $content->title[app()->getLocale()] }}
                                            </h2>
                                            <h5>
                                                <a href="tel:19-3265-003-420">{{
                                                    $content->description[app()->getLocale()] }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="text-start text-lg-end">
                                            <a href="{{ $content->link }}" class="btn btn--tertiary">
                                                {{ $content->sub_title[app()->getLocale()] }}
                                                <i class="fa-sharp fa-solid fa-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            @endforeach
            @endif
            <!-- ==== / cta end ==== -->

            {{-- start section one --}}


            {{-- end section one --}}




        </main>
        <!-- ==== / main end ==== -->
        <!-- ==== footer start ==== -->
    </div>
</div>
@endsection
