<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/normalize/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">

    <title>Footer Layout</title>
</head>

<body>





    <footer>
        <div class="footer-row1">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-sm-6 d-flex flex-column ftr-brand-pp">
                        <a class="navbar-brand align-self-start " href="#"> <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo" width="100"></a>
                        <p><span class="webenia text-radius bg-b">WEBENIA</span>  is a virtual department that can help your organization expand its business by enhancing the quantity and quality of leads and sales generated from your website, with a focus on maximizing return on investment (ROI).</p>
                        <h5 class="head location">Locations</h5>
                        <div class="locations d-flex flex-column">
                            <a href="https://maps.app.goo.gl/32MvC2fBcoVZseD1A">
                                <span">
                                    <i class="fa-solid fa-location-dot fa-lg"></i>
                                    Cairo Branch
                                </span>
                            </a>
                            <a href="">
                                <span>
                                    <i class="fa-solid fa-location-dot fa-lg"></i>
                                    Dubai Branch
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <h5 class="head">Webenia Contacts</h5>
                        <ul class="footer-address-list ftr-details">
                            <li class="d-flex">
                                <span><i class="fas fa-envelope"></i></span>
                                <p> Email <span> <a href="mailto:info@webenia.com">info@webenia.com</a></span></p>
                            </li>
                            <li class="d-flex">
                                <span><i class="fab fa-skype"></i></span>
                                <p> skype <span> <a href="skype:live:.cid.bedd6a433022c5ca?call">webenia</a></span></p>
                            </li>
                        </ul>
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <h5 class="head">QuickLinks</h5>
                        <ul class="footer-address-list link-hover">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Digital Trasformation</a></li>
                            <li><a href="#">Web Solutions</a></li>
                            <li><a href="#">Digital Marketing</a></li>
                            <li><a href="#">Mobile Solutions</a></li>
                            <li><a href="#">Digital Content</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="footer-row2">
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 footer-right">
                            <div class="footer-social-media-icons">
                                <a href="https://www.facebook.com/Webenia-104157055242401" target="blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://twitter.com/WebeniaAgency" target="blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/webeniaagency/" target="blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/webenia/" target="blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://www.youtube.com/@Webenia" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.snapchat.com/add/webenia.com?share_id=gHrT75HjgSs&amp;locale=en-US" target="_blank"><i class="fab fa-snapchat"></i></a>
                                <a href="https://www.tiktok.com/@webenia.com?_t=8qUFX1tUyna&amp;_r=1" target="_blank">
                                    <i class="fab fa-tiktok"></i>
                                </a>

                            </div>
                            <div class="footer-">
                                <p>Copyright © 2025 <a href="https://webenia.com" target="blank"><span class="webenia text-radius bg-b">WEBENIA</span></a>. All rights reserved. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
</body>

</html>
