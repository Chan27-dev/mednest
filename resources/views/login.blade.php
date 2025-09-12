<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedNest - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            color: #373C36;
            background: #fff;
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

        /* LOGIN SECTION */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            background: #f9f9f9;
        }

        .login-box {
            max-width: 450px; 
            width: 100%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 24px 30px rgba(44, 40, 40, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
            padding: 20px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .login-header p {
            margin: 5px 0 0;
            font-size: 13px;
            font-weight: normal;
        }

        .login-body {
            padding: 30px;
        }

        .login-body label {
            display: block;
            font-size: 14px;
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .login-body input {
            width: 100%;
            padding: 12px; 
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            box-sizing: border-box;
        }

            .login-body input:focus {
            outline: none;
            border-color: #B7233D; 
            box-shadow: 0 0 0 3px rgba(183, 35, 61, 0.2);
        }

        .login-btn {
            width: 100%;
            padding: 12px; 
            border: none;
            border-radius: 30px;
            background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            opacity: 0.9;
        }

        .register-link {
            margin-top: 15px;
            font-size: 13px;
            text-align: center;
        }

        .register-link a {
            color: #B7233D;
            text-decoration: none;
            font-weight: bold;
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

    <!-- LOGIN BOX -->
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                Welcome to MedNest
                <p>Please login or register to book your appointment</p>
            </div>
            <div class="login-body">
                <form>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="login-btn">Login</button>
                </form>
                <div class="register-link">
                    Don’t have an account? <a href="#">Register here</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
