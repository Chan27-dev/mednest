@extends('layouts.app')

@section('title', 'My Profile - MedNest')

@section('extra-css')
<style>
    :root {
        --primary-color: #d63384;
        --primary-light: #f8d7da;
        --sidebar-bg: linear-gradient(135deg, #d63384 0%, #e91e63 50%, #ff6b9d 100%);
        --sidebar-bg-solid: #d63384;
        --sidebar-text: #ffffff;
        --sidebar-text-muted: #fce4ec;
        --active-bg: rgba(255, 255, 255, 0.2);
        --hover-bg: rgba(255, 255, 255, 0.1);
        --border-color: rgba(255, 255, 255, 0.3);
    }

    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar {
        background: var(--sidebar-bg);
        min-height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        padding: 0;
        z-index: 1000;
        box-shadow: 4px 0 15px rgba(214, 51, 132, 0.3);
    }

    .sidebar .logo {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 15px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .sidebar .logo .logo-image {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .sidebar .logo .logo-text h5 {
        color: white;
        margin: 0;
        font-weight: bold;
        font-size: 1.2rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .sidebar .logo .logo-text small {
        color: var(--sidebar-text-muted);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .sidebar-nav {
        padding: 1rem 0;
    }

    .sidebar-nav .nav-link {
        color: var(--sidebar-text);
        padding: 1rem 1.5rem;
        border: none;
        border-radius: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 500;
        position: relative;
        margin: 0.25rem 0.75rem;
        border-radius: 10px;
    }

    .sidebar-nav .nav-link:hover {
        background: var(--hover-bg);
        color: white;
        transform: translateX(5px);
        box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
    }

    .sidebar-nav .nav-link i {
        width: 18px;
        text-align: center;
        font-size: 1.1rem;
    }

    .main-content {
        margin-left: 250px;
        padding: 0;
    }

    .top-header {
        background-color: white;
        padding: 1rem 2rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .breadcrumb-nav {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #6c757d;
    }

    .breadcrumb-nav a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .breadcrumb-nav a:hover {
        text-decoration: underline;
    }

    .admin-profile {
        position: relative;
    }

    .admin-profile-trigger {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.5rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .admin-profile-trigger:hover {
        background-color: #f8f9fa;
    }

    .admin-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(214, 51, 132, 0.3);
    }

    .page-content {
        padding: 2rem;
    }

    .profile-header {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }

    .profile-avatar-large {
        width: 100px;
        height: 100px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 2.5rem;
        font-weight: bold;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .profile-cards {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
    }

    .profile-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .profile-card h5 {
        color: #333;
        margin-bottom: 1.5rem;
        font-weight: bold;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 0.5rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #f8f9fa;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
    }

    .info-content h6 {
        margin: 0;
        color: #333;
        font-weight: 600;
    }

    .info-content p {
        margin: 0;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 12px;
        transition: transform 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-2px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #c2185b, var(--primary-color));
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.4);
    }

    .btn-outline-primary {
        border-color: var(--primary-color);
        color: var(--primary-color);
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    @media (max-width: 768px) {
        .profile-cards {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .main-content {
            margin-left: 0;
        }
        
        .sidebar {
            transform: translateX(-100%);
        }
    }
</style>
@endsection

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <div class="logo-image">
            <svg width="35" height="35" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="heartGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#d63384;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#e91e63;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ff6b9d;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M50,85 C50,85 20,60 20,40 C20,25 30,15 45,20 C50,10 70,10 75,20 C90,15 100,25 100,40 C100,60 70,85 50,85 Z" 
                      fill="url(#heartGradient)" opacity="0.9"/>
                <path d="M35,30 C35,25 40,20 45,25 C45,30 42,35 40,40 C38,45 35,50 35,50" 
                      fill="white" opacity="0.8"/>
                <circle cx="55" cy="40" r="8" fill="white" opacity="0.9"/>
                <path d="M55,48 C55,48 50,52 55,55 C60,52 55,48 55,48" 
                      fill="white" opacity="0.8"/>
            </svg>
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>THE MODERN MATERNITY CLINIC</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.patients') }}">
                    <i class="fas fa-users"></i>
                    Patients Record
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.appointments') }}">
                    <i class="fas fa-calendar-alt"></i>
                    Appointments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.labor') }}">
                    <i class="fas fa-baby"></i>
                    Labor Monitoring
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.billing') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Billing System
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.referrals') }}">
                    <i class="fas fa-share-alt"></i>
                    Referrals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.reports') }}">
                    <i class="fas fa-chart-bar"></i>
                    Branch Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.staff') }}">
                    <i class="fas fa-user-cog"></i>
                    Staff Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings') }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Header -->
    <div class="top-header">
        <div class="breadcrumb-nav">
            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <i class="fas fa-chevron-right"></i>
            <span>My Profile</span>
        </div>
        <div class="admin-profile dropdown">
            <div class="admin-profile-trigger" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; display: flex; align-items: center; gap: 10px;">
                <div class="admin-avatar">AC</div>
                <span class="fw-bold">Admin Clerk</span>
                <i class="fas fa-chevron-down" style="font-size: 0.8rem; color: #6c757d;"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <div class="dropdown-header">
                        <strong>Admin Clerk</strong><br>
                        <small class="text-muted">admin@mednest.com</small>
                    </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('dashboard.profile') }}">
                        <i class="fas fa-user me-2"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('dashboard.settings') }}">
                        <i class="fas fa-cog me-2"></i>
                        Account Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('dashboard.notifications') }}">
                        <i class="fas fa-bell me-2"></i>
                        Notifications
                        <span class="badge bg-danger ms-auto">3</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="#" data-action="logout">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="d-flex align-items-center">
                <div class="profile-avatar-large me-4">
                    AC
                </div>
                <div>
                    <h2 class="mb-1">{{ $profileData['name'] }}</h2>
                    <p class="mb-2 opacity-75">{{ $profileData['role'] }}</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-light text-dark">{{ $profileData['branch'] }}</span>
                        <span class="badge bg-light text-dark">
                            <i class="fas fa-clock me-1"></i>
                            Last login: {{ date('M j, Y g:i A', strtotime($profileData['last_login'])) }}
                        </span>
                    </div>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-light me-2">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-download me-2"></i>Export Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="profile-cards">
            <!-- Personal Information -->
            <div class="profile-card">
                <h5>
                    <i class="fas fa-user me-2 text-primary"></i>
                    Personal Information
                </h5>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h6>Email Address</h6>
                        <p>{{ $profileData['email'] }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h6>Phone Number</h6>
                        <p>{{ $profileData['phone'] }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h6>Address</h6>
                        <p>{{ $profileData['address'] }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="info-content">
                        <h6>Joined Date</h6>
                        <p>{{ date('F j, Y', strtotime($profileData['joined_date'])) }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <h6 class="text-muted mb-3">Permissions</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($profileData['permissions'] as $permission)
                        <span class="badge bg-primary">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="profile-card">
                <h5>
                    <i class="fas fa-chart-bar me-2 text-primary"></i>
                    Activity Statistics
                </h5>

                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">{{ $profileData['stats']['patients_managed'] }}</div>
                        <div class="stat-label">Patients Managed</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $profileData['stats']['appointments_scheduled'] }}</div>
                        <div class="stat-label">Appointments Scheduled</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $profileData['stats']['reports_generated'] }}</div>
                        <div class="stat-label">Reports Generated</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $profileData['stats']['active_days'] }}</div>
                        <div class="stat-label">Active Days</div>
                    </div>
                </div>

                <div class="mt-4">
                    <h6 class="text-muted mb-3">Quick Actions</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">
                            <i class="fas fa-key me-2"></i>Change Password
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-shield-alt me-2"></i>Security Settings
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i>Download Activity Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    // Handle logout functionality
    document.addEventListener('click', function(e) {
        if (e.target.matches('[data-action="logout"]')) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                // Redirect to logout route
                window.location.href = '/logout';
            }
        }
    });
</script>
@endsection