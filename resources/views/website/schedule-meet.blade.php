@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/schedule-meet.css') }}">
@section('title', 'Home Page')

@section('content')
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
            <div class="row row-cols-5 g-2 mb-4 text-center" id="calendar-days">
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
@endsection
