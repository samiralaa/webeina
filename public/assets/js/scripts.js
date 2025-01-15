document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.querySelector('.navbar-toggler');
    const navCollapse = document.querySelector('#navbarNav');

    toggler.addEventListener('click', function () {
        // Toggle the 'show' class on the navbar collapse
        navCollapse.classList.toggle('show');

        // Optionally, toggle an active class on the toggler for styling
        toggler.classList.toggle('active');
    });
});


const stickyNavbar = document.querySelector('.navbar.sticky-navbar')
document.addEventListener("scroll",
() => {
    if (window.scrollY > 36) {
        stickyNavbar.classList.add('scrolling');
    }else {
        stickyNavbar.classList.remove('scrolling');
    }
})
