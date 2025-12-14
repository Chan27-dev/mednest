{{-- resources/views/auth/admin-login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedNest Admin - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: #333;
        }

        /* Navbar */
        .admin-navbar {
            background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 15px 40px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 800;
        }

        .logo-text .med { color: #000; }
        .logo-text .nest { color: #B7233D; }

        .admin-badge {
            background: #B7233D;
            color: white;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 10px;
        }

        /* Login Card */
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 90px);
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(183, 35, 61, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 480px;
        }

        .login-header {
            background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .login-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 26px;
        }

        .login-header p {
            margin: 8px 0 0;
            opacity: 0.9;
            font-size: 15px;
        }

        .login-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 1.5px solid #ddd;
            padding: 0 16px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #B7233D;
            box-shadow: 0 0 0 4px rgba(183, 35, 61, 0.15);
        }

        .btn-login {
            width: 100%;
            height: 52px;
            border-radius: 30px;
            background: linear-gradient(90deg, #D44C64 0%, #B7233D 66%, #AF1732 100%);
            border: none;
            color: white;
            font-size: 17px;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(183, 35, 61, 0.3);
        }

        .alert {
            border-radius: 10px;
            font-size: 14px;
        }

        .text-center a {
            color: #B7233D;
            font-weight: 600;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .login-body { padding: 30px 25px; }
            .login-header h3 { font-size: 22px; }
        }
    </style>
</head>
<body>

    <!-- Admin Navbar -->
    <nav class="admin-navbar navbar navbar-expand">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <span class="logo-text me-3">
                    <span class="med">Med</span><span class="nest">Nest</span>
                </span>
                <span class="admin-badge">ADMIN</span>
            </div>
        </div>
    </nav>

    <!-- Login Card -->
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <h3>Admin Portal</h3>
                <p>Sign in to manage clinic operations</p>
            </div>

            <div class="login-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               placeholder="e.g. admin@mednest.com">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required 
                               placeholder="Enter your password">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-login">
                        Sign In as Admin
                    </button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>