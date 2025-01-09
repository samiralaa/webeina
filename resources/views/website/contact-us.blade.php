@extends('website.layouts.main')



@section('content')
    <main>
        <!-- ==== banner start ==== -->
        <section class="cmn-banner bg-img" data-background="assets/images/banner/cmn-banner-bg.png">
            <div class="container">
                <div class="row gaper align-items-center">
                    <div class="col-12 col-lg-5 col-xl-7">
                        <div class="text-center text-lg-start">
                            <h2 class="title title-anim">Contact Us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Contact Us
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-5">
                        <div class="text-center text-lg-start">
                            <p class="primary-text">
                                Reach us now and start your digital transformation
                                journey.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / banner end ==== -->
        <!-- ==== contact start ==== -->
        <section class="section contact-m fade-wrapper">
            <div class="container">
                <div class="row gaper">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="contact-m__single topy-tilt fade-top">
                            <div class="thumb">
                                <img src="assets/images/phone.png" alt="Image" />
                                <!-- <i class="fa-regular fa-envelope"></i> -->
                            </div>
                            <div class="content">
                                <h4>Phone </h4>
                                <p>
                                    <a href="tel:+971 565 020 303">Mobile :(+971) 565 020 303</a>
                                </p>
                                <p>
                                    <!-- <a href="tel:197-90-56-780">Fax : +44-208-1234567</a> -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="contact-m__single topy-tilt fade-top">
                            <div class="thumb">
                                <img src="assets/images/mail.png" alt="Image" />
                            </div>
                            <div class="content">
                                <h4>Mail Address</h4>
                                <p>
                                    <!-- <a href="mailto:info.company@gmail.com"
              >Info.company@gmail.com</a
            > -->
                                </p>
                                <p>
                                    <a href="mailto:info@webenia.com">info@webenia.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="contact-m__single topy-tilt fade-top">
                            <div class="thumb">
                                <img src="assets/images/location.png" alt="Image" />
                            </div>
                            <div class="content">
                                <h4>Our Location</h4>
                                <p>
                                    <!-- <a
              href="https://www.google.com/maps/d/viewer?mid=1UZ57Drfs3SGrTgh6mrYjQktu6uY&hl=en_US&ll=18.672105000000013%2C105.68673800000003&z=17"
              target="_blank"
            > -->
                                    Abu Dhabi, UAE <br>
                                    Nasr City, Cairo, Egypt
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="contact-m__single topy-tilt fade-top">
                            <div class="thumb">
                                <img src="assets/images/time.png" alt="Image" />
                            </div>
                            <div class="content">
                                <h4>Office Hour</h4>
                                <p>Sat - Thu 09 am - 06pm</p>
                                <!-- <p>Fri - Sat 4 pm - 10pm</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="map-wrapper">
                            <div class="row gaper">
                                <div class="col-12 col-lg-6">
                                    <div class="contact__map fade-top">
                                        <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20342.411046372905!2d-74.16638039276373!3d40.719832743885284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1649562691355!5m2!1sen!2sbd"
                width="100"
                height="800"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe> -->
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.35224776608!2d31.356262628458076!3d30.053808998425893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583d0ee5b7a1bb%3A0xb904e86b2af8e442!2sElegant%20office%20furniture!5e0!3m2!1sen!2seg!4v1730199381241!5m2!1sen!2seg"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="contact-main__form fade-top">
                                        <h3>Leave A Message</h3>
                                        <form action="{{ route('contact.store') }}" method="post" class="section__content-cta">
                                            @csrf
                                            <div class="group-wrapper">
                                                <div class="group-input">
                                                    <input type="text" name="name" id="contactName"
                                                        placeholder="Name" />
                                                </div>
                                                <div class="group-input">
                                                    <input type="email" name="email" id="contactEmail"
                                                        placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="group-input">
                                                <select class="subject" name="subject">
                                                    <option data-display="Subject">
                                                        Subject
                                                    </option>
                                                    <option value="Account">Account</option>
                                                    <option value="Service">Service</option>
                                                    <option value="Pricing">Pricing</option>
                                                    <option value="Support">Support</option>
                                                </select>
                                            </div>
                                            <div class="group-input">
                                                <textarea name="message" id="contactMessage" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-cta justify-content-start">
                                                <button type="submit" class="btn btn--primary">
                                                    Send Message
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / contact end ==== -->
    </main>
@endsection
