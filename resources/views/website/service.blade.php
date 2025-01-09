@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/main-servsis.css') }}">

<div class="container">
    @if ($serves->count() > 0)


    <div class="servsis mb-5 ">
        <h3 class="text-uppercase pb-3">servsis</h3>
        <div class="items">
            @foreach ($serves as $serve)
            <div class="item">
                <div class="img">
                    <img src="{{ asset('public/storage/' . $serve->icon) }}" class="img-fluid" alt="{{ $serve->icon }}"
                        width="100" height="200">
                </div>
                <div class="text">
                    <h5 class="text-uppercase"> {{ $serve->name[app()->getLocale()] }}</h5>


                    <p class="description">{{ Str::limit($serve->description[app()->getLocale()], 45) }}</p>


                    <div class="cta">
                        <a href={{ route('serves.details', $serve->id) }} class="">explore more
                            &nbsp;
                            <i class="fa-sharp fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
    @endif
    @if ($packages->count() > 0)
    {{-- show success message --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="packages">
        <h3 class="text-uppercase pb-3">packages</h3>
        <div class="items">
            @foreach ($packages as $package)
            <div class="item">
                <div class="img">
                    <img src="{{ asset('public/storage/' . $package->image) }}" class="img-fluid" alt="">
                </div>
                <div class="text">

                    <div class="title mt-2">
                        <h4 class="text-uppercase">{{ json_decode($package->title, true)[app()->getLocale()] }}
                        </h4>
                        <h5 class="text-capitalize date ">{{ $package->subscription_time }}-month</h5>
                    </div>
                    <p class="text-white-50 text-lowercase">{{ json_decode($package->description,
                        true)[app()->getLocale()] }}</p>
                    <h5 class="text-capitalize">{{ $package->service->name[app()->getLocale()] }}</h5>
                    @foreach (json_decode($package->features, true)[app()->getLocale()] as $feature)
                    <ul class="">

                        <li>{{ $feature }}</li>

                    </ul>
                    @endforeach
                    <div class="title mt-2 mb-2">
                        <h5 class="text-capitalize">price</h5>
                        <h5 class="text-capitalize date">{{ $package->price }}$</h5>
                    </div>
                    <div class="action">
                        <form action="{{ route('website.package.request') }}" method="post">
                            @csrf
                            <!-- Add CSRF token for security -->
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <button type="submit">Order Now</button> <!-- Change the button to submit -->
                        </form>
                    </div>

                </div>

            </div>
            @endforeach






        </div>
    </div>
    @endif

    <div class="disconts mt-5 row">
        <div class="img col-lg-6">
            <img src="{{ asset('assets/images/sail.png') }}" alt="">
        </div>
        <div class="text col-lg-6">
            <h1>main title discount</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, accusantium?</p>
        </div>
    </div>

</div>
</div>



</div>

<link rel="stylesheet" href="{{ asset('assets/css/regstration.css') }}">


</div>

@endsection
