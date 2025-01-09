<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Footer Layout</title>
</head>

<body>



    <footer class="pt-5 mt-5 pb-5" >
        <div class="container">
            <div class="main row" style="display:flex; align-items: flex-start;">
                <!-- About Section -->
                <div class="about col-md-5">
                    <img src="{{ asset('public/storage/' . $footer->logo) }} " alt="Logo">
                    <div>
                        <p class="text-white-50">{{ $footer->description['en'] ?? '' }}</p>
                        <p class="text-white-50">
                            <i class="fa-solid fa-phone"></i> {{ $footer->phone }}
                        </p>
                        <p class="text-white-50">
                            <i class="fa-regular fa-envelope"></i> {{ $footer->email }}
                        </p>
                        <div class="map pt-3" >
                            <p class="text-white-50" style="display: flex; align-items: flex-start; gap: 8px;">
                                {{-- <img  src="https://www.google.com/maps/dir/%D9%85%D8%AF%D8%B1%D8%B3%D8%A9+%D8%A7%D9%84%D9%85%D9%86%D9%87%D9%84+%D8%A7%D9%84%D8%AE%D8%A7%D8%B5%D8%A9%D8%8C+%D8%A5%D9%85%D8%AA%D8%AF%D8%A7%D8%AF+%D8%AD%D8%B3%D9%86+%D8%A7%D9%84%D9%85%D8%A3%D9%85%D9%88%D9%86%D8%8C+Al+Asherah,+Nasr+City%E2%80%AD/Abo+Yousef+Elsoury+Restaurant%D8%8C+%D8%A7%D9%84%D8%B4%D8%A7%D8%B1%D8%B9+%2F%D9%85%D8%B5%D8%B7%D9%81%D9%8A+%D8%A7%D9%84%D9%86%D8%AD%D8%A7%D8%B3+_+%D9%85%D8%AF%D9%8A%D9%86%D8%A9+%D9%86%D8%B5%D8%B1+_%D9%82%D8%B3%D9%85%D8%8C+_,+Cairo+Governorate%E2%80%AD/@30.054898,31.3390386,15z/data=!3m1!4b1!4m14!4m13!1m5!1m1!1s0x14583dd9a7125513:0x9ac11dca21fd53b4!2m2!1d31.3579743!2d30.0556297!1m5!1m1!1s0x14583e64ed2d15bd:0x370e46df96e7faeb!2m2!1d31.340724!2d30.0537518!3e2?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D" --}}
                                    {{-- alt="Location Map" style="width: 100px; height: 100px; object-fit: cover;"> --}}
                                    <iframe style="width:90px; height:90px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.9339229339957!2d31.308768715330234!3d30.07709318189238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145838dd02bbfb1b%3A0x6c7bc419b1bb16b5!2sSheraton%20Heliopolis%20Hotel!5e0!3m2!1sen!2seg!4v1645549977550!5m2!1sen!2seg" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur, quos rem dolorem nostrum voluptates enim? Ipsam dolorem saepe error voluptatibus!
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Links Section -->
                <div class="alinks col-md-3" >
                    <h2 class="text-uppercase text-white">Links</h2>
                    @if ($footer->page)
                        @foreach ($footer->page as $page)
                            <ul class="list">
                                <li class="items"><a href="{{ $page['link'] ?? '#' }}">{{ $page['name'] ?? '' }}</a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <p class="text-white-50">No links available.</p>
                    @endif
                </div>

                <!-- Contact Section -->
                <div class="contact col-md-4" >
                    <h2 class="text-uppercase text-white">Contact Us</h2>
                    <div class="input-wrapper">
                        <input type="text" name="text" class="input" placeholder="Your message">
                        <button class="Subscribe-btn">Send</button>
                    </div>
                    <div class="social mt-2">
                        <div class="main">
                            <div class="item facebook-facebook">
                                <a href="{{ $footer->facebook_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                            </div>
                            <div class="item facebook-linkedin">
                                <a href="{{ $footer->linkedin_link }}"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                            <div class="item facebook-whatsapp">
                                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="last mt-5 text-center">
                All copy rights reserved &copy; <span>webania-agency</span>
            </p>
        </div>
    </footer>

</body>

</html>
