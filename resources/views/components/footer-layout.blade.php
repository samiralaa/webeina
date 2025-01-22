<footer>
    <div class="footer-row1">
        <div class="container">
            <div class="row justify-content-between gy-4">
                <div class="col-lg-4 col-md-6 d-flex flex-column">
                    <a class="navbar-brand align-self-start" href="#">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo" width="100">
                    </a>
                    <p>
                        <span class="webenia">WEBENIA</span> is a virtual department that helps organizations expand their business by enhancing leads and sales from their website, focusing on maximizing ROI.
                    </p>
                    <h5 class="head">Locations</h5>
                    <div class="locations">
                        <a href="https://maps.app.goo.gl/32MvC2fBcoVZseD1A">
                            <i class="fa-solid fa-location-dot"></i> Cairo Branch
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-location-dot"></i> Dubai Branch
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="head">Webenia Contacts</h5>
                    <ul class="footer-address-list">
                        @if (app()->getLocale() === 'ar')
                        <li>
                            <i class="fas fa-envelope cicon"></i>
                            <p>البريد الالكتروني: <a href="mailto:info@webenia.com">info@webenia.com</a></p>
                        </li>
                        <li>
                            <i class="fab fa-skype cicon"></i>
                            <p>سكايبي: <a href="skype:live:.cid.bedd6a433022c5ca?call">webenia</a></p>
                        </li>
                        </li>
                        @else
                        <li>
                            <i class="fas fa-envelope cicon"></i>
                            <p>Email: <a href="mailto:info@webenia.com">info@webenia.com</a></p>
                        </li>
                        <li>
                            <i class="fab fa-skype cicon"></i>
                            <p>Skype: <a href="skype:live:.cid.bedd6a433022c5ca?call">webenia</a></p>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="head">Quick Links</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Digital Transformation</a></li>
                        <li><a href="#">Web Solutions</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Mobile Solutions</a></li>
                        <li><a href="#">Digital Content</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-row2">
        <div class="container">
            <div class="footer-social-media-icons">
                <a href="#" target="_blank"><i class="s-media fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-youtube"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-snapchat"></i></a>
                <a href="#" target="_blank"><i class="s-media fab fa-tiktok"></i></a>
            </div>
            <p>
                &copy; 2025 <a class="webenia" href="https://webenia.com" target="_blank">WEBENIA</a>. All rights reserved.
            </p>
        </div>
    </div>
</footer>

