<footer role="contentinfo">
    <div class="footer-row1">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-4 col-md-6 d-flex flex-column">
                    <a class="navbar-brand align-self-start" href="{{ route('home') }}" aria-label="Home">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="WEBENIA Logo - Digital Solutions Provider" title="WEBENIA Logo" width="100">
                    </a>
                    <div class="locations">
                        <div>
                            <p>{{ __('messages.c-office') }}</p>
                            <a href="https://maps.app.goo.gl/hz7zB9gjAP6J4rxq5" aria-label="Cairo Office Location">
                                <i class="fa-solid fa-location-dot"></i> {{ __('messages.c-location') }}
                            </a>
                        </div>
                        <div>
                            <p>{{ __('messages.d-office') }}</p>
                            <a href="#" aria-label="Dubai Office Location">
                                <i class="fa-solid fa-location-dot"></i> {{ __('messages.d-location') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h2 class="head">{{ __('messages.webenia_contacts') }}</h2>
                    <ul class="footer-address-list">
                        <li>
                            <i class="fas fa-envelope cicon"></i>
                            <p>{{ __('messages.email') }}: <a href="mailto:info@webenia.com" title="Email WEBENIA">info@webenia.com</a></p>
                        </li>
                        <li>
                            <i class="fab fa-skype cicon"></i>
                            <p>{{ __('messages.skype') }}: <a href="skype:live:.cid.bedd6a433022c5ca?call" title="Call WEBENIA on Skype">webenia</a></p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h2 class="head">{{ __('messages.quick_links') }}</h2>
                    <ul class="footer-address-list link-hover">
                        <li><p><a class="lh" href="{{ route('about-us') }}" title="About WEBENIA">{{ __('messages.about_us') }}</a></p></li>
                        @foreach ($services as $service)
                        
                        <li><p><a class="lh" href="{{ route('serves.details', ['id' => $service->slug]) }}" title="{{ $service->name[app()->getLocale()] }}" title="Digital Transformation Services"> {{ $service->name[app()->getLocale()] }}</a></p></li>
                        @endforeach
                        <li><p><a class="lh" href="{{ route('contact') }}" title="About WEBENIA">{{ __('messages.contact_us') }}</a></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-row2">
        <div class="container">
            <div class="footer-social-media-icons">
                <a href="https://www.facebook.com/webenia" target="_blank" rel="nofollow" aria-label="Facebook"><i class="s-media fab fa-facebook"></i></a>
                <a href="https://x.com/WebeniaAgency" target="_blank" rel="nofollow" aria-label="Twitter"><i class="s-media fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/webeniaagency/" target="_blank" rel="nofollow" aria-label="Instagram"><i class="s-media fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/webenia/" target="_blank" rel="nofollow" aria-label="LinkedIn"><i class="s-media fab fa-linkedin"></i></a>
                <a href="https://www.youtube.com/@Webenia" target="_blank" rel="nofollow" aria-label="YouTube"><i class="s-media fab fa-youtube"></i></a>
                <a href="https://www.snapchat.com/add/webenia.com?share_id=vnUoHjOPTXY&locale=en-US " target="_blank" rel="nofollow" aria-label="Snapchat"><i class="s-media fab fa-snapchat"></i></a>
                <a href="https://www.tiktok.com/@webenia.com?lang=en" target="_blank" rel="nofollow" aria-label="TikTok"><i class="s-media fab fa-tiktok"></i></a>
            </div>
            <p>
                &copy; 2025 <a class="webenia" href="https://webenia.com" target="_blank" title="WEBENIA Official Website">WEBENIA</a>. All rights reserved.
            </p>
        </div>
    </div>
</footer>