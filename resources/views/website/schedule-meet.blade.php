@extends('website.layouts.main')
@section('title', 'Schedule Meeting')
@section('content')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/schedule-meet.css') }}">

<!-- Hero Section -->
<div class="container-0- mb-4">
    <img class="background-img" src="{{ asset('assets/images/banner/about.jpg') }}" loading="lazy" alt="About-Us">
    <div class="container-0">
        <div class="container-1">
            <div class="text-2">{{ __('messages.schedule-meet') }}</div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <div class="row g-4">
        <!-- Calendar Section -->
        <div class="content col-12">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-calendar-alt me-2"></i> Select Date & Time
                </div>
                <div class="card-body">
                    <!-- Calendar Navigation -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <button class="calendar-nav-btn" id="prev-week">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h5 class="mb-0" id="current-week-range">Loading dates...</h5>
                        <button class="calendar-nav-btn" id="next-week">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- Calendar Days (Sunday to Thursday) -->
                    <div class="row g-3 mb-4 text-center" id="calendar-days">
                        <!-- Days will be populated by JavaScript -->
                    </div>

                    <!-- Time Slots -->
                    <h6 class="mb-3"><i class="fas fa-clock me-2"></i>Available Time Slots</h6>
                    <div class="row g-2" id="time-slots">
                        <!-- Time slots will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Form -->
        <div class="content col-12">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-user-circle me-2"></i> Your Details
                </div>
                <div class="card-body">
                    <form id="booking-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full-name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meeting Date & Time</label>
                            <input type="text" class="form-control" id="meeting-time-display" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meeting Notes (Optional)</label>
                            <textarea class="form-control" id="notes" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">
                            <i class="fas fa-calendar-check me-2"></i> Confirm Meeting
                        </button>
                        <div id="form-message" class="mt-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="confirmation-modal" id="confirmation-modal">
    <div class="modal-content">
        <h3><i class="fas fa-check-circle text-success me-2"></i> Meeting Scheduled!</h3>
        <p id="confirmation-details"></p>
        <div id="confirmation-links" class="d-flex flex-wrap gap-2 mt-3"></div>
        <button class="btn btn-primary mt-3 w-100" id="close-modal">Close</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize EmailJS with your Public Key
      emailjs.init('o-EiqPujeP4o1EJQX'); // Replace with your actual EmailJS public key

      // Calendar configuration (Sunday to Thursday)
      const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu'];
      const months = ['January', 'February', 'March', 'April', 'May', 'June',
                     'July', 'August', 'September', 'October', 'November', 'December'];

      let currentDate = new Date();
      let selectedDate = new Date();
      let bookedSlots = {};

      // Initialize calendar
      initCalendar();

      function initCalendar() {
        fetchBookedSlots();
        renderCalendar();

        // Set up event listeners
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

      // Fetch booked slots from localStorage
      function fetchBookedSlots() {
        const savedSlots = localStorage.getItem('webeniaBookedSlots');
        bookedSlots = savedSlots ? JSON.parse(savedSlots) : {};

        // Set some default booked slots for demo
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

      // Save booked slots to localStorage
      function saveBookedSlots() {
        localStorage.setItem('webeniaBookedSlots', JSON.stringify(bookedSlots));
      }

      // Render calendar function (Sunday to Thursday)
      function renderCalendar() {
        const calendarDays = document.getElementById('calendar-days');
        const weekRange = document.getElementById('current-week-range');

        // Clear existing days
        calendarDays.innerHTML = '';

        // Calculate start of week (Sunday)
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay());

        // Calculate end of week (Thursday)
        const endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 4); // Only show 5 days (Sun-Thu)

        // Update week range display
        weekRange.textContent = `${months[startOfWeek.getMonth()]} ${startOfWeek.getDate()} - ${months[endOfWeek.getMonth()]} ${endOfWeek.getDate()}, ${endOfWeek.getFullYear()}`;

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        // Create day elements (only Sunday to Thursday)
        for (let i = 0; i < 5; i++) {
          const day = new Date(startOfWeek);
          day.setDate(startOfWeek.getDate() + i);

          const dayKey = formatDateKey(day);
          const isBookedDay = isDayFullyBooked(dayKey);

          const dayElement = document.createElement('div');
          dayElement.className = 'col calendar-day';

          // Highlight if selected
          if (day.toDateString() === selectedDate.toDateString()) {
            dayElement.classList.add('active');
          }

          // Highlight if today
          const dayForComparison = new Date(day);
          dayForComparison.setHours(0, 0, 0, 0);
          if (dayForComparison.getTime() === today.getTime()) {
            dayElement.classList.add('today');
          }

          // Mark if fully booked
          if (isBookedDay) {
            dayElement.classList.add('booked');
          }

          // Add day content
          dayElement.innerHTML = `
            <div class="small">${daysOfWeek[i]}</div>
            <div class="fw-bold">${day.getDate()}</div>
          `;

          // Add click handler if not booked
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

        // Render time slots for selected day
        renderTimeSlots();
      }

      // Render time slots for selected day
      function renderTimeSlots() {
        const timeSlots = document.getElementById('time-slots');
        timeSlots.innerHTML = '';

        const selectedDayKey = formatDateKey(selectedDate);
        const bookedSlotsForDay = bookedSlots[selectedDayKey] || [];

        // Create time slots from 9AM to 5PM in 30-minute increments
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

      // Handle form submission with EmailJS
      function handleFormSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('submit-btn');
        const formMessage = document.getElementById('form-message');

        // Validate selection
        const selectedTime = document.querySelector('.time-slot.selected');
        if (!selectedTime) {
          showMessage('Please select an available time slot', 'danger');
          return;
        }

        // Get form values
        const fullName = document.getElementById('full-name').value.trim();
        const email = document.getElementById('email').value.trim();
        const notes = document.getElementById('notes').value.trim();

        // Validate email
        if (!validateEmail(email)) {
          showMessage('Please enter a valid email address', 'danger');
          return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Booking...
        `;

        try {
          // Generate meeting links (without backend)
          const meetingLink = generateGoogleMeetLink(selectedDate, selectedTime.textContent.trim());
          const calendarLink = generateCalendarLink(selectedDate, selectedTime.textContent.trim());

          // Update booked slots
          const dateKey = formatDateKey(selectedDate);
          if (!bookedSlots[dateKey]) {
            bookedSlots[dateKey] = [];
          }
          bookedSlots[dateKey].push(selectedTime.textContent.trim());
          saveBookedSlots();

          // Send email using EmailJS (without backend)
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
            'service_5gklc8j', // Replace with your EmailJS service ID
            'template_ur2iljh', // Replace with your EmailJS template ID
            templateParams
          ).then(function(response) {
            console.log('Email sent successfully!', response.status, response.text);
            // Show confirmation
            showConfirmation(
              fullName,
              formatDisplayDate(selectedDate),
              selectedTime.textContent.trim(),
              meetingLink,
              calendarLink,
              notes || "No additional notes"
            );

            // Reset form
            resetForm();

            // Refresh calendar
            renderCalendar();
          }, function(error) {
            console.error('Email failed to send:', error);
            showMessage('Failed to send confirmation email. Please try again.', 'danger');
          });

        } catch (error) {
          console.error('Error:', error);
          showMessage('Error booking meeting. Please try again.', 'danger');
        } finally {
          // Reset button state
          submitBtn.disabled = false;
          submitBtn.innerHTML = `
            <i class="fas fa-calendar-check me-2"></i> Confirm Meeting
          `;
        }
      }

      // Show confirmation modal
      function showConfirmation(name, date, time, meetLink, calendarLink, notes) {
        const modal = document.getElementById('confirmation-modal');
        const details = document.getElementById('confirmation-details');
        const links = document.getElementById('confirmation-links');

        // Set details
        details.innerHTML = `
          <p>Hello <strong>${name}</strong>,</p>
          <p>Your meeting has been successfully scheduled for:</p>
          <p><strong>${date} at ${time}</strong></p>
          ${notes ? `<p><strong>Notes:</strong> ${notes}</p>` : ''}
          <p class="mt-2">A confirmation email has been sent to your inbox.</p>
        `;

        // Set links
        links.innerHTML = `
          <a href="${meetLink}" class="btn btn-primary" target="_blank">
            <i class="fas fa-video me-1"></i> Join Meeting
          </a>
          <a href="${calendarLink}" class="btn btn-outline-primary" target="_blank">
            <i class="fas fa-calendar-plus me-1"></i> Add to Calendar
          </a>
        `;

        // Show modal
        modal.style.display = 'flex';
      }

      // Helper functions
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

      // Generate Google Meet link without backend
      function generateGoogleMeetLink(date, timeStr) {
        // This creates a basic Google Meet link
        // Note: In a real implementation, you would need the Google API to create actual meeting links
        // This is a simplified version that just links to the "new meeting" page
        return 'https://meet.google.com/new';
      }

      // Generate Google Calendar link without backend
      function generateCalendarLink(date, timeStr) {
        const [time, modifier] = timeStr.split(' ');
        let [hours, minutes] = time.split(':');

        // Convert to 24-hour format
        hours = parseInt(hours);
        if (modifier === 'PM' && hours < 12) hours += 12;
        if (modifier === 'AM' && hours === 12) hours = 0;

        // Create start/end times (30min duration)
        const start = new Date(date);
        start.setHours(hours, minutes, 0, 0);

        const end = new Date(start);
        end.setMinutes(end.getMinutes() + 30);

        // Format for Google Calendar
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
  </script>


@endsection
