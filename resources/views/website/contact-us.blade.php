@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@section('title', 'Contact-Us Page')

@section('content')

<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/contact-hero.png') }}" alt="Contact-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">Contact Us</div>
        </div>
    </div>
</div>

<!-- Contact Us -->
<section class="contact-section py-5 mt-5">
    <div class="container">
        <h2 class="text-center mb-4">Get in Touch</h2>
        <p class="text-center lead">We'd love to hear from you! Reach out to us with your questions or feedback.</p>

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <img class="img-fluid" src="{{ asset('assets/images/contact-us.png') }}" alt="">
            </div>

            <div class="col-12 col-md-6">
                <h4>Send Us a Message</h4>
                <form action="submit-form.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Send Message</button>
                </form>
            </div>
        </div>
        <div class="locations">
            <h2 class="text-center">Our Locations</h2>
            <div class="container" style="min-height: 500px;">
                <div class="location col-12 col-md-6">
                    <h5 class="mt-5 mb-2">Dubai Office:</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6906.826275125326!2d31.356819099999996!3d30.053690099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1734935392128!5m2!1sar!2seg" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="location col-12 col-md-6">
                    <h5 class="mt-5 mb-2">Cairo Office:</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3453.4117809543673!2d31.356859999999998!3d30.053729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDAzJzEzLjQiTiAzMcKwMjEnMjQuNyJF!5e0!3m2!1sar!2seg!4v1737545059195!5m2!1sar!2seg" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
</section>
@endsection
