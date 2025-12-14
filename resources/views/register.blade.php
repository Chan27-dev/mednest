 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      color: #373C36;
      background: #fff;
    }

    /* NAVBAR */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 40px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      position: relative;
      z-index: 1000;
      flex-wrap: wrap;
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

    .nav-center {
      flex: 1;
      display: flex;
      justify-content: center;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    nav {
      display: flex;
      gap: 40px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    nav a {
      text-decoration: none;
      color: #373C36;
      font-weight: 500;
      transition: color 0.3s, border-bottom 0.3s;
      padding-bottom: 4px;
    }

    nav a:hover {
      color: #7B0707;
      border-bottom: 2px solid #7B0707;
    }

    .right-nav {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .phone-btn {
      background: #7B0707;
      color: #fff;
      padding: 8px 16px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      font-size: 15px;
      white-space: nowrap;
    }

    /* HAMBURGER */
    .hamburger {
      display: none;
      font-size: 28px;
      cursor: pointer;
      color: #7B0707;
      z-index: 1100;
    }

    /* MOBILE MENU */
    @media (max-width: 900px) {
      .hamburger {
        display: block;
      }

      .nav-center {
        position: static;
        transform: none;
        width: 100%;
      }

      nav {
        display: none;
        flex-direction: column;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        border-radius: 10px;
        text-align: center;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1050;
      }

      nav.show {
        display: flex;
      }

      nav a {
        margin: 10px 0;
        font-size: 16px;
      }

      .right-nav {
        gap: 10px;
      }

      .phone-btn {
        padding: 6px 12px;
        font-size: 14px;
      }
    }

    /* REGISTER SECTION */
    .register-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 80px);
      background: #f9f9f9;
      padding: 20px;
    }

    .register-box {
      width: 500px;
      max-width: 100%;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 16px 24px rgba(44, 40, 40, 0.12);
      overflow: hidden;
    }

    .register-header {
      background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
      padding: 16px;
      color: white;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
    }

    .register-header p {
      margin: 4px 0 0;
      font-size: 12px;
      font-weight: normal;
    }

    .register-body {
      padding: 20px 24px;
    }

    .error-message {
      background: #fee;
      border: 1px solid #fcc;
      color: #c33;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 13px;
    }

    .error-message ul {
      margin: 5px 0 0;
      padding-left: 20px;
    }

    .success-message {
      background: #efe;
      border: 1px solid #cfc;
      color: #3c3;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 13px;
    }

    .register-body label {
      display: block;
      font-size: 13px;
      margin: 6px 0 3px;
      font-weight: 500;
    }

    .register-body input {
      width: 100%;
      height: 38px; 
      padding: 0 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 12px;
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      box-sizing: border-box;
      transition: border 0.3s, box-shadow 0.3s;
    }

    .register-body input:focus {
      border-color: #B7233D;
      outline: none;
      box-shadow: 0 0 0 2px rgba(183, 35, 61, 0.2);
    }

    .register-body input.error {
      border-color: #c33;
    }

    .register-btn {
      width: 100%;
      height: 42px; 
      border: none;
      border-radius: 25px;
      background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
      color: white;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: 600;
    }

    .register-btn:hover {
      opacity: 0.9;
    }

    .register-link {
      margin-top: 10px;
      font-size: 12px;
      text-align: center;
    }

    .register-link a {
      color: #B7233D;
      text-decoration: none;
      font-weight: bold;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header>
    <div class="logo-container">
      <img src="/images/mednest-logo.png" alt="MedNest Logo">
      <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
    </div>

    <div class="nav-center">
      <nav id="nav">
        <a href="{{ route('user.landing_page') }}">Home</a>
        <a href="{{ route('user.services') }}">Services</a>
        <a href="{{ route('user.about') }}">About Us</a>
        <a href="{{ route('user.appointment') }}">Appointment</a>
      </nav>
    </div>

    <div class="right-nav">
      <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
      <div class="hamburger" id="hamburger">☰</div>
    </div>
  </header>

  <!-- REGISTER BOX -->
  <div class="register-container">
    <div class="register-box">
      <div class="register-header">
        Create Account
        <p>Please register to book your appointment</p>
      </div>
      <div class="register-body">
        @if ($errors->any())
          <div class="error-message">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if (session('success'))
          <div class="success-message">
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
          @csrf

          <!-- Personal Information -->
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="@error('first_name') error @enderror" required>

          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="@error('last_name') error @enderror" required>

          <label for="date_of_birth">Date of Birth</label>
          <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" max="{{ date('Y-m-d') }}" class="@error('date_of_birth') error @enderror" required>

          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') error @enderror" placeholder="+639123456789" required>

          <label for="address">Complete Address</label>
          <input type="text" id="address" name="address" value="{{ old('address') }}" class="@error('address') error @enderror" placeholder="Include barangay, city, province" required>

          <label for="civil_status">Civil Status</label>
          <select id="civil_status" name="civil_status" class="@error('civil_status') error @enderror" required style="width: 100%; height: 38px; padding: 0 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 12px; font-family: 'Poppins', sans-serif; font-size: 13px;">
            <option value="">Select status</option>
            <option value="Single" {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
            <option value="Married" {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married</option>
            <option value="Widowed" {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
            <option value="Separated" {{ old('civil_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
            <option value="Divorced" {{ old('civil_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
          </select>

          <label for="occupation">Occupation (optional)</label>
          <input type="text" id="occupation" name="occupation" value="{{ old('occupation') }}" class="@error('occupation') error @enderror" placeholder="e.g., Teacher, Housewife">

          <!-- Account Credentials -->
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') error @enderror" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="@error('password') error @enderror" required>

          <label for="password_confirmation">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required>

          <button type="submit" class="register-btn">Register</button>
        </form>

        <div class="register-link">
          Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
    hamburger.addEventListener('click', () => nav.classList.toggle('show'));
  </script>

</body>
</html>