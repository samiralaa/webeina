@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
@section('title', 'Home Page')

@section('content')

<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/services.jpg') }}" loading="lazy" alt="FAQ">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.services') }}</div>
        </div>
        <div class="spase" style="height: 120px ;"></div>
        <div class="logo-container">
            <p style="color: #8d99a7;font-size: 0.87rem;margin-left: 2rem;line-height: 1.6;font-weight: 400;letter-spacing: 0.1rem;margin-top: 0.62rem;margin-bottom: 0.62rem;text-transform: uppercase;"><span><span><a href="" class="text-white-50">{{ __('messages.home') }}</a></span> » <span><strong>{{ __('messages.services') }}</strong></span></span></p>
        </div>
    </div>
</div>


<style>
    .bigtitle h1 {
        font-size: 90px !important;
        font-weight: 300;
    }

    @media (max-width: 767px) {
        .bigtitle h1 {
            font-size: 60px !important;
        }
    }
</style>


<div class="bigtitle container mt-5 pt-5 mb-5 pb-4">

</div>



<section class="our_services container-fluid container mb--2 pt-5 pb-5" role="region" aria-label="Our Services Section">
    <div class="row">
        <!-- itemCard -->
        @if($serves)
        @foreach ($serves as $item)
        <article class="services-items col-12 col-sm-12 col-lg-6 col-xl-4 itemService pb-5 pb-md-3" role="article" aria-label="{{ $item->name[app()->getLocale()] }}">
            <div class="itemCard__imageWrap">
                <img class="itemCard__image lazyloaded" loading="lazy"
                    src="{{ asset('public/storage/' . $item->icon) }}"
                    alt="{{ $item->name[app()->getLocale()] }} - {{ __('messages.service_image') }}" title="{{ $item->name[app()->getLocale()] }}">
            </div>
            <div class="itemCard__header">
                <h3 class="title title--h5 itemCard__title mt-3 mb-3">{{ $item->name[app()->getLocale()] }}</h3>
                <div class="flex max-w-full flex-col flex-grow">
                    <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal" dir="auto">
                        <div class="flex w-full flex-col gap-1 empty:hidden">
                            <div class="markdown prose w-full break-words dark:prose-invert light">
                                <p>{{ $item->description[app()->getLocale()] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn-link" href="{{ route('serves.details', ['id' => $item->slug]) }}"
                    title="{{ $item->name[app()->getLocale()] }}">
                    {{ $item->name[app()->getLocale()] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>




            </div>
        </article>
        @endforeach
        @endif
    </div>
</section>

@endsection
