@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Frequently Asked Questions</h1>
    {{-- add faq route --}}
    <a href="{{ route('faq.create') }}" class="btn btn-primary mb-3">Add FAQ</a>
    {{-- add faq route --}}

    <div class="accordion" id="faqAccordion">
        @foreach ($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $faq['id'] }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $faq['id'] }}" aria-expanded="false"
                    aria-controls="collapse{{ $faq['id'] }}">


                    {{ $faq->question[app()->getLocale()] ?? 'N/A' }}</li>
                </button>
            </h2>
            <div id="collapse{{ $faq['id'] }}" class="accordion-collapse collapse"
                aria-labelledby="heading{{ $faq['id'] }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection
