<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy - MedNest</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      padding: 20px;
    }
    .container {
      max-width: 700px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h1 {
      font-size: 1.8rem;
      margin-bottom: 15px;
      color: #7B0707;
    }
    p {
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 15px;
    }
    .accordion-item {
      border-bottom: 1px solid #ddd;
    }
    .accordion-header {
      cursor: pointer;
      padding: 15px;
      font-weight: 600;
      background: #f9f9f9;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .accordion-header:hover {
      background: #f1f1f1;
    }
    .accordion-content {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      padding: 0 15px;
      background: #fff;
    }
    .accordion-content p {
      margin: 10px 0;
    }
    .accordion-header::after {
      content: '⌄';
      font-weight: bold;
      font-size: 1.2rem;
    }
    .accordion-header.active::after {
      content: '⌃';
    }

    .back-button {
    background-color: #0B8FAC;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    margin-bottom: 20px;
    transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #097089;
    }

    @media (max-width: 480px) {
      .container { padding: 20px; }
      h1 { font-size: 1.5rem; }
      .accordion-header { padding: 12px; font-size: 0.95rem; }
    }
  </style>
</head>
<body>
  <div class="container">
    <button class="back-button" onclick="window.location.href='/user/terms'">Back to Terms</button>

    <h1>Privacy Policy</h1>
    <p>
      At <strong>MedNest</strong>, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and protect your personal information when you visit our website, use our services, or interact with us. By using our website or services, you consent to the practices described in this policy. Please read carefully.
    </p>

    <!-- Accordion -->
    <div class="accordion-item">
      <div class="accordion-header">What Information Do We Collect?</div>
      <div class="accordion-content">
        <p>When you interact with our services, we may collect personal information such as your name, contact number, email address, home address, birthdate, and relevant medical history.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">How Do We Use Your Information?</div>
      <div class="accordion-content">
        <p>We use your information to schedule appointments, deliver personalized care, improve our services, process billing, and provide customer support. Your information may also help us send important updates or reminders.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">Do We Share Your Information?</div>
      <div class="accordion-content">
        <p>MedNest does not sell or rent your personal data. We only share information with authorized medical staff or partners as required for your care or when legally necessary.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">How Is Your Information Protected?</div>
      <div class="accordion-content">
        <p>We use secure servers, encrypted storage, and restricted access to ensure your information is protected against unauthorized access, loss, or misuse.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">Your Rights and Choices</div>
      <div class="accordion-content">
        <p>You have the right to access, correct, or request deletion of your personal data. You may also withdraw your consent at any time by contacting our support team.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">Changes to This Policy</div>
      <div class="accordion-content">
        <p>We may update this policy occasionally to reflect changes in our practices or legal obligations. Any changes will be posted here, and we encourage you to review this page regularly.</p>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-header">Contact Us</div>
      <div class="accordion-content">
        <p>For questions or concerns about your privacy, you can reach us at <a href="mailto:delrosario.maternity@gmail.com">delrosario.maternity@gmail.com</a> or call +6391-2345-6789.</p>
      </div>
    </div>
  </div>

  <script>
    const headers = document.querySelectorAll('.accordion-header');
    headers.forEach(header => {
      header.addEventListener('click', () => {
        header.classList.toggle('active');
        const content = header.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
        }
      });
    });
  </script>
</body>
</html>
