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
    
    .nav-right {
      display: flex;
      align-items: center;
      gap: 12px;
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
      font-size: 15px;
      white-space: nowrap;
      transition: all 0.3s ease;
    }
    
    .phone-btn:hover {
      background: #5f0505;
      transform: translateY(-2px);
    }
    
    /* Register/Login Button in Navbar */
    .register-nav-btn {
      background: linear-gradient(90deg, #AF1732 0%, #B7233D 30%, #D44C64 100%);
      color: #fff;
      padding: 8px 20px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      font-size: 15px;
      white-space: nowrap;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(175, 23, 50, 0.3);
    }
    
    .register-nav-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(175, 23, 50, 0.4);
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
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(175, 23, 50, 0.3);
    }
    
    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(175, 23, 50, 0.4);
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
      transition: all 0.3s ease;
    }
    
    .btn-outline:hover {
      background: #7B0707;
      color: #fff;
      transform: translateY(-3px);
    }
    
    /* Special styling for Register Now button */
    .btn-register {
      background: linear-gradient(135deg, #D44C64 0%, #AF1732 100%);
      color: #fff;
      padding: 14px 32px;
      border-radius: 30px;
      font-size: 18px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(212, 76, 100, 0.4);
      position: relative;
      overflow: hidden;
    }
    
    .btn-register::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn-register:hover::before {
      left: 100%;
    }
    
    .btn-register:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(212, 76, 100, 0.5);
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
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
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
    }

    /* IMAGE CONTAINER */
    .image-container {
    position: relative;
    width: 500px;
    height: 500px;
    flex-shrink: 0;
    }

    .doctors-image {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }

    .doctors-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    }

    .shape {
    position: absolute;
    background: linear-gradient(135deg, #D44C64, #AF1732);
    border-radius: 50%;
    z-index: 1;
    opacity: 0.4;
    }

    .shape-1 {
    width: 150px;
    height: 150px;
    top: -30px;
    left: -30px;
    }

    .shape-2 {
    width: 100px;
    height: 100px;
    bottom: -20px;
    right: -20px;
    }

    .shape-3 {
    width: 80px;
    height: 80px;
    top: 50%;
    left: -40px;
    transform: translateY(-50%);
    }

    /* TESTIMONIAL SECTION */
    .testimonial {
    background: linear-gradient(135deg, #D44C64, #AF1732);
    padding: 80px 40px;
    color: white;
    }

    .testimonial-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 60px;
    }

    .testimonial-text {
    flex: 1;
    padding-right: 40px;
    }

    .testimonial-text h2 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
    }

    .quote-icon {
    font-size: 80px;
    line-height: 0.5;
    margin-bottom: 15px;
    color: rgba(255,255,255,0.6);
    }

    .feedback {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 20px;
    font-style: italic;
    }

    .author {
    font-size: 16px;
    font-weight: 600;
    text-align: right;
    }

    .image-box {
    width: 400px;
    height: 450px;
    background: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 15px;
    }

    /* DOCTORS SECTION */
    .doctors {
    text-align: center;
    padding: 60px 40px;
    background: #f9f9f9;
    }

    .doctors h2 {
    font-size: 48px;
    font-weight: 700;
    color: #7B0707;
    margin-bottom: 10px;
    }

    .subtitle {
    font-size: 18px;
    color: #666;
    margin-bottom: 50px;
    }

    .doctors-container {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    }

    .doctor-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    width: 250px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
    }

    .doctor-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .doctor-photo {
    width: 150px;
    height: 150px;
    margin: 0 auto 20px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #D44C64;
    }

    .doctor-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .doctor-card h3 {
    font-size: 18px;
    font-weight: 600;
    color: #373C36;
    margin-bottom: 8px;
    }

    .doctor-card p {
    font-size: 14px;
    color: #7B0707;
    font-weight: 500;
    }

    /* FOOTER */
    .footer {
    background: #2C2828;
    color: white;
    padding: 40px 80px 20px;
    }

    .footer-container {
    display: flex;
    justify-content: space-between;
    gap: 40px;
    margin-bottom: 30px;
    flex-wrap: wrap;
    }

    .footer-section h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #D44C64;
    }

    .footer-section ul {
    list-style: none;
    padding: 0;
    }

    .footer-section ul li {
    margin-bottom: 10px;
    }

    .footer-section ul li a {
    color: white;
    text-decoration: none;
    transition: 0.3s;
    }

    .footer-section ul li a:hover {
    color: #D44C64;
    }

    .footer-section p {
    margin: 8px 0;
    font-size: 14px;
    }

    .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: 20px;
    text-align: center;
    font-size: 14px;
    color: rgba(255,255,255,0.7);
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
    .hero-content {
      padding: 0 40px;
    }
    .why-choose-us {
      flex-direction: column-reverse;
      padding: 40px;
    }
    .image-container {
      width: 100%;
      max-width: 400px;
      height: 400px;
    }
    .testimonial-container {
      flex-direction: column;
      text-align: center;
    }
    .testimonial-text {
      padding-right: 0;
    }
    .author {
      text-align: center;
    }
    .image-box {
      width: 100%;
      max-width: 350px;
      height: 400px;
    }
    }

    @media (max-width: 768px) {
    header {
      padding: 12px 20px;
    }

    .logo-text {
      font-size: 20px;
    }

    .logo-container img {
      height: 28px;
      width: 28px;
    }

    .nav-right {
      gap: 8px;
    }

    .phone-btn, .register-nav-btn {
      font-size: 13px;
      padding: 6px 12px;
    }

    .footer-container {
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 20px;
    }

    .footer {
      padding: 30px 20px 20px;
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
        gap: 20px;
        flex-wrap: wrap;
        align-items: stretch;
    }

    .card {
      width: 100%;
      max-width: 350px;
    }

    .what-we-provide h2 {
      font-size: 36px;
      padding: 0 20px;
    }

    .what-we-provide p {
      padding: 0 20px;
    }

      nav a.active {
        border-bottom: 2px solid #7B0707;
        color: #7B0707;
    }

    .hamburger {
      display: block;
    }

    nav {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: white;
      flex-direction: column;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      gap: 15px;
    }

    nav.show {
      display: flex;
    }

    .hero {
      height: auto;
      min-height: 500px;
    }

    .hero-content {
      padding: 40px 20px;
      text-align: center;
      max-width: 100%;
    }

    .hero-content h1 {
      font-size: 28px;
      line-height: 1.3;
    }

    .hero-content p {
      font-size: 16px;
    }

    .hero-buttons {
      flex-direction: column;
      gap: 12px;
    }

    .btn-primary, .btn-outline, .btn-register {
      width: 100%;
      text-align: center;
      padding: 12px 24px;
      font-size: 16px;
    }

    .why-choose-us {
      padding: 40px 20px;
    }

    .content h2 {
      font-size: 28px;
      text-align: center;
    }

    .content p {
      text-align: center;
    }

    .benefit-card {
      margin-bottom: 15px;
    }

    .doctors h2 {
      font-size: 36px;
    }

    .doctors-container {
      gap: 25px;
    }

    .testimonial {
      padding: 50px 20px;
    }

    .testimonial-text h2 {
      font-size: 36px;
    }

    .quote-icon {
      font-size: 60px;
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
        @guest
            <a href="{{ route('register') }}" class="register-nav-btn">Get Started</a>
        @else
            <a href="{{ route('user.dashboard') }}" class="register-nav-btn">Dashboard</a>
        @endguest
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
                @guest
                    <a href="{{ route('register') }}" class="btn-register">Register Now</a>
                    <a href="{{ route('login') }}" class="btn-primary">Already Have Account? Login</a>
                @else
                    <a href="{{ route('user.appointment') }}" class="btn-primary">Book Appointment</a>
                    <a href="{{ route('user.dashboard') }}" class="btn-register">Go to Dashboard</a>
                @endguest
                <a href="{{ url('/user/about') }}" class="btn-outline">Learn More</a>
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
        <p class="subtitle">Meet the dedicated professionals committed to providing you with quality care and expertise.</p>

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
<!-- ===== FOOTER ===== -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h3>Page</h3>
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/user/services') }}">Services</a></li>
        <li><a href="{{ url('/user/about') }}">About Us</a></li>
        <li><a href="{{ url('/user/appointment') }}">Appointment</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Contact</h3>
      <p>📍 Purok 1 Brgy. 3 Del Rosario, Sto. Domingo Albay 4508</p>
      <p>📞 +63 912-345-678</p>
      <p>📧 mednest@clinic.com</p>
    </div>

    <div class="footer-section">
      <h3>Support</h3>
      <ul>
        <li><a href="{{ url('/user/terms') }}">Terms and Conditions</a></li>
        <li><a href="{{ url('/user/privacy') }}">Privacy Policy</a></li>
        <li><a href="{{ url('/user/faq') }}">FAQ</a></li>
        <li><a href="{{ url('/user/help') }}">Help</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 MedNest — Caring for You Every Step of the Way.</p>
  </div>
</footer>

<script>
const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav-links');
hamburger.addEventListener('click', () => nav.classList.toggle('show'));
</script>

</body>
</html>