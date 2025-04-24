@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@section('title', 'Portfolio Page')

@section('content')
<div class="header">
<img src="{{ asset($profile->image ?? 'assets/images/default-profile.png') }}" alt="Profile Image">
</div>

<div class="profile-card">
    <div class="profile-fade-top"></div>
    <div class="profile-content">
        <div class="profile-header">
<img src="{{ asset('uploads/' . $profile->image) }}" alt="Profile Image">
            <div class="profile-info">
                <div class="profile-name">{{ $profile->name }}</div>
                <div class="profile-title">{{ $profile->job_title }}</div>
            </div>
        </div>

        <div class="tabs">
            <div class="tab active" onclick="switchTab('personal')">Personal Info</div>
            <div class="tab" onclick="switchTab('social')">Social Info</div>
        </div>

        <div id="personal-tab" class="tab-content active">
            <div class="info-groups">
                <div class="info-group">
                    <div class="info-label">Email :</div>
                    <div class="info-content"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></div>
                </div>

                <div class="info-group">
                    <div class="info-label">Phone Number :</div>
                    <div class="info-content"><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></div>
                </div>

                @if ($profile->location)
                <div class="info-group">
                    <div class="info-label">Additional Location :</div>
                    <div class="info-content">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($profile->location) }}" target="_blank">{{ $profile->location }}</a>
                    </div>
                </div>
                @endif

                <div class="info-group">
                    <div class="info-label">Cairo Location :</div>
                    <div class="info-content">
                        <a href="https://www.google.com/maps?q=Rayhana+plaza+Building+C2-Zahraa+El+Maadi" target="_blank">Rayhana plaza Building C2-Zahraa El Maadi</a>
                    </div>
                </div>

                <div class="info-group">
                    <div class="info-label">Dubai Location :</div>
                    <div class="info-content">
                        <a href="https://www.google.com/maps?q=Dubai+Municipality+Al-Fahidi+Bur+Dubai" target="_blank">Dubai Municipality, Al-Fahidi, Bur Dubai, UAE</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="social-tab" class="tab-content">
            <div class="social-links">
                @if ($profile->facebook)
                <a href="{{ $profile->facebook }}" class="social-link">
                    <img src="{{ asset('assets/images/social-media/facebook.png') }}" alt="Facebook" class="social-icon">
                    <span>Facebook</span>
                </a>
                @endif
                @if ($profile->twitter)
                <a href="{{ $profile->twitter }}" class="social-link">
                    <img src="{{ asset('assets/images/social-media/twitter.png') }}" alt="Twitter" class="social-icon">
                    <span>Twitter</span>
                </a>
                @endif
                @if ($profile->linkedin)
                <a href="{{ $profile->linkedin }}" class="social-link">
                    <img src="{{ asset('assets/images/social-media/linkedin.png') }}" alt="LinkedIn" class="social-icon">
                    <span>LinkedIn</span>
                </a>
                @endif

                @if ($profile->website)
                <a href="{{ $profile->website }}" class="social-link">
                    <img src="{{ asset('assets/images/social-media/website.png') }}" alt="Website" class="social-icon">
                    <span>Website</span>
                </a>
                @endif
        
            </div>
        </div>
    </div>
</div>
@endsection
