@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/service-details.css') }}">
@section('title', $service->name[app()->getLocale()])

@section('content')
<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/about-hero.png') }}" alt="{{ $service->name[app()->getLocale()] }}">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ $service->name[app()->getLocale()] }}</div>
            <div class="text-3">{{ $service->description[app()->getLocale()] }}</div>
        </div>
    </div>
</div>

    <div class="container pt-5 pb-5">
        <h1 class="text-captlize pb-4">Features</h1>
    </div>
<section class="feature-section">
    <div class="container features">
        <div class="left-panel">
            <!-- Dropdown for smaller screens -->
            <select class="feature-dropdown" aria-label="Select a service" onchange="showDetails(this.value)">
                @foreach ($service->contents as $content)
                <option value="details{{ $content->id }}">{{ $content->title[app()->getLocale()] ?? $content->title['en'] }}</option>
                @endforeach
            </select>

            <!-- Original list for larger screens -->
            <ul class="feature-list">
                @foreach ($service->contents as $content)
                <li onclick="showDetails('details{{ $content->id }}')">{{ $content->title[app()->getLocale()] ?? $content->title['en'] }}</li>
                @endforeach
            </ul>
        </div>

    <div class="verticalline">
        <div class="select"></div>
    </div>

    <div class="right-panel">
        @foreach ($service->contents as $content)
        <div id="details{{ $content->id }}" class="details">
            <h2>{{ $content->title[app()->getLocale()] ?? $content->title['en'] }}</h2>
            <p>{{ $content->description[app()->getLocale()] ?? $content->description['en'] }}</p>
        </div>
        @endforeach
    </div>
    </div>


      {{-- start Q-contact --}}

      <div class="Q-contact pt-5 pb-5">

         <div class="row mt-5 d-flex justify-content-center ">
               {{-- <div class="col-12 col-md-6">
               <img class="img-fluid" src="{{ asset('assets/images/contact-us.png') }}" alt="">
               </div> --}}

               <div class="col-12 col-md-6">
                   <h4 class="text-center text-capitalize">quick contact</h4>
                   <form action="{{route('contact.store')}}" method="post">
                   @csrf
                       <div class="mb-3 pt-2 d-flex gap-3 ">
                           <div class="w-50">
                               <label for="name" class="form-label text-capitalize fw-bold">Your Name</label>
                           <input type="text" class="form-control" id="name" name="name" required>

                           </div>
                           <div class="mb-3 w-50">
                               <label for="email" class="form-label text-capitalize fw-bold">Your Email</label>
                               <input type="email" class="form-control" id="email" name="email" required>
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="email" class="form-label text-capitalize fw-bold">Business email</label>
                           <input type="email" class="form-control" id="email" name="email" required>
                       </div>
                       <div class="mb-3">
                           <label for="message" class="form-label text-capitalize fw-bold">Message</label>
                           <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                       </div>
                       <button type="submit" class="btn btn-success">Send Message</button>
                   </form>
               </div>
           </div>

       </div>


       {{-- end Q-contact --}}


</section>

@endsection
