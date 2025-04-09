<!-- ==== Header ==== -->
<header role="banner">
    <nav class="navbar navbar-expand-lg fixed-top sticky-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-none" href="{{route('home')}}">
                <img src="{{asset('assets/images/black-logo.png')}}" alt="Company Logo" class="img-logo" width="150" height="50">
            </a>
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/images/white-logo.png')}}" alt="Company Logo" class="img-logo" width="150" height="50">
            </a>
            <div class="mobileview d-flex align-items-center g-5">

                <div class="navbar-lang-switcher d-lg-none">
                    @if (app()->getLocale() === 'ar')
                        <a href="{{ route('language.change', ['locale' => 'en']) }}" class="lang-switch" rel="nofollow" title="Switch to English">EN</a>
                    @else
                        <a href="{{ route('language.change', ['locale' => 'ar']) }}" class="lang-switch" rel="nofollow" title="Switch to Arabic">ع</a>
                    @endif
                </div>
                <!-- Toggler Button (Mobile) -->
                <button class="navbar-toggler" id="mobileMenuToggle" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Fullscreen Mobile Menu -->
            <div class="mobile-nav" id="mobileNav">
                <span class="close-btn" id="closeMobileNav">&times;</span>
                <ul class="mobile-menu">
                    <li><a href="{{route('home')}}">{{ __('messages.home') }}</a></li>

                <!-- Mobile Services Dropdown (Inside Mobile Menu) -->
                <li class="nav-item dropdown mobile-services">
                    <a class="nav-link dropdown-toggle" href="#" id="mobileServicesToggle">
                        {{ __('messages.services') }}
                    </a>
                    <ul class="dropdown-menu mobile-dropdown">
                        @foreach ($services as $service)
                        <li><a class="dropdown-item" href="{{ route('serves.details', ['id' => $service->slug]) }}">{{ $service->name[app()->getLocale()] }}</a></li>
                        @endforeach
                    </ul>
                </li>


                    <li><a href="{{route('portfolio')}}">{{ __('messages.portfolio') }}</a></li>
                    <li><a href="{{ route('about-us') }}">{{ __('messages.about_us') }}</a></li>
                    <li><a href="{{ route('faqs.index') }}">{{ __('messages.faqs') }}</a></li>
                </ul>
                <a href="{{route('contact')}}" class="request-quote-btn quote" title="Contact Us">
                    @if (app()->getLocale() === 'ar')
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                    @else
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    @endif
                    <span>{{ __('messages.contact_us') }}</span>
                </a>
            </div>


            <!-- Desktop Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (app()->getLocale() === 'ar')
                <ul class="navbar-nav me-auto" id="navbar">
                @else
                <ul class="navbar-nav ms-auto" id="navbar">
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('user-profile') }}">
                            {{ __('messages.services') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($services as $service)
                            <li><a class="dropdown-item" href="{{ route('serves.details', ['id' => $service->slug]) }}">{{ $service->name[app()->getLocale()] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio')}}">{{ __('messages.portfolio') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Company">
                            {{ __('messages.company') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                            <li><a class="dropdown-item" href="{{route('about-us')}}" title="About Us">{{ __('messages.about_us') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('faqs.index') }}" title="FAQs">{{ __('messages.faqs') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @if (app()->getLocale() === 'ar')
                        <a href="{{ route('language.change', ['locale' => 'en']) }}" class="nav-link lang" rel="nofollow" title="Switch to English">en</a>
                        @else
                        <a href="{{ route('language.change', ['locale' => 'ar']) }}" class="nav-link" rel="nofollow" title="Switch to Arabic">ع</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="request-quote-btn quote" title="Get in Touch">
                            @if (app()->getLocale() === 'ar')
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            @else
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            @endif
                            <span>{{ __('messages.get_in_touch') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
