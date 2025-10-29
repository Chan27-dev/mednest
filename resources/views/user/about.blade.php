<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=ADLaM+Display&display=swap" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      color: #373C36;
      background-color: #fff;
    }

    /* ===== NAVBAR ===== */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 40px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 100;
      flex-wrap: wrap;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 8px;
      position: static;
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
    }

    nav a {
      text-decoration: none;
      color: #373C36;
      transition: color 0.3s ease, border-bottom 0.3s ease;
    }

    nav a.active {
      color: #7B0707;
      font-weight: 700;
      border-bottom: 2px solid #7B0707;
    }

    nav a:hover {
      color: #7B0707;
    }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .phone-btn {
      background: #7B0707;
      color: #fff;
      padding: 8px 16px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .phone-btn:hover {
      background: #5a0505;
    }

    .hamburger {
      display: none;
      font-size: 28px;
      cursor: pointer;
      color: #7B0707;
    }

    /* ===== HERO SECTION ===== */
    .about-hero {
      background: linear-gradient(180deg, #FFA7B2 37%, #FFC3A0 79%, #FF9A9E 96%, #FECEFE 100%);
      color: #fff;
      text-align: center;
      padding: 80px 20px;
    }

    .about-hero h1 {
      font-size: 2.8rem;
      margin-bottom: 15px;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
    }

    .about-hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: auto;
      line-height: 1.6;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
    }

    /* ===== MISSION & VISION ===== */
    .mission-vision {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      padding: 60px 20px;
    }

    .card {
      flex: 1 1 420px;
      max-width: 500px;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.25);
      position: relative;
    }

    .card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 9px;
      background: #F04545;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .card h2 {
      font-size: 1.6rem;
      color: #222;
      margin-bottom: 15px;
    }

    .card p {
      color: #555;
      line-height: 1.6;
    }

    .card .icon {
      font-size: 2rem;
      color: #7B0707;
      margin-bottom: 15px;
    }

    /* ===== WHAT WE PROVIDE ===== */
    .what-we-provide {
      padding: 60px 20px;
      text-align: center;
    }

    .what-we-provide-text h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .what-we-provide-text p {
      max-width: 700px;
      margin: 0 auto 40px;
      font-size: 1.1rem;
      color: #555;
      line-height: 1.6;
    }

    .provide-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }

    .provide-card {
      flex: 1 1 260px;
      max-width: 300px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.35);
      transition: transform 0.3s ease;
    }

    .provide-card:hover {
      transform: translateY(-8px);
    }

    .icon-circle {
      width: 70px;
      height: 70px;
      background: #f04545;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px;
    }

    .provide-card h2 {
      font-size: 1.3rem;
      margin-bottom: 15px;
      color: #222;
    }

    .provide-card p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.6;
    }

    /* ===== CERTIFICATIONS ===== */
    .certifications {
      padding: 60px 20px;
      text-align: center;
    }

    .section-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .section-subtitle {
      max-width: 700px;
      margin: 0 auto 40px;
      font-size: 1.1rem;
      color: #555;
      line-height: 1.6;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }

    .info-card {
      flex: 1 1 260px;
      max-width: 300px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.35);
      background: #fff;
      transition: transform 0.3s ease;
    }

    .info-card:hover {
      transform: translateY(-8px);
    }

    .info-card h3 {
      font-size: 1.3rem;
      margin-bottom: 10px;
      color: #222;
    }

    .info-card p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.6;
    }

    .highlight-text {
      color: #f04545;
      font-weight: 600;
    }

    /* ===== FOOTER ===== */
    .footer {
      background-color: #e88092;
      color: #fff;
      padding: 25px 20px 15px;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      max-width: 1100px;
      margin: 0 auto;
      gap: 40px;
      text-align: left;
    }

    .footer-section {
      flex: 1 1 300px;
      min-width: 220px;
    }

    .footer-section h3 {
      font-size: 16px;
      margin-bottom: 10px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-section ul li {
      margin-bottom: 8px;
    }

    .footer-section a {
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .footer-section a:hover {
      text-decoration: underline;
      color: #ffe0e6;
    }

    .footer-section p {
      font-size: 14px;
      margin: 6px 0;
      line-height: 1.5;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 25px;
      font-size: 13px;
      opacity: 0.9;
    }

    /* ===== RESPONSIVE ===== */
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
      header {
        justify-content: space-between;
        position: relative;
      }
      .nav-right {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .phone-btn {
        font-size: 14px;
        padding: 8px 12px;
      }

      .footer-container {
        flex-direction: column;
        text-align: center;
      }

      .footer-section {
        margin-bottom: 10px;
      }
    }
  </style>
</head>

<body>
  <!-- ===== NAVBAR ===== -->
  <header>
    <div class="logo-container">
      <img src="{{ asset('images/mednest-logo.png') }}" alt="MedNest Logo" />
      <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
    </div>

    <div class="nav-center">
      <nav id="nav-links">
        <a href="{{ route('user.landing_page') }}" class="{{ request()->is('/') || request()->routeIs('user.landing_page') ? 'active' : '' }}">Home</a>
        <a href="{{ route('user.services') }}" class="{{ request()->routeIs('user.services') ? 'active' : '' }}">Services</a>
        <a href="{{ route('user.about') }}" class="{{ request()->routeIs('user.about') ? 'active' : '' }}">About Us</a>
        <a href="{{ route('user.appointment') }}" class="{{ request()->routeIs('user.appointment') ? 'active' : '' }}">Appointment</a>
      </nav>
    </div>

    <div class="nav-right">
      <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
      <div class="hamburger" id="hamburger">☰</div>
    </div>
  </header>

  <!-- ===== HERO SECTION ===== -->
  <section class="about-hero">
    <h1>About MedNest</h1>
    <p>Dedicated to providing exceptional maternal and child healthcare with compassion, expertise, and modern medical practices.</p>
  </section>

  <!-- ===== MISSION & VISION ===== -->
  <section class="mission-vision">
    <div class="card">
      <div class="icon">🎯</div>
      <h2>Our Mission</h2>
      <p>To reduce maternal and neonatal morbidity and mortality through standardized, holistic, and preventive healthcare practices by well-trained staff and personnel.</p>
    </div>

    <div class="card">
      <div class="icon">💡</div>
      <h2>Our Vision</h2>
      <p>To provide affordable, high-quality maternal and child healthcare to the people of Albay and its neighboring provinces.</p>
    </div>
  </section>

  <!-- ===== WHAT WE PROVIDE ===== -->
  <section class="what-we-provide">
    <div class="what-we-provide-text">
      <h1>What We Provide</h1>
      <p>Comprehensive healthcare services designed with your family in mind, from pregnancy through early childhood.</p>
    </div>

    <div class="provide-cards">
      <div class="provide-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/100/ffffff/family.png" alt="Family Icon" width="40" height="40" />
        </div>
        <h2>Family Planning</h2>
        <p>Comprehensive family planning services including counseling, contraceptive options, and reproductive health education tailored to your needs.</p>
      </div>

      <div class="provide-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/100/ffffff/syringe.png" alt="Syringe Icon" width="40" height="40" />
        </div>
        <h2>Immunization</h2>
        <p>Complete vaccination programs for mothers and children, following national immunization schedules to protect against preventable diseases.</p>
      </div>

      <div class="provide-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/100/ffffff/pregnant.png" alt="Pregnant Icon" width="40" height="40" />
        </div>
        <h2>Pre-Natal Check Up</h2>
        <p>Regular monitoring and care throughout pregnancy to ensure the health and well-being of both mother and baby through every stage.</p>
      </div>
    </div>
  </section>

  <!-- ===== CERTIFICATIONS ===== -->
  <section class="certifications">
    <h2 class="section-title">Our Certifications</h2>
    <p class="section-subtitle">Recognized and accredited by leading healthcare authorities to ensure the highest standards of care.</p>

    <div class="card-container">
      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/star.png" alt="DOH Icon" width="30" height="30" />
        </div>
        <h3>DOH Licensed</h3>
        <p class="highlight-text">Department of Health Accreditation</p>
        <p>Licensed to operate as a maternity clinic under the supervision of qualified healthcare professionals.</p>
      </div>

      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/?size=100&id=60643&format=png&color=ffffff" alt="Certification Icon" width="30" height="30" />
        </div>
        <h3>Professional Certification</h3>
        <p class="highlight-text">Board Certified Medical Staff</p>
        <p>Our medical professionals hold valid certifications and undergo continuous professional development.</p>
      </div>

      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/checked--v1.png" alt="Quality Icon" width="30" height="30" />
        </div>
        <h3>Quality Assurance</h3>
        <p class="highlight-text">ISO Healthcare Standards</p>
        <p>Adherence to international quality standards and best practices in maternal and child healthcare.</p>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3>Page</h3>
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/#services') }}">Services</a></li>
          <li><a href="{{ url('/about') }}">About Us</a></li>
          <li><a href="{{ url('/#appointment') }}">Appointment</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h3>Contact</h3>
        <p>📍 Purok 1 Brgy. 3 Del Rosario, Sto. Domingo Albay 4508</p>
        <p>📞 +63 912-345-678</p>
        <p>📧 delrosario.maternity@gmail.com</p>
      </div>

      <div class="footer-section">
        <h3>Support</h3>
        <ul>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 MedNest — Caring for You Every Step of the Way.</p>
    </div>
  </footer>

  <script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');
    hamburger.addEventListener('click', () => navLinks.classList.toggle('show'));
  </script>
</body>
</html>
