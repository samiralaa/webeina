<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
    <main>

        <section class="cmn-banner bg-img">
            <div class="container">
                <div class="row gaper align-items-center">
                    <div class="col-12 col-lg-5 col-xl-7">
                        <div class="text-center text-lg-start">
                            <h2 class="title title-anim">About Us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        About Us
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-5">
                        <div class="text-center text-lg-start">
                            <p class="primary-text">
                                We are firm believers in technology , we understand its transformative power, its disruptive
                                magnitude and how it can be a force for positive change , the possibilities are endless.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="video-modal">

            <div class="section__header text-center modal-bg pt-5  img-s">
                <div class="container">
                    <h3 class="title title-anim text-center pt-5 mt-5">
                        Digital Transformation is part and parcel of everything we do.

                    </h3>
                    <h3 class="title title-anim text-center pt-4 ">
                        We believe digital technologies have bridged the gap between imagination and reality.
                    </h3>
                    <h3 class="title title-anim text-center pt-4 ">

                        The possibilities are endless.
                    </h3>
                </div>
            </div>

        </div>

        <section class="section agency">
            <div class="container">
                <div class="row gaper align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="agency__thumb">

                            <img src="assets/images/agency/450 - 584  UAE.png" alt="Image"
                                class="thumb-one1 fade-left p-3" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="agency__content section__content">

                            <h2 class="title title-anim">
                                Our Vision
                            </h2>
                            <div class="paragraph">
                                <p>
                                    To spearhead digital transformation in the region.
                                </p>
                                <h2 class="title title-anim mt-5">
                                    Our Mission
                                </h2>
                                <div class="paragraph">
                                    <p>
                                        To usher businesses into the future enabling and empowering them through
                                        state-of-the-art
                                        digital technologies.
                                        <br>
                                    <ul style="list-style-type: circle; list-style-position: initial;">
                                        <li> Help businesses embrace digital transformation</li>
                                        <li> A digital transformation strategy unique to each business</li>
                                        <li> A robust and sustainable growth</li>
                                        <li> We serve organizations in the private and public sector</li>
                                        <li> To reap maximum value from digital transformation</li>
                                    </ul>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets/images/star.png" alt="Image" class="star" />
                <img src="assets/images//agency/dot-large.png" alt="Image" class="dot-large" />
        </section>

        <section class="cta-s section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta__wrapper" data-background="assets/images/cta-bg.png">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-9">
                                    <div class="section__header text-center">
                                        <h2 class="title title-anim">
                                            Stay Ahead With Our Top Notch Digital Services
                                        </h2>
                                    </div>

                                    <div class="footer__cta text-center">
                                        <a href="contact-us.html" class="btn btn--secondary">book a call now</a>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/images/testimonial/star.png" alt="Image" class="star" />
                            <img src="assets/images/testimonial/star.png" alt="Image" class="star-two" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / cta end ==== -->
    </main>
@endsection
