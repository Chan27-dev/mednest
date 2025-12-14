<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms and Conditions</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .terms-container {
        background-color: #fff;
        width: 100%;
        max-width: 450px; 
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h1 {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.5rem;
        color: #2e2e2e;
        margin-bottom: 5px;
    }

    .updated {
        color: #888;
        font-size: 0.85rem;
        margin-bottom: 15px;
    }

    p {
        font-size: 0.9rem;
        text-align: justify;
        color: #333;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .buttons button {
        flex: 1;
        min-width: 120px;
        border: none;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        color: white;
        font-weight: 500;
        transition: 0.3s;
    }

    .decline {
        background-color: #b92d2d;
    }
    .decline:hover {
        background-color: #9a2323;
    }

    .accept {
        background-color: #3BB273;
    }
    .accept:hover {
        background-color: #319963;
    }

    a {
        color: #0B8FAC;
        text-decoration: none;
        font-weight: 500;
    }
    a:hover {
        text-decoration: underline;
    }

    /* Mobile responsiveness */
    @media (max-width: 480px) {
        body {
        padding: 10px;
        }
        .terms-container {
        padding: 20px;
        }
        h1 {
        font-size: 1.25rem;
        flex-wrap: wrap;
        }
        p {
        font-size: 0.85rem;
        }
    }
    </style>
</head>
<body>
  <div class="terms-container">
    <h1>📄 Terms and Conditions</h1>
    <p class="updated">Last Updated: January 2025</p>

    <p>
      Welcome to <strong>MedNest</strong>. By accessing and using our website and clinical services, you agree to comply with the terms outlined below. All information provided on our platform is intended for general awareness and should not be considered a substitute for professional medical advice, diagnosis, or treatment. Users are expected to provide accurate and truthful personal information when booking appointments or utilizing our services to ensure proper care and communication.
    </p>

    <p>
      <strong>MedNest</strong> reserves the right to update, modify, or discontinue any part of its services or content without prior notice. Changes to these terms may be made at any time, and continued use of our website constitutes your acceptance of those changes. We encourage users to review this page periodically to stay informed about any updates. Any concerns, violations, or issues related to these terms should be reported directly to our support team.
    </p>

    <p>
      If you have any questions regarding these Terms and Conditions, feel free to contact us at 
      <a href="mailto:delrosario.maternity@gmail.com">delrosario.maternity@gmail.com</a>.
        Also, please read our <a href="/user/privacy">Privacy Policy</a> for more information.
    </p> 

    <div class="buttons">
      <button class="decline" onclick="window.location.href='/'">Decline</button>
      <button class="accept" onclick="window.location.href='/register'">Accept</button>
    </div>
    
  </div>
</body>
</html>