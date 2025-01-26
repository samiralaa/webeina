@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

<style>
    .bigtitle h1{
        font-size: 90px !important;
        font-weight: 300;
    }
    @media (max-width: 767px) {
      .bigtitle h1{
        font-size: 60px !important;
      }
}

</style>
<div class="spase" style="height: 120px ;"></div>
<div class="logo-container" >
<p style="color: #8d99a7;font-size: 0.87rem;margin-left: 2rem;line-height: 1.6;font-weight: 400;letter-spacing: 0.1rem;margin-top: 0.62rem;margin-bottom: 0.62rem;text-transform: uppercase;"><span><span><a href="" class="text-black-50">Home</a></span> » <span ><strong>services</strong></span></span></p>
</div>

<div class="bigtitle container mt-5 pt-5 mb-5 pb-4">
    <h1 class="" >Services</h1>
</div>



<div class="container-fluid container mb--2">
    <div class="row">
        <!-- itemCard -->
        @if($serves)
        @foreach ($serves as $item)


        <div class="col-12 col-sm-12 col-lg-6 col-xl-4 itemService">
            <div class="itemCard__imageWrap">
                <img class="itemCard__image  lazyloaded"
                    src="https://b-works.io/wp-content/uploads/2021/03/CMS-Drupal-B-works.jpg"
                    alt="Drupal Entwicklung und Migration">
            </div>
            <div class="itemCard__header">
                <h3 class="title title--h5 itemCard__title mt-3 mb-3">{{ $item->name[app()->getLocale()] }}
                </h3>
                <div class="flex max-w-full flex-col flex-grow">
                    <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal "
                        dir="auto">
                        <div class="flex w-full flex-col gap-1 empty:hidden">
                            <div class="markdown prose w-full break-words dark:prose-invert light">
                                <p>{{ $item->description[app()->getLocale()] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn-link" href="#">{{
                    $item->name[app()->getLocale()] }} <i class=" fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        @endforeach
        @endif
        <!-- /itemCard -->
        <!-- itemCard -->

        <!-- /itemCard -->
        <!-- itemCard -->

        <!-- /itemCard -->
    </div>
</div>

@endsection
