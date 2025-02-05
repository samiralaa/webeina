@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
@section('title', $service->name[app()->getLocale()])

@section('content')
<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/faq-hero.png') }}" alt="portfolio">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.portfolio') }}</div>
        </div>
    </div>
</div>







@endsection
