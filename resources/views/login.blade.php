<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Login</title>
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
      z-index: 100;
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

    nav a.active {
      color: #7B0707;
      font-weight: 700;
      border-bottom: 2px solid #7B0707;
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
    }

    /* MOBILE MENU */
    @media (max-width: 768px) {
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
        border-top: 1px solid #eee;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 99;
      }

      nav.show {
        display: flex;
      }

      nav a {
        text-align: center;
        padding: 10px;
        border-top: 1px solid #eee;
      }

      .right-nav {
        gap: 10px;
      }

      .phone-btn {
        padding: 6px 12px;
        font-size: 14px;
      }
    }

    /* LOGIN SECTION */
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 80px);
      background: #f9f9f9;
      padding: 20px;
    }

    .login-box {
      max-width: 450px;
      width: 100%;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 24px 30px rgba(44, 40, 40, 0.1);
      overflow: hidden;
    }

    .login-header {
      background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
      padding: 20px;
      color: white;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }

    .login-header p {
      margin: 5px 0 0;
      font-size: 13px;
      font-weight: normal;
    }

    .login-body {
      padding: 30px;
    }

    .login-body label {
      display: block;
      font-size: 14px;
      margin: 10px 0 5px;
      font-weight: 500;
    }

    .login-body input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      box-sizing: border-box;
    }

    .login-body input:focus {
      outline: none;
      border-color: #B7233D;
      box-shadow: 0 0 0 3px rgba(183, 35, 61, 0.2);
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 30px;
      background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-btn:hover {
      opacity: 0.9;
    }

    .register-link {
      margin-top: 15px;
      font-size: 13px;
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
        <a href="{{ route('user.landing_page') }}" class="{{ request()->is('/') || request()->routeIs('user.landing_page') ? 'active' : '' }}">Home</a>
        <a href="{{ route('user.services') }}" class="{{ request()->routeIs('user.services') ? 'active' : '' }}">Services</a>
        <a href="{{ route('user.about') }}" class="{{ request()->routeIs('user.about') ? 'active' : '' }}">About Us</a>
        <a href="{{ route('user.appointment') }}" class="{{ request()->routeIs('user.appointment') ? 'active' : '' }}">Appointment</a>
      </nav>
    </div>

    <div class="right-nav">
      <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
      <div class="hamburger" id="hamburger">☰</div>
    </div>
  </header>

  <!-- LOGIN BOX -->
  <div class="login-container">
    <div class="login-box">
      <div class="login-header">
        Welcome to MedNest
        <p>Please login or register to book your appointment</p>
      </div>
      <div class="login-body">
        <form>
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>

          <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="register-link">
            Don’t have an account? <a href="{{ route('user.terms') }}">Register here</a>
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
