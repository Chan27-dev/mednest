<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - MedNest</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #d63384;
            --primary-light: #f8d7da;
            --gradient-bg: linear-gradient(135deg, #ff6b9d 0%, #e91e63 50%, #d63384 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        .logo-section {
            padding: 2rem 2rem 1rem;
            text-align: center;
            background: white;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 2rem;
        }

        .logo-image {
            width: 40px;
            height: 40px;
            background: var(--gradient-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
        }

        .logo-text h4 {
            color: #333;
            margin: 0;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .logo-text small {
            color: #6c757d;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .welcome-section {
            background: var(--gradient-bg);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-section::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-section h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .welcome-section p {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .login-form {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #495057;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.15);
            background: white;
        }

        .form-control::placeholder {
            color: #adb5bd;
            font-size: 0.9rem;
        }

        .login-btn {
            background: var(--gradient-bg);
            border: none;
            color: white;
            padding: 0.875rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #e91e63, #c2185b, #d63384);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #e9ecef;
        }

        .register-link p {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #c2185b;
            text-decoration: underline;
        }

        .alert {
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0a3622;
            border-left: 4px solid #198754;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #58151c;
            border-left: 4px solid #dc3545;
        }

        .alert-info {
            background-color: #cff4fc;
            color: #055160;
            border-left: 4px solid #0dcaf0;
        }

        /* Loading spinner */
        .spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .logo-section, .login-form, .welcome-section {
                padding: 1.5rem;
            }
            
            .logo-text h4 {
                font-size: 1.25rem;
            }
            
            .welcome-section h2 {
                font-size: 1.25rem;
            }
        }

        /* Input validation styles */
        .form-control.is-invalid {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .form-control.is-valid {
            border-color: #198754;
            background: #f0fff4;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .valid-feedback {
            display: block;
            color: #198754;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Demo credentials info */
        .demo-credentials {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
        }

        .demo-credentials h6 {
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .demo-credentials p {
            margin: 0.25rem 0;
            color: #6c757d;
        }

        .demo-credentials strong {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <div class="logo">
                <div class="logo-image">
                    <svg width="24" height="24" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="heartGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.8" />
                            </linearGradient>
                        </defs>
                        <path d="M50,85 C50,85 20,60 20,40 C20,25 30,15 45,20 C50,10 70,10 75,20 C90,15 100,25 100,40 C100,60 70,85 50,85 Z" 
                              fill="url(#heartGradient)" opacity="0.9"/>
                        <path d="M35,30 C35,25 40,20 45,25 C45,30 42,35 40,40 C38,45 35,50 35,50" 
                              fill="rgba(255,255,255,0.8)" opacity="0.8"/>
                        <circle cx="55" cy="40" r="8" fill="rgba(255,255,255,0.9)" opacity="0.9"/>
                    </svg>
                </div>
                <div class="logo-text">
                    <h4>MedNest</h4>
                    <small>The Modern Maternity Clinic</small>
                </div>
            </div>
        </div>

        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2>Welcome to MedNest</h2>
            <p>Please login or register to book your appointment</p>
        </div>

        <!-- Login Form -->
        <div class="login-form">
            <!-- Success/Error Messages -->
            <div id="alertContainer">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                @if(session('info'))
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>{{ session('info') }}
                    </div>
                @endif
            </div>

            <!-- Demo Credentials -->
            <div class="demo-credentials">
                <h6><i class="fas fa-info-circle me-1"></i> Demo Credentials</h6>
                <p><strong>Email:</strong> admin@mednest.com</p>
                <p><strong>Password:</strong> password123</p>
            </div>

            <form id="loginForm" action="{{ route('dashboard.index') }}" method="GET">
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="admin@mednest.com" 
                           placeholder="Enter your email"
                           required>
                    <div class="invalid-feedback" id="emailError"></div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           value="password123"
                           placeholder="Enter your password"
                           required>
                    <div class="invalid-feedback" id="passwordError"></div>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn" id="loginBtn">
                    <span class="btn-text">Login</span>
                </button>
            </form>

            <!-- Register Link -->
            <div class="register-link">
                <p>Don't have an account? <a href="#" id="registerLink">Register here</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const registerLink = document.getElementById('registerLink');

            // Handle login form submission
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                
                // Clear previous validation
                clearValidation();
                
                // Basic validation
                if (!email || !password) {
                    showAlert('Please fill in all fields', 'danger');
                    return;
                }

                if (!isValidEmail(email)) {
                    showAlert('Please enter a valid email address', 'danger');
                    document.getElementById('email').classList.add('is-invalid');
                    return;
                }

                if (password.length < 6) {
                    showAlert('Password must be at least 6 characters long', 'danger');
                    document.getElementById('password').classList.add('is-invalid');
                    return;
                }

                // Show loading state
                showLoadingState(true);

                // Simulate login process
                setTimeout(() => {
                    // Demo login logic - check credentials
                    if (email === 'admin@mednest.com' && password === 'password123') {
                        // Success
                        showAlert('Login successful! Redirecting to dashboard...', 'success');
                        
                        // Redirect to dashboard after 1.5 seconds
                        setTimeout(() => {
                            // Use the actual dashboard route
                            window.location.href = '/dashboard';
                        }, 1500);
                    } else {
                        // Failed login
                        showAlert('Invalid email or password. Please use the demo credentials.', 'danger');
                        showLoadingState(false);
                        
                        // Add validation classes
                        document.getElementById('email').classList.add('is-invalid');
                        document.getElementById('password').classList.add('is-invalid');
                    }
                }, 1000); // Simulate network delay
            });

            // Handle register link
            registerLink.addEventListener('click', function(e) {
                e.preventDefault();
                showAlert('Registration feature will be available soon!', 'info');
            });

            // Clear validation on input
            document.getElementById('email').addEventListener('input', clearValidation);
            document.getElementById('password').addEventListener('input', clearValidation);

            // Show loading state
            function showLoadingState(loading) {
                const btnText = loginBtn.querySelector('.btn-text');
                
                if (loading) {
                    loginBtn.classList.add('loading');
                    btnText.innerHTML = '<span class="spinner"></span>Logging in...';
                    loginBtn.disabled = true;
                } else {
                    loginBtn.classList.remove('loading');
                    btnText.innerHTML = 'Login';
                    loginBtn.disabled = false;
                }
            }

            // Show alert message
            function showAlert(message, type) {
                // Remove existing dynamic alerts (keep server-side alerts)
                const existingAlerts = document.querySelectorAll('.alert:not([data-server-alert])');
                existingAlerts.forEach(alert => {
                    if (!alert.hasAttribute('data-server-alert')) {
                        alert.remove();
                    }
                });

                // Create new alert
                const alert = document.createElement('div');
                alert.className = `alert alert-${type}`;
                
                const icon = {
                    'success': 'fas fa-check-circle',
                    'danger': 'fas fa-exclamation-circle',
                    'info': 'fas fa-info-circle'
                };

                alert.innerHTML = `<i class="${icon[type]} me-2"></i>${message}`;
                
                // Insert at the top of the alert container
                const alertContainer = document.getElementById('alertContainer');
                alertContainer.appendChild(alert);

                // Auto remove after 5 seconds (except success messages)
                if (type !== 'success') {
                    setTimeout(() => {
                        if (alert.parentNode) {
                            alert.remove();
                        }
                    }, 5000);
                }
            }

            // Email validation
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Clear validation states
            function clearValidation() {
                document.getElementById('email').classList.remove('is-invalid', 'is-valid');
                document.getElementById('password').classList.remove('is-invalid', 'is-valid');
            }

            // Input validation on blur
            document.getElementById('email').addEventListener('blur', function() {
                const email = this.value;
                if (email && !isValidEmail(email)) {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                } else if (email) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                }
            });

            document.getElementById('password').addEventListener('blur', function() {
                const password = this.value;
                if (password && password.length < 6) {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                } else if (password) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                }
            });

            // Mark server-side alerts
            document.querySelectorAll('.alert').forEach(alert => {
                alert.setAttribute('data-server-alert', 'true');
            });

            // Show success message if redirected from logout
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('logout') === 'success') {
                showAlert('You have been successfully logged out.', 'success');
                // Clean the URL
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>
</body>
</html>