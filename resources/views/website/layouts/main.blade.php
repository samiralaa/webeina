<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />
    <!-- #title -->
    <title>Webenia | Digital Solutions Agency</title>
    <!-- #keywords -->
    <meta name="keywords" content="creative, agency, portfolio" />
    <!-- #description -->
    <meta name="description" content="Creative Agency Portfolio HTML5 Template" />
    <!-- ==== css dependencies start ==== -->
    <!-- bootstrap five css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- font awesome six css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/all.css') }}" />
    <!--  normalize css  -->
<!--    <link rel="stylesheet" href="{{ asset('assets/vendor/normalize/normalize.css') }}" />-->
    <!--  normalize css  -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/css/swiper-bundle.min.css') }}" />
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/css/slick.css') }}" />
    <!-- ==== / css dependencies end ==== -->
    <!-- main css -->
    @if (app()->getLocale() === 'ar')
    <link rel="stylesheet" href="{{ asset('assets/css/main-ar.css') }}" />
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    @endif
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

    <!-- Mouse Follow Effect -->
    <div class="mouse">
        <div class="circle"></div>
        <div class="dot"></div>
    </div>




    <!--  jquery js  -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.7.0.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/vendor/slick/js/slick.min.js') }}"></script>
    <!-- bootstrap five js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlay widget js -->
    <script src="{{ asset('assets/vendor/overlay-widget/overlay-widget.js') }}"></script>
    <!-- overlay widget js -->
    <script src="{{ asset('assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <!-- Email js -->
    <script src="{{ asset('assets/vendor/email-js/js/email-js.js')}}"></script>
    <!-- ==== / js dependencies end ==== -->
    <!-- main js -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1073441617305507');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1073441617305507&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Meta Pixel Code -->
    <noscript>
        <img
            height="1"
            width="1"
            style="display:none"
            src="https://www.facebook.com/tr?id=1211407723662265&ev=PageView&noscript=1"
        />
    </noscript>

</body>

</html>

