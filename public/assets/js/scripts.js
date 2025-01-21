// Navbar //
document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.querySelector('.navbar-toggler');
    const navCollapse = document.querySelector('#navbarNav');

    toggler.addEventListener('click', function () {
        navCollapse.classList.toggle('show');

        toggler.classList.toggle('active');
    });
});
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
$(document).ready(function(){
    $('.partner__slider').slick({
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
