<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      color: #373C36;
      overflow-x: hidden;
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
      transition: all 0.3s ease;
    }
    nav a {
      text-decoration: none;
      color: #373C36;
    }
    nav a:hover {
        color: #7B0707
    }
    nav a.active {
      color: #7B0707;
      font-weight: 600;
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
      white-space: nowrap;
    }

    /* Hamburger */
    .hamburger {
        display: none;
        font-size: 28px;
        cursor: pointer;
        color: #7B0707;
    }
    .hamburger span {
      width: 25px;
      height: 3px;
      background: #7B0707;
      border-radius: 2px;
      transition: 0.3s;
    }

    /* HERO SECTION */
    .hero {
      position: relative;
      height: 650px;
      background: url('/images/landing_page-bg.jpg') no-repeat center center/cover;
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: rgba(255,255,255,0.35);
    }
    .hero-content {
      position: relative;
      z-index: 10;
      max-width: 600px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
      padding: 0 20px 0 300px;
      text-align: left;
    }
    .hero-content h1 {
      font-size: 56px;
      font-weight: 900;
      color: #373C36;
      margin-bottom: 16px;
      line-height: 1.2;
    }
    .hero-content p {
      font-size: 20px;
      margin-bottom: 24px;
      line-height: 1.5;
    }
    .hero-buttons {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }
    .btn-primary {
      background: linear-gradient(90deg, #AF1732 0%, #B7233D 30%, #D44C64 100%);
      color: #fff;
      padding: 14px 28px;
      border-radius: 30px;
      font-size: 18px;
      font-weight: 600;
      text-decoration: none;
    }
    .btn-outline {
      background: #fff;
      color: #7B0707;
      padding: 14px 28px;
      border: 2px solid #7B0707;
      border-radius: 30px;
      font-size: 18px;
      font-weight: 600;
      text-decoration: none;
    }

    /* WHAT WE PROVIDE SECTION */
    .what-we-provide {
      text-align: center;
      background: #fff;
      padding-bottom: 50px;
    }
    .what-we-provide h2 {
      font-size: 60px;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .what-we-provide p {
      font-size: 18px;
      max-width: 800px;
      margin: 0 auto 60px;
      line-height: 1.5;
    }
    .services-grid {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }
    .card {
      width: 350px;
      height: 400px;
      border-radius: 15px;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      transition: 0.3s;
    }
    .card:hover {
      transform: translateY(-8px);
    }
    .card img {
    width: 100%;
    height: 200px; 
    object-fit: cover;
    display: block;
    }

    .card-content {
    background: #D44C64;
    color: #fff;
    padding: 20px;
    text-align: justify;
    flex-grow: 1; /
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* aligns content top */
    }
    .card-content h3 {
      margin: 0;
      font-size: 20px;
      font-weight: 600;
      text-decoration: underline;
    }
    .view-services-btn {
      margin-top: 40px;
    }

    /* WHY CHOOSE US */
    .why-choose-us {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
      padding: 60px 80px;
      background: #fff;
      flex-wrap: wrap;
    }
    .content {
      flex: 1;
    }
    .content h2 {
      font-size: 36px;
      font-weight: 700;
      color: #7B0707;
      margin-bottom: 16px;
    }
    /* BENEFIT CARD STYLING */
    .benefit-card {
    background: #fff;
    border: 2px solid #2e2e2e;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    flex: 1 1 300px; 
    box-sizing: border-box; 
    max-width: 100%; 
    }

    .benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }

    .benefit-card h3 {
    color: #7B0707;
    margin-bottom: 10px;
    font-weight: 600;
    }

    .benefit-card p {
    color: #373C36;
    margin: 0;
    line-height: 1.5;
    }

    /* TESTIMONIAL */
    .testimonial {
      background: rgba(237, 104, 104, 0.33);
      border-radius: 0 200px 200px 200px;
      padding: 60px 20px 120px;
      margin: 60px auto;
    }
    .testimonial-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }
    .testimonial-text {
      flex: 1;
      text-align: center;
    }

    .image-box {
      background: #ED6868;
      border-radius: 100px 100px 0 100px;
      padding: 12px;
      position: relative;
      height: 400px;
      width: 300px;
      overflow: hidden;
    }
    .image-box img {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 250px;
      object-fit: cover;
    }

    /* DOCTORS */
    .doctors {
      text-align: center;
      padding: 80px 20px;
    }
    .doctors-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
    }

    /* RESPONSIVE */
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

      .hero {
        height: auto;
        padding: 60px 0;
      }
      .hero-content {
        padding: 0 20px;
        text-align: center;
        align-items: center;
      }
      .hero-content h1 {
        font-size: 38px;
      }
      .hero-content p {
        font-size: 16px;
      }
      .why-choose-us {
        padding: 40px 20px;
        flex-direction: column;
      }
      .testimonial {
        border-radius: 50px;
      }
    }

    @media (max-width: 480px) {
      .hero-content h1 {
        font-size: 32px;
      }
      .btn-primary, .btn-outline {
        font-size: 14px;
        padding: 10px 20px;
      }
      .what-we-provide h2 {
        font-size: 36px;
      }
      .content h2 {
        font-size: 28px;
      }
    }
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

    .benefits-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    }
    /* Responsive fix for small screens */
    @media (max-width: 768px) {
    .benefits-grid {
        flex-direction: column;
        align-items: center;
        padding: 0 15px;
    }

    .benefit-card {
        width: 100%;
        max-width: 395px; 
    }
    }

    @media (max-width: 768px) {
    .footer-container {
      flex-direction: column;
      align-items: center; 
      text-align: center; 
      gap: 20px; 
    }

    .footer-section {
      margin-bottom: 10px;
      flex: none; 
      width: 100%; 
      max-width: 400px; 
    }

    .footer-section ul {
      padding: 0;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 15px;
    }

    .services-grid {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
        align-items: stretch;
    }
      nav a.active {
        border-bottom: 2px solid #7B0707; /* the underline */
        color: #7B0707;
    }
    }
  </style>
