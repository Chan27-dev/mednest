<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Appointment</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #fdfdfd;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px 0;
    }

    .appointment-container {
      display: flex;
      flex-wrap: wrap;
      width: 90%;
      max-width: 1200px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      overflow: hidden;
    }

    /* LEFT PANEL */
    .appointment-form {
      flex: 1 1 400px;
      background-color: rgba(213, 33, 65, 0.85); 
      color: #fff;
      padding: 50px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .appointment-form h2 {
      font-size: 28px;
      margin-bottom: 10px;
      font-weight: 700;
    }

    .appointment-form p {
      font-size: 14px;
      margin-bottom: 35px;
      opacity: 0.9;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
    }

    .form-group input::placeholder {
      color: #999;
    }

    .time-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 25px;
    }

    .time-btn {
      flex: 1 1 30%;
      min-width: 80px;
      background-color: #fff;
      color: #e88092;
      border: none;
      border-radius: 8px;
      padding: 10px 0;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .time-btn:hover,
    .time-btn.active {
      background-color: #7B0707;
      color: #fff;
    }

    .confirm-btn {
      width: 100%;
      background-color: #fff;
      color: #7B0707;
      border: none;
      border-radius: 25px;
      padding: 14px 0;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .confirm-btn:hover {
      background-color: #f9f9f9;
      transform: scale(1.02);
    }

    /* RIGHT PANEL */
    .services-section {
      flex: 1 1 350px;
      padding: 50px 40px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .services-section h2 {
      font-size: 24px;
      color: #7B0707;
      margin-bottom: 25px;
    }

    .service-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #fff;
      border: 2px solid #f0f0f0;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      transition: all 0.3s ease;
      flex-wrap: wrap;
    }

    .service-card:hover {
      transform: scale(1.02);
      border-color: #7B0707;
    }

    .service-info {
      flex: 1 1 200px;
    }

    .service-info h3 {
      font-size: 16px;
      font-weight: 600;
      color: #000;
    }

    .service-info p {
      font-size: 13px;
      color: #555;
    }

    .price {
      font-size: 18px;
      font-weight: 700;
      color: #7B0707;
    }

    .highlight {
      background-color: #e8f6ef;
      border-left: 5px solid #00b86f;
    }

    .highlight .service-info h3 {
      color: #00b86f;
    }

    .free-badge {
      display: inline-block;
      background-color: #00b86f;
      color: #fff;
      font-size: 11px;
      padding: 3px 8px;
      border-radius: 8px;
      margin-top: 5px;
    }

    /* MEDIA QUERIES */
    @media (max-width: 950px) {
      .appointment-container {
        flex-direction: column;
      }

      .appointment-form,
      .services-section {
        padding: 30px 20px;
      }

      .time-btn {
        flex: 1 1 45%;
      }
    }

    @media (max-width: 600px) {
      .appointment-form h2 {
        font-size: 24px;
      }

      .services-section h2 {
        font-size: 20px;
      }

      .time-btn {
        flex: 1 1 100%;
      }

      .appointment-form,
      .services-section {
        padding: 20px 15px;
      }

      .confirm-btn {
        padding: 12px 0;
      }

      .service-info h3 {
        font-size: 14px;
      }

      .service-info p {
        font-size: 12px;
      }

      .price {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="appointment-container">
    <!-- LEFT SIDE -->
    <div class="appointment-form">
      <h2>Schedule Your Visit</h2>
      <p>Select your preferred date, time, and service</p>

      <form action="{{ route('user.confirmation') }}" method="get">
        <div class="form-group">
          <label>Patient Name</label>
          <input type="text" placeholder="Enter your name">
        </div>

        <div class="form-group">
          <label>Contact Number</label>
          <input type="text" placeholder="+63 123456789">
        </div>

        <div class="form-group">
          <label>Select Date</label>
          <input type="date">
        </div>

        <div class="form-group">
          <label>Type of Visit</label>
          <select>
            <option>Pre-Natal Check Up (FREE)</option>
            <option>General Consultation</option>
            <option>Ultrasound Imaging</option>
            <option>Immunization</option>
            <option>Family Planning</option>
          </select>
        </div>

        <div class="form-group">
          <label>Preferred Time</label>
          <div class="time-buttons">
            <button type="button" class="time-btn active">8:00 AM</button>
            <button type="button" class="time-btn">9:00 AM</button>
            <button type="button" class="time-btn">10:00 AM</button>
            <button type="button" class="time-btn">11:00 AM</button>
            <button type="button" class="time-btn">2:00 PM</button>
            <button type="button" class="time-btn">3:00 PM</button>
            <button type="button" class="time-btn">4:00 PM</button>
            <button type="button" class="time-btn">5:00 PM</button>
          </div>
        </div>

        <button type="submit" class="confirm-btn">Confirm Appointment</button>
      </form>
    </div>

    <!-- RIGHT SIDE -->
    <div class="services-section">
      <h2>Available Services</h2>

      <div class="service-card highlight">
        <div class="service-info">
          <h3>Pre-natal Check Up</h3>
          <p>Regular health monitoring during pregnancy</p>
          <span class="free-badge">FREE</span>
        </div>
      </div>

      <div class="service-card">
        <div class="service-info">
          <h3>General Consultation</h3>
          <p>Medical consultations & advice</p>
        </div>
        <span class="price">₱1,500</span>
      </div>

      <div class="service-card">
        <div class="service-info">
          <h3>Ultrasound Imaging</h3>
          <p>Imaging & monitoring</p>
        </div>
        <span class="price">₱2,500</span>
      </div>

      <div class="service-card">
        <div class="service-info">
          <h3>Immunization</h3>
          <p>Vaccination programs</p>
        </div>
        <span class="price">₱800</span>
      </div>

      <div class="service-card">
        <div class="service-info">
          <h3>Family Planning</h3>
          <p>Comprehensive planning services</p>
        </div>
        <span class="price">₱1,200</span>
      </div>
    </div>
  </div>
</body>
</html>
