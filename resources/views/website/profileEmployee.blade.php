<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />
    <title>Document</title>
    <!-- #keywords -->
    <meta name="keywords" content="creative, agency, portfolio" />
    <!-- #description -->
    <meta name="description" content="Creative Agency Portfolio HTML5 Template" />
    <!-- bootstrap five css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <div class="header">
    <img src="{{ asset('/uploads/images/Pic 500-04.jpg') }}" alt="Header Background">
    </div>

    <div class="profile-card">
        <div class="profile-fade-top"></div>
        <div class="profile-content">
            <div class="profile-header">
                <img src="{{ asset('public/uploads/' . $profile->image) }}" alt="Profile Image">
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
                        <div class="info-content"><a href="mailto:sales@webenia.com">sales@webenia.com</a></div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Phone Number :</div>
                        <div class="info-content"><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></div>
                        <div class="info-content"><a href="tel:+971505335465">+971 50 533 5465</a></div>
                        <div class="info-content"><a href="tel:+201110844484">+20 111 084 4484</a></div>
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
                        <div class="info-label">Abu Dhabi Location :</div>
                        <div class="info-content">
                        <a href="https://www.google.com/maps/place/Buildozer+General+Contracting/@24.4797612,54.3546517,17.31z/data=!4m6!3m5!1s0x3e5e67d207f3cd41:0x5ac2be2ba82b9f5a!8m2!3d24.478808!4d54.3543968!16s%2Fg%2F11h1rdmkr_?entry=ttu&g_ep=EgoyMDI1MDQyMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Remah Tower, Zayed The First Street, Abu Dhabi, UAE</a>
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
                    <a href="https://www.instagram.com/webeniaagency/" class="social-link">
                        <img src="{{ asset('assets/images/social-media/instagram.png') }}" alt="Instagram" class="social-icon">
                        <span>Instagram</span>
                    </a>
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
    <!--  jquery js  -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.7.0.min.js') }}"></script>
    <!-- bootstrap five js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
