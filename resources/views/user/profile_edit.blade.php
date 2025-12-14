<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile - MedNest</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffeef0 0%, #fff5f6 100%);
      min-height: 100vh;
      padding: 20px;
    }

    /* NAVBAR */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 40px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin: -20px -20px 30px -20px;
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

    .form-container {
      max-width: 900px;
      margin: 0 auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(123, 7, 7, 0.1);
      padding: 40px;
    }

    .page-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .page-header h1 {
      font-size: 32px;
      color: #7B0707;
      margin-bottom: 8px;
    }

    .page-header p {
      color: #666;
      font-size: 16px;
    }

    .form-section {
      margin-bottom: 40px;
    }

    .section-title {
      font-size: 20px;
      color: #7B0707;
      font-weight: 700;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 3px solid #7B0707;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group.full-width {
      grid-column: 1 / -1;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      color: #2C2828;
      font-size: 14px;
    }

    .form-group label .required {
      color: #D44C64;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #D44C64;
      box-shadow: 0 0 0 3px rgba(212, 76, 100, 0.1);
    }

    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }

    .form-help {
      font-size: 12px;
      color: #999;
      margin-top: 5px;
    }

    .form-actions {
      display: flex;
      gap: 15px;
      justify-content: center;
      margin-top: 40px;
      padding-top: 30px;
      border-top: 2px solid #f0f0f0;
    }

    .btn {
      padding: 14px 40px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    .btn-primary {
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(123, 7, 7, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(123, 7, 7, 0.4);
    }

    .btn-secondary {
      background: white;
      color: #7B0707;
      border: 2px solid #7B0707;
    }

    .btn-secondary:hover {
      background: #f9f9f9;
    }

    .alert {
      padding: 15px 20px;
      border-radius: 12px;
      margin-bottom: 25px;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-success {
      background: #E8F5E9;
      color: #2E7D32;
      border: 2px solid #4CAF50;
    }

    .alert-error {
      background: #FFEBEE;
      color: #C62828;
      border: 2px solid #EF5350;
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

      .form-container {
        padding: 25px;
        margin: 15px 10px;
      }

      .page-header h1 {
        font-size: 24px;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .form-section {
        margin-bottom: 30px;
      }

      .section-title {
        font-size: 18px;
      }

      .form-actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 10px;
      }

      .form-container {
        padding: 20px;
      }

      .page-header h1 {
        font-size: 20px;
      }

      .form-group input,
      .form-group select,
      .form-group textarea {
        font-size: 16px;
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
      <a href="{{ route('user.dashboard') }}">Dashboard</a>
      <a href="{{ route('user.appointment') }}">Book Appointment</a>
      <a href="{{ route('user.lab_results') }}">My Lab Results</a>
      <a href="{{ route('user.profile') }}" class="active">My Profile</a>
      <a href="{{ route('user.about') }}">About Us</a>
    </nav>

    <div class="user-dropdown">
      <div class="user-btn">
        <div style="width: 24px; height: 24px; background: #fff; color: #7B0707; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
          {{ strtoupper(substr(Auth::user()->patient->first_name ?? 'U', 0, 1)) }}
        </div>
        <span>{{ Auth::user()->patient->first_name ?? 'User' }}</span>
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

  <div class="form-container">
    <div class="page-header">
      <h1>Edit Your Profile</h1>
      <p>Keep your information up to date for better care</p>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        <span style="font-size: 20px;">✓</span>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-error">
        <div>
          <strong>Please fix the following errors:</strong>
          <ul style="margin: 10px 0 0 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif

    <form method="POST" action="{{ route('user.profile.update') }}">
      @csrf

      <!-- 1️⃣ PERSONAL INFORMATION -->
      <div class="form-section">
        <h3 class="section-title">
          Personal Information
        </h3>
        <div class="form-grid">
          <div class="form-group">
            <label for="first_name">First Name <span class="required">*</span></label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->patient->first_name ?? '') }}" required>
          </div>

          <div class="form-group">
            <label for="last_name">Last Name <span class="required">*</span></label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->patient->last_name ?? '') }}" required>
          </div>

          <div class="form-group">
            <label for="date_of_birth">Date of Birth <span class="required">*</span></label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->patient->date_of_birth ?? '') }}" max="{{ date('Y-m-d') }}" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number <span class="required">*</span></label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->patient->phone ?? '') }}" placeholder="+63 912 345 6789" required>
          </div>

          <div class="form-group full-width">
            <label for="address">Complete Address <span class="required">*</span></label>
            <textarea id="address" name="address" required>{{ old('address', $user->patient->address ?? '') }}</textarea>
            <small class="form-help">Include barangay, city/municipality, and province</small>
          </div>

          <div class="form-group">
            <label for="civil_status">Civil Status <span class="required">*</span></label>
            <select id="civil_status" name="civil_status" required>
              <option value="">Select status</option>
              <option value="Single" {{ old('civil_status', $user->patient->civil_status ?? '') == 'Single' ? 'selected' : '' }}>Single</option>
              <option value="Married" {{ old('civil_status', $user->patient->civil_status ?? '') == 'Married' ? 'selected' : '' }}>Married</option>
              <option value="Widowed" {{ old('civil_status', $user->patient->civil_status ?? '') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
              <option value="Separated" {{ old('civil_status', $user->patient->civil_status ?? '') == 'Separated' ? 'selected' : '' }}>Separated</option>
              <option value="Divorced" {{ old('civil_status', $user->patient->civil_status ?? '') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
            </select>
          </div>

          <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $user->patient->occupation ?? '') }}" placeholder="e.g., Teacher, Housewife">
          </div>

          <div class="form-group">
            <label for="blood_type">Blood Type</label>
            <select id="blood_type" name="blood_type">
              <option value="">Select blood type</option>
              <option value="A+" {{ old('blood_type', $user->patient->blood_type ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
              <option value="A-" {{ old('blood_type', $user->patient->blood_type ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
              <option value="B+" {{ old('blood_type', $user->patient->blood_type ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
              <option value="B-" {{ old('blood_type', $user->patient->blood_type ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
              <option value="AB+" {{ old('blood_type', $user->patient->blood_type ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
              <option value="AB-" {{ old('blood_type', $user->patient->blood_type ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
              <option value="O+" {{ old('blood_type', $user->patient->blood_type ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
              <option value="O-" {{ old('blood_type', $user->patient->blood_type ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
            </select>
          </div>
        </div>
      </div>

      <!-- EMERGENCY CONTACT INFORMATION -->
      <div class="form-section">
        <h3 class="section-title">
          Emergency Contact Information
        </h3>
        <p style="color: #666; font-size: 14px; margin-bottom: 20px;">This can be your husband or any family member.</p>
        <div class="form-grid">
          <div class="form-group">
            <label for="emergency_contact_name">Emergency Contact Name</label>
            <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name', $user->patient->emergency_contact_name ?? '') }}" placeholder="Full name">
          </div>

          <div class="form-group">
            <label for="emergency_contact_phone">Emergency Contact Phone</label>
            <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $user->patient->emergency_contact_phone ?? '') }}" placeholder="+63 912 345 6789">
          </div>
        </div>
      </div>

      <!-- 2️⃣ PREGNANCY DETAILS -->
      <div class="form-section">
        <h3 class="section-title">
          Pregnancy Details
        </h3>
        <div class="form-grid">
          <div class="form-group">
            <label for="lmp">Last Menstrual Period (LMP) <span class="required">*</span></label>
            <input type="date" id="lmp" name="lmp" value="{{ old('lmp', $user->patient->lmp ?? '') }}" max="{{ date('Y-m-d') }}" required>
            <small class="form-help">First day of your last period</small>
          </div>
        </div>
      </div>


      <!-- FORM ACTIONS -->
      <div class="form-actions">
        <button type="submit" class="btn btn-primary"> Save Changes</button>
        <a href="{{ route('user.profile') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
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