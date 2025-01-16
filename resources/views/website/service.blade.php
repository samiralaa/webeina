@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
<div class="container-fluid container-cutout mb--2">
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
                <a class="btn-link" href="https://b-works.io/drupal-agentur-zuerich/">{{
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
