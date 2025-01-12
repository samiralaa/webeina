<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .user .fa-user {
            transition: 0.5 ease-in-out;
        }

        .user .fa-user:hover {
            color: #21DEB4;
            cursor: pointer;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <!-- ==== Header Start ==== -->
    <header class="header">
        <div class="primary-navbar cmn-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar p-0">
                            <!-- Logo Section -->
                            <div class="navbar__logo">
                                <a href="{{ route('home') }}" aria-label="go to home">
                                    <img class="img-logo"    src="{{ asset('/assets/images/webenia - logo final-02-01.png') }}" alt="Logo" width="250px" height="100px">
                                </a>
                            </div>
                            <!-- Menu Section -->
                            <div class="navbar__menu">
                                <ul>
                                    <li class="navbar__item nav-fade">
                                        @if (app()->getLocale() === 'ar')
                                            <a href="{{ route('language.change', ['locale' => 'en']) }}">en</a>
                                        @else
                                            <a href="{{ route('language.change', ['locale' => 'ar']) }}">ع</a>
                                        @endif
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('about-us') }}">About Us</a>
                                    </li>
                                    <li class="navbar__item navbar__item--has-children nav-fade">
                                        <a href="javascript:void(0)" class="navbar__dropdown-label">Services</a>
                                        <ul class="navbar__sub-menu">
                                            @foreach ($services as $service)
                                                <li>
                                                    <a href="{{ route('serves.details', ['id' => $service->id]) }}">
                                                        {{ $service->name[app()->getLocale()] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- User Section -->
                            <div class="navbar__options">
                                @if (Auth::check())
                                    <a href="{{ route('user-profile') }}">{{ auth()->user()->name }}</a>
                                @else
                                    <div class="user">
                                        <a href="{{ route('register.user') }}"><i class="fa-solid fa-user"></i></a>
                                    </div>
                                @endif
                                <button class="open-mobile-menu d-flex d-xl-none" aria-label="toggle mobile menu">
                                    <i class="fa-light fa-bars-staggered"></i>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <nav class="mobile-menu__wrapper">
                <div class="mobile-menu__header nav-fade">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img class="img-logo" src="{{ asset('assets/images/webenia-logo-final-02-01.png') }}" alt="Logo">
                        </a>
                    </div>
                    <a href="javascript:void(0)" class="close-mobile-menu">
                        <i class="fa-light fa-xmark-large"></i>
                    </a>
                </div>
                <div class="mobile-menu__list"></div>
                <div class="mobile-menu__social social nav-fade">
                    <a href="https://www.facebook.com/webenia" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://x.com/webeniaAgency" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/webenia/posts/?feedView=all" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/webeniaagency/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </nav>
        </div>
    </header>
    <!-- ==== Header End ==== -->
</body>

</html>
