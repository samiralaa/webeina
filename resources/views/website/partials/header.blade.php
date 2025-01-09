<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <title>Document</title>
</head>

<body>
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- ==== / preloader end ==== -->
    <!-- ==== mouse cursor drag start ==== -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner">
        <span>Drag</span>
    </div>
    <!-- ==== / mouse cursor drag end ==== -->
    <!-- ==== header start ==== -->
    <header class="header">
        <div class="primary-navbar secondary--navbar" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar p-0">
                            <div class="navbar__logo">
                                <a href="{{ route('home') }}" aria-label="go to home">
                                    <img width="250px" style="height: 100px" height="100px" class="img-logo"
                                        src="https://placehold.co/100x100.png" alt="Image" />
                                </a>
                            </div>

                            <div class="navbar__options">
                                <button class="open-offcanvas-nav d-flex" aria-label="toggle mobile menu"
                                    title="open offcanvas menu"></button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==== / header end ==== -->
    <!-- ==== offcanvas nav start ==== -->
    <div class="offcanvas-nav">
        <div class="offcanvas-menu">
            <nav class="offcanvas-menu__wrapper">
                <div class="offcanvas-menu__header nav-fade">
                    <div class="logo">
                        <a href="index.html">
                            <img class="img-logo" src="https://placehold.co/100x100.png" alt=""
                                title="" />
                        </a>
                    </div>
                    <a href="javascript:void(0)" aria-label="close offcanvas menu" class="close-offcanvas-menu">
                        <i class="fa-light fa-xmark-large"></i>
                    </a>
                </div>
                <div class="offcanvas-menu__list">
                    <div class="navbar__menu">
                        <ul>
                            <li class="navbar__item nav-fade">
                                <a href="{{ route('language.change', ['locale' => 'ar']) }}">ع</a>
                            </li>


                            <li class="navbar__item nav-fade">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="navbar__item nav-fade">
                                <a href="{{ route('about-us') }}">About Us</a>
                            </li>
                            <li class="navbar__item navbar__item--has-children nav-fade">
                                <a href="javascript:void(0)" aria-label="dropdown menu"
                                    class="navbar__dropdown-label">Services</a>
                                <ul class="navbar__sub-menu">
                                    <li>
                                        <a href="our-services.html">Our Services</a>
                                    </li>
                                    <li>
                                        <a href="Digital-Transformation.html">Digital Transformation</a>
                                    </li>
                                    <li>
                                        <a href="Digital-Solutions.html">Digital Solutions</a>
                                    </li>
                                    <li>
                                        <a href="AI-Solutions.html">AI Solutions</a>
                                    </li>
                                    <li>
                                        <a href="Digital-Marketing.html">Digital Marketing</a>
                                    </li>
                                    <li>
                                        <a href="Digital-Media.html">Digital Media</a>
                                    </li>
                                    <li>
                                        <a href="IT-Consulting.html">IT Consulting</a>
                                    </li>
                                    <li>
                                        <a href="HR-Solutions.html">HR Solutions</a>
                                    </li>
                                    <li>
                                        <a href="Odoo-Products.html">Odoo Products</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar__item nav-fade">
                                <a href="faq.html">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="offcanvas-menu__options nav-fade">
                    <div class="offcanvas__mobile-options d-flex">
                        <a href="{{ route('contact') }}" class="btn btn--secondary">Contact-us</a>
                    </div>
                </div>
                <div class="offcanvas-menu__social social nav-fade">
                    <a href="https://www.facebook.com/webenia" target="_blank" aria-label="share us on facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://x.com/webeniaAgency" target="_blank" aria-label="share us on twitter">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/webenia/posts/?feedView=all" target="_blank"
                        aria-label="share us on pinterest">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.instagram.com/ebeniaagency/" target="_blank"
                        aria-label="share us on instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>
