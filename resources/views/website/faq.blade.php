@extends('website.layouts.main')

@section('title', 'FAQs Page')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Frequently Asked Questions</h1>
    <div class="accordion" id="faqAccordion">
        @foreach($faqs as $key => $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $key }}">
                <button class="accordion-button {{ $key !== 0 ? 'collapsed' : '' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $key }}"
                        aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $key }}">
                        {{ json_decode($faq->question, true)[app()->getLocale()] }}
                </button>
            </h2>
            <div id="collapse{{ $key }}"
                 class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                 aria-labelledby="heading{{ $key }}"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                   {{ json_decode($faq->answer, true)[app()->getLocale()] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
