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
        $('..slick-track').css('left', '-38px');
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
document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.feature-list li');
    const details = document.querySelectorAll('.details');
    const dropdown = document.querySelector('.feature-dropdown');
    const caret = document.querySelector('.verticalline .select');

    function showDetails(detailId) {
        details.forEach(detail => detail.classList.remove('active'));
        document.getElementById(detailId).classList.add('active');
        items.forEach(item => item.classList.remove('active'));
        const activeItem = document.querySelector(`[data-detail="${detailId}"]`);
        activeItem.classList.add('active');
        const panelOffset = activeItem.parentElement.getBoundingClientRect().top;
        const itemOffset = activeItem.getBoundingClientRect().top;
        const itemHeight = activeItem.offsetHeight;
        caret.style.transition = 'top 0.3s ease-in-out';
        caret.style.top = `${itemOffset - panelOffset + itemHeight / 2 - caret.offsetHeight / 2 + 20}px`;
    }
    items.forEach(item => {
        item.addEventListener('click', () => showDetails(item.dataset.detail));
    });
    dropdown.addEventListener('change', (event) => {
        showDetails(event.target.value);
    });
    if (items.length > 0) {
        showDetails(items[0].dataset.detail);
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

// Schedule Meet
document.addEventListener('DOMContentLoaded', function() {
  emailjs.init('o-EiqPujeP4o1EJQX');

  const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu'];
  const months = ['January', 'February', 'March', 'April', 'May', 'June',
                 'July', 'August', 'September', 'October', 'November', 'December'];

  let currentDate = new Date();
  let selectedDate = new Date();
  let bookedSlots = {};

  initCalendar();

  function initCalendar() {
    fetchBookedSlots();
    renderCalendar();

    document.getElementById('prev-week').addEventListener('click', function() {
      currentDate.setDate(currentDate.getDate() - 7);
      renderCalendar();
    });

    document.getElementById('next-week').addEventListener('click', function() {
      currentDate.setDate(currentDate.getDate() + 7);
      renderCalendar();
    });

    document.getElementById('close-modal').addEventListener('click', function() {
      document.getElementById('confirmation-modal').style.display = 'none';
    });

    document.getElementById('booking-form').addEventListener('submit', handleFormSubmit);
  }

  function fetchBookedSlots() {
    const savedSlots = localStorage.getItem('webeniaBookedSlots');
    bookedSlots = savedSlots ? JSON.parse(savedSlots) : {};

    if (Object.keys(bookedSlots).length === 0) {
      const today = new Date();
      const tomorrow = new Date(today);
      tomorrow.setDate(today.getDate() + 1);

      bookedSlots = {
        [formatDateKey(today)]: ['10:00 AM', '2:00 PM'],
        [formatDateKey(tomorrow)]: ['9:00 AM', '3:30 PM']
      };
      saveBookedSlots();
    }
  }

  function saveBookedSlots() {
    localStorage.setItem('webeniaBookedSlots', JSON.stringify(bookedSlots));
  }

  function renderCalendar() {
    const calendarDays = document.getElementById('calendar-days');
    const weekRange = document.getElementById('current-week-range');

    calendarDays.innerHTML = '';

    const startOfWeek = new Date(currentDate);
    startOfWeek.setDate(currentDate.getDate() - currentDate.getDay());

    const endOfWeek = new Date(startOfWeek);
    endOfWeek.setDate(startOfWeek.getDate() + 4);

    weekRange.textContent = `${months[startOfWeek.getMonth()]} ${startOfWeek.getDate()} - ${months[endOfWeek.getMonth()]} ${endOfWeek.getDate()}, ${endOfWeek.getFullYear()}`;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    for (let i = 0; i < 5; i++) {
      const day = new Date(startOfWeek);
      day.setDate(startOfWeek.getDate() + i);

      const dayKey = formatDateKey(day);
      const isBookedDay = isDayFullyBooked(dayKey);

      const dayElement = document.createElement('div');
      dayElement.className = 'col calendar-day';

      if (day.toDateString() === selectedDate.toDateString()) {
        dayElement.classList.add('active');
      }

      const dayForComparison = new Date(day);
      dayForComparison.setHours(0, 0, 0, 0);
      if (dayForComparison.getTime() === today.getTime()) {
        dayElement.classList.add('today');
      }

      if (isBookedDay) {
        dayElement.classList.add('booked');
      }

      dayElement.innerHTML = `
        <div class="small">${daysOfWeek[i]}</div>
        <div class="fw-bold">${day.getDate()}</div>
      `;

      if (!isBookedDay) {
        dayElement.addEventListener('click', function() {
          selectedDate = new Date(day);
          document.querySelectorAll('.calendar-day').forEach(el => el.classList.remove('active'));
          this.classList.add('active');
          renderTimeSlots();
        });
      }

      calendarDays.appendChild(dayElement);
    }

    renderTimeSlots();
  }

  function renderTimeSlots() {
    const timeSlots = document.getElementById('time-slots');
    timeSlots.innerHTML = '';

    const selectedDayKey = formatDateKey(selectedDate);
    const bookedSlotsForDay = bookedSlots[selectedDayKey] || [];

    for (let hour = 9; hour < 17; hour++) {
      for (let minute = 0; minute < 60; minute += 30) {
        const timeString = formatTimeString(hour, minute);
        const isBooked = bookedSlotsForDay.includes(timeString);

        const slotElement = document.createElement('div');
        slotElement.className = 'col-6 col-md-4';

        const timeSlotDiv = document.createElement('div');
        timeSlotDiv.className = `time-slot ${isBooked ? 'booked' : ''}`;
        timeSlotDiv.textContent = timeString;

        if (!isBooked) {
          timeSlotDiv.addEventListener('click', function() {
            document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
            this.classList.add('selected');
            document.getElementById('meeting-time-display').value =
              `${formatDisplayDate(selectedDate)} at ${timeString}`;
          });
        }

        slotElement.appendChild(timeSlotDiv);
        timeSlots.appendChild(slotElement);
      }
    }
  }

  function handleFormSubmit(e) {
    e.preventDefault();
    const submitBtn = document.getElementById('submit-btn');
    const formMessage = document.getElementById('form-message');

    const selectedTime = document.querySelector('.time-slot.selected');
    if (!selectedTime) {
      showMessage('Please select an available time slot', 'danger');
      return;
    }

    const fullName = document.getElementById('full-name').value.trim();
    const email = document.getElementById('email').value.trim();
    const notes = document.getElementById('notes').value.trim();

    if (!validateEmail(email)) {
      showMessage('Please enter a valid email address', 'danger');
      return;
    }

    submitBtn.disabled = true;
    submitBtn.innerHTML = `
      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Booking...
    `;

    try {
      const meetingLink = generateGoogleMeetLink(selectedDate, selectedTime.textContent.trim());
      const calendarLink = generateCalendarLink(selectedDate, selectedTime.textContent.trim());

      const dateKey = formatDateKey(selectedDate);
      if (!bookedSlots[dateKey]) {
        bookedSlots[dateKey] = [];
      }
      bookedSlots[dateKey].push(selectedTime.textContent.trim());
      saveBookedSlots();

      const templateParams = {
        to_name: fullName,
        to_email: email,
        meeting_date: formatDisplayDate(selectedDate),
        meeting_time: selectedTime.textContent.trim(),
        meeting_link: meetingLink,
        meeting_notes: notes || "No additional notes",
        calendar_link: calendarLink
      };

      emailjs.send(
        'service_5gklc8j',
        'template_ur2iljh',
        templateParams
      ).then(function(response) {
        console.log('Email sent successfully!', response.status, response.text);
        showConfirmation(
          fullName,
          formatDisplayDate(selectedDate),
          selectedTime.textContent.trim(),
          meetingLink,
          calendarLink,
          notes || "No additional notes"
        );

        resetForm();

        renderCalendar();
      }, function(error) {
        console.error('Email failed to send:', error);
        showMessage('Failed to send confirmation email. Please try again.', 'danger');
      });

    } catch (error) {
      console.error('Error:', error);
      showMessage('Error booking meeting. Please try again.', 'danger');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = `
        <i class="fas fa-calendar-check me-2"></i> Confirm Meeting
      `;
    }
  }

  function showConfirmation(name, date, time, meetLink, calendarLink, notes) {
    const modal = document.getElementById('confirmation-modal');
    const details = document.getElementById('confirmation-details');
    const links = document.getElementById('confirmation-links');

    details.innerHTML = `
      <p>Hello <strong>${name}</strong>,</p>
      <p>Your meeting has been successfully scheduled for:</p>
      <p><strong>${date} at ${time}</strong></p>
      ${notes ? `<p><strong>Notes:</strong> ${notes}</p>` : ''}
      <p class="mt-2">A confirmation email has been sent to your inbox.</p>
    `;

    links.innerHTML = `
      <a href="${meetLink}" class="btn btn-primary" target="_blank">
        <i class="fas fa-video me-1"></i> Join Meeting
      </a>
      <a href="${calendarLink}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-calendar-plus me-1"></i> Add to Calendar
      </a>
    `;

    modal.style.display = 'flex';
  }

  function formatDateKey(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  function formatTimeString(hour, minute) {
    const displayHour = hour % 12 === 0 ? 12 : hour % 12;
    const displayMinute = minute === 0 ? '00' : minute;
    const ampm = hour < 12 ? 'AM' : 'PM';
    return `${displayHour}:${displayMinute} ${ampm}`;
  }

  function formatDisplayDate(date) {
    return date.toLocaleDateString('en-US', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  }

  function generateGoogleMeetLink(date, timeStr) {
    return 'https://meet.google.com/new';
  }

  function generateCalendarLink(date, timeStr) {
    const [time, modifier] = timeStr.split(' ');
    let [hours, minutes] = time.split(':');

    hours = parseInt(hours);
    if (modifier === 'PM' && hours < 12) hours += 12;
    if (modifier === 'AM' && hours === 12) hours = 0;

    const start = new Date(date);
    start.setHours(hours, minutes, 0, 0);

    const end = new Date(start);
    end.setMinutes(end.getMinutes() + 30);

    const formatTime = (date) => date.toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z';

    return `https://calendar.google.com/calendar/render?action=TEMPLATE` +
      `&dates=${formatTime(start)}/${formatTime(end)}` +
      `&text=Meeting+with+Webenia` +
      `&details=Meeting+with+Webenia+team` +
      `&location=Online+Meeting`;
  }

  function isDayFullyBooked(dayKey) {
    return bookedSlots[dayKey] && bookedSlots[dayKey].length >= 3;
  }

  function showMessage(text, type) {
    const formMessage = document.getElementById('form-message');
    formMessage.innerHTML = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${text}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
  }

  function resetForm() {
    document.getElementById('booking-form').reset();
    document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
    document.getElementById('meeting-time-display').value = '';
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }
});
