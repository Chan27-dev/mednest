<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedNest - Appointment Confirmation</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #fafafa;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 40px 20px;
      min-height: 100vh;
    }

    h1 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 5px;
      color: #000;
      text-align: center;
    }

    p.subtitle {
      font-size: 14px;
      color: #777;
      margin-bottom: 30px;
      text-align: center;
    }

    /* STATUS BOX */
    .status-box {
      width: 100%;
      max-width: 720px;
      background: linear-gradient(85deg, #008000 1%, #36d521 39%, #4EE7AA 70%);
      border-radius: 10px;
      padding: 35px 25px;
      color: #fff;
      text-align: center;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      margin-bottom: 35px;
    }

    .status-box i {
      display: inline-block;
      background-color: #fff;
      color: #36d521;
      font-size: 22px;
      font-weight: bold;
      width: 32px;
      height: 32px;
      line-height: 32px;
      border-radius: 4px;
      margin-bottom: 12px;
    }

    .status-box h3 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .status-box p {
      font-size: 13px;
    }

    /* SUMMARY CARD */
    .summary-card {
      width: 100%;
      max-width: 720px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 35px;
      margin-bottom: 25px;
    }

    .summary-card h2 {
      text-align: center;
      color: #D52141;
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      flex-wrap: wrap;
    }

    .summary-row label {
      font-size: 14px;
      font-weight: 600;
      color: #333;
      width: 48%;
      margin-bottom: 5px;
    }

    .summary-row input {
      font-size: 13px;
      padding: 6px 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      width: 48%;
      color: #333;
    }

    .next-steps {
      background-color: #f6c7cd;
      border-radius: 10px;
      padding: 15px 20px;
      margin-top: 20px;
    }

    .next-steps h3 {
      color: #a50f2b;
      font-size: 14px;
      margin-bottom: 10px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .next-steps ul {
      font-size: 13px;
      color: #333;
      padding-left: 20px;
    }

    .button-group {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 25px;
    }

    .btn {
      padding: 10px 25px;
      border-radius: 25px;
      border: none;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.3s ease;
      min-width: 160px;
      text-align: center;
    }

    .btn-home {
      background-color: #fff;
      color: #7B0707;
      border: 1px solid #D52141;
    }

    .btn-home:hover {
      background-color: #f5f5f5;
    }

    .btn-another {
      background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
      color: #fff;
    }

    .btn-another:hover {
      background-color: #b91c37;
    }

    /* FOOTER CARD */
    .footer-card {
      width: 100%;
      max-width: 720px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 25px;
      text-align: center;
    }

    .footer-card h4 {
      color: #D52141;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .footer-card p {
      font-size: 13px;
      color: #555;
      margin-bottom: 15px;
    }

    .footer-card .contact {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      color: #444;
    }

    .footer-card .contact span {
      display: flex;
      align-items: center;
      gap: 6px;
      white-space: nowrap;
    }

    /* MEDIA QUERIES */
    @media (max-width: 600px) {
      body {
        padding: 30px 15px;
      }

      h1 {
        font-size: 20px;
      }

      p.subtitle {
        font-size: 13px;
        margin-bottom: 20px;
      }

      .status-box {
        padding: 25px 15px;
      }

      .summary-card {
        padding: 25px 15px;
      }

      .summary-row label,
      .summary-row input {
        width: 100%;
      }

      .summary-row label {
        margin-bottom: 5px;
      }

      .next-steps h3 {
        font-size: 13px;
      }

      .next-steps ul {
        font-size: 12px;
      }

      .button-group {
        flex-direction: column;
      }

      .btn {
        width: 100%;
        max-width: 100%;
      }

      .footer-card {
        padding: 20px 15px;
      }

      .footer-card .contact {
        flex-direction: column;
        gap: 5px;
      }
    }
  </style>
</head>
<body>

  <h1>Appointment Confirmation</h1>
  <p class="subtitle">Please review your appointment details below</p>

  <div class="status-box">
    <i>✔</i>
    <h3>Appointment Status: Confirmed and Pending Approval</h3>
    <p>Your appointment has been successfully submitted and is awaiting approval from our medical staff</p>
  </div>

  <div class="summary-card">
    <h2>Appointment Summary</h2>

    <div class="summary-row">
      <label>Patient Name</label>
      <input type="text" value="Patient" readonly>
    </div>

    <div class="summary-row">
      <label>Contact Number</label>
      <input type="text" value="+63 924567678" readonly>
    </div>

    <div class="summary-row">
      <label>Appointment Date</label>
      <input type="text" value="Wednesday, May 28, 2025" readonly>
    </div>

    <div class="summary-row">
      <label>Selected Time</label>
      <input type="text" value="8:00 AM" readonly>
    </div>

    <div class="summary-row">
      <label>Service Type</label>
      <input type="text" value="Pre-natal Check Up (FREE)" readonly>
    </div>

    <div class="next-steps">
      <h3>❓ What happens next?</h3>
      <ul>
        <li>Our medical staff will review your appointment request.</li>
        <li>You will receive a confirmation call within 24 hours.</li>
        <li>Please arrive 15 minutes before your scheduled time.</li>
        <li>Bring a valid ID and any relevant medical records.</li>
      </ul>
    </div>

    <div class="button-group">
      <button class="btn btn-home">Back to Home</button>
      <button class="btn btn-another">Book Another Appointment</button>
    </div>
  </div>

  <div class="footer-card">
    <h4>Need to modify your appointment?</h4>
    <p>Contact us directly for any changes or questions</p>
    <div class="contact">
      <span>📞 +63 912-345-6789</span>
      <span>📧 delrosario.maternity@gmail.com</span>
    </div>
  </div>

</body>
</html>
