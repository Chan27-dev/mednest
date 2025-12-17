<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Book Appointment</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', Arial, sans-serif;
      color: #373C36;
      background: #f5f5f5;
    }

    /* NAVBAR */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 40px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .logo-container img {
      height: 32px;
      width: 32px;
    }

    .logo-text {
      font-size: 24px;
      font-weight: 700;
    }

    .logo-text .med { color: #000; }
    .logo-text .nest { color: #7B0707; }

    nav {
      display: flex;
      gap: 40px;
      font-weight: 500;
    }

    nav a {
      text-decoration: none;
      color: #373C36;
      font-weight: 500;
      transition: color 0.3s;
      padding-bottom: 4px;
    }

    nav a.active {
      color: #7B0707;
      font-weight: 700;
      border-bottom: 2px solid #7B0707;
    }

    nav a:hover {
      color: #7B0707;
    }

    /* User Profile Dropdown */
    .user-dropdown {
      position: relative;
    }

    .user-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #7B0707;
      color: #fff;
      padding: 8px 16px;
      border-radius: 30px;
      cursor: pointer;
      font-weight: 600;
      font-size: 14px;
      border: none;
      text-decoration: none;
      transition: all 0.3s;
    }

    .user-btn:hover {
      background: #5f0505;
    }

    .dropdown-menu {
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      min-width: 200px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-10px);
      transition: all 0.3s ease;
      z-index: 1000;
      overflow: hidden;
    }

    .user-dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .dropdown-menu a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 20px;
      color: #2C2828;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.2s;
      border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-menu a:last-child {
      border-bottom: none;
    }

    .dropdown-menu a:hover {
      background: #ffeef0;
      color: #7B0707;
    }

    .dropdown-menu a i {
      font-size: 16px;
      width: 20px;
      text-align: center;
    }

    .dropdown-menu .logout-btn {
      color: #C62828;
    }

    .dropdown-menu .logout-btn:hover {
      background: #FFEBEE;
      color: #C62828;
    }

    /* APPOINTMENT FORM CONTAINER */
    .appointment-container {
      max-width: 1400px;
      margin: 40px auto;
      padding: 0 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
    }

    /* LEFT SECTION - FORM */
    .form-section {
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      padding: 40px;
      border-radius: 20px;
      color: white;
    }

    .form-section h2 {
      font-size: 32px;
      margin-bottom: 10px;
    }

    .form-section p {
      margin-bottom: 30px;
      opacity: 0.9;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      background: white;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: 2px solid #fff;
    }

    /* AUTO-FILLED INDICATOR */
    .auto-filled-badge {
      display: inline-block;
      background: rgba(255, 255, 255, 0.2);
      padding: 2px 8px;
      border-radius: 5px;
      font-size: 11px;
      margin-left: 8px;
    }

    /* TIME SLOTS */
    .time-slots {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-bottom: 20px;
    }

    .time-slot {
      padding: 12px;
      background: white;
      color: #7B0707;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    .time-slot:hover {
      background: rgba(255, 255, 255, 0.9);
      transform: translateY(-2px);
    }

    .time-slot.selected {
      background: #2C2828;
      color: white;
    }

    .submit-btn {
      width: 100%;
      padding: 15px;
      background: #2C2828;
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 20px;
    }

    .submit-btn:hover {
      background: #1a1a1a;
      transform: translateY(-2px);
    }

    /* RIGHT SECTION - SERVICES */
    .services-section {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .services-section h2 {
      font-size: 28px;
      color: #7B0707;
      margin-bottom: 30px;
    }

    .service-card {
      padding: 20px;
      border-radius: 15px;
      margin-bottom: 15px;
      transition: all 0.3s;
      border: 2px solid #f0f0f0;
    }

    .service-card:hover {
      border-color: #D44C64;
      transform: translateX(5px);
    }

    .service-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }

    .service-name {
      font-weight: 700;
      font-size: 18px;
      color: #2C2828;
    }

    .service-price {
      font-weight: 700;
      font-size: 18px;
      color: #7B0707;
    }

    .service-description {
      color: #666;
      font-size: 13px;
    }

    .free-badge {
      background: #4CAF50;
      color: white;
      padding: 4px 12px;
      border-radius: 5px;
      font-size: 12px;
      font-weight: 700;
    }

    .special-service {
      background: linear-gradient(135deg, rgba(212, 76, 100, 0.1), rgba(175, 23, 50, 0.1));
    }

    /* ALERT MESSAGE */
    .alert {
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-success {
      background: #E8F5E9;
      color: #2E7D32;
      border: 1px solid #C8E6C9;
    }

    .alert-error {
      background: #FFEBEE;
      color: #C62828;
      border: 1px solid #FFCDD2;
    }

    /* Hamburger Menu */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 4px;
      cursor: pointer;
      padding: 5px;
    }

    .hamburger span {
      width: 25px;
      height: 3px;
      background: #7B0707;
      border-radius: 2px;
      transition: 0.3s;
    }

    /* RESPONSIVE */
    @media (max-width: 968px) {
      .appointment-container {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 20px auto;
      }

      .time-slots {
        grid-template-columns: repeat(2, 1fr);
      }

      .form-section, .services-section {
        padding: 25px;
      }
    }

    @media (max-width: 768px) {
      header {
        flex-wrap: wrap;
        padding: 12px 20px;
      }

      .logo-text {
        font-size: 20px;
      }

      .logo-container img {
        height: 28px;
        width: 28px;
      }

      .hamburger {
        display: flex;
        order: 3;
      }

      nav {
        display: none;
        width: 100%;
        order: 4;
        flex-direction: column;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
        margin-top: 15px;
      }

      nav.show {
        display: flex;
      }

      nav a {
        padding: 8px 0;
        text-align: center;
      }

      .user-dropdown {
        display: none;
      }

      .appointment-container {
        padding: 0 10px;
        margin: 15px auto;
      }

      .form-section h2 {
        font-size: 24px;
      }

      .services-section h2 {
        font-size: 22px;
      }

      .time-slots {
        grid-template-columns: 1fr;
      }

      .time-slot {
        padding: 14px;
      }
    }

    @media (max-width: 480px) {
      .form-section, .services-section {
        padding: 20px;
      }

      .service-card {
        padding: 15px;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="logo-container">
      <a href="{{ route('user.dashboard') }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none;">
        <img src="/images/mednest-logo.png" alt="MedNest Logo">
        <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
      </a>
    </div>

    <nav id="nav-menu">
      <a href="{{ route('user.dashboard') }}">Dashboard</a>
      <a href="{{ route('user.appointment') }}" class="active">Book Appointment</a>
      <a href="{{ route('user.lab_results') }}">My Lab Results</a>
      <a href="{{ route('user.profile') }}">My Profile</a>
      <a href="{{ route('user.about') }}">About Us</a>
    </nav>

    <div class="user-dropdown">
      <div class="user-btn">
        <div style="width: 24px; height: 24px; background: #fff; color: #7B0707; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
          {{ strtoupper(substr(optional(Auth::user())->name ?? 'U', 0, 1)) }}
        </div>
        <span>{{ Str::of(optional(Auth::user())->name ?? 'User')->explode(' ')->first() }}</span>
        <i class="fas fa-chevron-down" style="font-size: 10px; margin-left: -4px;"></i>
      </div>
      <div class="dropdown-menu">
        <a href="{{ route('user.profile') }}">
          <i class="fas fa-user"></i>
          <span>My Profile</span>
        </a>
        <a href="{{ route('user.lab_results') }}">
          <i class="fas fa-flask"></i>
          <span>My Lab Results</span>
        </a>
        <a href="{{ route('logout') }}" class="logout-btn"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          <span>Log Out</span>
        </a>
      </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <div class="appointment-container">
    
    <div class="form-section">
      <h2>Schedule Your Visit</h2>
      <p>Select your preferred date, time, and service</p>

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-error">
          <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('user.appointment.store') }}" id="appointmentForm">
        @csrf

        <div class="form-group">
          <label for="patient_name">Patient Name</label>
          <input
            type="text"
            id="patient_name"
            name="patient_name"
            value="{{ Auth::user()->patient ? Auth::user()->patient->first_name . ' ' . Auth::user()->patient->last_name : Auth::user()->name }}"
            readonly
            style="background: #ffffff; cursor: not-allowed; color: #333;"
          >
        </div>

        <div class="form-group">
          <label for="patient_phone">Contact Number</label>
          <input
            type="text"
            id="patient_phone"
            name="patient_phone"
            value="{{ Auth::user()->patient->phone ?? 'N/A' }}"
            readonly
            style="background: #ffffff; cursor: not-allowed; color: #333;"
          >
        </div>

        <div class="form-group">
          <label for="patient_email">Email Address</label>
          <input
            type="text"
            id="patient_email"
            name="patient_email"
          value="{{ optional(optional(Auth::user())->patient)->email ?? optional(Auth::user())->email ?? 'N/A' }}"
            readonly
            style="background: #ffffff; cursor: not-allowed; color: #333;"
          >
        </div>

        <div class="form-group">
          <label for="branch">Select Branch</label>
          <select id="branch" name="branch" required>
            <option value="">Choose your preferred branch</option>
            @foreach($branches as $branch)
              <option value="{{ $branch->id }}" {{ old('branch') == $branch->id ? 'selected' : '' }}>
                {{ $branch->name }} – {{ $branch->address_line_1 }}, {{ $branch->city }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="appointment_date">Select Date</label>
          <input 
            type="date" 
            id="appointment_date" 
            name="appointment_date" 
            value="{{ old('appointment_date') }}"
            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
            required
          >
        </div>

        <div class="form-group">
          <label for="appointment_type">Type of Visit</label>
          <select id="appointment_type" name="appointment_type" required>
            <option value="">Select a service</option>
            @foreach($services as $service)
              <option value="{{ $service->id }}" {{ old('appointment_type') == $service->id ? 'selected' : '' }}>
                {{ $service->name }} @if($service->price > 0) - ₱{{ number_format($service->price, 0) }} @endif
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Preferred Time</label>
          <input type="hidden" id="preferred_time" name="preferred_time" value="{{ old('preferred_time') }}" required>
          <div class="time-slots">
            <button type="button" class="time-slot" data-time="8:00 AM">8:00 AM</button>
            <button type="button" class="time-slot" data-time="9:00 AM">9:00 AM</button>
            <button type="button" class="time-slot" data-time="10:00 AM">10:00 AM</button>
            <button type="button" class="time-slot" data-time="11:00 AM">11:00 AM</button>
            <button type="button" class="time-slot" data-time="2:00 PM">2:00 PM</button>
            <button type="button" class="time-slot" data-time="3:00 PM">3:00 PM</button>
            <button type="button" class="time-slot" data-time="4:00 PM">4:00 PM</button>
            <button type="button" class="time-slot" data-time="5:00 PM">5:00 PM</button>
          </div>
        </div>

        <div class="form-group">
          <label for="notes">Additional Notes (Optional)</label>
          <textarea 
            id="notes" 
            name="notes" 
            rows="3" 
            style="width: 100%; padding: 12px; border: none; border-radius: 10px; font-family: 'Poppins', sans-serif; resize: vertical;"
            placeholder="Any special requests or concerns?"
          >{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="submit-btn">Book Appointment</button>
      </form>
    </div>

    <div class="services-section">
      <h2>Available Services</h2>

      @foreach($services as $service)
        <div class="service-card {{ $service->price == 0 ? 'special-service' : '' }}">
          <div class="service-header">
            <div class="service-name">{{ $service->name }}</div>
            @if($service->price == 0)
              <span class="free-badge">FREE</span>
            @else
              <div class="service-price">₱{{ number_format($service->price, 0) }}</div>
            @endif
          </div>
          @if($service->description)
            <div class="service-description">{{ $service->description }}</div>
          @endif
        </div>
      @endforeach
    </div>

  </div>

  <script>
    // Time slot selection
    const timeSlots = document.querySelectorAll('.time-slot');
    const preferredTimeInput = document.getElementById('preferred_time');

    timeSlots.forEach(slot => {
      slot.addEventListener('click', function() {
        // Remove selected class from all slots
        timeSlots.forEach(s => s.classList.remove('selected'));

        // Add selected class to clicked slot
        this.classList.add('selected');

        // Set the hidden input value
        preferredTimeInput.value = this.dataset.time;
      });
    });

    // Pre-select the old value if it exists (after validation error)
    const oldTime = "{{ old('preferred_time') }}";
    if (oldTime) {
      timeSlots.forEach(slot => {
        if (slot.dataset.time === oldTime) {
          slot.classList.add('selected');
          preferredTimeInput.value = oldTime;
        }
      });
    }

    // Form validation
    document.getElementById('appointmentForm').addEventListener('submit', function(e) {
      if (!preferredTimeInput.value) {
        e.preventDefault();
        alert('Please select a preferred time slot.');
      }
    });

    // Hamburger menu toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');

    if (hamburger && navMenu) {
      hamburger.addEventListener('click', function() {
        navMenu.classList.toggle('show');
      });
    }
  </script>

</body>
</html>