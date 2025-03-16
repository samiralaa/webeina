<!-- resources/views/home.blade.php -->
@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
@section('title', 'Home Page')

@section('content')




    <!-- ////////////////////////////////////////////// samir new  -->
    <section class="hero" role="banner">
        <div class="container--0-">
            <video autoplay muted loop class="background-video" aria-label="Background video"
                title="Background video showcasing our services" preload="auto">
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
                    {{ __('messages.title') }}
                </h2>
            </div>

            <div class="sub_title col-sm-12 col-md-6" role="contentinfo">
                <p class="text-capitalize text-black-50">
                    {{ __('messages.description') }}
                </p>
            </div>

            {{-- Count Numbers Section --}}
            <div class="count col-12 d-flex pt-5 pb-5" role="group" aria-label="Statistics">
                <div class="cards-block__item col-sm-3" role="listitem">
                    <h3 class="card-block__title fw-bold">950+</h3>
                    <div class="card-block__content">{{ __('messages.stats.projects') }}</div>
                </div>
                <div class="cards-block__item col-sm-3" role="listitem">
                    <h3 class="card-block__title fw-bold">15+</h3>
                    <div class="card-block__content">{{ __('messages.stats.progress') }}</div>
                </div>
                <div class="cards-block__item col-sm-3" role="listitem">
                    <h3 class="card-block__title fw-bold">1,800+</h3>
                    <div class="card-block__content">{{ __('messages.stats.employees') }}</div>
                </div>
                <div class="cards-block__item col-sm-3" role="listitem">
                    <h3 class="card-block__title fw-bold">500+</h3>
                    <div class="card-block__content">{{ __('messages.stats.categories') }}</div>
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
                                src="{{ asset('public/storage/' . $item->icon) }}"
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
                            <p>
                                <a class="btn-link" href="{{ route('serves.details', ['id' => $item->slug]) }}"
                                    title="{{ $item->name[app()->getLocale()] }}">
                                    {{ $item->name[app()->getLocale()] }} <i class="fa-solid fa-arrow-right"
                                        aria-hidden="true"></i>
                                </a>
                            </p>
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
    <section class="container">
        <h2 class="text-capitalize text-center mb-5">{{ __('messages.why_webenia') }}</h2>
        <div class=" d-flex justify-content-center">
            <div class="values-container">
                <div class="value-box">
                    <img alt="Leading IT Service Icon" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon-2.png" loading="lazy" title="Leading IT Service Icon" width="50" height="50">
                    <h3 class="text-white text-capitalize">Results-Oriented</h3>
                    <p> Focusing on delivering tangible outcomes and measurable results</p>
                </div>
                <div class="value-box">
                    <img alt="Experience Icon" class="mb-2 img-fluid" src="https://www.ipixtechnologies.com/images/web/images/menon.svg" loading="lazy" title="Experience Icon" width="50" height="50">
                    <h3 class="text-white text-capitalize">Collaboration</h3>
                    <p> Fostering teamwork and open communication within the organization and with clients</p>
                </div>
                <div class="value-box">
                    <img alt="Excellence Icon" class="mb-2 img-fluid" src="https://img.icons8.com/?size=100&id=pQijC3tkOnQa&format=png&color=FFFFFF" loading="lazy" title="Excellence Icon" width="50" height="50">
                    <h4 class="text-white">Excellence</h4>
                    <p> Striving for the highest quality in all aspects of the business
                    </p>
                </div>
                <div class="value-box">
                    <img alt="Responsibility Icon" class="mb-2 img-fluid" src="https://img.icons8.com/?size=100&id=xqbsPiyyftq5&format=png&color=FFFFFF" loading="lazy" title="Responsibility Icon" width="50" height="50">
                    <h3 class="text-white text-capitalize">Ethical Responsibility</h3>
                    <p>Conducting business with integrity and considering the social and environmental impact</p>
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">Because we don’t just give you a mere website and a digital marketing kit. 
We are obsessed with everything digital and move with the speed of culture. 
We combine data, creativity and strategy to make your business stand out and drive your growth.</p>
                                        <a href="https://www.linkedin.com/posts/webenia_because-we-dont-just-give-you-a-mere-website-activity-7295697550869712899-CIxG?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4E22AQFNQ9rQc3A2Ow/feedshare-shrink_800/B4EZT.GQPYG0Ag-/0/1739429843023?e=1744848000&v=beta&t=mFWbip8AbeDOOU_0IuDNavtfna81glGZVASazdvcqao"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">Metrics Tracking = Smarter Decisions! 📊

