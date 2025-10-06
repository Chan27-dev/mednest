<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedNest - From Bump to Baby</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

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
            padding: 0 20px 0 300px; /* left padding to move inward */
            text-align: left; /* left-aligned text */
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
        background: #F28D8D; /* light red background like your design */
        border-radius: 0 200px 200px 200px;
        padding: 60px 40px;
        margin: 60px auto;
        max-width: auto;
        }

        .testimonial-container {
        display: flex;
        align-items: center;
        gap: 40px;
        }

        .testimonial-text {
        flex: 1;
        color: #5A3E3E;
        }

        .testimonial-text h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 40px;
        font-weight: bold;
        }

        .quote-icon {
        font-size: 150px;
        color: #ffffff90;
        margin-bottom: -80px;
        }

        .feedback {
        font-size: 1.1rem;
        line-height: 1.6;
        font-weight: 500;
        }

        .author {
        margin-top: 20px;
        font-size: 0.9rem;
        color: #5A3E3E;
        font-style: italic;
        }

        .testimonial-image {
        flex: 1;
        display: flex;
        justify-content: center;
        }

        .testimonial-image img {
        width: 100%;
        max-width: 340px;
        border-radius: 30px;
        object-fit: cover;
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
            <a href="#">Home</a>
            <a href="#services">Services</a>
            <a href="#about">About Us</a>
            <a href="#appointment">Appointment</a>
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
            <div class="service-item">
                <img src="/images/Immunization.jpeg" alt="Immunization">
                <div class="description">
                    <h3>Immunization</h3>
                    <p>We provide quick and reliable immunization guidance with a tailored list of recommended vaccines for your health and protection.</p>
                </div>
            </div>

            <div class="service-item">
                <img src="/images/Family_planning.jpeg" alt="Prenatal Care">
                <div class="description">
                    <h3>Prenatal Care</h3>
                    <p>We provide quick and effective family planning guidance with a curated list of personalized recommendations</p>
                </div>
            </div>

            <div class="service-item">
                <img src="/images/pre-natal.jpeg" alt="Pre-natal Care">
                <div class="description">
                    <h3>Pre-natal Care</h3>
                    <p>We ensure timely and thorough prenatal check-ups with a list of essential recommendations for a healthy pregnancy journey.</p>
                </div>
            </div>
        </div>
        <div class="view-services-btn">
            <a href="#all-services" class="btn-primary">View All Services</a>
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
        <div class="testimonial-image">
            <img src="images/mom-baby.png" alt="Happy mom with baby">
        </div>
    </div>
    <section>
</body>
</html>
