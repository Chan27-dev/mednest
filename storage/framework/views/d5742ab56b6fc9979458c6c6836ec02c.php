<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Patients Record - MedNest</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
            margin: 0;
            padding: 0;
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

        .sidebar .logo .logo-image i {
            color: var(--primary-color);
            font-size: 20px;
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
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 40px;
            border: 1px solid #e1e5e9;
            border-radius: 25px;
            background: #f8f9fa;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
            background: white;
        }

        .search-box .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 14px;
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
            cursor: pointer;
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

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: #2d3748;
        }

        .dropdown-arrow {
            color: #6c757d;
            font-size: 0.8rem;
        }

        .page-content {
            padding: 0;
        }

        .patients-header {
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

        .content {
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-left: 4px solid;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card:nth-child(1) { border-left-color: #3182ce; }
        .stat-card:nth-child(2) { border-left-color: #dd6b20; }
        .stat-card:nth-child(3) { border-left-color: #e91e63; }
        .stat-card:nth-child(4) { border-left-color: #38a169; }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .stat-number.blue { color: #3182ce; }
        .stat-number.orange { color: #dd6b20; }
        .stat-number.pink { color: #e91e63; }
        .stat-number.green { color: #38a169; }

        .stat-label {
            font-size: 0.875rem;
            color: #718096;
            font-weight: 500;
        }

        .filters-section {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .filter-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .form-select, .form-control {
            border-radius: 8px;
            border: 1px solid #e1e5e9;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
        }

        .filter-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #b02a5b;
            border-color: #b02a5b;
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #dee2e6;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .patients-table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .patients-table {
            width: 100%;
            margin: 0;
        }

        .patients-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .patients-table th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #e1e5e9;
            text-align: left;
        }

        .patients-table td {
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
        }

        .patients-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .patients-table tbody tr:last-child td {
            border-bottom: none;
        }

        .patient-info {
            display: flex;
            flex-direction: column;
        }

        .patient-name {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .patient-contact {
            font-size: 0.875rem;
            color: #718096;
        }

        .age-gender {
            display: flex;
            flex-direction: column;
        }

        .age {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .gender {
            font-size: 0.875rem;
            color: #718096;
        }

        .branch-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .branch-daraga {
            background-color: #fef3c7;
            color: #92400e;
        }

        .branch-stodomingo {
            background-color: #d1fae5;
            color: #065f46;
        }

        .branch-arimbay {
            background-color: #fce7f3;
            color: #be185d;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-active {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            border-radius: 10px;
            min-width: 250px;
            padding: 0.5rem 0;
        }

        .dropdown-header {
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
            border-radius: 8px 8px 0 0;
            margin: 0.25rem 0.5rem 0 0.5rem;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 0.125rem 0.5rem;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .dropdown-item i {
            width: 16px;
            text-align: center;
        }

        .pagination-container {
            background: white;
            padding: 1rem 2rem;
            border-radius: 0 0 12px 12px;
            border-top: 1px solid #e1e5e9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination-info {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .pagination {
            margin: 0;
        }

        .page-link {
            color: var(--primary-color);
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
        }

        .page-link:hover {
            color: white;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Mobile Responsive */
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
            
            .content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .patients-table-container {
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .admin-profile .user-name {
                display: none;
            }

            .filters-section {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <div class="logo-image">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="logo-text">
                <h5>MedNest</h5>
                <small>DEL ROSARIO MATERNITY CLINIC</small>
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('admin.patients')); ?>">
                        <i class="fas fa-users"></i>
                        Patients Record
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#appointments">
                        <i class="fas fa-calendar-alt"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#billing">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Billing System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.staff.management')); ?>">
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
                <input type="text" class="form-control" id="globalSearch" placeholder="Search across all branches..." autocomplete="off">
            </div>
            
            <div class="admin-profile dropdown">
                <div class="admin-profile-trigger" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="admin-avatar">SA</div>
                    <span class="user-name fw-bold">Super Admin</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <div class="dropdown-header">
                            <strong>Super Admin</strong><br>
                            <small class="text-muted">admin@mednest.com</small>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#profile">
                            <i class="fas fa-user me-2"></i>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#settings">
                            <i class="fas fa-cog me-2"></i>
                            Account Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#notifications">
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
            <!-- Patients Header -->
            <div class="patients-header">
                <h4 class="page-title">All Patients Record</h4>
                <p class="page-subtitle">Manage clinic operations, track patient data, and monitor healthcare records across all branches</p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number blue" id="totalPatients">1,247</div>
                        <div class="stat-label">Total Patients (All Branches)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number orange" id="totalAppointments">28</div>
                        <div class="stat-label">New Appointments</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number pink" id="totalLaborCases">15</div>
                        <div class="stat-label">Total High-Risk Cases</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number green" id="monthlyRevenue">₱485,200</div>
                        <div class="stat-label">Total Monthly Revenue</div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <h3 class="filter-title">Filter & Search Patients</h3>
                    <div class="filters-grid">
                        <div class="filter-group">
                            <label class="filter-label">Branches</label>
                            <select class="form-select" id="branchFilter">
                                <option value="">All Branches</option>
                                <option value="daraga">Daraga</option>
                                <option value="stodomingo">Sto. Domingo</option>
                                <option value="arimbay">Arimbay</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Age Range</label>
                            <select class="form-select" id="ageFilter">
                                <option value="">All Ages</option>
                                <option value="18-25">18-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="46+">46+</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Gender</label>
                            <select class="form-select" id="genderFilter">
                                <option value="">All Genders</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Last Visit</label>
                            <input type="date" class="form-control" id="lastVisitFilter">
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Insurance</label>
                            <select class="form-select" id="insuranceFilter">
                                <option value="">All Insurance</option>
                                <option value="none">None</option>
                                <option value="philhealth">PhilHealth</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <div class="filter-actions">
                                <button class="btn btn-primary" id="applyFilters">
                                    <i class="fas fa-filter me-1"></i>Apply Filters
                                </button>
                                <button class="btn btn-outline-secondary" id="resetFilters">
                                    <i class="fas fa-undo me-1"></i>Reset Filters
                                </button>
                            </div>
                        </div>
                        <div class="filter-group">
                            <button class="btn btn-outline-primary" id="exportData">
                                <i class="fas fa-download me-1"></i>Export Data
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Patients Table -->
                <div class="patients-table-container">
                    <div class="patients-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Age/Gender</th>
                                    <th>Contact</th>
                                    <th>Branch</th>
                                    <th>Last Visit</th>
                                    <th>Status</th>
                                    <th>Insurance</th>
                                </tr>
                            </thead>
                            <tbody id="patientsTableBody">
                                <tr data-patient-id="1">
                                    <td>
                                        <div class="patient-info">
                                            <div class="patient-name">Maria Santos</div>
                                            <div class="patient-contact">maria.santos@email.com</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="age-gender">
                                            <div class="age">28 years</div>
                                            <div class="gender">Female</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="patient-contact">+63 912 345 6789</div>
                                    </td>
                                    <td>
                                        <span class="branch-badge branch-daraga">Daraga</span>
                                    </td>
                                    <td>Mar 15, 2024</td>
                                    <td>
                                        <span class="status-badge status-active">Active</span>
                                    </td>
                                    <td>PhilHealth</td>
                                </tr>
                                <tr data-patient-id="2">
                                    <td>
                                        <div class="patient-info">
                                            <div class="patient-name">Ana Cruz</div>
                                            <div class="patient-contact">ana.cruz@email.com</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="age-gender">
                                            <div class="age">32 years</div>
                                            <div class="gender">Female</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="patient-contact">+63 923 456 7890</div>
                                    </td>
                                    <td>
                                        <span class="branch-badge branch-stodomingo">Sto. Domingo</span>
                                    </td>
                                    <td>Mar 12, 2024</td>
                                    <td>
                                        <span class="status-badge status-active">Active</span>
                                    </td>
                                    <td>Private</td>
                                </tr>
                                <tr data-patient-id="3">
                                    <td>
                                        <div class="patient-info">
                                            <div class="patient-name">Carmen Rodriguez</div>
                                            <div class="patient-contact">carmen.rodriguez@email.com</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="age-gender">
                                            <div class="age">25 years</div>
                                            <div class="gender">Female</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="patient-contact">+63 934 567 8901</div>
                                    </td>
                                    <td>
                                        <span class="branch-badge branch-arimbay">Arimbay</span>
                                    </td>
                                    <td>Mar 10, 2024</td>
                                    <td>
                                        <span class="status-badge status-inactive">Inactive</span>
                                    </td>
                                    <td>None</td>
                                </tr>
                                <tr data-patient-id="4">
                                    <td>
                                        <div class="patient-info">
                                            <div class="patient-name">Isabella Garcia</div>
                                            <div class="patient-contact">isabella.garcia@email.com</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="age-gender">
                                            <div class="age">30 years</div>
                                            <div class="gender">Female</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="patient-contact">+63 945 678 9012</div>
                                    </td>
                                    <td>
                                        <span class="branch-badge branch-daraga">Daraga</span>
                                    </td>
                                    <td>Mar 8, 2024</td>
                                    <td>
                                        <span class="status-badge status-active">Active</span>
                                    </td>
                                    <td>PhilHealth</td>
                                </tr>
                                <tr data-patient-id="5">
                                    <td>
                                        <div class="patient-info">
                                            <div class="patient-name">Sofia Reyes</div>
                                            <div class="patient-contact">sofia.reyes@email.com</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="age-gender">
                                            <div class="age">27 years</div>
                                            <div class="gender">Female</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="patient-contact">+63 956 789 0123</div>
                                    </td>
                                    <td>
                                        <span class="branch-badge branch-stodomingo">Sto. Domingo</span>
                                    </td>
                                    <td>Mar 5, 2024</td>
                                    <td>
                                        <span class="status-badge status-active">Active</span>
                                    </td>
                                    <td>Private</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="pagination-info">
                            Showing 1 to 5 of 1,247 patients
                        </div>
                        <nav aria-label="Patient records pagination">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
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
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
        <i class="fas fa-bars"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample patient data
        const samplePatients = [
            { id: 1, name: 'Maria Santos', email: 'maria.santos@email.com', phone: '+63 912 345 6789', age: 28, gender: 'Female', branch: 'daraga', lastVisit: '2024-03-15', status: 'active', insurance: 'philhealth' },
            { id: 2, name: 'Ana Cruz', email: 'ana.cruz@email.com', phone: '+63 923 456 7890', age: 32, gender: 'Female', branch: 'stodomingo', lastVisit: '2024-03-12', status: 'active', insurance: 'private' },
            { id: 3, name: 'Carmen Rodriguez', email: 'carmen.rodriguez@email.com', phone: '+63 934 567 8901', age: 25, gender: 'Female', branch: 'arimbay', lastVisit: '2024-03-10', status: 'inactive', insurance: 'none' },
            { id: 4, name: 'Isabella Garcia', email: 'isabella.garcia@email.com', phone: '+63 945 678 9012', age: 30, gender: 'Female', branch: 'daraga', lastVisit: '2024-03-08', status: 'active', insurance: 'philhealth' },
            { id: 5, name: 'Sofia Reyes', email: 'sofia.reyes@email.com', phone: '+63 956 789 0123', age: 27, gender: 'Female', branch: 'stodomingo', lastVisit: '2024-03-05', status: 'active', insurance: 'private' }
        ];
        
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Patient Records Controller
            const patientController = new PatientRecordsController(samplePatients);
            patientController.init();
        });

        // Patient Records Controller Class
        class PatientRecordsController {
            constructor(initialData = []) {
                this.patients = initialData;
                this.filteredPatients = [...this.patients];
                this.currentPage = 1;
                this.patientsPerPage = 10;
                this.filters = {
                    branch: '',
                    status: '',
                    ageRange: '',
                    gender: '',
                    lastVisit: '',
                    insurance: '',
                    search: ''
                };
            }

            init() {
                this.initializeEventListeners();
                this.setupMobileToggle();
                this.updateStats();
            }

            initializeEventListeners() {
                // Search functionality
                document.getElementById('globalSearch').addEventListener('input', (e) => {
                    this.filters.search = e.target.value.toLowerCase();
                    this.applyFilters();
                });

                // Filter controls
                document.getElementById('branchFilter').addEventListener('change', (e) => {
                    this.filters.branch = e.target.value;
                });

                document.getElementById('statusFilter').addEventListener('change', (e) => {
                    this.filters.status = e.target.value;
                });

                document.getElementById('ageFilter').addEventListener('change', (e) => {
                    this.filters.ageRange = e.target.value;
                });

                document.getElementById('genderFilter').addEventListener('change', (e) => {
                    this.filters.gender = e.target.value;
                });

                document.getElementById('lastVisitFilter').addEventListener('change', (e) => {
                    this.filters.lastVisit = e.target.value;
                });

                document.getElementById('insuranceFilter').addEventListener('change', (e) => {
                    this.filters.insurance = e.target.value;
                });

                // Filter buttons
                document.getElementById('applyFilters').addEventListener('click', () => {
                    this.applyFilters();
                });

                document.getElementById('resetFilters').addEventListener('click', () => {
                    this.resetFilters();
                });

                document.getElementById('exportData').addEventListener('click', () => {
                    this.exportData();
                });

                // Logout functionality
                document.addEventListener('click', (e) => {
                    if (e.target.matches('[data-action="logout"]')) {
                        e.preventDefault();
                        this.handleLogout();
                    }
                });
            }

            setupMobileToggle() {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const sidebar = document.querySelector('.sidebar');
                
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', () => {
                        sidebar.classList.toggle('show');
                    });
                }

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', (event) => {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                            sidebar.classList.remove('show');
                        }
                    }
                });

                // Handle window resize
                window.addEventListener('resize', () => {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('show');
                    }
                });
            }

            applyFilters() {
                this.filteredPatients = this.patients.filter(patient => {
                    // Search filter
                    if (this.filters.search) {
                        const searchTerm = this.filters.search.toLowerCase();
                        if (!patient.name.toLowerCase().includes(searchTerm) && 
                            !patient.email.toLowerCase().includes(searchTerm) &&
                            !patient.phone.includes(searchTerm)) {
                            return false;
                        }
                    }

                    // Branch filter
                    if (this.filters.branch && patient.branch !== this.filters.branch) {
                        return false;
                    }

                    // Status filter
                    if (this.filters.status && patient.status !== this.filters.status) {
                        return false;
                    }

                    // Age range filter
                    if (this.filters.ageRange) {
                        const age = patient.age;
                        switch (this.filters.ageRange) {
                            case '18-25':
                                if (age < 18 || age > 25) return false;
                                break;
                            case '26-35':
                                if (age < 26 || age > 35) return false;
                                break;
                            case '36-45':
                                if (age < 36 || age > 45) return false;
                                break;
                            case '46+':
                                if (age < 46) return false;
                                break;
                        }
                    }

                    // Gender filter
                    if (this.filters.gender && patient.gender.toLowerCase() !== this.filters.gender) {
                        return false;
                    }

                    // Insurance filter
                    if (this.filters.insurance && patient.insurance !== this.filters.insurance) {
                        return false;
                    }

                    // Date filter
                    if (this.filters.lastVisit && patient.lastVisit !== this.filters.lastVisit) {
                        return false;
                    }

                    return true;
                });

                this.currentPage = 1;
                this.renderPatients();
                this.updateStats();
                this.showNotification(`Filters applied. Found ${this.filteredPatients.length} patients.`, 'info');
            }

            resetFilters() {
                // Reset all filter values
                document.getElementById('branchFilter').value = '';
                document.getElementById('statusFilter').value = '';
                document.getElementById('ageFilter').value = '';
                document.getElementById('genderFilter').value = '';
                document.getElementById('lastVisitFilter').value = '';
                document.getElementById('insuranceFilter').value = '';
                document.getElementById('globalSearch').value = '';

                this.filters = {
                    branch: '',
                    status: '',
                    ageRange: '',
                    gender: '',
                    lastVisit: '',
                    insurance: '',
                    search: ''
                };

                this.filteredPatients = [...this.patients];
                this.currentPage = 1;
                this.renderPatients();
                this.updateStats();
                this.showNotification('Filters reset successfully', 'success');
            }

            renderPatients() {
                const tbody = document.getElementById('patientsTableBody');
                const startIndex = (this.currentPage - 1) * this.patientsPerPage;
                const endIndex = startIndex + this.patientsPerPage;
                const patientsToShow = this.filteredPatients.slice(startIndex, endIndex);

                if (patientsToShow.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-users mb-2" style="font-size: 2rem; opacity: 0.5;"></i><br>
                                No patients found matching your criteria
                            </td>
                        </tr>
                    `;
                    return;
                }

                tbody.innerHTML = patientsToShow.map(patient => `
                    <tr data-patient-id="${patient.id}">
                        <td>
                            <div class="patient-info">
                                <div class="patient-name">${patient.name}</div>
                                <div class="patient-contact">${patient.email}</div>
                            </div>
                        </td>
                        <td>
                            <div class="age-gender">
                                <div class="age">${patient.age} years</div>
                                <div class="gender">${patient.gender}</div>
                            </div>
                        </td>
                        <td>
                            <div class="patient-contact">${patient.phone}</div>
                        </td>
                        <td>
                            <span class="branch-badge branch-${patient.branch}">${this.formatBranchName(patient.branch)}</span>
                        </td>
                        <td>${this.formatDate(patient.lastVisit)}</td>
                        <td>
                            <span class="status-badge status-${patient.status}">${this.capitalizeFirst(patient.status)}</span>
                        </td>
                        <td>${this.formatInsurance(patient.insurance)}</td>
                    </tr>
                `).join('');
            }

            updateStats() {
                // Update stat cards based on filtered data
                document.getElementById('totalPatients').textContent = this.filteredPatients.length;
                
                const activePatients = this.filteredPatients.filter(p => p.status === 'active').length;
                const recentAppointments = this.filteredPatients.filter(p => {
                    const visitDate = new Date(p.lastVisit);
                    const today = new Date();
                    const diffTime = Math.abs(today - visitDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    return diffDays <= 7;
                }).length;

                document.getElementById('totalAppointments').textContent = recentAppointments;
                
                // Mock high-risk cases calculation
                const highRiskCases = Math.floor(this.filteredPatients.length * 0.27);
                document.getElementById('totalLaborCases').textContent = highRiskCases;

                // Mock revenue calculation
                const avgRevenue = 547;
                const totalRevenue = activePatients * avgRevenue;
                document.getElementById('monthlyRevenue').textContent = `₱${totalRevenue.toLocaleString()}`;
            }

            exportData() {
                const btn = document.getElementById('exportData');
                const originalHtml = btn.innerHTML;
                
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Exporting...';
                btn.disabled = true;

                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.disabled = false;
                    
                    // Mock CSV export
                    const csvData = this.generateCSV();
                    this.downloadCSV(csvData, 'patients_export.csv');
                    this.showNotification('Patient data exported successfully', 'success');
                }, 2000);
            }

            generateCSV() {
                const headers = ['ID', 'Name', 'Email', 'Phone', 'Age', 'Gender', 'Branch', 'Last Visit', 'Status', 'Insurance'];
                const rows = this.filteredPatients.map(patient => [
                    patient.id,
                    patient.name,
                    patient.email,
                    patient.phone,
                    patient.age,
                    patient.gender,
                    this.formatBranchName(patient.branch),
                    patient.lastVisit,
                    patient.status,
                    this.formatInsurance(patient.insurance)
                ]);

                const csvContent = [headers, ...rows]
                    .map(row => row.map(field => `"${field}"`).join(','))
                    .join('\n');

                return csvContent;
            }

            downloadCSV(content, filename) {
                const blob = new Blob([content], { type: 'text/csv;charset=utf-8;' });
                const link = document.createElement('a');
                
                if (link.download !== undefined) {
                    const url = URL.createObjectURL(blob);
                    link.setAttribute('href', url);
                    link.setAttribute('download', filename);
                    link.style.visibility = 'hidden';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            }

            handleLogout() {
                if (confirm('Are you sure you want to logout?')) {
                    this.showNotification('Logging out...', 'info');
                    setTimeout(() => {
                        // Redirect to login or homepage
                        console.log('Logout action');
                    }, 1000);
                }
            }

            // Utility functions
            formatBranchName(branch) {
                const branchNames = {
                    'daraga': 'Daraga',
                    'stodomingo': 'Sto. Domingo',
                    'arimbay': 'Arimbay'
                };
                return branchNames[branch] || branch;
            }

            formatDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: 'short', 
                    day: 'numeric' 
                });
            }

            formatInsurance(insurance) {
                const insuranceTypes = {
                    'none': 'None',
                    'philhealth': 'PhilHealth',
                    'private': 'Private'
                };
                return insuranceTypes[insurance] || insurance;
            }

            capitalizeFirst(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }

            showNotification(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle me-2"></i>
                        ${message}
                    </div>
                `;

                toast.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: ${type === 'success' ? '#48bb78' : type === 'error' ? '#e53e3e' : '#3182ce'};
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    z-index: 9999;
                    opacity: 0;
                    transform: translateX(100%);
                    transition: all 0.3s ease;
                    font-size: 14px;
                `;

                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateX(0)';
                }, 100);

                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (toast.parentNode) {
                            toast.parentNode.removeChild(toast);
                        }
                    }, 300);
                }, 3000);
            }
        }
    </script>
</body>
</html><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/admin/patients.blade.php ENDPATH**/ ?>