Here are 4 essential metrics every e-commerce store should monitor:

🔍 Conversion Rate: Are visitors turning into buyers?

🛒 Cart Abandonment Rate: Why are shoppers leaving?

📈 Customer Lifetime Value: What’s each customer worth over time?

🌐 Traffic Sources: Where are your visitors coming from?

Measure, analyze, and grow! 🚀

hashtag#ECommerceMetrics hashtag#DataDriven hashtag#GrowYourStore</p>
                                        <a href="https://www.linkedin.com/posts/webenia_ecommercemetrics-datadriven-growyourstore-activity-7287377864755163136-V1uO?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D5622AQEN-uj5AfrVdQ/feedshare-shrink_800/B56ZSH3ig9GoAk-/0/1737446272513?e=1744848000&v=beta&t=XP5b5cucWF2vM8MGjGV0zvB-YBg6SfmiFcFV-_G2qdk"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo • Edited •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">We Are Hiring !!
Position : Senior IT and System Administrator 💻 
Branch : Cairo Egypt , Zahraa ElMaadi 
Send Your CV to careers@webenia.com To Apply 💪</p>
                                        <a href="https://www.linkedin.com/posts/webenia_we-are-hiring-position-senior-it-and-activity-7289614378952224768-kqvD?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQEDT6cdcdJVLA/feedshare-shrink_800/B4DZSnppH.HkAk-/0/1737979501245?e=1744848000&v=beta&t=B5bJL3LxfChBt6qTa5StCcKd9aoPzumuFJ4In-ljuFw"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo • Edited •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">We Are Hiring !!
Position : Senior Sales Engineer 🔝 
Branch : Cairo Egypt , Zahraa ElMaadi 
Send Your CV to careers@webenia.com To Apply 💪
</p>
                                        <a href="https://www.linkedin.com/posts/webenia_we-are-hiring-position-senior-sales-activity-7289568745788788736-hSBe?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQFcvLDkvpEIBA/feedshare-shrink_800/B4DZSnAJDKHUAg-/0/1737968621983?e=1744848000&v=beta&t=salWmgPtLid_UYo_D7CQR3gpcaBhA1c0e3LzEjOWHro"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">Cart abandonment is one of the biggest challenges for e-commerce businesses—did you know it happens in over 70% of cases? 🛒 But here’s the good news: small, simple changes can dramatically improve your checkout experience.



🔑 Offer Guest Checkout: Not everyone wants to create an account. Provide a seamless guest checkout option for faster purchases.
💳 Add Multiple Payment Options: Cater to all preferences—credit cards, digital wallets, and buy-now-pay-later options.
🛡️ Build Trust: Display secure payment badges and SSL certificates to reassure customers.
📱 Mobile Optimization: Ensure your checkout process works flawlessly on mobile devices.

These tweaks not only reduce friction but also boost customer satisfaction and conversion rates. Ready to optimize your checkout and grow your sales?
hashtag#CheckoutOptimization hashtag#ECommerceSuccess hashtag#UserExperience</p>
                                        <a href="https://www.linkedin.com/posts/webenia_checkoutoptimization-ecommercesuccess-userexperience-activity-7289177737112526848-BFyu?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQEAddN1hpKhVA/feedshare-shrink_800/B4DZShchEhGcAg-/0/1737875396869?e=1744848000&v=beta&t=nP7HCI7zQxM6MlBSX_xRzyC3dodEHkqgW1VbMfC1tcA"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>1mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">Storytelling isn’t just for books—it’s a powerful tool for every marketeer.

