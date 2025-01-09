<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
    <main>
        <!-- ==== banner start ==== -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner__content">
                            <h1 class="text-uppercase text-start fw-9 mb-0 title-anim">
                                Digital
                                <span class="text-stroke">Excellence</span>
                                <span class="interval">
                                    <i class="icon-arrow-top-right"></i>
                                    <!-- digital agency -->
                                </span>
                            </h1>
                            <div class="banner__content-inner">
                                <p>
                                    Digital Solutions that transform your business From
                                    web content optimization to integrated ERP solutions.
                                    We are your partner to succeed digitally.
                                </p>
                                <div class="cta section__content-cta">
                                    <div class="single">
                                        <h5 class="fw-7">1200+</h5>
                                        <p class="fw-5">years of experience</p>
                                    </div>
                                    <div class="single">
                                        <h5 class="fw-7">25k</h5>
                                        <p class="fw-5">completed projects</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets/images/banner/pic 500 2-04.jpg" alt="Image"
                class="banner-one-thumb d-none d-sm-block g-ban-one" />
            <img src="assets/images/star.png" alt="Image" class="star" />
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

            <div class="lines d-none d-lg-flex">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </section>
    </main>
@endsection
