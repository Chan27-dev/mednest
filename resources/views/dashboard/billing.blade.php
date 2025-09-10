@extends('layouts.app')

@section('title', 'Billing System - MedNest')

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

    .sidebar .logo .logo-image img {
        width: 35px;
        height: 35px;
        object-fit: contain;
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
        background: #f8f9fa;
        min-height: 100vh;
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
        padding: 0;
    }

    .billing-header {
        background: white;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e9ecef;
    }

    .page-title {
        margin: 0;
        font-size: 1.75rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: #6c757d;
        margin: 0;
    }

    .stats-section {
        background: white;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e9ecef;
    }

    .stats-row {
        display: flex;
        gap: 1.5rem;
    }

    .stats-card {
        flex: 1;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        padding: 1.5rem;
        border-radius: 12px;
        border: 1px solid #e9ecef;
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(214, 51, 132, 0.15);
        border-color: var(--primary-color);
    }

    .stats-card .stats-value {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        line-height: 1;
    }

    .stats-card .stats-label {
        color: #6c757d;
        font-size: 0.95rem;
        font-weight: 500;
        margin-bottom: 0.75rem;
    }

    .stats-card .stats-change {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .stats-change.positive {
        background: #d4edda;
        color: #155724;
    }

    .stats-change.negative {
        background: #f8d7da;
        color: #721c24;
    }

    .stats-card .stats-icon {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.3);
    }

    .filters-section {
        background: white;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        gap: 1rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .filter-search {
        position: relative;
        flex: 1;
        min-width: 300px;
    }

    .filter-search input {
        border-radius: 25px;
        padding-left: 45px;
        border: 2px solid #e1e5e9;
        padding: 0.875rem 1rem 0.875rem 45px;
        width: 100%;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .filter-search .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.1rem;
    }

    .filter-search input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
        outline: none;
    }

    .filter-dropdown {
        min-width: 180px;
    }

    .form-select {
        border-radius: 25px;
        border: 2px solid #e1e5e9;
        padding: 0.875rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
    }

    .date-picker input {
        border-radius: 25px;
        border: 2px solid #e1e5e9;
        padding: 0.875rem 1rem;
        min-width: 180px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .date-picker input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
    }

    .create-invoice-btn {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }

    .create-invoice-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
        color: white;
    }

    .billing-container {
        background: white;
        margin: 0;
        padding: 0;
    }

    .billing-table {
        margin: 0;
    }

    .billing-table table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .billing-table th {
        background: #f8f9fa;
        color: #495057;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1.25rem 1.5rem;
        border: none;
        border-bottom: 2px solid #e1e5e9;
        text-align: left;
    }

    .billing-table td {
        padding: 1.25rem 1.5rem;
        border: none;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .billing-table tbody tr {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .billing-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.08);
    }

    .patient-info {
        display: flex;
        flex-direction: column;
    }

    .patient-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }

    .patient-email {
        color: #6c757d;
        font-size: 0.85rem;
    }

    .service-badge {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: #212529;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        box-shadow: 0 2px 6px rgba(255, 193, 7, 0.3);
    }

    .payment-amount {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.1rem;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .status-paid {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        box-shadow: 0 2px 6px rgba(21, 87, 36, 0.2);
    }

    .status-pending {
        background: linear-gradient(135deg, #fff3cd, #ffeeba);
        color: #856404;
        box-shadow: 0 2px 6px rgba(133, 100, 4, 0.2);
    }

    .status-overdue {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        box-shadow: 0 2px 6px rgba(114, 28, 36, 0.2);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .btn-view {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        box-shadow: 0 3px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-view:hover {
        transform: translateY(-2px) scale(1.1);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-edit {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        box-shadow: 0 3px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-2px) scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-radius: 12px;
        min-width: 250px;
        padding: 0.75rem 0;
    }

    .dropdown-header {
        padding: 1rem 1.25rem;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 8px 8px 0 0;
        margin: 0.25rem 0.75rem 0.5rem 0.75rem;
    }

    .dropdown-item {
        padding: 0.75rem 1.25rem;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 0.125rem 0.75rem;
        font-size: 0.95rem;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        transform: translateX(5px);
    }

    .dropdown-item i {
        width: 18px;
        text-align: center;
    }

    /* Modal Enhancements */
    .modal-content {
        border: none;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .modal-header {
        border-bottom: 1px solid #e9ecef;
        padding: 1.5rem 2rem;
        border-radius: 16px 16px 0 0;
        background: linear-gradient(135deg, #fff, #f8f9fa);
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
        color: #333;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: 1px solid #e9ecef;
        padding: 1.5rem 2rem;
        border-radius: 0 0 16px 16px;
        background: #f8f9fa;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
        display: block;
        font-size: 0.95rem;
    }

    .form-control {
        border: 2px solid #e1e5e9;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        width: 100%;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .form-control.is-valid {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .btn-modal-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-modal-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(214, 51, 132, 0.3);
        color: white;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
        }
        
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        
        .sidebar.show {
            transform: translateX(0);
        }
        
        .top-header {
            padding: 1rem;
        }
        
        .search-box {
            width: 200px;
        }
        
        .filters-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-search {
            min-width: auto;
        }
        
        .stats-row {
            flex-direction: column;
        }
        
        .billing-table {
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <div class="logo-image">
            <i class="fas fa-heartbeat"></i>
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>DEL ROSARIO MATERNITY<br>CLINIC</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.patients') ? 'active' : '' }}" href="{{ route('dashboard.patients') }}">
                    <i class="fas fa-user-plus"></i>
                    Patients Record
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.appointments') ? 'active' : '' }}" href="{{ route('dashboard.appointments') }}">
                    <i class="fas fa-calendar-check"></i>
                    Appointments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.labor') ? 'active' : '' }}" href="{{ route('dashboard.labor') }}">
                    <i class="fas fa-plus-square"></i>
                    Labor Monitoring
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.billing') }}">
                    <i class="fas fa-file-invoice"></i>
                    Billing System
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.referrals') ? 'active' : '' }}" href="{{ route('dashboard.referrals') }}">
                    <i class="fas fa-share-alt"></i>
                    Referrals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.reports') ? 'active' : '' }}" href="{{ route('dashboard.reports') }}">
                    <i class="fas fa-chart-line"></i>
                    Branch Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.staff') ? 'active' : '' }}" href="{{ route('dashboard.staff') }}">
                    <i class="fas fa-users"></i>
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
            <input type="text" class="form-control" placeholder="Search across all branches..." id="headerSearch">
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
                    <a class="dropdown-item" href="{{ route('dashboard.account.settings') }}">
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
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        @if(session('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin: 0; border-radius: 0;">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Billing Header -->
        <div class="billing-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="page-title">Billing System</h4>
                    <p class="page-subtitle">Manage patient billing and payment records efficiently</p>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary" id="exportBtn" onclick="exportToCSV()">
                        <i class="fas fa-download me-1"></i>Export
                    </button>
                    <button type="button" class="create-invoice-btn" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                        <i class="fas fa-plus"></i>
                        Create Invoice
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="stats-row">
                <div class="stats-card" data-type="revenue">
                    <div class="stats-value">₱125,400</div>
                    <div class="stats-label">Monthly Revenue</div>
                    <div class="stats-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +12.5%
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
                <div class="stats-card" data-type="pending">
                    <div class="stats-value">23</div>
                    <div class="stats-label">Pending Payments</div>
                    <div class="stats-change negative">
                        <i class="fas fa-arrow-down"></i>
                        -3 this week
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stats-card" data-type="invoices">
                    <div class="stats-value">156</div>
                    <div class="stats-label">Total Invoices</div>
                    <div class="stats-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +8 this month
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-search">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="form-control" id="billingSearchInput" placeholder="Search patients, services, or amounts...">
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="overdue">Overdue</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="serviceFilter">
                    <option value="">All Services</option>
                    <option value="consultation">Consultation</option>
                    <option value="prenatal">Pre-natal Check Up</option>
                    <option value="ultrasound">Ultrasound</option>
                    <option value="delivery">Delivery</option>
                </select>
            </div>
            <div class="date-picker">
                <input type="date" class="form-control" id="dateFilter" placeholder="Select date">
            </div>
        </div>

        <!-- Billing Container -->
        <div class="billing-container">
            <!-- Billing Table -->
            <div class="billing-table">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="billingTableBody">
                        @php
                        $billingRecords = [
                            [
                                'id' => 'P-001',
                                'name' => 'Maria Santos',
                                'email' => 'maria.santos@email.com',
                                'service' => 'Consultation',
                                'date' => 'May 30, 2025',
                                'amount' => '₱1,500.00',
                                'status' => 'paid'
                            ],
                            [
                                'id' => 'P-002',
                                'name' => 'Ana Cruz',
                                'email' => 'ana.cruz@email.com',
                                'service' => 'Pre-natal Check Up',
                                'date' => 'May 28, 2025',
                                'amount' => '₱2,000.00',
                                'status' => 'pending'
                            ],
                            [
                                'id' => 'P-003',
                                'name' => 'Maria Garcia',
                                'email' => 'maria.garcia@email.com',
                                'service' => 'Ultrasound',
                                'date' => 'May 15, 2025',
                                'amount' => '₱2,500.00',
                                'status' => 'overdue'
                            ],
                            [
                                'id' => 'P-004',
                                'name' => 'Carmen Lopez',
                                'email' => 'carmen.lopez@email.com',
                                'service' => 'Consultation',
                                'date' => 'May 25, 2025',
                                'amount' => '₱1,500.00',
                                'status' => 'paid'
                            ],
                            [
                                'id' => 'P-005',
                                'name' => 'Grace Villanueva',
                                'email' => 'grace.villanueva@email.com',
                                'service' => 'Delivery',
                                'date' => 'May 20, 2025',
                                'amount' => '₱15,000.00',
                                'status' => 'paid'
                            ],
                            [
                                'id' => 'P-006',
                                'name' => 'Jennifer Reyes',
                                'email' => 'jennifer.reyes@email.com',
                                'service' => 'Pre-natal Check Up',
                                'date' => 'May 18, 2025',
                                'amount' => '₱2,000.00',
                                'status' => 'pending'
                            ]
                        ];
                        @endphp
                        
                        @foreach($billingRecords as $record)
                        <tr data-patient-id="{{ $record['id'] }}">
                            <td><span class="fw-bold text-primary">{{ $record['id'] }}</span></td>
                            <td>
                                <div class="patient-info">
                                    <div class="patient-name">{{ $record['name'] }}</div>
                                    <div class="patient-email">{{ $record['email'] }}</div>
                                </div>
                            </td>
                            <td>
                                <span class="service-badge">{{ strtoupper($record['service']) }}</span>
                            </td>
                            <td>
                                <div class="date">{{ $record['date'] }}</div>
                            </td>
                            <td>
                                <div class="payment-amount">{{ $record['amount'] }}</div>
                            </td>
                            <td>
                                <span class="status-badge status-{{ strtolower($record['status']) }}">
                                    {{ strtoupper($record['status']) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button type="button" class="action-btn btn-view" onclick="viewDetails('{{ $record['id'] }}', '{{ $record['name'] }}')" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="action-btn btn-edit" onclick="editRecord('{{ $record['id'] }}', '{{ $record['name'] }}')" title="Edit Record">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Invoice Modal -->
<div class="modal fade" id="createInvoiceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2 text-primary"></i>
                    Create New Invoice
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('billing.store') }}" method="POST" id="createInvoiceForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Patient Name *</label>
                                <input type="text" name="patient_name" class="form-control" required placeholder="Enter patient full name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="tel" name="contact" class="form-control" placeholder="0917-123-4567">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Service Type *</label>
                                <select name="service" class="form-control" required id="serviceSelect">
                                    <option value="">Select Service</option>
                                    <option value="consultation" data-price="1500">Consultation - ₱1,500</option>
                                    <option value="prenatal" data-price="2000">Pre-natal Check Up - ₱2,000</option>
                                    <option value="ultrasound" data-price="2500">Ultrasound - ₱2,500</option>
                                    <option value="delivery" data-price="15000">Delivery - ₱15,000</option>
                                    <option value="other" data-price="0">Other (specify amount)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Amount *</label>
                                <input type="number" name="amount" class="form-control" step="0.01" required id="amountInput" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Service Date *</label>
                                <input type="date" name="service_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Due Date</label>
                                <input type="date" name="due_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="3" placeholder="Additional notes or special instructions..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-modal-primary">
                        <i class="fas fa-save me-1"></i>Create Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user-circle me-2 text-primary"></i>
                    Patient Billing Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewDetailsContent">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Close
                </button>
                <button type="button" class="btn btn-info me-2" onclick="printInvoice()">
                    <i class="fas fa-print me-1"></i>Print Invoice
                </button>
                <button type="button" class="btn btn-modal-primary" onclick="recordPayment()">
                    <i class="fas fa-credit-card me-1"></i>Record Payment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Record Modal -->
<div class="modal fade" id="editRecordModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2 text-primary"></i>
                    Edit Patient Record
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editRecordForm">
                @csrf
                @method('PUT')
                <div class="modal-body" id="editRecordContent">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-modal-primary">
                        <i class="fas fa-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-credit-card me-2 text-success"></i>
                    Record Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="paymentForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Payment Amount *</label>
                        <input type="number" name="payment_amount" class="form-control" step="0.01" required placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Payment Method *</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="">Select Method</option>
                            <option value="cash">Cash</option>
                            <option value="card">Credit/Debit Card</option>
                            <option value="check">Check</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Payment Date *</label>
                        <input type="date" name="payment_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Reference Number</label>
                        <input type="text" name="reference" class="form-control" placeholder="Transaction/Check number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <textarea name="payment_notes" class="form-control" rows="2" placeholder="Payment notes..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i>Record Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Toggle -->
<button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
    <i class="fas fa-bars"></i>
</button>
@endsection

@section('extra-js')
<script>
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
                if (!sidebar.contains(event.target) && !sidebarToggle?.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Service selection auto-fill amount
        const serviceSelect = document.getElementById('serviceSelect');
        const amountInput = document.getElementById('amountInput');
        
        if (serviceSelect && amountInput) {
            serviceSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                if (price && price !== '0') {
                    amountInput.value = price;
                } else if (price === '0') {
                    amountInput.value = '';
                    amountInput.focus();
                }
            });
        }

        // Search functionality
        const searchInput = document.getElementById('billingSearchInput');
        const statusFilter = document.getElementById('statusFilter');
        const serviceFilter = document.getElementById('serviceFilter');
        const dateFilter = document.getElementById('dateFilter');
        const tableBody = document.getElementById('billingTableBody');
        const rows = tableBody.querySelectorAll('tr');

        function filterBilling() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const statusValue = statusFilter.value.toLowerCase();
            const serviceValue = serviceFilter.value.toLowerCase();
            const dateValue = dateFilter.value;
            
            let visibleCount = 0;

            rows.forEach(row => {
                const patientId = row.cells[0].textContent.toLowerCase();
                const patientName = row.querySelector('.patient-name').textContent.toLowerCase();
                const patientEmail = row.querySelector('.patient-email').textContent.toLowerCase();
                const service = row.querySelector('.service-badge').textContent.toLowerCase();
                const amount = row.querySelector('.payment-amount').textContent.toLowerCase();
                const status = row.querySelector('.status-badge').textContent.toLowerCase();
                const recordDate = row.cells[3].textContent;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !patientId.includes(searchTerm) && 
                    !patientName.includes(searchTerm) && 
                    !patientEmail.includes(searchTerm) && 
                    !service.includes(searchTerm) && 
                    !amount.includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Status filter
                if (statusValue && !status.includes(statusValue)) {
                    shouldShow = false;
                }
                
                // Service filter
                if (serviceValue && !service.includes(serviceValue)) {
                    shouldShow = false;
                }
                
                // Date filter
                if (dateValue) {
                    const filterDate = new Date(dateValue);
                    const recordDateObj = new Date(recordDate);
                    if (recordDateObj.toDateString() !== filterDate.toDateString()) {
                        shouldShow = false;
                    }
                }
                
                if (shouldShow) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show no results message
            if (visibleCount === 0) {
                if (!document.getElementById('noResultsMessage')) {
                    const noResultsRow = document.createElement('tr');
                    noResultsRow.id = 'noResultsMessage';
                    noResultsRow.innerHTML = `
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-search mb-3" style="font-size: 3rem; opacity: 0.3;"></i><br>
                            <h5>No billing records found</h5>
                            <p>Try adjusting your search criteria</p>
                        </td>
                    `;
                    tableBody.appendChild(noResultsRow);
                }
            } else {
                const noResultsMessage = document.getElementById('noResultsMessage');
                if (noResultsMessage) {
                    noResultsMessage.remove();
                }
            }
        }

        // Add event listeners for filters
        if (searchInput) searchInput.addEventListener('input', filterBilling);
        if (statusFilter) statusFilter.addEventListener('change', filterBilling);
        if (serviceFilter) serviceFilter.addEventListener('change', filterBilling);
        if (dateFilter) dateFilter.addEventListener('change', filterBilling);

        // Create Invoice Form submission
        const createInvoiceForm = document.getElementById('createInvoiceForm');
        createInvoiceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Creating...';
            
            setTimeout(() => {
                bootstrap.Modal.getInstance(document.getElementById('createInvoiceModal')).hide();
                showNotification('Invoice created successfully!', 'success');
                this.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 2000);
        });

        // Edit Record Form submission
        const editRecordForm = document.getElementById('editRecordForm');
        editRecordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Saving...';
            
            setTimeout(() => {
                bootstrap.Modal.getInstance(document.getElementById('editRecordModal')).hide();
                showNotification('Patient record updated successfully!', 'success');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 2000);
        });

        // Payment Form submission
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            const amount = this.querySelector('[name="payment_amount"]').value;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Processing...';
            
            setTimeout(() => {
                bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();
                showNotification(`Payment of ₱${parseFloat(amount).toFixed(2)} recorded successfully!`, 'success');
                this.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 2000);
        });

        // Stats cards click functionality
        document.addEventListener('click', function(e) {
            const statsCard = e.target.closest('.stats-card');
            if (statsCard) {
                const type = statsCard.getAttribute('data-type');
                
                if (type === 'revenue') {
                    showNotification('Loading revenue analytics...', 'info');
                } else if (type === 'pending') {
                    showNotification('Filtering pending payments...', 'info');
                    setTimeout(() => {
                        statusFilter.value = 'pending';
                        filterBilling();
                    }, 500);
                } else if (type === 'invoices') {
                    showNotification('Loading invoice summary...', 'info');
                }
            }
        });

        // Table row hover effects
        const tableRows = document.querySelectorAll('.billing-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.boxShadow = '0 4px 15px rgba(214, 51, 132, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });

        // Initialize modal event handlers
        document.getElementById('createInvoiceModal').addEventListener('shown.bs.modal', function() {
            const today = new Date().toISOString().split('T')[0];
            this.querySelector('[name="service_date"]').value = today;
            
            const dueDate = new Date();
            dueDate.setDate(dueDate.getDate() + 30);
            this.querySelector('[name="due_date"]').value = dueDate.toISOString().split('T')[0];
        });
    });

    // View Details Function
    function viewDetails(patientId, patientName) {
        const modal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
        const content = document.getElementById('viewDetailsContent');
        
        content.innerHTML = `
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0"><i class="fas fa-user me-2"></i>Patient Information</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>Patient ID:</strong> ${patientId}</p>
                            <p><strong>Name:</strong> ${patientName}</p>
                            <p><strong>Age:</strong> 28 years old</p>
                            <p><strong>Contact:</strong> 0917-123-4567</p>
                            <p><strong>Email:</strong> ${patientName.toLowerCase().replace(' ', '.')}@email.com</p>
                            <p><strong>Last Visit:</strong> May 30, 2025</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-success text-white">
                            <h6 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Summary</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>Total Amount:</strong> <span class="text-primary">₱2,500.00</span></p>
                            <p><strong>Amount Paid:</strong> <span class="text-success">₱1,500.00</span></p>
                            <p><strong>Balance:</strong> <span class="text-danger">₱1,000.00</span></p>
                            <p><strong>Payment Status:</strong> <span class="badge bg-warning">Partially Paid</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-history me-2"></i>Transaction History</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Service</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>May 30, 2025</td>
                                    <td>Consultation</td>
                                    <td>₱1,500.00</td>
                                    <td>₱1,500.00</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>Cash</td>
                                </tr>
                                <tr>
                                    <td>May 15, 2025</td>
                                    <td>Ultrasound</td>
                                    <td>₱1,000.00</td>
                                    <td>₱0.00</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
        modal.show();
    }

    // Edit Record Function
    function editRecord(patientId, patientName) {
        const modal = new bootstrap.Modal(document.getElementById('editRecordModal'));
        const content = document.getElementById('editRecordContent');
        
        content.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Patient ID</label>
                        <input type="text" name="patient_id" class="form-control" value="${patientId}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Patient Name *</label>
                        <input type="text" name="patient_name" class="form-control" value="${patientName}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Age *</label>
                        <input type="number" name="age" class="form-control" value="28" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Contact Number *</label>
                        <input type="text" name="contact" class="form-control" value="0917-123-4567" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="${patientName.toLowerCase().replace(' ', '.')}@email.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="paid">Paid</option>
                            <option value="pending" selected>Pending</option>
                            <option value="overdue">Overdue</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3" placeholder="Additional notes about the patient..."></textarea>
            </div>
        `;
        modal.show();
    }

    // Record Payment Function
    function recordPayment() {
        bootstrap.Modal.getInstance(document.getElementById('viewDetailsModal')).hide();
        const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('#paymentModal [name="payment_date"]').value = today;
        
        paymentModal.show();
    }

    // Print Invoice Function
    function printInvoice() {
        showNotification('Preparing invoice for printing...', 'info');
        setTimeout(() => showNotification('Invoice ready for printing!', 'success'), 2000);
    }

    // Export to CSV Function
    function exportToCSV() {
        const rows = Array.from(document.querySelectorAll('#billingTableBody tr:not(#noResultsMessage)'));
        let csvContent = "Patient ID,Name,Email,Service,Date,Amount,Status\n";
        
        rows.forEach(row => {
            if (row.style.display !== 'none') {
                const cells = row.querySelectorAll('td');
                const rowData = [
                    cells[0].textContent.trim(),
                    cells[1].querySelector('.patient-name').textContent.trim(),
                    cells[1].querySelector('.patient-email').textContent.trim(),
                    cells[2].textContent.trim(),
                    cells[3].textContent.trim(),
                    cells[4].textContent.trim(),
                    cells[5].textContent.trim()
                ];
                csvContent += rowData.map(field => `"${field}"`).join(',') + '\n';
            }
        });
        
        const blob = new Blob([csvContent], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'billing-records.csv';
        a.click();
        window.URL.revokeObjectURL(url);
        
        showNotification('Billing records exported successfully!', 'success');
    }

    // Show notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 350px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-radius: 12px;
            border: none;
        `;
        
        const icons = {
            'success': 'fas fa-check-circle',
            'info': 'fas fa-info-circle',
            'warning': 'fas fa-exclamation-triangle',
            'danger': 'fas fa-times-circle'
        };
        
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="${icons[type] || icons.info} me-3" style="font-size: 1.2rem;"></i>
                <div>
                    <strong>${type.charAt(0).toUpperCase() + type.slice(1)}</strong>
                    <div>${message}</div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.parentNode?.removeChild(notification), 300);
        }, 4000);
    }

    // Enhanced keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'n') {
            e.preventDefault();
            document.querySelector('[data-bs-target="#createInvoiceModal"]').click();
        }
        
        if (e.ctrlKey && e.key === 'f') {
            e.preventDefault();
            document.getElementById('billingSearchInput').focus();
        }
        
        if (e.key === 'Escape') {
            document.getElementById('billingSearchInput').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('serviceFilter').value = '';
            document.getElementById('dateFilter').value = '';
            filterBilling();
        }
    });
</script>
@endsection