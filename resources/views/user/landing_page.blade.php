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
            font-weight: 400;
            color: #373C36;
            margin-bottom: 24px;
            line-height: 1.5;
        }
        .hero-buttons {
            display: flex;
            gap: 16px;
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
        .service-item {
            width: 300px;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .service-item img {
            width: 100%;
            height: 75%;
            object-fit: cover;
        }
        .service-item .description {
            background: #D44C64;
            color: #fff;
            padding: 15px;
            height: 25%;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .service-item .description h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            text-decoration: underline;
        }
        .service-item .description p {
            margin: 5px 0 0 0;
            font-size: 14px;
            line-height: 1.3;
        }
        .view-services-btn {
            margin-top: 40px;
            text-align: center;
        }
        .view-services-btn .btn-primary {
            padding: 14px 36px;
            font-size: 18px;
        }
        
        /* Card */
        .card {
        width: 300px;
        height: 400px;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        }
        .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .card img {
        width: 100%;
        height: 65%;
        object-fit: cover;
        }

        .card-content {
        background: #D44C64;
        color: #fff;
        padding: 15px;
        height: 35%;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        }

        .card-content h3 {
        margin: 0;
        font-size: 20px;
        font-weight: 600;
        text-decoration: underline;
        }
        .card-content p {
        margin: 8px 0 0 0;
        font-size: 14px;
        line-height: 1.4;
        }

        /* WHY CHOOSE US SECTION */
        .why-choose-us {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 60px 80px;
            background: #fff;
        }

        .image-container {
            position: relative;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .doctors-image {
            width: 392px;
            height: 400px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        .doctors-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Decorative shapes */
        .shape {
            position: absolute;
            border-radius: 50%;
            z-index: 1;
        }

        .shape-1 {
            width: 336px;
            height: 224px;
            background: #608780;
            transform: rotate(-15.6deg);
            bottom: -60px;
            left: -50px;
            z-index: 0;
        }

        .shape-2 {
            width: 452px;
            height: 406px;
            background: #658760;
            transform: rotate(260.6deg);
            border-radius: 1000%;
            top: 10px;
            left: 75px;
            z-index: 1;
        }

        .shape-3 {
            width: 52px;
            height: 69px;
            background: #676087;
            top: 70px;
            left: 40px;
            transform: rotate(-215.6deg);
        }

        /* Text content */
        .content {
            flex: 1.2;
        }

        .content h2 {
            font-size: 36px;
            font-weight: 700;
            color: #7B0707;
            margin-bottom: 16px;
        }

        .content p {
            font-size: 18px;
            color: #373C36;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        /* Benefit cards */
        .benefit-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 16px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .benefit-card .icon {
            font-size: 24px;
            min-width: 40px;
            text-align: center;
        }

        .benefit-card h3 {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 4px;
            color: #373C36;
        }

        .benefit-card p {
            font-size: 14px;
            margin: 0;
            color: #555;
            line-height: 1.4;
        }
        /* === TESTIMONIAL SECTION === */
        .testimonial {
        background: rgba(237, 104, 104, 0.33);
        border-radius: 0 200px 200px 200px;
        padding: 60px 40px 120px;
        margin: 60px auto;
        position: relative;
        }

        .testimonial-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        }

        .testimonial-text {
        flex: 1;
        color: #5A3E3E;
        font-family: 'ADLaM Display', cursive;
        text-align: center; 
        display: flex;
        flex-direction: column;
        justify-content: center;
        }

        .testimonial-text h2 {
        margin-bottom: 20px;
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        }

        .quote-icon {
        font-size: 80px;
        color: #ffffff90;
        margin: 0 auto -40px;
        }

        .feedback {
        font-size: 1.2rem;
        line-height: 1.6;
        font-weight: 500;
        margin: 20px 0;
        }

        .author {
        margin-top: 20px;
        font-size: 0.95rem;
        color: #5A3E3E;
        font-style: italic;
        }
            /* IMAGE BOX */
        .image-box {
        background: #ED6868;
        border-radius: 20px;
        padding: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        transform: translateY(180px); 
        position: relative;   
        height: 500px;        
        width: 400px;         
        border-radius: 100px 100px 0 100px;
        margin-left: 200px;
        overflow: hidden;
        }

        .image-box img {
        position: absolute;
        bottom: 0;            
        left: 45%;            
        transform: translateX(-50%); 
        width: 320px;          
        border-radius: 12px;
        object-fit: cover;  
        }

        .text-container {
            margin-left: 100px;
        }

        /* OUR DOCTORS SECTION */
        .doctors {
        text-align: center;
        padding: 80px 40px;
        background: #fff; 
        }

        .doctors h2 {
        font-size: 36px;
        font-weight: bold;
        color: #5A3E3E;
        margin-bottom: 10px;
        }

        .doctors .subtitle {
        font-size: 1.1rem;
        color: #777;
        margin-bottom: 50px;
        }

        .doctors-container {
        display: flex;
        justify-content: center;
        align-items: stretch;
        gap: 40px;
        flex-wrap: wrap; 
        }

        .doctor-card {
        text-align: center;
        max-width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        }

        .doctor-photo {
        width: 180px;
        height: 180px;
        margin: 0 auto 20px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #ED6868;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .doctor-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

        .doctor-card h3 {
        font-size: 1.2rem;
        color: #5A3E3E;
        margin-bottom: 5px;
        justify-content: center;
        text-align: center;
        }

        .doctor-card p {
        font-size: 0.95rem;
        color: #777;
        margin-top: auto;
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

        .footer-section ul li {
        margin-bottom: 6px;
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
        margin: 4px 0; /* tighter spacing */
        }

        .footer-bottom {
        text-align: center;
        margin-top: 15px;
        font-size: 13px;
        opacity: 0.9;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            text-align: center;
        }
        .footer-section {
            margin-bottom: 15px;
        }
        }
        nav a.active {
        color: #7B0707;
        font-weight: 600;
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
        <nav>
            <a href="{{ route('user.landing_page') }}" 
            class="{{ request()->routeIs('user.landing_page') ? 'active' : '' }}">
            Home
            </a>
            <a href="{{ route('user.services') }}" 
            class="{{ request()->routeIs('user.services') ? 'active' : '' }}">
            Services
            </a>
            <a href="{{ route('user.about') }}" 
            class="{{ request()->routeIs('user.about') ? 'active' : '' }}">
            About Us
            </a>
            <a href="{{ route('user.appointment') }}" 
            class="{{ request()->routeIs('user.appointment') ? 'active' : '' }}">
            Appointment
            </a>
        </nav>
        <a href="tel:+639123456789" class="phone-btn">+6391-2345-6789</a>
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
        <!-- Car
         d 3 -->
        <div class="card">
            <img src="/images/pre-natal.jpeg" alt="Pre-natal Care">
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
            <div class="icon">👩‍⚕️</div>
            <div>
                <h3>Streamlined Scheduling</h3>
                <p>Enjoy the convenience of both appointment-based and walk-in services, reducing wait times and enhancing accessibility to care.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div class="icon">📄</div>
            <div>
                <h3>Paperless Health Records</h3>
                <p>With our digital health records system, we ensure quick access to your medical history, enhancing accuracy and efficiency in your care.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div class="icon">👩‍⚕️</div>
            <div>
                <h3>Our professionals</h3>
                <p>Our team of experienced doctors, midwives, and healthcare professionals is dedicated to providing personalized, attentive care throughout your pregnancy and beyond.</p>
            </div>
        </div>

        <div class="benefit-card">
            <div class="icon">❤️</div>
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
        <footer class="footer">
        <div class="footer-container">
            <!-- Page Links -->
            <div class="footer-section">
            <h3>Page</h3>
            <ul>
                <a href="{{ route('user.services') }}">Services</a>
                <a href="{{ route('user.about') }}">About Us</a>
                <a href="{{ route('user.appointment') }}">Appointment</a>
            </ul>
            </div>

            <!-- Contact -->
            <div class="footer-section">
            <h3>Contact</h3>
            <p>📍 Purok 1 Brgy. 3 Del Rosario, Sto. Domingo Albay 4508</p>
            <p>📞 +63 912-345-678</p>
            <p>📧 delrosario.maternity@gmail.com</p>
            </div>

            <!-- Support -->
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
</html>
