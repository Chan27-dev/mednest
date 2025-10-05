<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management - MedNest</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .staff-header {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #b02a5b;
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: white;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
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
        .stat-card:nth-child(2) { border-left-color: #38a169; }
        .stat-card:nth-child(3) { border-left-color: #dd6b20; }
        .stat-card:nth-child(4) { border-left-color: #e91e63; }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .stat-number.blue { color: #3182ce; }
        .stat-number.green { color: #38a169; }
        .stat-number.orange { color: #dd6b20; }
        .stat-number.pink { color: #e91e63; }

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

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #dee2e6;
            background: white;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }

        /* Staff Cards Grid */
        .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .staff-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        .staff-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .staff-card-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-bottom: 1px solid #e9ecef;
        }

        .staff-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
        }

        .staff-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .staff-role {
            color: #718096;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .staff-card-body {
            padding: 1.5rem;
        }

        .staff-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .staff-info-item {
            display: flex;
            flex-direction: column;
        }

        .staff-info-label {
            font-size: 0.75rem;
            color: #718096;
            font-weight: 500;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .staff-info-value {
            font-size: 0.875rem;
            color: #2d3748;
            font-weight: 500;
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

        .status-on-duty {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-off-duty {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-on-leave {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .staff-contact {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            padding: 0.75rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .staff-contact i {
            color: #718096;
            width: 16px;
        }

        .staff-contact-text {
            font-size: 0.875rem;
            color: #4a5568;
        }

        .staff-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #e9ecef;
            background: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-view {
            color: #3182ce;
            border-color: #3182ce;
        }

        .btn-view:hover {
            background-color: #3182ce;
            color: white;
            transform: translateY(-1px);
        }

        .btn-edit {
            color: #38a169;
            border-color: #38a169;
        }

        .btn-edit:hover {
            background-color: #38a169;
            color: white;
            transform: translateY(-1px);
        }

        .btn-schedule {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-schedule:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        /* Today's Schedule Section */
        .schedule-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .schedule-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .schedule-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        .schedule-table {
            width: 100%;
        }

        .schedule-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .schedule-table th {
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

        .schedule-table td {
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
        }

        .schedule-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .schedule-table tbody tr:last-child td {
            border-bottom: none;
        }

        .shift-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        .shift-morning {
            background-color: #e6f3ff;
            color: #1976d2;
        }

        .shift-afternoon {
            background-color: #fff3e0;
            color: #f57c00;
        }

        .shift-night {
            background-color: #f3e5f5;
            color: #7b1fa2;
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

            .staff-grid {
                grid-template-columns: 1fr;
            }

            .staff-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .header-actions {
                width: 100%;
                justify-content: stretch;
            }

            .header-actions .btn {
                flex: 1;
            }

            .schedule-table-container {
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

            .staff-info-grid {
                grid-template-columns: 1fr;
            }

            .staff-actions {
                flex-direction: column;
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
                        Multi-Branch
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.patients')); ?>">
                        <i class="fas fa-users"></i>
                        All Patients Record
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#appointments">
                        <i class="fas fa-calendar-alt"></i>
                        All Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.branch.report')); ?>">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Branch Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.billing.system')); ?>">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Billing System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('admin.staff.management')); ?>">
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
                <input type="text" class="form-control" id="globalSearch" placeholder="Search staff members..." autocomplete="off">
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
            <!-- Staff Header -->
            <div class="staff-header">
                <div>
                    <h4 class="page-title">Staff Management</h4>
                    <p class="page-subtitle">Manage healthcare professionals, track schedules, and monitor staff performance across all branches</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" id="addStaff">
                        <i class="fas fa-plus me-1"></i>Add Staff
                    </button>
                    <button class="btn btn-outline-primary" id="viewSchedule">
                        <i class="fas fa-calendar me-1"></i>View Full Calendar
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number blue" id="totalStaff">24</div>
                        <div class="stat-label">Total Staff Members</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number green" id="onDutyStaff">18</div>
                        <div class="stat-label">Currently On Duty</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number orange" id="offDutyStaff">4</div>
                        <div class="stat-label">Off Duty</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number pink" id="onLeaveStaff">2</div>
                        <div class="stat-label">On Leave</div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <h3 class="filter-title">Filter & Search Staff</h3>
                    <div class="filters-grid">
                        <div class="filter-group">
                            <label class="filter-label">All Branches</label>
                            <select class="form-select" id="branchFilter">
                                <option value="">All Branches</option>
                                <option value="daraga">Daraga</option>
                                <option value="stodomingo">Sto. Domingo</option>
                                <option value="arimbay">Arimbay</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">All Roles</label>
                            <select class="form-select" id="roleFilter">
                                <option value="">All Roles</option>
                                <option value="ob-gynecologist">OB-Gynecologist</option>
                                <option value="senior-nurse">Senior Nurse</option>
                                <option value="general-practitioner">General Practitioner</option>
                                <option value="admin-assistant">Admin Assistant</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="on-duty">On Duty</option>
                                <option value="off-duty">Off Duty</option>
                                <option value="on-leave">On Leave</option>
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
                    </div>
                </div>

                <!-- Staff Cards Grid -->
                <div class="staff-grid" id="staffGrid">
                    <!-- Staff cards will be rendered here -->
                </div>

                <!-- Today's Schedule Section -->
                <div class="schedule-section">
                    <div class="schedule-header">
                        <h3 class="schedule-title">Today's Schedule</h3>
                        <button class="btn btn-outline-primary" id="viewFullCalendar">
                            <i class="fas fa-calendar-alt me-1"></i>View Full Calendar
                        </button>
                    </div>
                    <div class="schedule-table-container">
                        <div class="schedule-table">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Staff Member</th>
                                        <th>Role</th>
                                        <th>Branch</th>
                                        <th>Shift</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="scheduleTableBody">
                                    <!-- Schedule rows will be rendered here -->
                                </tbody>
                            </table>
                        </div>
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
        // Staff data
        const staffData = [
            {
                id: 1,
                name: 'Dr. Budnessa B. Ocampo., MD',
                role: 'OB-Gynecologist',
                branch: 'daraga',
                experience: 8,
                status: 'on-duty',
                contact: '+63 912 345 6789',
                avatar: 'DR',
                schedule: {
                    shift: 'Morning',
                    time: '8:00 AM - 4:00 PM'
                }
            },
            {
                id: 2,
                name: 'Nurse Rosalyn S. Abion, RM, RN',
                role: 'Senior Nurse',
                branch: 'stodomingo',
                experience: 5,
                status: 'on-duty',
                contact: '+63 912 345 6790',
                avatar: 'NR',
                schedule: {
                    shift: 'Afternoon',
                    time: '2:00 PM - 10:00 PM'
                }
            },
            {
                id: 3,
                name: 'Dr. Muriel D. Medel',
                role: 'General Practitioner',
                branch: 'arimbay',
                experience: 12,
                status: 'off-duty',
                contact: '+63 912 345 6791',
                avatar: 'DC',
                schedule: {
                    shift: 'Night',
                    time: '10:00 PM - 6:00 AM'
                }
            },
            {
                id: 4,
                name: 'Ana Garcia',
                role: 'Admin Assistant',
                branch: 'daraga',
                experience: 3,
                status: 'on-leave',
                contact: '+63 912 345 6792',
                avatar: 'AG',
                schedule: {
                    shift: 'Morning',
                    time: '8:00 AM - 4:00 PM'
                }
            },
            {
                id: 5,
                name: 'Dr. Mary Jean A. Banaag, MD',
                role: 'Staff Midwife',
                branch: 'stodomingo',
                experience: 10,
                status: 'on-duty',
                contact: '+63 912 345 6793',
                avatar: 'ER',
                schedule: {
                    shift: 'Morning',
                    time: '8:00 AM - 4:00 PM'
                }
            },
            {
                id: 6,
                name: 'Jemelyn C. Noguerra',
                role: 'Admin Clerk',
                branch: 'arimbay',
                experience: 6,
                status: 'on-duty',
                contact: '+63 912 345 6794',
                avatar: 'A',
                schedule: {
                    shift: 'Afternoon',
                    time: '2:00 PM - 10:00 PM'
                }
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Staff Management Controller
            const staffController = new StaffManagementController(staffData);
            staffController.init();
        });

        // Staff Management Controller Class
        class StaffManagementController {
            constructor(initialData = []) {
                this.staff = initialData;
                this.filteredStaff = [...this.staff];
                this.filters = {
                    branch: '',
                    role: '',
                    status: '',
                    search: ''
                };
            }

            init() {
                this.initializeEventListeners();
                this.setupMobileToggle();
                this.renderStaff();
                this.renderSchedule();
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

                document.getElementById('roleFilter').addEventListener('change', (e) => {
                    this.filters.role = e.target.value;
                });

                document.getElementById('statusFilter').addEventListener('change', (e) => {
                    this.filters.status = e.target.value;
                });

                // Filter buttons
                document.getElementById('applyFilters').addEventListener('click', () => {
                    this.applyFilters();
                });

                document.getElementById('resetFilters').addEventListener('click', () => {
                    this.resetFilters();
                });

                // Header buttons
                document.getElementById('addStaff').addEventListener('click', () => {
                    this.addStaff();
                });

                document.getElementById('viewSchedule').addEventListener('click', () => {
                    this.viewFullCalendar();
                });

                document.getElementById('viewFullCalendar').addEventListener('click', () => {
                    this.viewFullCalendar();
                });

                // Action buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.action-btn')) {
                        this.handleActionClick(e);
                    }
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
                this.filteredStaff = this.staff.filter(staff => {
                    // Search filter
                    if (this.filters.search) {
                        const searchTerm = this.filters.search.toLowerCase();
                        if (!staff.name.toLowerCase().includes(searchTerm) && 
                            !staff.role.toLowerCase().includes(searchTerm) &&
                            !staff.contact.includes(searchTerm)) {
                            return false;
                        }
                    }

                    // Branch filter
                    if (this.filters.branch && staff.branch !== this.filters.branch) {
                        return false;
                    }

                    // Role filter
                    if (this.filters.role && staff.role.toLowerCase().replace(/\s+/g, '-') !== this.filters.role) {
                        return false;
                    }

                    // Status filter
                    if (this.filters.status && staff.status !== this.filters.status) {
                        return false;
                    }

                    return true;
                });

                this.renderStaff();
                this.updateStats();
                this.showNotification(`Filters applied. Found ${this.filteredStaff.length} staff members.`, 'info');
            }

            resetFilters() {
                // Reset all filter values
                document.getElementById('branchFilter').value = '';
                document.getElementById('roleFilter').value = '';
                document.getElementById('statusFilter').value = '';
                document.getElementById('globalSearch').value = '';

                this.filters = {
                    branch: '',
                    role: '',
                    status: '',
                    search: ''
                };

                this.filteredStaff = [...this.staff];
                this.renderStaff();
                this.updateStats();
                this.showNotification('Filters reset successfully', 'success');
            }

            renderStaff() {
                const staffGrid = document.getElementById('staffGrid');

                if (this.filteredStaff.length === 0) {
                    staffGrid.innerHTML = `
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-user-friends mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <h4 class="text-muted">No staff members found</h4>
                            <p class="text-muted">Try adjusting your filters or search criteria</p>
                        </div>
                    `;
                    return;
                }

                staffGrid.innerHTML = this.filteredStaff.map(staff => `
                    <div class="staff-card" data-staff-id="${staff.id}">
                        <div class="staff-card-header">
                            <div class="staff-avatar">${staff.avatar}</div>
                            <div class="staff-name">${staff.name}</div>
                            <div class="staff-role">${staff.role}</div>
                        </div>
                        <div class="staff-card-body">
                            <div class="staff-info-grid">
                                <div class="staff-info-item">
                                    <div class="staff-info-label">Branch</div>
                                    <div class="staff-info-value">
                                        <span class="branch-badge branch-${staff.branch}">${this.formatBranchName(staff.branch)}</span>
                                    </div>
                                </div>
                                <div class="staff-info-item">
                                    <div class="staff-info-label">Experience</div>
                                    <div class="staff-info-value">${staff.experience} years</div>
                                </div>
                                <div class="staff-info-item">
                                    <div class="staff-info-label">Status</div>
                                    <div class="staff-info-value">
                                        <span class="status-badge status-${staff.status}">${this.formatStatus(staff.status)}</span>
                                    </div>
                                </div>
                                <div class="staff-info-item">
                                    <div class="staff-info-label">Contact</div>
                                    <div class="staff-info-value">${staff.contact}</div>
                                </div>
                            </div>
                            <div class="staff-contact">
                                <i class="fas fa-phone"></i>
                                <div class="staff-contact-text">${staff.contact}</div>
                            </div>
                            <div class="staff-actions">
                                <button class="action-btn btn-view" data-action="view" data-staff="${staff.name}" data-id="${staff.id}">
                                    <i class="fas fa-eye"></i>View
                                </button>
                                <button class="action-btn btn-edit" data-action="edit" data-staff="${staff.name}" data-id="${staff.id}">
                                    <i class="fas fa-edit"></i>Edit
                                </button>
                                <button class="action-btn btn-schedule" data-action="schedule" data-staff="${staff.name}" data-id="${staff.id}">
                                    <i class="fas fa-calendar"></i>Schedule
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');
            }

            renderSchedule() {
                const scheduleBody = document.getElementById('scheduleTableBody');
                const scheduleData = this.staff.filter(staff => staff.status === 'on-duty');

                scheduleBody.innerHTML = scheduleData.map(staff => `
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="staff-avatar me-3" style="width: 40px; height: 40px; font-size: 0.9rem;">${staff.avatar}</div>
                                <div>
                                    <div class="fw-semibold">${staff.name}</div>
                                </div>
                            </div>
                        </td>
                        <td>${staff.role}</td>
                        <td>
                            <span class="branch-badge branch-${staff.branch}">${this.formatBranchName(staff.branch)}</span>
                        </td>
                        <td>
                            <span class="shift-badge shift-${staff.schedule.shift.toLowerCase()}">${staff.schedule.shift}</span>
                        </td>
                        <td>${staff.schedule.time}</td>
                        <td>
                            <span class="status-badge status-${staff.status}">${this.formatStatus(staff.status)}</span>
                        </td>
                    </tr>
                `).join('');
            }

            updateStats() {
                const total = this.filteredStaff.length;
                const onDuty = this.filteredStaff.filter(s => s.status === 'on-duty').length;
                const offDuty = this.filteredStaff.filter(s => s.status === 'off-duty').length;
                const onLeave = this.filteredStaff.filter(s => s.status === 'on-leave').length;

                document.getElementById('totalStaff').textContent = total;
                document.getElementById('onDutyStaff').textContent = onDuty;
                document.getElementById('offDutyStaff').textContent = offDuty;
                document.getElementById('onLeaveStaff').textContent = onLeave;
            }

            handleActionClick(e) {
                const btn = e.target.closest('.action-btn');
                const action = btn.getAttribute('data-action');
                const staffName = btn.getAttribute('data-staff');
                const staffId = btn.getAttribute('data-id');
                
                // Add loading state
                const originalContent = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                btn.disabled = true;
                
                setTimeout(() => {
                    // Reset button
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    
                    // Handle different actions
                    switch(action) {
                        case 'view':
                            this.viewStaff(staffId, staffName);
                            break;
                        case 'edit':
                            this.editStaff(staffId, staffName);
                            break;
                        case 'schedule':
                            this.scheduleStaff(staffId, staffName);
                            break;
                    }
                }, 1000);
            }

            viewStaff(id, name) {
                this.showNotification(`Opening staff profile for ${name}`, 'info');
                console.log(`View staff: ${id} - ${name}`);
            }

            editStaff(id, name) {
                this.showNotification(`Opening edit form for ${name}`, 'info');
                console.log(`Edit staff: ${id} - ${name}`);
            }

            scheduleStaff(id, name) {
                this.showNotification(`Opening schedule for ${name}`, 'info');
                console.log(`Schedule staff: ${id} - ${name}`);
            }

            addStaff() {
                this.showNotification('Opening add staff form', 'info');
                console.log('Add new staff');
            }

            viewFullCalendar() {
                this.showNotification('Opening full calendar view', 'info');
                console.log('View full calendar');
            }

            handleLogout() {
                if (confirm('Are you sure you want to logout?')) {
                    this.showNotification('Logging out...', 'info');
                    setTimeout(() => {
                        window.location.href = '#dashboard';
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

            formatStatus(status) {
                return status.split('-').map(word => 
                    word.charAt(0).toUpperCase() + word.slice(1)
                ).join(' ');
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
</html><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/admin/staff-management.blade.php ENDPATH**/ ?>