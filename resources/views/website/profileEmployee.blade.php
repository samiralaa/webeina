@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@section('title', 'Profile Page')

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
                <div class="info-content"><a href="mailto:Mohammed.Al-Marzouqi@webenia.com">Mohammed.Al-Marzouqi@webenia.com</a></div>
            </div>

            <div class="info-group">
                <div class="info-label">Phone Number :</div>
                <div class="info-content"><a href="tel:01270818322">01270818322</a></div>
            </div>

            <div class="info-group">
                <div class="info-label">Cairo Location :</div>
                <div class="info-content">
                <a href="https://maps.google.com?q=Rayhana+plaza+Building+C2-Zahraa+El+Maadi" target="_blank">Rayhana plaza Building C2-Zahraa El Maadi</a>
                </div>
            </div>

            <div class="info-group">
                <div class="info-label">Dubai Location :</div>
                <div class="info-content">
                <a href="https://maps.google.com?q=Dubai+Municipality,Al-Fahidi,Bur+Dubai,UAE" target="_blank">Dubai Municipality,Al-Fahidi,Bur Dubai, UAE</a>
                </div>
            </div>
        </div>
        </div>

        <div id="social-tab" class="tab-content">
        <div class="social-links">
            <a href="#" class="social-link">
            <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook" class="social-icon">
            <span>Facebook</span>
            </a>
            <a href="#" class="social-link">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="social-icon">
            <span>Twitter</span>
            </a>
            <a href="#" class="social-link">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="social-icon">
            <span>Instagram</span>
            </a>
            <a href="#" class="social-link">
            <img src="https://cdn-icons-png.flaticon.com/512/3536/3536505.png" alt="LinkedIn" class="social-icon">
            <span>LinkedIn</span>
            </a>
        </div>
        </div>
    </div>
</div>
@endsection
