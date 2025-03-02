<!-- ==== Header ==== -->
<header role="banner">
    <nav class="navbar navbar-expand-lg fixed-top sticky-navbar" role="navigation">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('home')}}" aria-label="Home">
                <img src="{{asset('assets/images/logo.png')}}" alt="Company Logo - Your Company Name" title="Your Company Logo" class="img-logo" width="150" height="50">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (app()->getLocale() === 'ar')
                <ul class="navbar-nav me-auto" id="navbar">
                    @else
                    <ul class="navbar-nav ms-auto" id="navbar">
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}" aria-label="Home" aria-current="page">
                                {{ __('messages.home') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('user-profile') }}" id="navbarDropdown" role="button" title="Services">
                                {{ __('messages.services') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($services as $service)
                                <li>
                                    <a class="dropdown-item" href="{{ route('serves.details', ['id' => $service->slug]) }}" title="{{ $service->name[app()->getLocale()] }}">
                                        {{ $service->name[app()->getLocale()] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('portfolio')}}" title="Partners">{{ __('messages.portfolio') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Company">
                                {{ __('messages.company') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                                <li><a class="dropdown-item" href="{{ route('faqs.index') }}" title="FAQs">{{ __('messages.faqs') }}</a></li>
                                <li><a class="dropdown-item" href="{{route('about-us')}}" title="About Us">{{ __('messages.about_us') }}</a></li>
                                <li><a class="dropdown-item" href="#" title="Dubai Branch">{{ __('messages.dubai_branch') }}</a></li>
                                <li><a class="dropdown-item" href="#" title="Cairo Branch">{{ __('messages.cairo_branch') }}</a></li>
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

                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>