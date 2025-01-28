@if (app()->getLocale() === 'ar')
<!-- ==== Header ar ==== -->
<header>
    <nav class="navbar navbar-expand-lg fixed-top sticky-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="img-logo">
            </a>

            <!-- Toggler for mobile view -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link bl" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bl" href="{{ route('user-profile') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            خدماتنا
                        </a>
                        {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item bl" href="#">التحول الرقمي</a></li>
                            <li><a class="dropdown-item bl" href="#">حلول الويب</a></li>
                            <li><a class="dropdown-item bl" href="#">التسويق الرقمي</a></li>
                            <li><a class="dropdown-item bl" href="#">حلول الجوال</a></li>
                            <li><a class="dropdown-item bl" href="#">المحتوى الرقمي</a></li>
                        </ul> --}}
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($services as $service )
                            <li><a class="dropdown-item bl" href="{{ route('serves.details', ['id' => $service->id]) }}">{{ $service->name[app()->getLocale()] }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link bl" href="#">شركاؤنا</a>
                    </li>
                    <li class="nav-item dropdown bl">
                        <a class="nav-link dropdown-toggle bl" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            الشركة
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                            <li><a class="dropdown-item bl" href="#">معلومات عنا</a></li>
                            <li><a class="dropdown-item bl" href="#">فرع دبي</a></li>
                            <li><a class="dropdown-item bl" href="#">فرع القاهرة</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('language.change', ['locale' => 'en']) }}" class="nav-link lang">en</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="request-quote-btn quote">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>تواصل معنا</span>
                        </a>
                    </li>
                </ul>
            </div>
    </nav>
</header>
@else
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
                <ul class="navbar-nav ms-auto" id="navbar">
                    <li class="nav-item">
                        <a class="nav-link bl" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bl" href="{{ route('user-profile') }}" id="navbarDropdown" role="button">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($services as $service )
                            <li><a class="dropdown-item bl" href="{{ route('serves.details', ['id' => $service->id]) }}">{{ $service->name[app()->getLocale()] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bl" href="#">Partners</a>
                    </li>
                    <li class="nav-item dropdown bl">
                        <a class="nav-link dropdown-toggle bl" href="#" id="companyDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Company
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                            <li><a class="dropdown-item bl" href="{{ route('faqs.index') }}">FAQs</a></li>
                            <li><a class="dropdown-item bl" href="{{route('about-us')}}">About Us</a></li>
                            <li><a class="dropdown-item bl" href="#">Dubai Branch</a></li>
                            <li><a class="dropdown-item bl" href="#">Cairo Branch</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('language.change', ['locale' => 'ar']) }}" class="nav-link">ع</a>
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

@endif
