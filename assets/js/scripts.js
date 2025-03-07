// Navbar //
const stickyNavbar = document.querySelector('.navbar.sticky-navbar')
document.addEventListener("scroll", () => {
    if (window.scrollY > 36) {
        stickyNavbar.classList.add('scrolling');
    }else {
        stickyNavbar.classList.remove('scrolling');
    }
})


document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuToggle = document.getElementById("mobileMenuToggle");
    const mobileNav = document.getElementById("mobileNav");
    const closeMobileNav = document.getElementById("closeMobileNav");

    // Open Mobile Menu
    mobileMenuToggle.addEventListener("click", function () {
        mobileNav.classList.add("active");
    });

    // Close Mobile Menu
    closeMobileNav.addEventListener("click", function () {
        mobileNav.classList.remove("active");
    });

    // Close Menu when clicking outside
    document.addEventListener("click", function (event) {
        if (!mobileNav.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
            mobileNav.classList.remove("active");
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const mobileServices = document.getElementById("mobileServicesToggle");
    
    if (mobileServices) {
        mobileServices.addEventListener("click", function(event) {
            event.preventDefault();
            this.parentElement.classList.toggle("active");
        });
    }
});



// Mouse Follow Effect //
console.clear();

const circleElement = document.querySelector('.circle');
const dotElement = document.querySelector('.dot');
const mouse = { x: 0, y: 0 };
const previousMouse = { x: 0, y: 0 }
const circle = { x: 0, y: 0 };
let currentScale = 0;
let currentAngle = 0;

const linksAndButtons = document.querySelectorAll('a, button');

linksAndButtons.forEach((element) => {
    element.addEventListener('mouseenter', () => {
        circleElement.classList.add('big');
        dotElement.classList.add('vanish');
    });

    element.addEventListener('mouseleave', () => {
        circleElement.classList.remove('big');
        dotElement.classList.remove('vanish');
    });
});

window.addEventListener('mousemove', (e) => {
    mouse.x = e.x;
    mouse.y = e.y;
});

const speed = 0.35;
const tick = () => {
    circle.x += (mouse.x - circle.x) * speed;
    circle.y += (mouse.y - circle.y) * speed;

    const translateTransform = `translate(${circle.x}px, ${circle.y}px)`;
    const deltaMouseX = mouse.x - previousMouse.x;
    const deltaMouseY = mouse.y - previousMouse.y;

    previousMouse.x = mouse.x;
    previousMouse.y = mouse.y;

    const mouseVelocity = Math.min(Math.sqrt(deltaMouseX**2 + deltaMouseY**2) * 4, 150);
    const scaleValue = (mouseVelocity / 150) * 0.5;
    currentScale += (scaleValue - currentScale) * speed;

    const scaleTransform = `scale(${1 + currentScale}, ${1 - currentScale})`;
    const angle = Math.atan2(deltaMouseY, deltaMouseX) * 180 / Math.PI;

    if (mouseVelocity > 20) {
        currentAngle = angle;
    }

    const rotateTransform = `rotate(${currentAngle}deg)`;
    circleElement.style.transform = `${translateTransform} ${rotateTransform} ${scaleTransform}`;
    dotElement.style.transform = `${translateTransform} ${rotateTransform} ${scaleTransform}`;

    window.requestAnimationFrame(tick);
}

tick();

// Partners //
$(document).ready(function () {
    // Check the language of the document
    var isRTL = $('html').attr('lang') === 'ar';

    $('.partner__slider').slick({
        rtl: isRTL,
        infinite: true,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 600,
        variableWidth: true,
        arrows: false,
        dots: false,
    });

    // Apply additional CSS for RTL if needed
    if (isRTL) {
        $('.partner__slider').css('direction', 'rtl');
    } else {
        $('.partner__slider').css('direction', 'ltr');
    }
});

// FAQ //
let question = document.querySelectorAll(".question");

question.forEach(question => {
    question.addEventListener("click", event => {
        const active = document.querySelector(".question.active");
        if(active && active !== question ) {
            active.classList.toggle("active");
            active.nextElementSibling.style.maxHeight = 0;
        }
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if(question.classList.contains("active")){
            answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
            answer.style.maxHeight = 0;
        }
    })
})

let gallerySlider;

const debounce = (func, delay = 300) => {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
};

function initializeSwiper() {
    if (gallerySlider) {
        gallerySlider.destroy(true, true);
    }

    gallerySlider = new Swiper(".swiper.is-gallery", {
        slidesPerView: "auto", // Auto ensures perfect centering
        spaceBetween: 40,
        centeredSlides: true, // Keeps active slide in center
        initialSlide: 0, // Start from the first card
        speed: 600,
        grabCursor: true,
        parallax: true,
        loop: false,
        mousewheel: {
            forceToAxis: true,
            releaseOnEdges: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        keyboard: { enabled: true },
        slideToClickedSlide: true,
        on: {
            init: function () {
                this.slideTo(0, 0, false);
            },
            slideChange: function () {
                document.querySelectorAll(".swiper-slide").forEach(slide => {
                    let isVisible = slide.classList.contains("swiper-slide-visible");
                    slide.style.opacity = isVisible ? "1" : "0.5";
                    slide.style.pointerEvents = isVisible ? "auto" : "none";
                    slide.style.transform = isVisible ? "scale(1)" : "scale(0.85)";
                });
            },
        },
    });
}

// Initialize Swiper on page load
window.addEventListener("load", initializeSwiper);
window.addEventListener("resize", debounce(initializeSwiper, 300));





$(document).ready(function(){
    $('.slider-nav').slick({
        infinite: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 5,
        slidesToScroll: 1, // Ensures smooth slide transitions
        focusOnSelect: true,
        autoplay: false,
        speed: 600, // Transition speed
        variableWidth: false,
        arrows: true,
        dots: false,
    });
});

// Features //
function showDetails(detailId) {
    const details = document.querySelectorAll('.details');
    details.forEach((detail) => {
        detail.classList.remove('active');
    });

    const selectedDetail = document.getElementById(detailId);
    selectedDetail.classList.add('active');

    const items = document.querySelectorAll('.left-panel ul li');
    items.forEach((item) => {
        item.classList.remove('active');
    });

    const activeItem = document.querySelector(`[onclick="showDetails('${detailId}')"]`);
    activeItem.classList.add('active');

    const caret = document.querySelector('.verticalline .select');
    const itemOffsetTop = activeItem.offsetTop;
    const itemHeight = activeItem.offsetHeight;

    const heroHeight = document.querySelector('.container-0-').offsetHeight;

    caret.style.transition = 'top 0.3s ease-in-out';
    caret.style.top = `${itemOffsetTop - (heroHeight + itemHeight /.3 - caret.offsetHeight /.343 ) }px`;
}

const items = document.querySelectorAll('.left-panel ul li');
items.forEach((item) => {
    item.setAttribute('tabindex', '0');
    item.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            const detailId = item.getAttribute('onclick').match(/'(.+)'/)[1];
            showDetails(detailId);
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const firstItem = document.querySelector('.left-panel ul li');
    if (firstItem) {
        const firstDetailId = firstItem.getAttribute('onclick').match(/'(.+)'/)[1];
        showDetails(firstDetailId);
    }

    const dropdown = document.querySelector('.feature-dropdown');
    if (dropdown) {
        dropdown.addEventListener('change', (event) => {
            const selectedDetailId = event.target.value;
            showDetails(selectedDetailId);
        });
    } else {
        console.log("Dropdown not found.");
    }
});

///////////////////////////////////////////
// Resizing Slider

const inputs = document.querySelectorAll("input");
const div = document.querySelector("li");

function handleInputChange() {
    const units = this.dataset.units || "";

    document.documentElement.style.setProperty(
        `--${this.name}`,
        this.value + units
    );
}

inputs.forEach((input) => input.addEventListener("input", handleInputChange));
var range = $("input#range"),
    value = $(".range-value");
value.html(range.attr("value"));
range.on("input", function () {
    value.html(this.value);
});


// Projects //
$(document).ready(function () {
    var isRTL = $("html").attr("lang") === "ar";

    $(".slider-project").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                rtl: isRTL,
                draggable: true,
                arrows: false,
                fade: true,
                speed: 1600,
                infinite: true,
                cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
                autoplay: false,
                autoplaySpeed: 1200,
                pauseOnHover: false,
                swipeToSlide: false,
                lazyLoad: "progressive",
            });
        }
    });

    $(".project-card").each(function () {
        const $card = $(this);
        const $staticImg = $card.find(".project-img");
        const $slideshow = $card.find(".slideshow");
        const $slider = $card.find(".slider-project");

        let hoverTimer;

        $card.on("mouseenter", function () {
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => {
                $staticImg.css({ visibility: "hidden", opacity: 0 });
                $slideshow.css({ visibility: "visible", opacity: 1 });

                if ($slider.hasClass("slick-initialized")) {
                    $slider.slick("slickGoTo", 0).slick("slickPlay");
                }
            }, 150);
        });

        $card.on("mouseleave", function () {
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => {
                if ($slider.hasClass("slick-initialized")) {
                    $slider.slick("slickPause");
                }
                $slideshow.css({ visibility: "hidden", opacity: 0 });
                $staticImg.css({ visibility: "visible", opacity: 1 });
            }, 150);
        });
    });
});

