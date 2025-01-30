@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@section('title', 'Contact-Us Page')

@section('content')

<!-- Hero -->
<div class="container-0-">
    <img class="background-img" src="{{ asset('assets/images/hero/contact-hero.png') }}" alt="Contact-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.contact_us') }}</div>
        </div>
    </div>
</div>

<!-- Contact Us -->
<section class="contact-section py-5 mt-5">
    <div class="container">
        <h2 class="text-center mb-1">Get in Touch</h2>
        <p class="text-center lead">We'd love to hear from you! Reach out to us with your questions or feedback.</p>

        <div class="row mt-5     d-flex justify-content-center">
            {{-- <div class="col-12 col-md-6">
                <img class="img-fluid" src="{{ asset('assets/images/contact-us.png') }}" alt="">
            </div> --}}

            <div class="col-12 col-md-7">
                <h4 class="mb-5">Send Us a Message</h4>

                {{-- start form --}}

                <form action="submit-form.php" method="post">
                <div class="all col-12 d-md-flex" style="gap:50px" >
                <div class="input col-sm-12 col-md-6">


                    <div class=" mb-3 ">
                        <div class="name mb-3">
                            <label for="name" class="form-label text-capitalize fw-bold">First name</label>
                            <input type="text" class="form-control" id="name" name="First-name" required>
                        </div>
                        <div class="last_name mb-3">
                            <label for="email" class="form-label text-capitalize fw-bold">Last name</label>
                            <input type="text" class="form-control" id="L-name" name="Last-name" required>
                        </div>
                    </div>


                    <div class=" mb-3 ">
                        <div class="last_name mb-3">
                            <label for="email" class="form-label text-capitalize fw-bold">Business email</label>
                            <input type="text" class="form-control" id="L-name" name="Business-email" required>
                        </div>
                    </div>



                    <div class="listes mb-3 ">
                        <div class="name mb-3">
                            <label for="country-list" class="text-capitalize fw-bold" >Choose country:</label>
<select  name="country-list"  id="ff_9_country-list" class="ff-el-form-control" placeholder="Select your country" data-name="country-list" aria-required="true">
    <option value="" disabled selected></option>
    <optgroup label="Africa">
        <option value="DZ">Algeria</option>
        <option value="AO">Angola</option>
        <option value="BJ">Benin</option>
        <option value="BW">Botswana</option>
        <option value="Eg">Egypt</option>
        <!-- Add more countries from Africa -->
    </optgroup>
    <optgroup label="Asia">
        <option value="AF">Afghanistan</option>
        <option value="AM">Armenia</option>
        <option value="AZ">Azerbaijan</option>
        <option value="BH">Bahrain</option>
        <!-- Add more countries from Asia -->
    </optgroup>
    <optgroup label="Europe">
        <option value="AL">Albania</option>
        <option value="AD">Andorra</option>
        <option value="AT">Austria</option>
        <option value="BY">Belarus</option>
        <!-- Add more countries from Europe -->
    </optgroup>
    <optgroup label="North America">
        <option value="AG">Antigua and Barbuda</option>
        <option value="BS">Bahamas</option>
        <option value="BB">Barbados</option>
        <option value="BZ">Belize</option>
        <!-- Add more countries from North America -->
    </optgroup>
    <optgroup label="South America">
        <option value="AR">Argentina</option>
        <option value="BO">Bolivia</option>
        <option value="BR">Brazil</option>
        <option value="CL">Chile</option>
        <!-- Add more countries from South America -->
    </optgroup>
    <optgroup label="Oceania">
        <option value="AU">Australia</option>
        <option value="FJ">Fiji</option>
        <option value="KI">Kiribati</option>
        <option value="MH">Marshall Islands</option>
        <!-- Add more countries from Oceania -->
    </optgroup>
</select>
</div>

                     </div>
                     <div class="name mb-3 ">
                        <label for="name" class="form-label text-capitalize fw-bold" >company</label>
                        <input type="text" class="form-control" id="company-name" name="company" required>
                    </div>
                    <div class=" mb-3 mb-4 ">
                        <div class="name mb-3">
                            <label for="name" class="form-label text-capitalize fw-bold" >Business title (optional)</label>
                            <input type="text" class="form-control" id="company-name" name="Business-title" >
                        </div>
 </div>
        </div>


        <div class="check col-sm-12 col-md-6">
            <div class="checkboxex d-flex flex-column pt-3 pt-md-0 pb-3">
                <label for="services" class="text-capitalize fw-bold">Choose services:</label>
            <div id="services" class="d-flex flex-column">
                <label>
                    <input type="checkbox" name="services" value="ui">
                    UI/UX
                </label>
                <label>
                    <input type="checkbox" name="services" value="wb">
                    Web Development
                </label>
                <label>
                    <input type="checkbox" name="services" value="se">
                    Sales
                </label>
                <label>
                    <input type="checkbox" name="services" value="ts">
                    Technical Support
                </label>
                <label>
                    <input type="checkbox" name="services" value="hr">
                    Human Resource
                </label>
                <label>
                    <input type="checkbox" name="services" value="others">
                    Others
                </label>
            </div>
            </div>
        </div>
    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label text-capitalize fw-bold" >About Your Project</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required placeholder="Tell us more about your project"></textarea>
                    </div>
                    <button type="submit" class="request-quote-btn quote" style="max-width: 200px;margin: 0">
                        <span">Send Request</span>
                    </button>
                </form>
            </div>
        </div>
        {{-- end form --}}


        {{-- start Q-contact --}}

        <div class="Q-contact pt-5 pb-5">

         {{--   <div class="row mt-5 d-flex justify-content-center ">
                <div class="col-12 col-md-6">
                <img class="img-fluid" src="{{ asset('assets/images/contact-us.png') }}" alt="">
                </div>

                <div class="col-12 col-md-6">
                    <h4 class="text-center text-capitalize">quick contact</h4>
                    <form action="submit-form.php" method="post">
                        <div class="mb-3 pt-2 d-flex gap-3 ">
                            <div class="w-50">
                                <label for="name" class="form-label text-capitalize fw-bold">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            </div>
                            <div class="mb-3 w-50">
                                <label for="email" class="form-label text-capitalize fw-bold">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-capitalize fw-bold">Business email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label text-capitalize fw-bold">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </form>
                </div>
            </div>

        </div> --}}


        {{-- end Q-contact --}}
        <div class="our-locations pt-5">
            <h2 class="text-center">Our Locations</h2>
            <div class="container" style="min-height: 500px; gap:80px ; ">
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
