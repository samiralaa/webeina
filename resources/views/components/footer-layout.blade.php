<footer role="contentinfo">
    <div class="footer-row1">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-4 col-md-6 d-flex flex-column">
                    <a class="navbar-brand align-self-start" href="{{ route('home') }}" aria-label="Home">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="WEBENIA Logo - Digital Solutions Provider" title="WEBENIA Logo" width="100">
                    </a>
                    <p>
                        <span class="webenia">WEBENIA</span> is a virtual department that helps organizations expand their business by enhancing leads and sales from their website, focusing on maximizing ROI.
                    </p>
                    <h2 class="head">{{ __('messages.locations') }}</h2>
                    <div class="locations">
                        <div>
                            <a href="https://maps.app.goo.gl/32MvC2fBcoVZseD1A" aria-label="Cairo Office Location">
                                <i class="fa-solid fa-location-dot"></i> Cairo Office
                            </a>
                            <p>10 Doctor Hassan El-Sherif, Nasr City, Cairo</p>
                        </div>
                        <div>
                            <a href="#" aria-label="Dubai Office Location">
                                <i class="fa-solid fa-location-dot"></i> Dubai Office
                            </a>
                            <p>Office 43-44, Building of Dubai Municipality, Al-Fahidi, Bur Dubai, UAE</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h2 class="head">{{ __('messages.webenia_contacts') }}</h2>
                    <ul class="footer-address-list">
                        <li>
                            <i class="fas fa-envelope cicon"></i>
                            <p>Email: <a href="mailto:info@webenia.com" title="Email WEBENIA">info@webenia.com</a></p>
                        </li>
                        <li>
                            <i class="fab fa-skype cicon"></i>
                            <p>Skype: <a href="skype:live:.cid.bedd6a433022c5ca?call" title="Call WEBENIA on Skype">webenia</a></p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h2 class="head">{{ __('messages.quick_links') }}</h2>
                    <ul class="footer-address-list link-hover">
                        <li><a class="lh" href="{{ route('about-us') }}" title="About WEBENIA">About</a></li>
                        @foreach ($services as $service)

                        <li><a class="lh" href="{{ route('serves.details', ['id' => $service->slug]) }}" title="{{ $service->name[app()->getLocale()] }}" title="Digital Transformation Services"> {{ $service->name[app()->getLocale()] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-row2">
        <div class="container">
            <div class="footer-social-media-icons">
                <a href="#" target="_blank" rel="nofollow" aria-label="Facebook"><i class="s-media fab fa-facebook"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="Twitter"><i class="s-media fab fa-twitter"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="Instagram"><i class="s-media fab fa-instagram"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="LinkedIn"><i class="s-media fab fa-linkedin"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="YouTube"><i class="s-media fab fa-youtube"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="Snapchat"><i class="s-media fab fa-snapchat"></i></a>
                <a href="#" target="_blank" rel="nofollow" aria-label="TikTok"><i class="s-media fab fa-tiktok"></i></a>
            </div>
            <p>
                &copy; 2025 <a class="webenia" href="https://webenia.com" target="_blank" title="WEBENIA Official Website">WEBENIA</a>. All rights reserved.
            </p>
        </div>
    </div>
</footer>