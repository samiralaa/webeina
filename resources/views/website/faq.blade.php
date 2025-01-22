@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@section('title', 'FAQs Page')

@section('content')


<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/faq-hero.png') }}" alt="FAQ">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">FAQS</div>
        </div>
    </div>
</div>

<div class="wrapper">

    @foreach($faqs as $key => $faq)



    <div class="faq container">
        <div class="question">
            {{ json_decode($faq->question, true)[app()->getLocale()] }}
        </div>
        <div class="answercont">
            <div class="answer">
                {{ json_decode($faq->answer, true)[app()->getLocale()] }}
                <a href="https://blog.codepen.io/documentation/faq/how-do-i-contact-the-creator-of-a-pen/"></a>
            </div>
        </div>
    </div>
    @endforeach


</div>


<!-- overlay widget js -->
<script src="{{ asset('assets/vendor/overlay-widget/js/overlay-widget.js') }}"></script>
<script>
    kofiWidgetOverlay.draw('mohamedghulam', {
        'type': 'floating-chat',
        'floating-chat.donateButton.text': 'Support me',
        'floating-chat.donateButton.background-color': '#323842',
        'floating-chat.donateButton.text-color': '#fff'
    });
</script>
@endsection
