<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/normalize/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <title>Document</title>
</head>

<body>


    <!-- ==== Header Start ==== -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky-navbar">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="img-logo">
                </a>

                <!-- Toggler for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link bl" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bl" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>


                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($services as $service )
                                <li><a class="dropdown-item bl" href="#">{{ $service->name[app()->getLocale()] }}</a>
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
                                <li><a class="dropdown-item bl" href="#">About Us</a></li>
                                <li><a class="dropdown-item bl" href="#">Contact</a></li>
                                <li><a class="dropdown-item bl" href="#">Dubai Branch</a></li>
                                <li><a class="dropdown-item bl" href="#">Cairo Branch</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bl" href="#">Contact</a>
                        </li>
                        <li class="nav_item">
                            @if (app()->getLocale() === 'ar')
                            <a href="{{ route('language.change', ['locale' => 'en']) }}" class="nav-link bl">en</a>
                            @else
                            <a href="{{ route('language.change', ['locale' => 'ar']) }}" class="nav-link bl">ع</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="#" class="request-quote-btn quote">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span>Request a Quote</span>
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>



    <!--     ==== Header End ==== -->


    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
</body>

</html>
