@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@section('title', 'Contact-Us Page')

@section('content')

<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/banner/contact.jpg') }}" loading="lazy" alt="Contact-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.contact_us') }}</div>
        </div>
    </div>
</div>

<!-- Contact Us -->
<section class="contact-section py-5 mt-5">
    <div class="container">
        <h2 class="text-center mb-1">{{ __('messages.contact-section-title') }}</h2>
        <p class="text-center lead">{{ __('messages.contact-section-subtitle') }}</p>

        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-12 col-md-7">
                <h4 class="mb-5">{{ __('messages.send-message') }}</h4>

                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label fw-bold">{{ __('messages.first-name') }}</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label fw-bold">{{ __('messages.last-name') }}</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="business_email" class="form-label fw-bold">{{ __('messages.business-email') }}</label>
                            <input type="email" class="form-control" id="business_email" name="business_email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label fw-bold">{{ __('messages.company') }}</label>
                            <input type="text" class="form-control" id="company" name="company" required>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <label class="fw-bold">{{ __('messages.choose-services') }}</label>
                        <div class="d-flex flex-column">
                            @foreach ($serves as $ser)
                                <label>
                                    <input type="checkbox" name="service_id[]" value="{{$ser->id}}"> {{ $ser->name[app()->getLocale()] }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <label for="message" class="form-label fw-bold">{{ __('messages.about-project') }}</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required placeholder="{{ __('messages.about-project-placeholder') }}"></textarea>
                    </div>
                    <button type="submit" class="request-quote-btn quote mt-3 mx-0">
                        <span>{{ __('messages.send-request') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="our-locations pt-5">
        <h2 class="text-center">{{ __('messages.our-locations') }}</h2>
        <div class="container d-flex justify-content-center" style="gap:80px; min-height: 500px;">
            <div class="location col-12 col-md-6">
                <h5 class="mt-5 mb-2">{{ __('messages.dubai-office') }}</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6906.826275125326!2d31.356819099999996!3d30.053690099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1734935392128!5m2!1sar!2seg" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="location col-12 col-md-6">
                <h5 class="mt-5 mb-2">{{ __('messages.cairo-office') }}</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d611.0558229509542!2d31.296905178337852!3d29.96063723174124!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDU3JzM3LjYiTiAzMcKwMTcnNDguMCJF!5e0!3m2!1sar!2seg!4v1743075458667!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
