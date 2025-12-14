  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Lab Results - MedNest</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

      /* MAIN CONTENT */
      .page-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 20px;
      }

      .page-header {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
      }

      .page-header h1 {
        font-size: 32px;
        color: #7B0707;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .page-header p {
        color: #666;
        font-size: 16px;
      }

      /* LAB RESULTS CARD */
      .lab-results-card {
        background: white;
        padding: 60px 40px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
      }

      /* PREGNANCY INFO */
      .pregnancy-info {
        background: linear-gradient(135deg, #7B0707 0%, #a80909 100%);
        color: white;
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
      }

      .pregnancy-stat {
        text-align: center;
      }

      .pregnancy-stat h3 {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 5px;
        font-weight: 500;
      }

      .pregnancy-stat p {
        font-size: 24px;
        font-weight: 700;
      }

      /* CHECKUP CARDS */
      .checkup-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        overflow: hidden;
      }

      .checkup-header {
        background: linear-gradient(135deg, #ffeef0 0%, #fff5f6 100%);
        padding: 25px;
        border-bottom: 2px solid #7B0707;
      }

      .checkup-header h2 {
        color: #7B0707;
        font-size: 22px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .checkup-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        color: #666;
        font-size: 14px;
      }

      .checkup-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .checkup-body {
        padding: 25px;
      }

      .vital-signs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
      }

      .vital-sign-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 12px;
        border-left: 4px solid #7B0707;
      }

      .vital-sign-item label {
        display: block;
        font-size: 12px;
        color: #666;
        margin-bottom: 5px;
        font-weight: 600;
      }

      .vital-sign-item .value {
        font-size: 20px;
        color: #2C2828;
        font-weight: 700;
      }

      .section-title {
        font-size: 18px;
        color: #7B0707;
        margin: 25px 0 15px 0;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .lab-results-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }

      .lab-results-table th,
      .lab-results-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
      }

      .lab-results-table th {
        background: #f8f9fa;
        color: #7B0707;
        font-weight: 600;
        font-size: 14px;
      }

      .lab-results-table td {
        font-size: 14px;
        color: #2C2828;
      }

      .notes-section {
        background: #fff5f6;
        padding: 20px;
        border-radius: 12px;
        margin-top: 20px;
      }

      .notes-section h4 {
        color: #7B0707;
        font-size: 16px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .notes-section p {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
      }

      .no-results-text {
        text-align: center;
        color: #999;
        font-style: italic;
        padding: 20px;
      }

      .empty-state-icon {
        font-size: 120px;
        margin-bottom: 25px;
        display: block;
        opacity: 0.3;
      }

      .empty-state-message {
        max-width: 500px;
        margin: 0 auto;
      }

      .empty-state-message h2 {
        font-size: 28px;
        color: #2C2828;
        margin-bottom: 15px;
        font-weight: 600;
      }

      .empty-state-message p {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
      }

      .info-box {
        background: #ffeef0;
        border-left: 4px solid #7B0707;
        padding: 20px;
        border-radius: 10px;
        text-align: left;
        margin-top: 30px;
      }

      .info-box h3 {
        color: #7B0707;
        font-size: 18px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .info-box p {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
      }

      .btn-primary {
        display: inline-block;
        background: #7B0707;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        margin-top: 20px;
      }

      .btn-primary:hover {
        background: #5f0505;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(123, 7, 7, 0.3);
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

        .page-container {
          padding: 0 15px;
        }

        .page-header {
          padding: 20px;
        }

        .page-header h1 {
          font-size: 24px;
          flex-direction: column;
          gap: 10px;
        }

        .lab-results-card {
          padding: 40px 20px;
        }

        .empty-state-icon {
          font-size: 80px;
        }

        .empty-state-message h2 {
          font-size: 22px;
        }

        .empty-state-message p {
          font-size: 14px;
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
        <a href="{{ route('user.lab_results') }}" class="active">My Lab Results</a>
        <a href="{{ route('user.profile') }}">My Profile</a>
        <a href="{{ route('user.about') }}">About Us</a>
      </nav>

      <div class="user-dropdown">
        <div class="user-btn">
          <div style="width: 24px; height: 24px; background: #fff; color: #7B0707; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
          </div>
          <span>{{ Str::of(Auth::user()->name ?? 'User')->explode(' ')->first() }}</span>
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

    <!-- MAIN CONTENT -->
    <div class="page-container">

      <!-- PAGE HEADER -->
      <div class="page-header">
        <h1>
          <i class="fas fa-flask"></i>
          My Lab Results
        </h1>
        <p>View and download your medical test results and laboratory reports</p>
      </div>

      @if($pregnancy && $checkupsWithLabs->count() > 0)
        <!-- PREGNANCY INFO -->
        <div class="pregnancy-info">
          <div class="pregnancy-stat">
            <h3>Patient Name</h3>
            <p>{{ $patient->full_name ?? 'N/A' }}</p>
          </div>
          <div class="pregnancy-stat">
            <h3>Estimated Due Date</h3>
            <p>{{ $pregnancy->estimated_due_date ? $pregnancy->estimated_due_date->format('M d, Y') : 'N/A' }}</p>
          </div>
          <div class="pregnancy-stat">
            <h3>Pregnancy Status</h3>
            <p>{{ ucfirst($pregnancy->status) }}</p>
          </div>
        </div>

        <!-- PRENATAL CHECKUPS -->
        @foreach($checkupsWithLabs as $checkup)
        <div class="checkup-card">
          <div class="checkup-header">
            <h2>
              <i class="fas fa-heartbeat"></i>
              Prenatal Checkup - {{ $checkup->checkup_date->format('F d, Y') }}
            </h2>
            <div class="checkup-meta">
              <span><i class="fas fa-calendar"></i> {{ $checkup->checkup_date->format('l, M d, Y g:i A') }}</span>
              @if($checkup->staff)
              <span><i class="fas fa-user-md"></i> {{ $checkup->staff->first_name }} {{ $checkup->staff->last_name }}</span>
              @endif
            </div>
          </div>

          <div class="checkup-body">
            <h3 class="section-title"><i class="fas fa-notes-medical"></i> Vital Signs</h3>
            <div class="vital-signs-grid">
              @if($checkup->blood_pressure)
              <div class="vital-sign-item">
                <label>Blood Pressure (BP)</label>
                <div class="value">{{ $checkup->blood_pressure }} mmHg</div>
              </div>
              @endif

              @if($checkup->patient_weight_kg)
              <div class="vital-sign-item">
                <label>Weight (WT)</label>
                <div class="value">{{ $checkup->patient_weight_kg }} kg</div>
              </div>
              @endif

              @if($checkup->fundal_height_cm)
              <div class="vital-sign-item">
                <label>Fundal Height (FH)</label>
                <div class="value">{{ $checkup->fundal_height_cm }} cm</div>
              </div>
              @endif

              @if($checkup->fetal_heart_rate_bpm)
              <div class="vital-sign-item">
                <label>Fetal Heart Tone (FHT)</label>
                <div class="value">{{ $checkup->fetal_heart_rate_bpm }} bpm</div>
              </div>
              @endif

              @if($checkup->pulse_rate_bpm)
              <div class="vital-sign-item">
                <label>Pulse Rate (PR)</label>
                <div class="value">{{ $checkup->pulse_rate_bpm }} bpm</div>
              </div>
              @endif

              @if($checkup->respiratory_rate_bpm)
              <div class="vital-sign-item">
                <label>Respiratory Rate (RR)</label>
                <div class="value">{{ $checkup->respiratory_rate_bpm }} bpm</div>
              </div>
              @endif

              @if($checkup->age_of_gestation_weeks)
              <div class="vital-sign-item">
                <label>Age of Gestation (AOG)</label>
                <div class="value">{{ $checkup->age_of_gestation_weeks }} weeks</div>
              </div>
              @endif

              @if($checkup->tcb)
              <div class="vital-sign-item">
                <label>To Come Back (TCB)</label>
                <div class="value">{{ $checkup->tcb }}</div>
              </div>
              @endif
            </div>

            @if($checkup->labResults && $checkup->labResults->count() > 0)
            <h3 class="section-title"><i class="fas fa-flask"></i> Additional Laboratory Tests</h3>
            <table class="lab-results-table">
              <thead>
                <tr>
                  <th>Test Name</th>
                  <th>Result</th>
                  <th>Test Date</th>
                  <th>Doctor's Notes/Advice</th>
                </tr>
              </thead>
              <tbody>
                @foreach($checkup->labResults as $labResult)
                <tr>
                  <td><strong>{{ $labResult->test_name }}</strong></td>
                  <td>{{ $labResult->result }}</td>
                  <td>{{ $labResult->test_date->format('M d, Y') }}</td>
                  <td>{{ $labResult->notes ?? 'No notes' }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif

            @if($checkup->tcb || $checkup->notes)
            <div class="notes-section">
              @if($checkup->tcb)
              <h4><i class="fas fa-clipboard-list"></i> Treatment Plan / Follow-up (TCB)</h4>
              <p>{{ $checkup->tcb }}</p>
              @endif

              @if($checkup->notes)
              <h4 style="margin-top: 15px;"><i class="fas fa-comment-medical"></i> Additional Notes</h4>
              <p>{{ $checkup->notes }}</p>
              @endif
            </div>
            @endif
          </div>
        </div>
        @endforeach

      @else
        <!-- EMPTY STATE -->
        <div class="lab-results-card">
          <span class="empty-state-icon">🧪</span>

          <div class="empty-state-message">
            <h2>No Existing Records</h2>
            <p>You don't have any lab results available at the moment. Once your tests are completed and processed, they will appear here for you to view and download.</p>

            <div class="info-box">
              <h3>
                <i class="fas fa-info-circle"></i>
                What to expect?
              </h3>
              <p>
                After your laboratory tests are completed, results are typically available within 2-5 business days.
                You'll receive a notification when new results are ready. If you have any questions about your
                test results, please consult with your healthcare provider during your next appointment.
              </p>
            </div>

            <a href="{{ route('user.appointment') }}" class="btn-primary">
              <i class="fas fa-calendar-plus"></i> Book an Appointment
            </a>
          </div>
        </div>
      @endif

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