<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - MedNest</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    .profile-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .page-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .page-header h1 {
      font-size: 36px;
      color: #7B0707;
      margin-bottom: 8px;
    }

    .page-header p {
      color: #666;
      font-size: 16px;
    }

    /* PROFILE CARD */
    .profile-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(123, 7, 7, 0.1);
      padding: 40px;
      margin-bottom: 30px;
    }

    .profile-header-section {
      display: flex;
      align-items: center;
      gap: 30px;
      padding-bottom: 30px;
      border-bottom: 2px solid #f0f0f0;
      margin-bottom: 40px;
    }

    .profile-avatar {
      position: relative;
    }

    .profile-avatar img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid #7B0707;
      box-shadow: 0 4px 15px rgba(123, 7, 7, 0.2);
    }

    .edit-avatar-btn {
      position: absolute;
      bottom: 5px;
      right: 5px;
      background: #7B0707;
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .profile-header-info h2 {
      font-size: 32px;
      color: #2C2828;
      margin-bottom: 5px;
    }

    .profile-header-info .subtitle {
      color: #7B0707;
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .quick-stats {
      display: flex;
      gap: 20px;
      margin-top: 15px;
    }

    .stat-badge {
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* SECTION STYLES */
    .info-section {
      margin-bottom: 40px;
    }

    .section-title {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 3px solid #7B0707;
    }

    .section-title-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: white;
    }

    .section-title h3 {
      font-size: 24px;
      color: #7B0707;
      font-weight: 700;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }

    .info-item {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 12px;
      border-left: 4px solid #D44C64;
      transition: all 0.3s;
    }

    .info-item:hover {
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transform: translateX(5px);
    }

    .info-label {
      font-size: 12px;
      font-weight: 600;
      color: #7B0707;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .info-label i {
      font-size: 14px;
    }

    .info-value {
      font-size: 16px;
      color: #2C2828;
      font-weight: 500;
      word-wrap: break-word;
    }

    .info-value.empty {
      color: #999;
      font-style: italic;
    }

    /* PREGNANCY HIGHLIGHT */
    .pregnancy-highlight {
      background: linear-gradient(135deg, rgba(212, 76, 100, 0.1), rgba(183, 35, 61, 0.1));
      border: 2px solid #D44C64;
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 30px;
    }

    .pregnancy-highlight .info-grid {
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .pregnancy-highlight .info-item {
      background: white;
      border-left: 4px solid #7B0707;
    }

    .pregnancy-highlight .info-value {
      font-size: 18px;
      font-weight: 700;
      color: #7B0707;
    }

    /* EDIT BUTTON */
    .edit-profile-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      color: white;
      border: none;
      padding: 16px 32px;
      border-radius: 50px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 6px 20px rgba(123, 7, 7, 0.3);
      transition: all 0.3s;
      z-index: 999;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .edit-profile-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(123, 7, 7, 0.4);
    }

    /* SUCCESS MESSAGE */
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

    /* APPOINTMENT HISTORY */
    .appointment-history-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .appointment-history-table th {
      background: linear-gradient(135deg, #D44C64 0%, #B7233D 100%);
      color: white;
      padding: 15px;
      text-align: left;
      font-weight: 600;
      font-size: 14px;
    }

    .appointment-history-table td {
      padding: 15px;
      border-bottom: 1px solid #f0f0f0;
      font-size: 14px;
      color: #2C2828;
    }

    .appointment-history-table tr:last-child td {
      border-bottom: none;
    }

    .appointment-history-table tr:hover {
      background: #fafafa;
    }

    .status-completed {
      color: #4CAF50;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .status-pending {
      color: #FF9800;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
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

      .profile-container {
        padding: 0 10px;
      }

      .profile-card {
        padding: 25px;
      }

      .profile-header-section {
        flex-direction: column;
        text-align: center;
      }

      .profile-avatar img {
        width: 120px;
        height: 120px;
      }

      .quick-stats {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .info-grid {
        grid-template-columns: 1fr;
      }

      .section-title h3 {
        font-size: 20px;
      }

      .edit-profile-btn {
        bottom: 20px;
        right: 20px;
        padding: 14px 28px;
        font-size: 14px;
      }

      .page-header h1 {
        font-size: 28px;
      }

      .appointment-history-table {
        font-size: 13px;
      }

      .appointment-history-table th,
      .appointment-history-table td {
        padding: 12px 8px;
      }
    }

    @media (max-width: 480px) {
      .profile-card {
        padding: 20px;
      }

      .page-header h1 {
        font-size: 24px;
      }

      .edit-profile-btn {
        position: fixed;
        bottom: 15px;
        right: 15px;
        left: 15px;
        width: auto;
        justify-content: center;
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

  <div class="profile-container">
    <div class="page-header">
      <h1>My Profile</h1>
      <p>Manage your personal and pregnancy information</p>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        <span style="font-size: 20px;">✓</span>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    <div class="profile-card">
      
      <!-- PROFILE HEADER -->
      <div class="profile-header-section">
        <div class="profile-avatar">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Picture">
          <button class="edit-avatar-btn" title="Change Photo">📷</button>
        </div>
        <div class="profile-header-info">
          <h2>{{ $patient ? $patient->full_name : 'User' }}</h2>
          <p class="subtitle">Patient ID: {{ $patient->patient_id ?? 'Not assigned yet' }}</p>
          <div class="quick-stats">
            <span class="stat-badge">
              📅 Member since {{ $user->created_at ? $user->created_at->format('M Y') : 'Recently' }}
            </span>
            @if($patient && $patient->lmp)
              <span class="stat-badge">
                🤰 {{ $weeksPregnant ?? 0 }} weeks pregnant
              </span>
            @endif
          </div>
        </div>
      </div>

      <!-- PERSONAL INFORMATION SECTION -->
      <div class="info-section">
        <div class="section-title">
          <h3>Personal Information</h3>
        </div>
        <div class="info-grid">
          <div class="info-item">
            <div class="info-label">First Name</div>
            <div class="info-value">{{ $patient->first_name ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Last Name</div>
            <div class="info-value">{{ $patient->last_name ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Date of Birth</div>
            <div class="info-value">{{ $patient && $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('F d, Y') : 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Age</div>
            <div class="info-value">
              @if($patient && $patient->date_of_birth)
                {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} years old
              @else
                Not provided
              @endif
            </div>
          </div>
          <div class="info-item">
            <div class="info-label">Phone Number</div>
            <div class="info-value">{{ $patient->phone ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Email Address</div>
            <div class="info-value">{{ $user->email ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Address</div>
            <div class="info-value">{{ $patient->address ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Civil Status</div>
            <div class="info-value">{{ $patient->civil_status ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Occupation</div>
            <div class="info-value">{{ $patient->occupation ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Blood Type</div>
            <div class="info-value">{{ $patient->blood_type ?? 'Not provided' }}</div>
          </div>
        </div>
      </div>

      <!-- EMERGENCY CONTACT SECTION -->
      <div class="info-section">
        <div class="section-title">
          <h3>Emergency Contact Information</h3>
        </div>
        <p style="color: #666; font-size: 14px; margin-bottom: 20px;">This can be your husband or any family member.</p>
        <div class="info-grid">
          <div class="info-item">
            <div class="info-label">Emergency Contact Name</div>
            <div class="info-value">{{ $patient->emergency_contact_name ?? 'Not provided' }}</div>
          </div>
          <div class="info-item">
            <div class="info-label">Emergency Contact Phone</div>
            <div class="info-value">{{ $patient->emergency_contact_phone ?? 'Not provided' }}</div>
          </div>
        </div>
      </div>

      <!-- PREGNANCY DETAILS SECTION -->
      <div class="info-section">
        <div class="section-title">
          <h3>Pregnancy Details</h3>
        </div>
        
        <div class="pregnancy-highlight">
          <div class="info-grid">
            <div class="info-item">
              <div class="info-label">Last Menstrual Period (LMP)</div>
              <div class="info-value">{{ $patient && $patient->lmp ? \Carbon\Carbon::parse($patient->lmp)->format('F d, Y') : 'Not provided' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Estimated Due Date (EDD)</div>
              <div class="info-value">
                @if($patient && $patient->lmp)
                  {{ \Carbon\Carbon::parse($patient->lmp)->addDays(280)->format('F d, Y') }}
                @else
                  Not calculated yet
                @endif
              </div>
            </div>
            <div class="info-item">
              <div class="info-label">Weeks Pregnant</div>
              <div class="info-value">{{ $patient->gestational_age ?? 'Not calculated' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Months Until Due Date</div>
              <div class="info-value">{{ $monthsUntilDue ?? 'Not calculated' }}</div>
            </div>
          </div>
        </div>
      </div>


      <!-- APPOINTMENT HISTORY -->
      <div class="info-section">
        <div class="section-title">
          <h3>Appointment History</h3>
        </div>
        <table class="appointment-history-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Service</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($appointments ?? [] as $appointment)
              <tr>
                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('F d, Y') }}</td>
                <td>{{ $appointment->service->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</td>
                <td>
                  <span class="{{ $appointment->status == 'completed' ? 'status-completed' : 'status-pending' }}">
                    <i class="fas {{ $appointment->status == 'completed' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                    {{ ucfirst($appointment->status) }}
                  </span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" style="text-align: center; color: #999; padding: 30px;">
                  No appointments yet. <a href="{{ route('user.appointment') }}" style="color: #7B0707; font-weight: 600;">Book your first appointment</a>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <!-- EDIT PROFILE BUTTON -->
  <a href="{{ route('user.profile.edit') }}" class="edit-profile-btn">
    Edit Profile
  </a>

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