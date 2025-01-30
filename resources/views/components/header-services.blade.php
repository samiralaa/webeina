
<!--@if (app()->getLocale() === 'ar')-->
<!--@else-->
<!--@endif-->
<!-- ==== Header en ==== -->
<header>
    <nav class="navbar navbar-expand-lg fixed-top sticky-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="img-logo">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="{{route('home')}}" data-lang="logo">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('user-profile') }}" id="navbarDropdown" role="button">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($services as $service )
                            <li><a class="dropdown-item" href="{{ route('serves.details', ['id' => $service->id]) }}">{{ $service->name[app()->getLocale()] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Partners</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Company
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                            <li><a class="dropdown-item" href="{{ route('faqs.index') }}">FAQs</a></li>
                            <li><a class="dropdown-item" href="{{route('about-us')}}">About Us</a></li>
                            <li><a class="dropdown-item" href="#">Dubai Branch</a></li>
                            <li><a class="dropdown-item" href="#">Cairo Branch</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @if (app()->getLocale() === 'ar')
                        <a href="{{ route('language.change', ['locale' => 'en']) }}" class="nav-link lang">en</a>
                        @else
                        <a href="{{ route('language.change', ['locale' => 'ar']) }}" class="nav-link">ع</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="request-quote-btn quote">
                            <i class="fa-solid fa-arrow-right"></i>
                            <span>Get in touch</span>
                        </a>
                    </li>
                </ul>
            </div>
    </nav>
</header>

