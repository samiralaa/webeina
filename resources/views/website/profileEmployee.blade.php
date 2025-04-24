@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@section('title', 'Portfolio Page')
@section('content')
<div class="header">
    <img src="Pic 500-04.jpg" alt="Header Background">
</div>

<div class="profile-card">
    <div class="profile-fade-top"></div>
    <div class="profile-content">
        <div class="profile-header">
        <img src="image.png" alt="Profile Image">
        <div class="profile-info">
            <div class="profile-name">Mohammed Al Marzouqi</div>
            <div class="profile-title">Sales Manager</div>
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
                <div class="info-content"><a href="mailto:sales@webenia.com">sales@webenia.com</a></div>
            </div>

            <div class="info-group">
                <div class="info-label">Phone Number :</div>
                <div class="info-content"><a href="tel:+201110844484">+20 111 084 4484</a></div>
                <div class="info-content"><a href="tel:+971505335465">+971 50 533 5465</a></div>
            </div>

            <div class="info-group">
                <div class="info-label">Cairo Location :</div>
                <div class="info-content">
                <a href="https://www.google.com/maps/place/29%C2%B057'37.6%22N+31%C2%B017'48.0%22E/@29.9604308,31.2968759,20z/data=!4m4!3m3!8m2!3d29.9604444!4d31.2966667?entry=ttu&g_ep=EgoyMDI1MDQyMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Rayhana plaza Building C2-Zahraa El Maadi</a>
                </div>
            </div>

            <div class="info-group">
                <div class="info-label">Dubai Location :</div>
                <div class="info-content">
                <a href="https://www.google.com/maps/place/Buildozer+General+Contracting/@24.4797612,54.3546517,17.31z/data=!4m6!3m5!1s0x3e5e67d207f3cd41:0x5ac2be2ba82b9f5a!8m2!3d24.478808!4d54.3543968!16s%2Fg%2F11h1rdmkr_?entry=ttu&g_ep=EgoyMDI1MDQyMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Dubai Municipality,Al-Fahidi,Bur Dubai, UAE</a>
                </div>
            </div>
        </div>
        </div>

        <div id="social-tab" class="tab-content">
        <div class="social-links">
            <a href="https://www.facebook.com/webenia/" class="social-link">
            <img src="{{ asset('assets/images/social-media/facebook.png') }}" alt="Facebook" class="social-icon">
            <span>Facebook</span>
            </a>
            <a href="https://x.com/WebeniaAgency" class="social-link">
            <img src="{{ asset('assets/images/social-media/twitter.png') }}" alt="X" class="social-icon">
            <span>Twitter</span>
            </a>
            <a href="#" class="social-link">
            <img src="{{ asset('assets/images/social-media/instagram.png') }}" alt="Instagram" class="social-icon">
            <span>Instagram</span>
            </a>
            <a href="#" class="social-link">
            <img src="{{ asset('assets/images/social-media/linkedin.png') }}" alt="LinkedIn" class="social-icon">
            <span>LinkedIn</span>
            </a>
        </div>
        </div>
    </div>
</div>
@endsection