</head>
<body>
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

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                From Bump to Baby, Without
                the Chaos:
            </h1>
            <p>
                Streamlined records, scheduling, monitoring, and billing — so you can stress less and care more.
            </p>
            <div class="hero-buttons">
                <a href="#appointment" class="btn-primary">Book Appointment</a>
                <a href="#learn-more" class="btn-outline">Learn More</a>
            </div>
        </div>
    </section>

    <!-- WHAT WE PROVIDE SECTION -->
    <section id="services" class="what-we-provide">
        <h2>What We Provide</h2>
        <p>Explore some of our core maternity and healthcare services designed with your family in mind.</p>

        <div class="services-grid">
            <!-- Card 1 -->
            <div class="card">
                <img src="/images/Immunization.jpeg" alt="Immunization">
                <div class="card-content">
                    <h3>Immunization</h3>
                    <p>We provide quick and reliable immunization guidance with a tailored list of recommended vaccines for your health and protection.</p>
                </div>
            </div>

        <!-- Card 2 -->
        <div class="card">
            <img src="/images/Family_planning.jpeg" alt="Family Planning">
            <div class="card-content">
                <h3>Family Planning</h3>
                <p>We provide quick and effective family planning guidance with a curated list of personalized recommendations.</p>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="card">
            <img src="/images/Pre-natal.jpeg" alt="Pre-natal Care">
            <div class="card-content">
                <h3>Pre-natal Care</h3>
                <p>We ensure timely and thorough prenatal check-ups with a list of essential recommendations for a healthy pregnancy journey.</p>
            </div>
        </div>
    </div>
        
        <div class="view-services-btn"> 
            <a href="{{ route('user.services') }}" class="btn-primary">View All Services</a>
        </div>
    </section>

    <section class="why-choose-us">
    <div class="image-container">
        <div class="doctors-image">
            <img src="/images/Doctors.png" alt="Doctors">
        </div>
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="content">
        <h2>Why MedNest Clinical Services is the Right Choice for You</h2>
        <p>At MedNest, we understand the importance of seamless, compassionate care during pregnancy and childbirth. Our commitment to making every step of your journey smoother is reflected in the following benefits:</p>
        
        <div class="benefit-card">
            <div>
                <h3>Streamlined Scheduling</h3>
                <p>Enjoy the convenience of both appointment-based and walk-in services, reducing wait times and enhancing accessibility to care.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div>
                <h3>Paperless Health Records</h3>
                <p>With our digital health records system, we ensure quick access to your medical history, enhancing accuracy and efficiency in your care.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div>
                <h3>Our professionals</h3>
                <p>Our team of experienced doctors, midwives, and healthcare professionals is dedicated to providing personalized, attentive care throughout your pregnancy and beyond.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div>
                <h3>Personalized Care Plans</h3>
                <p>We tailor each care plan to your specific needs, ensuring that your experience at MedNest is supportive, comfortable, and empowering for both you and your baby.</p>
            </div>
        </div>
    </section>
    <section class="testimonial">
        <div class="testimonial-container">

            <!-- LEFT SIDE: Feedback -->
            <div class="testimonial-text">
                <h2>Feedback from our Users</h2>
                <p class="quote-icon">❝</p>
                <p class="feedback">
                    From my first prenatal visit to the day I brought my baby home, MedNest was there every step of the way. 
                    The staff were not only professional but incredibly kind and reassuring. I always felt safe and supported. 
                    I couldn't have asked for a better care experience.
                </p>
                <p class="author">- Maria Cruz, First-time Mom</p>
            </div>

            <!-- RIGHT SIDE: Image inside rectangle -->
            <div class="image-box">
                <img src="images/mom-baby.png" alt="Happy mom with baby">
            </div>
        </div>
    </section>
    <!-- OUR DOCTORS AND SPECIALISTS SECTION -->
    <section class="doctors">
        <h2>Our Doctors and Specialists</h2>
        <p class="subtitle">Meet the dedicated professionals committed to providing you with quality care and espertise.</p>

        <div class="doctors-container">
            <div class="doctor-card">
                <div class="doctor-photo">
                    <img src="images/Doctors.png" alt="Doctor 1">
                </div>
                <h3>Mary Jean A. Banaag, RM, BSM</h3>  
                <p>Owner/Administrator</p>  
            </div>

            <div class="doctor-card">
                <div class="doctor-photo">
                    <img src="images/Doctors.png" alt="Doctor 2">
                </div>
                <h3>Bunnessa B. Ocampo, MD.</h3>  
                <p>Owner/Administrator</p>  
            </div>

            <div class="doctor-card">
                <div class="doctor-photo">
                    <img src="images/Doctors.png" alt="Doctor 3">
                </div>
                <h3>Muriel D. Medel, MD.</h3>  
                <p>Pediatrician</p>  
            </div>

            <div class="doctor-card">
                <div class="doctor-photo">
                    <img src="images/Doctors.png" alt="Doctor 4">
                </div>
                <h3>Roselyn S. Obion, RM, RN</h3>  
                <p>Midwife/Nurse</p>  
            </div>
        </div>
    </section>
</body>
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
</html>
