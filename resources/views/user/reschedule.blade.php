<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reschedule Appointment - MedNest</title>
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
    }

    nav a:hover {
      color: #7B0707;
    }

    .user-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #7B0707;
      color: #fff;
      padding: 8px 16px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
    }

    /* MAIN CONTENT */
    .page-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .page-header {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      text-align: center;
    }

    .page-header h1 {
      font-size: 32px;
      color: #7B0707;
      margin-bottom: 10px;
    }

    .page-header p {
      color: #666;
      font-size: 16px;
    }

    .form-card {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .current-appointment {
      background: #ffeef0;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 30px;
      border-left: 4px solid #7B0707;
    }

    .current-appointment h3 {
      color: #7B0707;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .current-appointment p {
      color: #555;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      color: #2C2828;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      font-size: 14px;
      font-family: 'Poppins', sans-serif;
      transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      outline: none;
      border-color: #7B0707;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }

    .button-group {
      display: flex;
      gap: 15px;
      margin-top: 30px;
    }

    .btn-primary {
      flex: 1;
      background: #7B0707;
      color: white;
      padding: 14px 30px;
      border-radius: 30px;
      border: none;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background: #5f0505;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(123, 7, 7, 0.3);
    }

    .btn-secondary {
      flex: 1;
      background: #f8f9fa;
      color: #2C2828;
      padding: 14px 30px;
      border-radius: 30px;
      border: 2px solid #e0e0e0;
      font-weight: 600;
      font-size: 16px;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }

    .btn-secondary:hover {
      background: #e0e0e0;
    }

    .error-message {
      background: #f8d7da;
      color: #721c24;
      padding: 12px 16px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .page-container {
        padding: 0 15px;
      }

      .form-card {
        padding: 25px;
      }

      .button-group {
        flex-direction: column;
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

    <nav>
      <a href="{{ route('user.dashboard') }}">Dashboard</a>
      <a href="{{ route('user.appointment') }}">Book Appointment</a>
      <a href="{{ route('user.lab_results') }}">My Lab Results</a>
      <a href="{{ route('user.profile') }}">My Profile</a>
    </nav>

    <a href="{{ route('user.profile') }}" class="user-btn">
      <div style="width: 24px; height: 24px; background: #fff; color: #7B0707; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
      </div>
      <span>{{ Str::of(Auth::user()->name ?? 'User')->explode(' ')->first() }}</span>
    </a>
  </header>

  <!-- MAIN CONTENT -->
  <div class="page-container">

    <!-- PAGE HEADER -->
    <div class="page-header">
      <h1><i class="fas fa-calendar-alt"></i> Reschedule Appointment</h1>
      <p>Select a new date and time for your appointment</p>
    </div>

    <!-- FORM CARD -->
    <div class="form-card">

      <!-- Current Appointment Info -->
      <div class="current-appointment">
        <h3>Current Appointment Details</h3>
        <p><strong>Service:</strong> {{ $appointment->service->name ?? 'N/A' }}</p>
        <p><strong>Date:</strong> {{ $appointment->start_time->format('F d, Y') }}</p>
        <p><strong>Time:</strong> {{ $appointment->start_time->format('g:i A') }}</p>
        <p><strong>Branch:</strong> {{ $appointment->branch->name ?? 'N/A' }}</p>
        <p><strong>Doctor:</strong> {{ $appointment->staff->first_name ?? '' }} {{ $appointment->staff->last_name ?? '' }}</p>
      </div>

      <!-- Error Messages -->
      @if ($errors->any())
        <div class="error-message">
          <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Reschedule Form -->
      <form action="{{ route('user.appointment.reschedule.submit', $appointment->id) }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="appointment_date">New Appointment Date <span style="color: red;">*</span></label>
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
          <label for="preferred_time">Preferred Time <span style="color: red;">*</span></label>
          <select id="preferred_time" name="preferred_time" required>
            <option value="">Select a time</option>
            <option value="08:00 AM" {{ old('preferred_time') == '08:00 AM' ? 'selected' : '' }}>8:00 AM</option>
            <option value="09:00 AM" {{ old('preferred_time') == '09:00 AM' ? 'selected' : '' }}>9:00 AM</option>
            <option value="10:00 AM" {{ old('preferred_time') == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
            <option value="11:00 AM" {{ old('preferred_time') == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
            <option value="01:00 PM" {{ old('preferred_time') == '01:00 PM' ? 'selected' : '' }}>1:00 PM</option>
            <option value="02:00 PM" {{ old('preferred_time') == '02:00 PM' ? 'selected' : '' }}>2:00 PM</option>
            <option value="03:00 PM" {{ old('preferred_time') == '03:00 PM' ? 'selected' : '' }}>3:00 PM</option>
            <option value="04:00 PM" {{ old('preferred_time') == '04:00 PM' ? 'selected' : '' }}>4:00 PM</option>
          </select>
        </div>

        <div class="form-group">
          <label for="notes">Additional Notes (Optional)</label>
          <textarea
            id="notes"
            name="notes"
            placeholder="Any special requests or information for your appointment..."
          >{{ old('notes', $appointment->notes) }}</textarea>
        </div>

        <div class="button-group">
          <a href="{{ route('user.dashboard') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i>&nbsp; Cancel
          </a>
          <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>&nbsp; Confirm Reschedule
          </button>
        </div>

      </form>

    </div>

  </div>

</body>
</html>