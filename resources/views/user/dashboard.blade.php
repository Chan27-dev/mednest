<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Dashboard - MedNest</title>
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
      background: linear-gradient(135deg, #ffeef0 0%, #fff5f6 100%);
      min-height: 100vh;
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

    /* DASHBOARD CONTAINER */
    .dashboard-container {
      max-width: 1400px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .welcome-section {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .welcome-section h1 {
      font-size: 32px;
      color: #2C2828;
      margin-bottom: 8px;
    }

    .welcome-section p {
      color: #666;
      font-size: 16px;
    }

    /* 🎉 PREGNANCY COUNTDOWN CARD */
    .pregnancy-countdown-card {
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      padding: 40px;
      border-radius: 20px;
      color: white;
      margin-bottom: 30px;
      box-shadow: 0 6px 25px rgba(123, 7, 7, 0.3);
      position: relative;
      overflow: hidden;
    }

    .pregnancy-countdown-card::before {
      content: '👶';
      position: absolute;
      font-size: 200px;
      opacity: 0.1;
      right: -30px;
      top: -30px;
    }

    .countdown-content {
      position: relative;
      z-index: 1;
    }

    .countdown-header {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .countdown-icon {
      font-size: 50px;
    }

    .countdown-header h2 {
      font-size: 28px;
      font-weight: 700;
    }

    .countdown-message {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 25px;
      background: rgba(255, 255, 255, 0.15);
      padding: 20px;
      border-radius: 15px;
      border-left: 4px solid white;
    }

    .countdown-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-top: 25px;
    }

    .countdown-stat {
      background: rgba(255, 255, 255, 0.2);
      padding: 20px;
      border-radius: 15px;
      text-align: center;
      backdrop-filter: blur(10px);
    }

    .countdown-stat-value {
      font-size: 36px;
      font-weight: 900;
      display: block;
      margin-bottom: 5px;
    }

    .countdown-stat-label {
      font-size: 14px;
      opacity: 0.9;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .edd-info {
      background: rgba(255, 255, 255, 0.25);
      padding: 15px 20px;
      border-radius: 10px;
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      font-weight: 600;
    }

    /* QUICK ACTIONS */
    .quick-actions {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .action-card {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: all 0.3s;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
      display: block;
    }

    .action-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .action-icon {
      font-size: 48px;
      margin-bottom: 15px;
      display: block;
    }

    .action-card h3 {
      font-size: 20px;
      color: #7B0707;
      margin-bottom: 10px;
    }

    .action-card p {
      color: #666;
      font-size: 14px;
      line-height: 1.5;
    }

    /* UPCOMING APPOINTMENTS */
    .appointments-section {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .appointments-section h2 {
      font-size: 24px;
      color: #7B0707;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .appointment-item {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 15px;
      border-left: 4px solid #D44C64;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .appointment-item:last-child {
      margin-bottom: 0;
    }

    .appointment-details h4 {
      color: #2C2828;
      font-size: 18px;
      margin-bottom: 5px;
    }

    .appointment-details p {
      color: #666;
      font-size: 14px;
    }

    .appointment-badge {
      background: #FFF3CD;
      color: #856404;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .appointment-badge.completed {
      background: #D4EDDA;
      color: #155724;
    }

    .appointment-badge.cancelled {
      background: #F8D7DA;
      color: #721C24;
    }

    .appointment-actions {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .btn-reschedule, .btn-cancel {
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-reschedule {
      background: #7B0707;
      color: white;
    }

    .btn-reschedule:hover {
      background: #5f0505;
    }

    .btn-cancel {
      background: #f8f9fa;
      color: #721C24;
      border: 1px solid #dc3545;
    }

    .btn-cancel:hover {
      background: #dc3545;
      color: white;
    }

    .no-appointments {
      text-align: center;
      padding: 40px;
      color: #999;
    }

    .alert {
      padding: 15px 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 500;
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
      border-left: 4px solid #28a745;
    }

    .alert-error {
      background: #f8d7da;
      color: #721c24;
      border-left: 4px solid #dc3545;
    }

    .no-appointments-icon {
      font-size: 64px;
      margin-bottom: 15px;
      display: block;
    }

    /* RESPONSIVE */
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

      .dashboard-container {
        padding: 0 15px;
      }

      .welcome-section {
        padding: 20px;
      }

      .welcome-section h1 {
        font-size: 24px;
      }

      .pregnancy-countdown-card {
        padding: 25px;
      }

      .countdown-header {
        flex-direction: column;
        text-align: center;
      }

      .countdown-header h2 {
        font-size: 22px;
      }

      .countdown-message {
        font-size: 14px;
        padding: 15px;
      }

      .countdown-stat-value {
        font-size: 28px;
      }

      .quick-actions {
        grid-template-columns: 1fr;
      }

      .action-card {
        padding: 20px;
      }

      .appointments-section {
        padding: 20px;
      }

      .appointment-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        padding: 15px;
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header>
    <div class="logo-container">
      <a href="{{ route('user.dashboard') }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none;">
        <img src="/images/mednest-logo.png" alt="MedNest Logo">
        <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
      </a>
    </div>

    <nav id="nav-menu">
      <a href="{{ route('user.dashboard') }}" class="active">Dashboard</a>
      <a href="{{ route('user.appointment') }}">Book Appointment</a>
      <a href="{{ route('user.lab_results') }}">My Lab Results</a>
      <a href="{{ route('user.profile') }}">My Profile</a>
      <a href="{{ route('user.about') }}">About Us</a>
    </nav>

    <div class="user-dropdown">
      <div class="user-btn">
        <div style="width: 24px; height: 24px; background: #fff; color: #7B0707; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
          {{ strtoupper(substr($patient->first_name ?? Auth::user()->name ?? 'U', 0, 1)) }}
        </div>
        <span>{{ $patient->first_name ?? Str::of(Auth::user()->name ?? 'User')->explode(' ')->first() }}</span>
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

  <div class="dashboard-container">

    <!-- SUCCESS/ERROR MESSAGES -->
    @if(session('success'))
      <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
      </div>
    @endif

    <!-- WELCOME SECTION -->
    <div class="welcome-section">
      <h1>Welcome back, {{ $patient->first_name ?? 'User' }}!</h1>
      <p>Here's what's happening with your health journey today</p>
    </div>

    <!-- 🎉 PREGNANCY COUNTDOWN CARD -->
    @if($patient && $patient->lmp)
      @php
        $daysUntilDue = \Carbon\Carbon::now()->diffInDays($edd, false);
      @endphp

      <div class="pregnancy-countdown-card">
        <div class="countdown-content">
          <div class="countdown-header">
            <span class="countdown-icon">🤰</span>
            <h2>Your Pregnancy Journey</h2>
          </div>

          <div class="countdown-message">
            💕 We are excited for your journey, you're doing great!
            @if($daysUntilDue > 0)
              Every day brings you closer to holding your baby in your arms. We can't wait to be part of this beautiful moment with you! 🌟
            @else
              Your baby is due any day now! We're thrilled to help welcome your little one into the world! 🎉
            @endif
          </div>

          <div class="countdown-stats">
            <div class="countdown-stat">
              <span class="countdown-stat-value">{{ $edd ? $edd->format('M d, Y') : 'N/A' }}</span>
              <span class="countdown-stat-label">Estimated Due Date</span>
            </div>
            <div class="countdown-stat">
              <span class="countdown-stat-value">{{ $patient->gestational_age ?? 'N/A' }}</span>
              <span class="countdown-stat-label">Weeks Pregnant</span>
            </div>
            <div class="countdown-stat">
              <span class="countdown-stat-value">{{ number_format($monthsUntilDue ?? 0, 1) }}</span>
              <span class="countdown-stat-label">Months Until Due</span>
            </div>
          </div>

          <div class="edd-info">
            📅 Your Estimated Due Date: <strong>{{ $edd->format('F d, Y') }}</strong>
          </div>
        </div>
      </div>
    @endif

    <!-- QUICK ACTIONS -->
    <div class="quick-actions">
      <a href="{{ route('user.appointment') }}" class="action-card">
        <span class="action-icon">📅</span>
        <h3>Book Appointment</h3>
        <p>Schedule your next check-up or consultation</p>
      </a>

      <a href="{{ route('user.lab_results') }}" class="action-card">
        <span class="action-icon">🧪</span>
        <h3>View Lab Results</h3>
        <p>Access your medical test results and reports</p>
      </a>

      <a href="{{ route('user.profile') }}" class="action-card">
        <span class="action-icon">👤</span>
        <h3>My Profile</h3>
        <p>Update your personal and medical information</p>
      </a>
    </div>

    <!-- UPCOMING APPOINTMENTS -->
    <div class="appointments-section">
      <h2>
        <span>📋</span>
        Upcoming Appointments
      </h2>
      
      @if(isset($upcomingAppointments) && count($upcomingAppointments) > 0)
        @foreach($upcomingAppointments as $appointment)
          <div class="appointment-item">
            <div style="flex: 1;">
              <div class="appointment-details">
                <h4>{{ $appointment->service->name ?? 'Appointment' }}</h4>
                <p>
                  📅 {{ $appointment->start_time->format('F d, Y') }}
                  at {{ $appointment->start_time->format('g:i A') }}
                </p>
                <p style="margin-top: 5px;">
                  🏥 {{ $appointment->branch->name ?? 'N/A' }} |
                  👨‍⚕️ {{ $appointment->staff->first_name ?? '' }} {{ $appointment->staff->last_name ?? '' }}
                </p>
              </div>

              @if(in_array($appointment->status, ['scheduled', 'pending']))
              <div class="appointment-actions">
                <a href="{{ route('user.appointment.reschedule', $appointment->id) }}" class="btn-reschedule">
                  📅 Reschedule
                </a>
                <form action="{{ route('user.appointment.cancel', $appointment->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                  @csrf
                  <button type="submit" class="btn-cancel">❌ Cancel</button>
                </form>
              </div>
              @endif
            </div>
            <span class="appointment-badge {{ $appointment->status }}">
              {{ ucfirst($appointment->status) }}
            </span>
          </div>
        @endforeach
      @else
        <div class="no-appointments">
          <span class="no-appointments-icon">📅</span>
          <p>No upcoming appointments</p>
          <a href="{{ route('user.appointment') }}" style="color: #7B0707; font-weight: 600; text-decoration: none;">Book your next appointment →</a>
        </div>
      @endif
    </div>

  </div>

  <script>
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