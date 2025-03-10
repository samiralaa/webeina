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
    mobileMenuToggle.addEventListener("click", function () {
        mobileNav.classList.add("active");
    });
    closeMobileNav.addEventListener("click", function () {
        mobileNav.classList.remove("active");
    });
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


// Mouse Follower Effect //
console.clear();
const circleElement = document.querySelector('.circle');
const dotElement = document.querySelector('.dot');
const mouse = { x: 0, y: 0 };
const previousMouse = { x: 0, y: 0 };
const circle = { x: 0, y: 0 };
let currentScale = 0;
let currentAngle = 0;
let isHovering = false;
const speed = 0.35;
const circleSize = 30 / 2;
const dotSize = 10 / 2;
const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
if (isTouchDevice) {
    circleElement.style.display = 'none';
    dotElement.style.display = 'none';
}
const lerp = (start, end, factor) => start + (end - start) * factor;
window.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX - circleSize;
    mouse.y = e.clientY - circleSize;
});
document.body.addEventListener('mouseover', (e) => {
    if (e.target.closest('a, button')) {
        isHovering = true;
    }
});
document.body.addEventListener('mouseout', (e) => {
    if (e.target.closest('a, button')) {
        isHovering = false;
    }
});
const tick = () => {
    circle.x = lerp(circle.x, mouse.x, speed);
    circle.y = lerp(circle.y, mouse.y, speed);

    const deltaMouseX = mouse.x - previousMouse.x;
    const deltaMouseY = mouse.y - previousMouse.y;

    previousMouse.x = mouse.x;
    previousMouse.y = mouse.y;

    const mouseVelocity = Math.min(Math.sqrt(deltaMouseX ** 2 + deltaMouseY ** 2) * 4, 150);
    const scaleValue = (mouseVelocity / 150) * 0.5;
    currentScale += (scaleValue - currentScale) * speed;

    if (mouseVelocity > 20) {
        currentAngle = Math.atan2(deltaMouseY, deltaMouseX) * (180 / Math.PI);
    }

    const scale = isHovering ? 1.5 : 1 + currentScale;
    const opacity = isHovering ? 0.5 : 1;
    const bgColor = isHovering ? "#076767" : "transparent";
    const dotScale = isHovering ? 0 : 1;

    // Apply styles dynamically
    circleElement.style.transform = `translate(${circle.x}px, ${circle.y}px) scale(${scale}) rotate(${currentAngle}deg)`;
    circleElement.style.opacity = opacity;
    circleElement.style.backgroundColor = bgColor;

    dotElement.style.transform = `translate(${circle.x + circleSize - dotSize}px, ${circle.y + circleSize - dotSize}px) scale(${dotScale})`;
    dotElement.style.opacity = dotScale;

    requestAnimationFrame(tick);
};
tick();



// Partners //
$(document).ready(function () {
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



// LinkedIn //
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
        slidesPerView: "auto",
        spaceBetween: 40,
        centeredSlides: true,
        initialSlide: 0,
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
window.addEventListener("load", initializeSwiper);
window.addEventListener("resize", debounce(initializeSwiper, 300));



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



// Resizing Slider //
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