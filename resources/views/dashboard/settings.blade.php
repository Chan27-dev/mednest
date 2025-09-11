@extends('layouts.app')

@section('title', 'Account Settings - MedNest')

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

    .settings-header {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .settings-header::before {
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

    .settings-nav {
        background: white;
        border-radius: 15px;
        padding: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .settings-nav .nav-pills .nav-link {
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        margin-right: 0.5rem;
        color: #6c757d;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .settings-nav .nav-pills .nav-link.active {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
    }

    .settings-nav .nav-pills .nav-link:hover:not(.active) {
        background-color: #f8f9fa;
        color: var(--primary-color);
    }

    .settings-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 2rem;
    }

    .settings-card h5 {
        color: #333;
        margin-bottom: 1.5rem;
        font-weight: bold;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #e9ecef;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-switch .form-check-input {
        width: 3rem;
        height: 1.5rem;
        background-color: #e9ecef;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
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

    .btn-danger {
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
    }

    .alert {
        border-radius: 10px;
        border: none;
    }

    .alert-info {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .alert-success {
        background-color: #e8f5e8;
        color: #2e7d32;
    }

    .alert-warning {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .security-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .security-icon {
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

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
        }
        
        .sidebar {
            transform: translateX(-100%);
        }

        .settings-nav .nav-pills {
            flex-direction: column;
        }

        .settings-nav .nav-pills .nav-link {
            margin-right: 0;
            margin-bottom: 0.5rem;
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
            <span>Account Settings</span>
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
        <!-- Settings Header -->
        <div class="settings-header">
            <div class="d-flex align-items-center">
                <div class="me-4">
                    <i class="fas fa-cog" style="font-size: 3rem; opacity: 0.8;"></i>
                </div>
                <div>
                    <h2 class="mb-1">Account Settings</h2>
                    <p class="mb-0 opacity-75">Manage your account preferences and security settings</p>
                </div>
            </div>
        </div>

        <!-- Settings Navigation -->
        <div class="settings-nav">
            <ul class="nav nav-pills" id="settingsTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab">
                        <i class="fas fa-user me-2"></i>General
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab">
                        <i class="fas fa-shield-alt me-2"></i>Security
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="notifications-tab" data-bs-toggle="pill" data-bs-target="#notifications" type="button" role="tab">
                        <i class="fas fa-bell me-2"></i>Notifications
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="preferences-tab" data-bs-toggle="pill" data-bs-target="#preferences" type="button" role="tab">
                        <i class="fas fa-sliders-h me-2"></i>Preferences
                    </button>
                </li>
            </ul>
        </div>

        <!-- Settings Content -->
        <div class="tab-content" id="settingsTabContent">
            <!-- General Settings -->
            <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="settings-card">
                    <h5>
                        <i class="fas fa-user me-2 text-primary"></i>
                        Personal Information
                    </h5>
                    
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $settingsData['user']['name'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" value="{{ $settingsData['user']['email'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="{{ $settingsData['user']['phone'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select" id="timezone">
                                    <option value="Asia/Manila" selected>Asia/Manila (GMT+8)</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo (GMT+9)</option>
                                    <option value="UTC">UTC (GMT+0)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="language" class="form-label">Language</label>
                                <select class="form-select" id="language">
                                    <option value="en" selected>English</option>
                                    <option value="fil">Filipino</option>
                                    <option value="es">Spanish</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <button type="button" class="btn btn-outline-primary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="settings-card">
                    <h5>
                        <i class="fas fa-shield-alt me-2 text-primary"></i>
                        Security Settings
                    </h5>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Keep your account secure by enabling two-factor authentication and using a strong password.
                    </div>

                    <!-- Password Change -->
                    <div class="security-item">
                        <div class="d-flex align-items-center">
                            <div class="security-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Password</h6>
                                <small class="text-muted">Last changed: {{ date('M j, Y', strtotime($settingsData['security']['last_password_change'])) }}</small>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-sm">Change Password</button>
                    </div>

                    <!-- Two-Factor Authentication -->
                    <div class="security-item">
                        <div class="d-flex align-items-center">
                            <div class="security-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Two-Factor Authentication</h6>
                                <small class="text-muted">
                                    @if($settingsData['security']['two_factor_enabled'])
                                        <span class="text-success">Enabled</span> - Extra security for your account
                                    @else
                                        <span class="text-warning">Disabled</span> - Recommended for security
                                    @endif
                                </small>
                            </div>
                        </div>
                        @if($settingsData['security']['two_factor_enabled'])
                            <button class="btn btn-outline-danger btn-sm">Disable 2FA</button>
                        @else
                            <button class="btn btn-primary btn-sm">Enable 2FA</button>
                        @endif
                    </div>

                    <!-- Active Sessions -->
                    <div class="security-item">
                        <div class="d-flex align-items-center">
                            <div class="security-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Active Sessions</h6>
                                <small class="text-muted">{{ $settingsData['security']['active_sessions'] }} active sessions</small>
                            </div>
                        </div>
                        <button class="btn btn-outline-warning btn-sm">Manage Sessions</button>
                    </div>

                    <!-- Login History -->
                    <div class="security-item">
                        <div class="d-flex align-items-center">
                            <div class="security-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Login History</h6>
                                <small class="text-muted">View recent login activity</small>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-sm">View History</button>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="tab-pane fade" id="notifications" role="tabpanel">
                <div class="settings-card">
                    <h5>
                        <i class="fas fa-bell me-2 text-primary"></i>
                        Notification Preferences
                    </h5>

                    <form>
                        <div class="mb-4">
                            <h6 class="mb-3">Email Notifications</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" {{ $settingsData['preferences']['email_notifications'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="emailNotifications">
                                    <strong>Email Notifications</strong><br>
                                    <small class="text-muted">Receive notifications via email</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="smsNotifications" {{ $settingsData['preferences']['sms_notifications'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="smsNotifications">
                                    <strong>SMS Notifications</strong><br>
                                    <small class="text-muted">Receive notifications via SMS</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="desktopNotifications" {{ $settingsData['preferences']['desktop_notifications'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="desktopNotifications">
                                    <strong>Desktop Notifications</strong><br>
                                    <small class="text-muted">Show notifications in your browser</small>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Notification Types</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="patientNotifications" checked>
                                <label class="form-check-label" for="patientNotifications">
                                    New patient registrations
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="appointmentNotifications" checked>
                                <label class="form-check-label" for="appointmentNotifications">
                                    Appointment reminders and updates
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emergencyNotifications" checked>
                                <label class="form-check-label" for="emergencyNotifications">
                                    Emergency alerts and labor notifications
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="systemNotifications" checked>
                                <label class="form-check-label" for="systemNotifications">
                                    System updates and maintenance alerts
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save Preferences</button>
                            <button type="button" class="btn btn-outline-primary">Reset to Default</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preferences -->
            <div class="tab-pane fade" id="preferences" role="tabpanel">
                <div class="settings-card">
                    <h5>
                        <i class="fas fa-sliders-h me-2 text-primary"></i>
                        Display Preferences
                    </h5>

                    <form>
                        <div class="mb-4">
                            <h6 class="mb-3">Appearance</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="darkMode" {{ $settingsData['preferences']['dark_mode'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="darkMode">
                                    <strong>Dark Mode</strong><br>
                                    <small class="text-muted">Use dark theme for the dashboard</small>
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="compactView" {{ $settingsData['preferences']['compact_view'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="compactView">
                                    <strong>Compact View</strong><br>
                                    <small class="text-muted">Show more information in less space</small>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Dashboard Layout</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="defaultPage" class="form-label">Default Landing Page</label>
                                    <select class="form-select" id="defaultPage">
                                        <option value="dashboard" selected>Dashboard Overview</option>
                                        <option value="patients">Patients List</option>
                                        <option value="appointments">Appointments</option>
                                        <option value="calendar">Calendar View</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="itemsPerPage" class="form-label">Items Per Page</label>
                                    <select class="form-select" id="itemsPerPage">
                                        <option value="10" selected>10 items</option>
                                        <option value="25">25 items</option>
                                        <option value="50">50 items</option>
                                        <option value="100">100 items</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Data Export</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="exportFormat" class="form-label">Default Export Format</label>
                                    <select class="form-select" id="exportFormat">
                                        <option value="xlsx" selected>Excel (.xlsx)</option>
                                        <option value="csv">CSV (.csv)</option>
                                        <option value="pdf">PDF (.pdf)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="autoBackup" class="form-label">Auto Backup</label>
                                    <select class="form-select" id="autoBackup">
                                        <option value="daily" selected>Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save Preferences</button>
                            <button type="button" class="btn btn-outline-primary">Reset to Default</button>
                        </div>
                    </form>
                </div>

                <!-- Danger Zone -->
                <div class="settings-card">
                    <h5 class="text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Danger Zone
                    </h5>

                    <div class="alert alert-warning">
                        <i class="fas fa-warning me-2"></i>
                        These actions are irreversible. Please proceed with caution.
                    </div>

                    <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                        <div>
                            <h6 class="mb-1">Export All Data</h6>
                            <small class="text-muted">Download a complete backup of your account data</small>
                        </div>
                        <button class="btn btn-outline-primary btn-sm">Export Data</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                        <div>
                            <h6 class="mb-1">Reset All Settings</h6>
                            <small class="text-muted">Reset all preferences to default values</small>
                        </div>
                        <button class="btn btn-outline-warning btn-sm">Reset Settings</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center p-3 border border-danger rounded">
                        <div>
                            <h6 class="mb-1 text-danger">Deactivate Account</h6>
                            <small class="text-muted">Temporarily disable your account access</small>
                        </div>
                        <button class="btn btn-danger btn-sm">Deactivate</button>
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

    // Handle form submissions
    document.addEventListener('DOMContentLoaded', function() {
        // General settings form
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
                submitBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Show success message
                    const alert = document.createElement('div');
                    alert.className = 'alert alert-success alert-dismissible fade show';
                    alert.innerHTML = `
                        <i class="fas fa-check-circle me-2"></i>
                        Settings saved successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    
                    form.insertBefore(alert, form.firstChild);
                    
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Auto-hide alert after 3 seconds
                    setTimeout(() => {
                        if (alert.parentNode) {
                            alert.remove();
                        }
                    }, 3000);
                }, 1500);
            });
        });

        // Handle danger zone actions
        document.addEventListener('click', function(e) {
            if (e.target.textContent.includes('Export Data')) {
                e.preventDefault();
                alert('Demo: Data export would start here');
            }
            
            if (e.target.textContent.includes('Reset Settings')) {
                e.preventDefault();
                if (confirm('Are you sure you want to reset all settings to default?')) {
                    alert('Demo: Settings would be reset');
                }
            }
            
            if (e.target.textContent.includes('Deactivate')) {
                e.preventDefault();
                if (confirm('Are you sure you want to deactivate your account? This action will temporarily disable your access.')) {
                    alert('Demo: Account would be deactivated');
                }
            }
        });

        // Handle security actions
        document.addEventListener('click', function(e) {
            if (e.target.textContent.includes('Change Password')) {
                e.preventDefault();
                alert('Demo: Password change modal would open');
            }
            
            if (e.target.textContent.includes('Enable 2FA') || e.target.textContent.includes('Disable 2FA')) {
                e.preventDefault();
                alert('Demo: Two-factor authentication setup would start');
            }
            
            if (e.target.textContent.includes('Manage Sessions')) {
                e.preventDefault();
                alert('Demo: Active sessions management would open');
            }
            
            if (e.target.textContent.includes('View History')) {
                e.preventDefault();
                alert('Demo: Login history would be displayed');
            }
        });

        // Handle preference toggles
        const toggles = document.querySelectorAll('.form-check-input[type="checkbox"]');
        toggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                // Visual feedback for toggle changes
                const label = this.nextElementSibling;
                if (label) {
                    label.style.opacity = '0.7';
                    setTimeout(() => {
                        label.style.opacity = '1';
                    }, 200);
                }
            });
        });
    });
</script>
@endsection