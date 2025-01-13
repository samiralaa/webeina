<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="assets/images/l-01.ico" type="image/x-icon" />
    <!-- #title -->
    <title>Webenia | Digital Solutions Agency</title>
    <!-- #keywords -->
    <meta name="keywords" content="creative, agency, portfolio" />
    <!-- #description -->
    <meta name="description" content="Creative Agency Portfolio HTML5 Template" />
    <!-- ==== css dependencies start ==== -->
    <!-- bootstrap five css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- glyphter css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/glyyphter/css/xpovio.css') }}" />
    <!-- font awesome six css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/all.css') }}" />
    <!-- nice select css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nice-select/css/nice-select.css') }}" />
    <!-- magnific popup css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/css/magnific-popup.css') }}" />
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/css/slick.css') }}" />
    <!--  normalize css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/normalize') }}" />
    <!-- ==== / css dependencies end ==== -->
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}" />
</head>

<body>
    <!-- Header Section -->
    <x-header-services />

    <!-- Main Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    {{-- footer-layout.blade --}}
    <x-footer-layout />

    <!-- Include JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.7.0.min.js') }}"></script>
    <!-- bootstrap five js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- nice select js -->
    <script src="{{ asset('assets/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/vendor/slick/js/slick.min.js') }}"></script>
    <!-- image loaded js -->
    <script src="{{ asset('assets/vendor/images-loaded/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ asset('assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!-- chroma js -->
    <script src="{{ asset('assets/vendor/gsap/chroma.min.js') }}"></script>
    <!-- splittext js -->
    <script src="{{ asset('assets/vendor/gsap/SplitText.min.js') }}"></script>
    <!-- scrollsmoother js -->
    <!-- <script src="{{ asset('assets/vendor/gsap/ScrollSmoother.min.js') }}"></script> -->
    <!-- scrollto js -->
    <script src="{{ asset('assets/vendor/gsap/ScrollToPlugin.min.js') }}"></script>
    <!-- scrolltrigger js -->
    <script src="{{ asset('assets/vendor/gsap/ScrollTrigger.min.js') }}"></script>
    <!-- gsap js -->
    <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}"></script>
    <!-- vanilla tilt js -->
    <script src="{{ asset('assets/vendor/vanilla-tilt/tilt.jquery.js') }}"></script>
    <!-- ==== / js dependencies end ==== -->
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
