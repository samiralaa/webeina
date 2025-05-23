@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/service-details.css') }}">
@section('title', $service->name[app()->getLocale()])

@section('content')



<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('public/storage/' . $service->image_banar) }}" loading="lazy"
        alt="{{ $service->name[app()->getLocale()] }}">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ $service->name[app()->getLocale()] }}</div>
            <div class="text-3">{{ $service->description[app()->getLocale()] }}</div>
        </div>
    </div>
</div>


{{-- @if(session('success'))
<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}
@if(session('success'))
<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-check fs-1"></i>
    <strong>Success!</strong>
    <span id="alert-message">Your Message Sent Successfully.</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif





<!-- Features Section -->
<div class="container pt-5 pb-5">
    <h1 class="text-capitalize pb-4">Features</h1>
</div>

<section class="feature-section">
    <div class="container features">
        <!-- Left Panel (Feature Navigation) -->
        <div class="left-panel">
            <!-- Dropdown for mobile -->
            <select class="feature-dropdown" aria-label="Select a service">
                @foreach ($service->contents as $content)
                <option value="details{{ $content->id }}">
                    {{ $content->title[app()->getLocale()] ?? $content->title['en'] }}
                </option>
                @endforeach
            </select>

            <!-- List for larger screens -->
            <ul class="feature-list">
                @foreach ($service->contents as $content)
                <li data-detail="details{{ $content->id }}">
                    {{ $content->title[app()->getLocale()] ?? $content->title['en'] }}
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Vertical Line -->
        <div class="verticalline">
            <div class="select"></div>
        </div>

        <!-- Right Panel (Feature Details) -->
        <div class="right-panel" style="background-image: url('{{ asset('assets/images/features.jpg') }}');">
            @foreach ($service->contents as $content)
            <div id="details{{ $content->id }}" class="details">
                <h2>{{ $content->title[app()->getLocale()] ?? $content->title['en'] }}</h2>
                <p>{{ $content->description[app()->getLocale()] ?? $content->description['en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>




<!-- Why Choose This Service -->
<section class="service-description">
    <div class="container">
        <h1 class="service-title">{{ __('messages.why-opting-in')}}</h1>
        <p class="service-text">
            {{ __('messages.why-opting-in-description')}}
        </p>
        <div class="solve">
            @foreach ($service->choose as $choos)

            <div class="service-features">

                <div class="feature-box ">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <img src="{{ asset('public/storage/' . $choos->icon) }}" width="50" height="50" />
                        <h2>{{ $choos->title[app()->getLocale()] ?? $choos->title['en'] }}</h2>
                    </div>
                    <p>{{ $choos->description[app()->getLocale()] ?? $choos->description['en'] }}.</p>
                </div>



            </div>

            @endforeach
        </div>
    </div>
    </div>

</section>



<!-- Steps -->
<section class="steps-map">
    <div class="steps-progress">
        <div class="steps-progress-head">
            <h1 class="text-capitalize pb-4">{{ __('messages.steps')}}</h1>
        </div>

        <ul class="steps-list">
            @foreach ($service->steps as $index => $step)
            <li class="steps-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
                <span class="step-title">
                    {{ $step->title[app()->getLocale()] ?? json_encode($step->title) }}
                </span>
                <div class="location">
                    {{ $step->description[app()->getLocale()] ?? json_encode($step->description) }}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>



<!-- Industries -->
<section class="features-section">
    <div class="container">
        <h1 class="section-title text-capitalize ">{{ __('messages.industiral-services')}}</h1>
        <div class="features-grid">
            @foreach ($service->industiral as $index => $step)
            <div class="feature-card">
                <img src="{{ asset('public/storage/' . $step->icon) }}" width="50" height="50" />
                <h2>{{ $step->title[app()->getLocale()] ?? $choos->title['en'] }}</h2>
                <p>{{ __('messages.many-factory-description')}}</p>
            </div>

            @endforeach
        </div>
    </div>
</section>



<!-- Q-contact -->
<div class="Q-contact pt-5 pb-5">

    <div class="px-3 mt-5 d-flex justify-content-center">

        <div class="col-12 col-md-6">
            <h4 class="text-center text-capitalize">{{ __('messages.q-contact')}}</h4>
            <form action="{{route('contact.store')}}" method="post">
                @csrf
                <div class="mb-3 pt-2 d-flex gap-3 ">
                    <div class="w-50">
                        <label for="name" class="form-label text-capitalize fw-bold">{{
                            __('messages.your-name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>

                    </div>
                    <div class="mb-3 w-50">
                        <label for="email" class="form-label text-capitalize fw-bold">{{
                            __('messages.your-email')}}</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <input type="text" name="service_id" value="{{ $service->id }}" hidden>
                <div class="mb-3">
                    <label for="email" class="form-label text-capitalize fw-bold">{{
                        __('messages.business-email')}}</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-capitalize fw-bold">{{ __('messages.message')}}</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="request-quote-btn quote" style="max-width: 200px;margin: 0">
                    <span">{{ __('messages.send-message-btn')}}</span>
                </button>
            </form>
        </div>
    </div>

</div>


<script>
    const my_form = document.querySelector("form");
    const my_name = document.getElementById("name");

    my_form.addEventListener("submit", function(event) {
        const r = /[^a-z -]/ig;

        if (r.test(my_name.value)) {
            event.preventDefault();


            let errorMessage = document.getElementById("name_error");
            if (!errorMessage) {
                errorMessage = document.createElement("p");
                errorMessage.id = "name_error";
                errorMessage.style.color = "red";
                errorMessage.style.fontSize = "14px";
                errorMessage.style.margin = "5px 0";
                my_name.insertAdjacentElement("afterend", errorMessage);
            }

            my_name.style.border = "2px solid red";
            errorMessage.textContent = "Your name must not have [1-9] or #$%*&@";
        }
    });


    my_name.addEventListener("input", function() {
        this.style.border = "";
        const errorMessage = document.getElementById("name_error");
        if (errorMessage) errorMessage.textContent = "";
    });


    document.addEventListener("DOMContentLoaded", function() {
        let alertBox = document.getElementById("success-alert");
        if (alertBox) {
            alertBox.style.width = "310px";
            alertBox.style.position = "fixed";
            alertBox.style.top = "90px";
            alertBox.style.right = "8px";
            alertBox.style.zIndex = "1050";
            alertBox.style.borderLeft = "5px solid #076767";
            alertBox.style.display = "flex";
            alertBox.style.flexDirection = "column";
        }
    });

    setTimeout(function() {
        let alert = document.getElementById("success-alert");
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500); // Remove after fade out
        }
    }, 2000); // Message disappears after 3 seconds
</script>

@endsection
