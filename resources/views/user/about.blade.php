<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
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
    /* HERO */
    .about-hero {
    background: linear-gradient(
        180deg, 
        #FFA7B2 37%, 
        #FFC3A0 79%, 
        #FF9A9E 96%, 
        #FECEFE 100%
    ); 
    color: #fff;
    text-align: center;
    padding: 80px 20px;
    }
    .about-hero h1 {
    font-size: 2.8rem;
    margin-bottom: 15px;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5); 
    }
    .about-hero p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: auto;
    line-height: 1.6;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.3);     
    }

    /* MISSION & VISION */
    .mission-vision {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    padding: 60px 20px;
    background: #fff;
    }
    .card {
    flex: 1 1 420px; 
    max-width: 500px; 
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 6px 6px 12px rgba(0,0,0,0.25);
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
    .card .icon {
    font-size: 2rem;
    color: #7B0707;
    margin-bottom: 15px;
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
    /* WHAT WE PROVIDE */
    .what-we-provide {
    padding: 60px 20px;
    text-align: center;
    background: #fff;
    }
    .what-we-provide-text h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: center;
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
    box-shadow: 0 6px 15px rgba(0,0,0,0.35);
    transition: transform 0.3s, box-shadow 0.3s;
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
    font-size: 4rem;
    color: #fff;
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
/* CERTIFICATIONS */
.certifications {
  padding: 60px 20px;
  text-align: center;
  background: #fff;
}

.certifications .section-title {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 10px;
}

.certifications .section-subtitle {
  max-width: 700px;
  margin: 0 auto 40px;
  font-size: 1.1rem;
  color: #555;
  line-height: 1.6;
}

.certifications .card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
}

.certifications .info-card {
  flex: 1 1 260px;
  max-width: 300px;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.35);
  transition: transform 0.3s, box-shadow 0.3s;
  background: #fff;
}

.certifications .info-card:hover {
  transform: translateY(-8px);
}

.certifications .icon-circle {
  width: 70px;
  height: 70px;
  background: #f04545;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto 20px;
}

.certifications .info-card h3 {
  font-size: 1.3rem;
  margin-bottom: 10px;
  color: #222;
}

.certifications .info-card p {
  font-size: 0.95rem;
  color: #555;
  line-height: 1.6;
}

.certifications .info-card .highlight-text {
  color: #f04545;
  font-weight: 600;
  margin-bottom: 10px;
}
  .highlight-text{
    color: #f04545;  
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
    transition: color 0.3s ease, border-bottom 0.3s ease;
    }

    nav a:hover {
      color: #7B0707;
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
      <a href="{{ route('user.services') }}" class="{{ request()->routeIs('user.services') ? 'active' : '' }}">Services</a>
      <a href="{{ route('user.about') }}" class="{{ request()->routeIs('user.about') ? 'active' : '' }}">About Us</a>
      <a href="{{ route('user.appointment') }}" class="{{ request()->routeIs('user.appointment') ? 'active' : '' }}">Appointment</a>
    </nav>
    <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
  </header>
  <!-- HERO SECTION -->
<section class="about-hero">
  <div class="about-hero-text">
    <h1>About MedNest</h1>
    <p>Dedicated to providing exceptional maternal and child healthcare 
       with compassion, expertise, and modern medical practices.</p>
  </div>
</section>

<!-- MISSION & VISION SECTION -->
<section class="mission-vision">
  <div class="card">
    <div class="icon">🎯</div>
    <h2>Our Mission</h2>
    <p>To reduce maternal and neonatal morbidity and mortality by rendering 
       services under standard operating procedures by well-trained staff and 
       personnel, using not only therapeutic but more on preventive measures 
       through a holistic approach.</p>
  </div>
  <div class="card">
    <div class="icon">💡</div>
    <h2>Our Vision</h2>
    <p>To provide an affordable maternal and child health service with the 
       best quality of Albay and its nearby people of towns and provinces.</p>
  </div>
</section>

<section class="what-we-provide">
  <div class="what-we-provide-text">
    <h1>What We Provide</h1>
    <p>Comprehensive healthcare services designed with your family in mind, 
       from pregnancy through early childhood.</p>
  </div>

  <div class="provide-cards">
    <!-- Family Planning -->
    <div class="provide-card">
      <div class="icon-circle">
        <img src="https://img.icons8.com/ios-filled/100/ffffff/family.png" alt="Family Icon" width="40" height="40">
      </div>
      <h2>Family Planning</h2>
      <p>Comprehensive family planning services including counseling, 
         contraceptive options, and reproductive health education tailored 
         to your needs.</p>    
    </div>

    <!-- Immunization -->
    <div class="provide-card">
      <div class="icon-circle">
        <img src="https://img.icons8.com/ios-filled/100/ffffff/syringe.png" alt="Syringe Icon" width="40" height="40">
    
    </div>
      <h2>Immunization</h2>
      <p>Complete vaccination programs for mothers and children, following 
         national immunization schedules to protect against preventable diseases.</p>
    </div>

    <!-- Pre-Natal Check Up -->
    <div class="provide-card">
      <div class="icon-circle">
        <img src="https://img.icons8.com/ios-filled/100/ffffff/pregnant.png" alt="Pregnant Woman Icon" width="40" height="40">
      </div>
      <h2>Pre-Natal Check Up</h2>
      <p>Regular monitoring and care throughout pregnancy to ensure the 
         health and well-being of both mother and baby through every stage.</p>
    </div>
  </div>
</section>
<!-- CERTIFICATION SECTION -->
<section class="certifications">
  <div class="container">
    <h2 class="section-title">Our Certifications</h2>
    <p class="section-subtitle">
      Recognized and accredited by leading healthcare authorities to ensure 
      the highest standards of care.
    </p>


    <div class="card-container">
      <!-- Card 1 -->
      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/star.png" alt="DOH Licensed Icon" width="30" height="30">
        </div>
        <h3>DOH Licensed</h3>
        <p class="highlight-text">Department of Health Accreditation</p>
        <p>
          Licensed to operate as a maternity clinic under the supervision of
          qualified healthcare professionals.
        </p>
      </div>


      <!-- Card 2 -->
      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/?size=100&id=60643&format=png&color=ffffff" alt="Professional Certification Icon" width="30" height="30">        </div>
        <h3>Professional Certification</h3>
        <p class="highlight-text">Board Certified Medical Staff</p>
        <p>
          Our medical professionals hold valid certifications and undergo 
          continuous professional development.
        </p>
      </div>

      <div class="info-card">
        <div class="icon-circle">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/checked--v1.png" alt="Quality Assurance Icon" width="30" height="30">
        </div>
        <h3>Quality Assurance</h3>
        <p class="highlight-text">ISO Healthcare Standards</p>
        <p>
          Adherence to international quality standards and best practices 
          in maternal and child healthcare.
        </p>
      </div>
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