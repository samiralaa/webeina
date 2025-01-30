// Navbar //
const stickyNavbar = document.querySelector('.navbar.sticky-navbar')
document.addEventListener("scroll", () => {
    if (window.scrollY > 36) {
        stickyNavbar.classList.add('scrolling');
    }else {
        stickyNavbar.classList.remove('scrolling');
    }
})


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

// linkedin //
// let gallerySlider = new Swiper(".swiper.is-gallery", {

//     slidesPerView: 8,
//     centeredSlides: true,
//     speed: 300,
//     grabCursor: true,
//     parallax: true,
//     mousewheel: {
//         thresholdDelta: 70,
//     },

//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev"
//     },
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     keyboard: {
//         enabled: true,
//     },
//     slideToClickedSlide: true
// });

// function lg(){
//     let gallerySlider = new Swiper(".swiper.is-gallery", {

//         slidesPerView: 8,
//         centeredSlides: true,
//         speed: 300,
//         grabCursor: true,
//         parallax: true,
//         mousewheel: {
//             thresholdDelta: 70,
//         },

//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev"
//         },
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         keyboard: {
//             enabled: true,
//         },
//         slideToClickedSlide: true
//     });
// }


// function ch(){
//     if(window.innerWidth <= 768){
//         let gallerySlider = new Swiper(".swiper.is-gallery", {
//             coverflowEffect: {
//                 rotate: 0,
//                 stretch: 30,
//                 depth: 100,
//                 modifier: 5,
//                 slideShadows: true
//             },
//             effect: "coverflow",
//             slidesPerView: 1,
//             centeredSlides: true,
//             speed: 300,
//             grabCursor: true,
//             parallax: true,
//             mousewheel: {
//                 thresholdDelta: 70,
//             },
//             navigation: {
//                 nextEl: ".swiper-button-next",
//                 prevEl: ".swiper-button-prev"
//             },
//             pagination: {
//                 el: ".swiper-pagination",
//                 clickable: true,
//             },
//             keyboard: {
//                 enabled: true,
//             },
//             slideToClickedSlide: true,
//             on: {
//                 slideChange: function () {
//                     // Loop through all slides
//                     document.querySelectorAll('.swiper-slide').forEach(slide => {
//                         if (!slide.classList.contains('swiper-slide-visible')) {
//                             // Hide slides that are not visible
//                             slide.style.opacity = '0';
//                             slide.style.pointerEvents = 'none';
//                         } else {
//                             // Show slides when they become visible
//                             slide.style.opacity = '1';
//                             slide.style.pointerEvents = 'auto';
//                         }
//                     });
//                 },
//                 init: function () {
//                     // Trigger the logic once at initialization
//                     this.emit('slideChange');
//                 }
//             }
//         });

//     }

// }

// ch();


// function sm() {
//     if (window.innerWidth <= 768) {
//         let gallerySlider = new Swiper(".swiper.is-gallery", {

//             effect: "coverflow",
//             slidesPerView: 1,
//             centeredSlides: true,
//             speed: 300,
//             grabCursor: true,
//             parallax: true,
//             mousewheel: {
//                 thresholdDelta: 70,
//             },
//             navigation: {
//                 nextEl: ".swiper-button-next",
//                 prevEl: ".swiper-button-prev"
//             },
//             pagination: {
//                 el: ".swiper-pagination",
//                 clickable: true,
//             },
//             keyboard: {
//                 enabled: true,
//             },
//             slideToClickedSlide: true,
//             on: {
//                 slideChange: function () {
//                     // Loop through all slides
//                     document.querySelectorAll('.swiper-slide').forEach(slide => {
//                         if (!slide.classList.contains('swiper-slide-visible')) {
//                             // Hide slides that are not visible
//                             slide.style.opacity = '0';
//                             slide.style.pointerEvents = 'none';
//                         } else {
//                             // Show slides when they become visible
//                             slide.style.opacity = '1';
//                             slide.style.pointerEvents = 'auto';
//                         }
//                     });
//                 },
//                 init: function () {
//                     // Trigger the logic once at initialization
//                     this.emit('slideChange');
//                 }
//             }
//         });
//     }
// }

// window.onresize = function(){
//     if (window.innerWidth <= 768) {
//         sm();
//     }else{
//         lg();
//     }
// }

// Recheck and reinitialize on window resize
// window.addEventListener("resize", () => {
//     if (window.innerWidth <= 768) {
//         ch();
//     }else{
//         lg();
//     }
// });


let gallerySlider; // Declare the Swiper instance globally to manage it properly

function lg() {
    // Initialize Swiper for large screens
    gallerySlider = new Swiper(".swiper.is-gallery", {
        slidesPerView: 8,
        centeredSlides: true,
        speed: 300,
        grabCursor: true,
        parallax: true,
        mousewheel: {
            thresholdDelta: 70,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        keyboard: {
            enabled: true,
        },
        slideToClickedSlide: true,
    });
}

function sm() {
    // Initialize Swiper for small screens
    gallerySlider = new Swiper(".swiper.is-gallery", {

        slidesPerView: 1,
        centeredSlides: true,
        speed: 100,
        grabCursor: true,
        parallax: true,
        mousewheel: {
            thresholdDelta: 70,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        keyboard: {
            enabled: true,
        },
        slideToClickedSlide: true,
        on: {
            slideChange: function () {
                // Loop through all slides
                document.querySelectorAll('.swiper-slide').forEach(slide => {
                    if (!slide.classList.contains('swiper-slide-visible')) {
                        // Hide slides that are not visible
                        slide.style.opacity = '0';
                        slide.style.pointerEvents = 'none';
                    } else {
                        // Show slides when they become visible
                        slide.style.opacity = '1';
                        slide.style.pointerEvents = 'auto';
                    }
                });
            },
            init: function () {
                // Trigger the logic once at initialization
                this.emit('slideChange');
            },
        },
    });
}

function initializeSwiper() {
    if (window.innerWidth > 768) {
        // Destroy existing instance if any, then initialize for large screens
        if (gallerySlider) gallerySlider.destroy(true, true);
        lg();
    } else {
        // Destroy existing instance if any, then initialize for small screens
        if (gallerySlider) gallerySlider.destroy(true, true);
        sm();
    }
}

// Run the appropriate function on load
initializeSwiper();

// Add resize event listener to reinitialize Swiper on screen size change
window.addEventListener("resize", initializeSwiper);




// $(document).ready(function(){
//     $('.slider-nav').slick({
//         infinite: false,
//         centerMode: true,
//         centerPadding: '0',
//         slidesToShow: 5,
//         focusOnSelect: true,
//         autoplay: false,
//         speed: 600,
//         variableWidth: false,
//         arrows: true,
//         dots: false,

//     });
// });


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
    caret.style.top = `${itemOffsetTop - heroHeight - 1110 + itemHeight /2 - caret.offsetHeight / .115}px`;
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
