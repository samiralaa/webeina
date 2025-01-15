<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/normalize/normalize.css')}}">
    <title>Document</title>
</head>

<body>


    <!-- ==== Header Start ==== -->


<header class="header">
        <div class="primary-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar p-0">
                            <!-- Logo Section -->
                            <div class="navbar__logo">
                                <a href="{{ route('home') }}" aria-label="go to home">
                                    <img class="img-logo"    src="{{ asset('/assets/images/logo.png') }}" alt="Logo" width="250px" height="100px">
                                </a>
                            </div>
                            <!-- Menu Section -->
                            <div class="navbar__menu mt-2">
                                <ul>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="dropdown navbar__item nav-fade">
                                        <button class="dropbtn">
                                            Services
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <a href="#">Digital Transformation</a>
                                            <a href="#">Web Solutions</a>
                                            <a href="#">Digital Marketing</a>
                                            <a href="#">Mobile Solutions</a>
                                            <a href="#">Digital Content</a>
                                        </div>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="{{ route('about-us') }}">Partners</a>
                                    </li>
                                    <li class="dropdown navbar__item">
                                            <button class="dropbtn">
                                                Company
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                                <a href="#">Contact</a>
                                                <a href="#">Dubai Branch</a>
                                                <a href="#">Cairo Branch</a>
                                            </div>

                                    </li>
                                    <li class="navbar__item nav-fade">
                                        <a href="#">Contact</a>
                                    </li>
                                    <li class="navbar__item nav-fade">
                                        @if (app()->getLocale() === 'ar')
                                            <a href="{{ route('language.change', ['locale' => 'en']) }}">en</a>
                                        @else
                                            <a href="{{ route('language.change', ['locale' => 'ar']) }}">ع</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <!-- Request a Quote -->
                            <div class="navbar__options">
                                <button class="quote">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                    </svg>
                                    <div class="tquote">Request a Quote</div>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
        <!-- Mobile Menu -->
<!--        <div class="mobile-menu">-->
<!--            <nav class="mobile-menu__wrapper">-->
<!--                <div class="mobile-menu__header nav-fade">-->
<!--                    <div class="logo">-->
<!--                        <a href="{{ route('home') }}">-->
<!--                            <img class="img-logo" src="{{ asset('assets/images/webenia-logo-final-02-01.png') }}" alt="Logo">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <a href="javascript:void(0)" class="close-mobile-menu">-->
<!--                        <i class="fa-light fa-xmark-large"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="mobile-menu__list"></div>-->
<!--                <div class="mobile-menu__social social nav-fade">-->
<!--                    <a href="https://www.facebook.com/webenia" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>-->
<!--                    <a href="https://x.com/webeniaAgency" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>-->
<!--                    <a href="https://www.linkedin.com/company/webenia/posts/?feedView=all" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>-->
<!--                    <a href="https://www.instagram.com/webeniaagency/" target="_blank"><i class="fa-brands fa-instagram"></i></a>-->
<!--                </div>-->
<!--            </nav>-->
<!--        </div>-->
    </header>

<!--     ==== Header End ==== -->


    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
