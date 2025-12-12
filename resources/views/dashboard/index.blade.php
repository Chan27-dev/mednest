@extends('layouts.app')

@section('title', 'MedNest Dashboard')

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
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ffffff 0%, #fce4ec 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3), 0 2px 8px rgba(214, 51, 132, 0.4);
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .sidebar .logo .logo-image::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .sidebar .logo .logo-image:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4), 0 4px 12px rgba(214, 51, 132, 0.6);
    }

    .sidebar .logo .logo-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        padding: 8px;
    }

    .sidebar .logo .logo-image .logo-fallback {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        display: none;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
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

    .sidebar-nav .nav-link.active {
        background: var(--active-bg);
        color: white;
        border-left: 4px solid white;
        border-radius: 0 10px 10px 0;
        margin-left: 0.75rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
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

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-box input {
        border-radius: 25px;
        padding-left: 40px;
        border: 1px solid #dee2e6;
    }

    .search-box .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
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

    .admin-profile .dropdown-menu {
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        border-radius: 10px;
        min-width: 250px;
        padding: 0.5rem 0;
    }

    .admin-profile .dropdown-header {
        padding: 0.75rem 1rem;
        background-color: #f8f9fa;
        border-radius: 8px 8px 0 0;
        margin: 0.25rem 0.5rem 0 0.5rem;
    }

    .admin-profile .dropdown-item {
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border-radius: 6px;
        margin: 0.125rem 0.5rem;
    }

    .admin-profile .dropdown-item:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }

    .admin-profile .dropdown-item.text-danger:hover {
        background-color: #f8d7da;
        color: #721c24 !important;
    }

    .admin-profile .dropdown-item i {
        width: 16px;
        text-align: center;
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

    .dashboard-content {
        padding: 2rem;
    }

    .stats-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border: none;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .stats-number {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        transition: background-color 0.5s ease;
    }

    .stats-label {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .stats-card.patients .stats-number { color: #3498db; }
    .stats-card.appointments .stats-number { color: #e67e22; }
    .stats-card.revenue .stats-number { color: var(--primary-color); }
    .stats-card.rating .stats-number { color: #27ae60; }

    .card-header.bg-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d) !important;
    }

    .badge.bg-danger {
        background: var(--primary-color) !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        box-shadow: 0 2px 8px rgba(214, 51, 132, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #c2185b, var(--primary-color));
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.4);
    }

    .quick-actions {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-top: 2rem;
    }

    .action-btn {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        text-decoration: none;
        color: #495057;
        transition: all 0.3s ease;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        width: 100%;
        font-family: inherit;
        font-size: inherit;
    }

    .action-btn:hover {
        background: #e9ecef;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        color: #495057;
        text-decoration: none;
    }

    .action-btn i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
    }

    .recent-activity {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-top: 2rem;
    }

    .activity-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .activity-item:hover {
        background-color: #f8f9fa;
    }

    .activity-item.selected {
        background-color: #f8f9fa;
        border-left: 3px solid var(--primary-color);
        padding-left: 1rem;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-time {
        color: #6c757d;
        font-size: 0.85rem;
        min-width: 80px;
    }

    .activity-details {
        flex-grow: 1;
        margin: 0 1rem;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-completed { background-color: #d4edda; color: #155724; }
    .status-active { background-color: #d1ecf1; color: #0c5460; }
    .status-pending { background-color: #fff3cd; color: #856404; }

    .branch-badge {
        background-color: #f8f9fa;
        color: #495057;
        padding: 0.25rem 0.5rem;
        border-radius: 10px;
        font-size: 0.75rem;
        margin-right: 10px;
    }

    .branch-sinag { background-color: #e3f2fd; color: #1976d2; }
    .branch-bill { background-color: #e8f5e8; color: #2e7d32; }
    .branch-anthony { background-color: #fce4ec; color: #c2185b; }

    /* Notification styles */
    .notification-toast {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border: none;
        border-radius: 10px;
    }

    /* Loading animation */
    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
    }

    .loading {
        animation: pulse 1s infinite;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        padding: 1.5rem 2rem;
        border-radius: 15px 15px 0 0;
    }

    .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }

    .section-header h6 {
        color: #495057;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
        border-color: var(--primary-color);
    }

    .form-control-lg {
        font-size: 1rem;
        padding: 1rem 1.25rem;
    }

    /* Ensure select uses same font/size/padding as inputs */
    .form-select.form-select-lg.border-0.bg-light,
    #blood_type {
        font-family: inherit;
        font-size: 1rem; /* matches .form-control-lg */
        padding: 1rem 1.25rem;
        line-height: 1.2;
        height: calc(1.5em + 2rem); /* approximate .form-control-lg height */
        border-radius: 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, transparent 50%), linear-gradient(135deg, transparent 50%, transparent 50%), linear-gradient(to right, rgba(0,0,0,0.06), rgba(0,0,0,0.06));
        background-position: calc(100% - 1.25rem) calc(1rem + 0.2rem), calc(100% - 0.95rem) calc(1rem + 0.2rem), 100% 0;
        background-size: 8px 8px, 8px 8px, 1px 100%;
        background-repeat: no-repeat;
    }

    /* Service Cards */
    .service-card {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 100%;
        text-align: center;
    }

    .service-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(214, 51, 132, 0.2);
    }

    .service-card.active {
        border-color: var(--primary-color);
        background: linear-gradient(135deg, #fce4ec, #f8bbd9);
        box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }

    .service-card .service-header h6 {
        color: #333;
        border: none;
        padding: 0;
        margin-bottom: 0.5rem;
    }

    .service-card .service-price {
        font-size: 1.1rem;
        margin-top: 0.5rem;
    }

    .service-card.active .service-price {
        color: var(--primary-color) !important;
    }

    /* Input Group Styling */
    .input-group-text {
        border-radius: 0 10px 10px 0;
    }

    /* Button Styling */
    .btn {
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        box-shadow: 0 2px 8px rgba(214, 51, 132, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #c2185b, var(--primary-color));
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.4);
    }

    .btn-outline-secondary {
        border-color: #dee2e6;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    /* Schedule Appointment Modal Styles */
    .search-wrapper {
        position: relative;
    }

    .search-icon-modal {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 5;
    }

    .appointment-table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }

    .table-header th {
        border: none;
        font-weight: 600;
        color: #495057;
        padding: 1rem 0.75rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .appointment-table tbody tr {
        transition: all 0.3s ease;
        border: none;
    }

    .appointment-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(214, 51, 132, 0.1);
    }

    .appointment-table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid #f1f3f4;
    }

    .patient-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .patient-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .patient-details h6 {
        margin: 0;
        font-weight: 600;
        color: #333;
    }

    .patient-details small {
        color: #6c757d;
    }

    .appointment-status {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-scheduled {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .status-completed {
        background-color: #e8f5e8;
        color: #2e7d32;
    }

    .status-cancelled {
        background-color: #ffebee;
        color: #c62828;
    }

    .status-pending {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .doctor-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doctor-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .service-badge {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
        padding: 0.3rem 0.6rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .branch-indicator {
        padding: 0.3rem 0.6rem;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .branch-sinag {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .branch-bill {
        background-color: #e8f5e8;
        color: #2e7d32;
    }

    .branch-anthony {
        background-color: #fce4ec;
        color: #c2185b;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
    }

    .btn-action {
        padding: 0.4rem 0.6rem;
        border-radius: 6px;
        border: none;
        font-size: 0.75rem;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background-color: #28a745;
        color: white;
    }

    .btn-edit:hover {
        background-color: #218838;
        transform: translateY(-1px);
    }

    .btn-cancel {
        background-color: #dc3545;
        color: white;
    }

    .btn-cancel:hover {
        background-color: #c82333;
        transform: translateY(-1px);
    }

    .btn-view {
        background-color: #007bff;
        color: white;
    }

    .btn-view:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    /* Pagination styling */
    .pagination .page-link {
        border-radius: 8px;
        margin: 0 2px;
        border: 1px solid #dee2e6;
        color: var(--primary-color);
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .pagination .page-link:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .search-box {
            width: 200px;
        }
    }
</style>
@endsection

@section('content')
<!-- Success/Error Messages -->
@if(session('message'))
    <div class="alert alert-info alert-dismissible fade show" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <div class="logo-image">
            <img src="{{ asset('images/mednest-logo.png') }}" alt="MedNest Logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"> 
            <div class="logo-fallback">
                <i class="fas fa-heart"></i>
            </div>
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>DEL ROSARIO MATERNITY CLINIC</small>
        </div>
    </div>

   <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.index') }}">
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
                <a class="nav-link" href="{{ route('dashboard.billing') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Billing System
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="referral">
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
        </ul>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Header -->
    <div class="top-header">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="form-control" id="mainSearch" name="main_search" placeholder="Search across all branches...">
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
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger w-100 text-start" style="border: none; background: none;">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <h4 class="mb-4">Multi-Branch Overview</h4>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card patients" data-bs-toggle="tooltip" data-bs-placement="top" title="Total patients across all branches">
                    <div class="stats-number">{{ $data['stats']['total_patients'] }}</div>
                    <div class="stats-label">Total Patients (All Branches)</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card appointments" data-bs-toggle="tooltip" data-bs-placement="top" title="Scheduled appointments today">
                    <div class="stats-number">{{ $data['stats']['total_appointments'] }}</div>
                    <div class="stats-label">Total Appointment</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card revenue" data-bs-toggle="tooltip" data-bs-placement="top" title="Current active labor cases">
                    <div class="stats-number">{{ $data['stats']['active_labor_cases'] }}</div>
                    <div class="stats-label">Total Active Labor Cases</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card rating" data-bs-toggle="tooltip" data-bs-placement="top" title="Average customer satisfaction rating">
                    <div class="stats-number">{{ $data['stats']['monthly_revenue'] }}</div>
                    <div class="stats-label">Total Monthly Revenue</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h5 class="mb-4">Quick Actions</h5>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <button type="button" class="action-btn" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                        <i class="fas fa-user-plus"></i>
                        <span>Add New Patient</span>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6">
                    <button type="button" class="action-btn" data-bs-toggle="modal" data-bs-target="#scheduleAppointmentModal">
                        <i class="fas fa-calendar-check"></i>
                        <span>Schedule Appointment</span>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6">
                    <button type="button" class="action-btn" data-action="monitor-labor">
                        <i class="fas fa-heartbeat"></i>
                        <span>Monitor Labor</span>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6">
                    <button type="button" class="action-btn" data-action="generate-bill">
                        <i class="fas fa-file-invoice"></i>
                        <span>Generate Bill</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h5 class="mb-4">Recent Activity</h5>
            <div class="activity-list">
                @foreach($data['recent_activities'] as $activity)
                <div class="activity-item" data-activity-id="{{ $loop->index }}">
                    <div class="activity-time">{{ $activity['time'] }}</div>
                    <div class="activity-details">
                        <strong>{{ $activity['activity'] }}</strong><br>
                        <small class="text-muted">{{ $activity['patient'] }}</small>
                    </div>
                    <div class="branch-badge branch-{{ strtolower(str_replace(' ', '', $activity['branch'])) }}">
                        {{ $activity['branch'] }}
                    </div>
                    <div class="status-badge status-{{ $activity['status_class'] }}">
                        {{ $activity['status'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Additional Info Cards -->
        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0"><i class="fas fa-chart-line me-2"></i>Today's Summary</h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="fw-bold text-primary">12</div>
                                <small class="text-muted">New Patients</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-success">8</div>
                                <small class="text-muted">Deliveries</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-warning">5</div>
                                <small class="text-muted">Pending</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="fas fa-building me-2"></i>Branch Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Sto. Domingo Branch</span>
                            <span class="badge bg-success">Online</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Daraga Branch</span>
                            <span class="badge bg-success">Online</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Arimbay Branch</span>
                            <span class="badge bg-warning">Maintenance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Appointment Modal -->
<div class="modal fade" id="scheduleAppointmentModal" tabindex="-1" aria-labelledby="scheduleAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header -->
            <div class="modal-header border-0" style="background: linear-gradient(135deg, var(--primary-color), #ff6b9d); color: white;">
                <h5 class="modal-title fw-bold" id="scheduleAppointmentModalLabel">
                    <i class="fas fa-calendar-check me-2"></i>Schedule Appointment
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <!-- Search and Filter Section -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="search-wrapper">
                            <i class="fas fa-search search-icon-modal"></i>
                            <input type="text" class="form-control form-control-lg ps-5" id="patientSearch" placeholder="Search patients by name...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-lg" id="branchFilter" name="branch_filter">
                            <option value="">All Branches</option>
                            <option value="sinag">Sinag Branch</option>
                            <option value="bill">Bill Dayandog</option>
                            <option value="anthony">Anthony Branch</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-lg" id="statusFilter" name="status_filter">
                            <option value="">All Status</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>

                <!-- Appointments Table -->
                <div class="table-responsive">
                    <table class="table table-hover appointment-table">
                        <thead class="table-header">
                            <tr>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Appointment Date</th>
                                <th>Time</th>
                                <th>Service Type</th>
                                <th>Assigned Doctor</th>
                                <th>Branch</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="appointmentsTableBody">
                            <!-- Appointment rows will be populated here -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing <span id="currentRange">1-10</span> of <span id="totalAppointments">25</span> appointments
                    </div>
                    <nav aria-label="Appointments pagination">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addPatientModal" data-bs-dismiss="modal">
                    <i class="fas fa-plus me-2"></i>Add New Appointment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header -->
            <div class="modal-header border-0" style="background: linear-gradient(135deg, var(--primary-color), #ff6b9d); color: white;">
                <h5 class="modal-title fw-bold" id="addPatientModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Schedule Walk-in Patient
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <form id="addPatientForm">
                    @csrf
                    
                    <!-- Patient Information Section -->
                    <div class="section-header mb-3">
                        <h6 class="fw-bold text-secondary mb-3">Patient Information</h6>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="first_name" name="first_name" required autocomplete="given-name">
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="last_name" name="last_name" required autocomplete="family-name">
                        </div>
                        <div class="col-md-4">
                            <label for="blood_type" class="form-label fw-semibold">Blood Type</label>
                            <select id="blood_type" name="blood_type" class="form-select form-select-lg border-0 bg-light">
                                <option value="">Select Blood Type</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="Unknown">Unknown</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label fw-semibold">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg border-0 bg-light" id="date_of_birth" name="date_of_birth" required autocomplete="bday">
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number" class="form-label fw-semibold">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-lg border-0 bg-light" id="contact_number" name="contact_number" required autocomplete="tel">
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label for="address" class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="address" name="address" placeholder="Street, Barangay, City/Province" required autocomplete="street-address">
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email (Optional)</label>
                            <input type="email" class="form-control form-control-lg border-0 bg-light" id="email" name="email" autocomplete="email">
                        </div>
                    </div>

                    <!-- Medical History Section -->
                    <div class="section-header mb-3">
                        <h6 class="fw-bold text-secondary mb-3">Medical History</h6>
                    </div>

                    <div class="mb-4">
                        <textarea class="form-control border-0 bg-light" id="medicalHistory" name="medical_history" rows="4" 
                                  placeholder="Any relevant medical history, allergies, or current medications" autocomplete="off"></textarea>
                    </div>

                    <!-- Emergency Contact Section -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="emergencyContactName" class="form-label fw-semibold">Emergency Contact Name</label>
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="emergencyContactName" name="emergency_contact_name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="emergencyContactNumber" class="form-label fw-semibold">Emergency Contact Number</label>
                            <input type="tel" class="form-control form-control-lg border-0 bg-light" id="emergencyContactNumber" name="emergency_contact_number" autocomplete="off">
                        </div>
                    </div>

                    <!-- Select Service Section -->
                    <div class="section-header mb-3">
                        <h6 class="fw-bold text-secondary mb-3">Select Service</h6>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="service-card active" data-service-id="1" data-service-name="prenatal" data-price="FREE">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Pre-natal Check Up</h6>
                                    <small class="text-muted">Regular monitoring during pregnancy</small>
                                </div>
                                <div class="service-price text-success fw-bold mt-2">FREE</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service-id="2" data-service-name="consultation" data-price="₱1,500">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">General Consultation</h6>
                                    <small class="text-muted">Medical consultation & advice</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱1,500</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service-id="3" data-service-name="ultrasound" data-price="₱2,500">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Ultrasound Imaging</h6>
                                    <small class="text-muted">Imaging & monitoring</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱2,500</div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="service-card" data-service-id="4" data-service-name="immunization" data-price="₱800">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Immunization</h6>
                                    <small class="text-muted">Vaccination programs</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱800</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service-id="5" data-service-name="family-planning" data-price="₱1,200">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Family Planning</h6>
                                    <small class="text-muted">Comprehensive planning services</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱1,200</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service-id="6" data-service-name="laboratory" data-price="₱500">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Laboratory</h6>
                                    <small class="text-muted">Diagnostic lab tests</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱500</div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Date Section -->
                    <input type="hidden" id="selectedServiceId" name="service_id" value="1">
                    <input type="hidden" id="servicePrice" name="service_price" value="FREE">
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary px-4" id="confirmAppointmentBtn" onclick="handlePatientFormSubmit()">
                    <i class="fas fa-check me-2"></i>Add Patient
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success Confirmation Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 text-center">
            <div class="modal-body p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle fa-5x text-success"></i>
                </div>
                <h5 class="modal-title fw-bold mb-3" id="successModalLabel">Success!</h5>
                <p class="text-muted" id="successModalMessage">The new patient has been successfully added to the system.</p>
                <button type="button" class="btn btn-primary mt-3 px-5" data-bs-dismiss="modal" onclick="window.location.reload()">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Toggle (for responsive) -->
<button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
    <i class="fas fa-bars"></i>
</button>
@endsection

@section('extra-js')
<script>
    // Show notification helper function - moved to global scope
    function showNotification(message, type = 'info') {
        const div = document.createElement('div');
        div.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        div.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        div.innerHTML = `${message} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
        document.body.appendChild(div);
        setTimeout(() => div.remove(), 5000);
    }

    // Additional dashboard-specific JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
            }
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Auto-format phone number
        const phoneInputs = document.querySelectorAll('input[type="tel"]');
        phoneInputs.forEach(input => {
            input.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 10) {
                    value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
                }
                e.target.value = value;
            });
        });
    });

    // Patient form handler
    document.addEventListener('DOMContentLoaded', function () {
        const confirmBtn = document.getElementById('confirmAppointmentBtn');
        const form = document.getElementById('addPatientForm');

        // Service card selection
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', function () {
                document.querySelectorAll('.service-card').forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                const serviceName = this.getAttribute('data-service-name');
                const priceText = this.querySelector('.service-price').textContent.trim();

                document.getElementById('selectedServiceId').value = serviceName;

                // Clean price: "₱1,500" → 1500, "FREE" → 0
                let price = priceText === 'FREE' ? 0 : parseInt(priceText.replace(/[^0-9]/g, '')) || 0;
                document.getElementById('servicePrice').value = price;
            });
        });

        // Submit handler
        confirmBtn.addEventListener('click', async function () {
            const formData = new FormData(form);

            // REQUIRED: Remove fields that don't exist in patients table
            formData.delete('service_id');
            formData.delete('service_price');

            // Validate required fields
            const required = ['first_name', 'last_name', 'date_of_birth', 'contact_number', 'address'];
            let valid = true;
            required.forEach(field => {
                if (!formData.get(field)?.trim()) {
                    valid = false;
                    form.querySelector(`[name="${field}"]`).classList.add('is-invalid');
                } else {
                    form.querySelector(`[name="${field}"]`).classList.remove('is-invalid');
                }
            });

            if (!valid) {
                showNotification('Please fill all required fields.', 'danger');
                return;
            }

            confirmBtn.disabled = true;
            confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';

            try {
                const response = await fetch("{{ route('dashboard.walkin.store') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    showNotification('Patient added successfully!', 'success');
                    bootstrap.Modal.getInstance(document.getElementById('addPatientModal')).hide();
                    form.reset();
                    document.querySelector('.service-card[data-service-name="prenatal"]').classList.add('active');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    let msg = result.message || 'Error saving patient';
                    if (result.errors) {
                        msg = Object.values(result.errors).flat().join('<br>');
                    }
                    showNotification(msg, 'danger');
                }
            } catch (err) {
                console.error(err);
                showNotification('Network error. Please try again.', 'danger');
            } finally {
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = '<i class="fas fa-check me-2"></i>Add Patient';
            }
        });
    });
</script>
@endsection