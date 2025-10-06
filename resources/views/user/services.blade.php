<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services Offered</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      color: #373C36;
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
    }
    nav a {
      text-decoration: none;
      color: #373C36;
    }
    .phone-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #7B0707;
      color: #fff;
      padding: 8px 16px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
    }

    /* ABOUT HERO SECTION */
    .about-hero {
      position: relative;
      padding: 80px 40px;
      color: #fff;
      height: 400px;
      display: flex;
      align-items: center;
      background: linear-gradient(
        to right,
        rgba(221, 85, 34, 0.25) 0%, 
        #D52141 100%
      );
    }
    .about-hero-container {
      display: flex;
      justify-content: center; 
      align-items: center;     
      max-width: 1100px;
      margin: 0 auto;
      text-align: center;      
      gap: 0;                  
    }
      @media (max-width: 768px) {
    .about-hero {
      padding: 60px 20px;
      min-height: auto; 
      }
    }
    .about-text h1 {
      font-size: 42px;
      font-weight: 800;
      margin-bottom: 20px;
      line-height: 1.2;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.3); 
    }
    .about-text p {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 25px;
    }
    .about-btn {
      position: relative;
      background: linear-gradient(90deg, #AF1732 5%, #B7233D 45%, #D44C64 100%);
      color: #fff;
      padding: 14px 28px;
      border-radius: 30px;
      font-size: 18px;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }
    .btn-outline {
      background: #fff; 
      color: #7B0707; 
      padding: 14px 28px;
      border-radius: 30px;
      font-size: 18px;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      
      border: 3px solid; 
      border-image-slice: 1;
      border-width: 3px;
      border-image-source: linear-gradient(90deg, #AF1732 5%, #B7233D 45%, #D44C64 100%);
      transition: all 0.3s ease;
    }
      .btn-outline:hover {
        background: #f5f5f5;
        color: #7B0707;
    }
    @media (max-width: 768px) {
      .about-hero-container { grid-template-columns: 1fr; text-align: center; }
      .about-text h1 { font-size: 28px; }
    }

    /* SERVICES SECTION */
    .services {
      padding: 60px 20px;
      background: #fff;
      text-align: center;
    }
    .services h2 {
      position: relative;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 40px;
      color: #7B0707;
    }
    .services h2::after {
      content: "";
      display: block;
      width: 200px;
      height: 3px;
      background: #7B0707;
      margin: 8px auto 0;
      border-radius: 2px;
    }
    .services-container-single {
      max-width: 800px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 30px;
    }
    .service-block {
      text-align: center;
      padding: 25px;
      border: 2px solid #2E2E2E;
      border-radius: 10px;
      background: #fff;
      transition: all 0.3s ease;
    }
    .service-block:hover {
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transform: translateY(-4px);
    }
    .service-block h3 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 15px;
      color: #7B0707;
    }
    .service-block p {
      font-size: 15px;
      line-height: 1.7;
      color: #333;
      text-align: justify;
      margin-bottom: 15px;
    }
    .service-block ul {
      text-align: left;
      display: inline-block;
      padding-left: 20px;
      color: #7B0707;
      line-height: 1.6;
      font-weight: 500;
    }

    /* FOOTER */
    .footer {
      background-color: #e88092;
      color: #fff;
      padding: 25px 20px 15px;
      font-family: 'Poppins', sans-serif;
    }
    .footer-container {
        display: flex;
        justify-content: space-between; 
        align-items: flex-start;
        flex-wrap: wrap; 
        max-width: 1100px;
        margin: 0 auto;
        gap: 40px;
        }
    .footer-section {
        flex: 1 1 31%px;
        min-width: 220px;
        margin: 0; 
        }
    .footer-section h3 {
      font-size: 16px;
      margin-bottom: 8px;
      font-weight: 600;
      text-transform: uppercase;
    }
    .footer-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-section ul li { margin-bottom: 6px; }
    .footer-section a {
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }
    .footer-section a:hover { text-decoration: underline; color: #ffe0e6; }
    .footer-section p { font-size: 14px; margin: 4px 0; }
    .footer-bottom {
      text-align: center;
      margin-top: 15px;
      font-size: 13px;
      opacity: 0.9;
    }
    @media (max-width: 768px) {
      .footer-container { flex-direction: column; text-align: center; }
      .footer-section { margin-bottom: 15px; }
    }
    nav a.active {
    color: #7B0707;
    font-weight: 700;
    border-bottom: 2px solid #7B0707; 
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header>
    <div class="logo-container">
      <img src="{{ asset('images/mednest-logo.png') }}" alt="MedNest Logo">
      <span class="logo-text"><span class="med">Med</span><span class="nest">Nest</span></span>
    </div>
    <nav>
      <a href="{{ route('user.landing_page') }}" class="{{ request()->is('/') || request()->routeIs('user.landing_page') ? 'active' : '' }}">Home</a>
      <a href="{{ url('/user/services') }}" class="{{ request()->is('user/services') ? 'active' : '' }}">Services</a>
      <a href="{{ url('/user/about') }}" class="{{ request()->is('user/about') ? 'active' : '' }}">About Us</a>
      <a href="{{ url('/user/appointment') }}" class="{{ request()->is('user/appointment') ? 'active' : '' }}">Appointment</a>
    </nav>
    <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
  </header>

  <!-- ABOUT HERO SECTION -->
  <section class="about-hero">
    <div class="about-hero-container">
      <div class="about-text">
        <h1>We’re with you at every stage of your journey to motherhood.</h1>
        <p>
          At MedNest, we provide comprehensive care and support — from your very first check-up to your baby’s first steps. Your health and comfort are our priority.
        </p>
        <a href="{{ url('/contact') }}" class="about-btn">Book a Consultation</a>
      </div>
    </div>
  </section>

    <!-- SERVICES SECTION -->
    <section class="services">
      <h2>Services Offered</h2>
      <div class="services-container-single">

        <div class="service-block">
          <h3>ULTRASOUND SERVICES</h3>
          <p>
          Our diagnostic ultrasound services provide a comprehensive range of imaging procedures designed 
          to support accurate diagnoses. Using advanced equipment and performed by experienced professionals, 
          these services are essential for the timely and precise assessment of various medical conditions.
          </p>
          <ul>
            <li>OB/Pelvis</li>
            <li>Trans Vaginal</li>
            <li>Thyroid/Neck</li>
            <li>Chest</li>
            <li>Trans-rectal</li>
            <li>Whole-abdomen</li>
            <li>Upper abdomen</li>
            <li>HBT/Pancreas</li>
            <li>KUB/P</li>
            <li>Breast</li>
            <li>Soft tissue/mass</li>
          </ul>
        </div>

        <div class="service-block">
          <h3>MATERNITY CARE</h3>
          <p>
            Our maternity care services are designed to provide comprehensive and compassionate support 
            throughout the pregnancy and childbirth process. With a focus on both maternal and fetal well-being, 
            these services ensure a healthy pregnancy and a positive birth experience.
          </p>
          <ul>
            <li>Normal Spontaneous Vaginal Delivery</li>
            <li>Pre-natal Check-up</li>
            <li>Expanded Newborn Screening Test</li>
            <li>Newborn Hearing Test</li>
          </ul>
        </div>

        <div class="service-block">
          <h3>FAMILY & PREVENTIVE CARE</h3>
          <p>
            Our family and preventive care services are designed to offer comprehensive and compassionate support 
            for both parents and their growing family. We emphasize proactive health management, focusing on 
            prevention and well-being for every stage of pregnancy, childbirth, and beyond. Our services aim to 
            nurture the health of the mother, child, and entire family, ensuring a safe and fulfilling experience 
            for everyone.
          </p>
          <ul>
            <li>Subdermal Implant</li>
            <li>IUD insertion & Removal</li>
            <li>DMPA Injections, Pills, Condom</li>
          </ul>

        </div>

        <div class="service-block">
          <h3>HEALTH MONITORING & ADDITIONAL SERVICES</h3>
          <p>
            Our health monitoring and additional services are designed to provide individuals with essential 
            health checks and preventative care, ensuring overall well-being and early detection of potential 
            health issues.
          </p>
          <ul>
            <li>Blood Pressure Checking</li>
            <li>Random Blood Sugar Screening</li>
            <li>Immunization</li>
            <li>Ear Piercing</li>
          </ul>
        </div>
    </div>
    </section>

  <!-- FOOTER -->
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
</body>
</html>