Why does storytelling matter?
Emotional Connection: Stories make your brand relatable and memorable.
Building Trust: Sharing your journey or the impact of your product fosters authenticity.
Drives Engagement: Customers are more likely to share and engage with compelling narratives.

How to use storytelling:

Share your brand’s journey—why you started and what you stand for.
Highlight customer success stories with your product.
Use visuals and videos to make your story come alive.

Every product has a story—are you telling yours?</p>
                                        <a href="https://www.linkedin.com/posts/webenia_storytelling-isnt-just-for-booksits-a-activity-7287097398487633920-kG7t?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQEEy0mk3BQfAQ/feedshare-shrink_800/B4DZSD4dqsGkAs-/0/1737379406622?e=1744848000&v=beta&t=F3yANcx4wyD9DUUQ3Jy_ml8AObzHQWsqfgCdAqT2uUg"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>2mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">At Webenia, we turn your vision into a powerful, user-friendly mobile app tailored to your business needs.



Our App Development Service includes:
✅ Custom Design: Unique app features aligned with your brand.
✅ Seamless User Experience: Intuitive navigation for your customers.
✅ Cross-Platform Compatibility: Optimized for both iOS and Android devices.
✅ Scalable Solutions: Easily adaptable as your business grows.
✅ Support & Maintenance: Ongoing assistance to ensure your app runs smoothly.

Ready to transform your idea into a fully functional mobile app?</p>
                                        <a href="https://www.linkedin.com/posts/webenia_at-webenia-we-turn-your-vision-into-a-powerful-activity-7279384297868869632-QCp_?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQEQ762mkeYm2Q/feedshare-shrink_800/B4DZQWRaoYHYAk-/0/1735540460287?e=1744848000&v=beta&t=ipiQ6UlVwjVmIeWMuYbws8X8uskprd24i2sBn-jJSNE"
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
                                                <img src="{{ asset('assets/images/webenia_logo.jpg') }}" loading="lazy"
                                                    alt="Webenia Official Logo" title="Webenia Official Logo">
                                            </div>
                                            <div class="puplish-info">
                                                <div class="poplish"><span>Webenia</span></div>
                                                <div class="time"><span>2mo •</span></div>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="text_content">
                                        <p class="post-content">Integrating your CRM with your e-commerce platform is essential for managing customer relationships efficiently. Here’s how you can do it :


Choose the Right CRM: Ensure it supports seamless integration with your e-commerce platform.
Set Up Integration: Link your CRM system with your store for real-time data synchronization.
Automate Workflows: Streamline customer interactions, from lead capture to order management.
Analyze Insights: Use CRM data to personalize marketing and improve sales strategies.
Enhance Customer Experience: Provide personalized service and support based on CRM insights.
At Webenia, we ensure smooth CRM integration tailored to your business needs</p>
                                        <a href="https://www.linkedin.com/posts/webenia_integrating-your-crm-with-your-e-commerce-activity-7279037775255945216-vQHj?utm_source=share&utm_medium=member_desktop&rcm=ACoAAE6iMj8BMLJZCINzF80WrldS7lTH7c4BdDI" class="toggle_link">...more</a>
                                    </div>
                                    <div class="img_content">
                                        <a href="#">
                                            <img src="https://media.licdn.com/dms/image/v2/D4D22AQH65kc1HjHd2Q/feedshare-shrink_800/B4DZQRWRhJHwAg-/0/1735457842281?e=1744848000&v=beta&t=TGb2T6bng0o_6ATRpkMiLzZwQqKgsPAuQIDA8Z9BZJw"
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

    <script>
        function truncateText(element, maxLength) {
            let text = element.innerText;
            if (text.length > maxLength) {
                element.innerText = text.substring(0, maxLength).trim();
            }
        }

        document.querySelectorAll(".post-content").forEach(paragraph => {
            truncateText(paragraph, 115); // Adjust max characters as needed
        });
    </script>