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
      z-index: 100;
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
      align-items: center;
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
      flex-direction: column;
      cursor: pointer;
      z-index: 110;
    }

    .bar {
      width: 25px;
      height: 3px;
      background-color: #333;
      margin: 4px 0;
      border-radius: 2px;
      transition: 0.3s;
    }

    /* MOBILE MENU */
    @media (max-width: 900px) {
      nav {
        position: absolute;
        top: 75px;
        right: 0;
        width: 100%;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        border-top: 2px solid #f1f1f1;
        display: none;
        padding: 20px 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      }

      nav.active {
        display: flex;
        animation: fadeIn 0.3s ease-in-out;
      }

      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
      }

      nav a {
        margin: 10px 0;
        font-size: 16px;
      }

      .hamburger {
        display: flex;
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
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header>
    <div class="logo-container">
      <img src="/images/mednest-logo.png" alt="MedNest Logo">
      <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
    </div>

    <nav id="nav">
      <a href="{{ route('user.landing_page') }}">Home</a>
      <a href="{{ route('user.services') }}">Services</a>
      <a href="{{ route('user.about') }}">About Us</a>
      <a href="{{ route('user.appointment') }}">Appointment</a>
    </nav>

    <div class="right-nav">
      <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
      <div class="hamburger" id="hamburger">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
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
        <form>
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>

          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>

          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>

          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-password" required>

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

    hamburger.addEventListener('click', () => {
      nav.classList.toggle('active');
    });
  </script>

</body>
</html>
