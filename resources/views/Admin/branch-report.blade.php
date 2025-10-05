<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Report - MedNest</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
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

        .report-header {
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
        .stat-card:nth-child(3) { border-left-color: #e91e63; }
        .stat-card:nth-child(4) { border-left-color: #dd6b20; }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .stat-number.blue { color: #3182ce; }
        .stat-number.green { color: #38a169; }
        .stat-number.pink { color: #e91e63; }
        .stat-number.orange { color: #dd6b20; }

        .stat-label {
            font-size: 0.875rem;
            color: #718096;
            font-weight: 500;
        }

        .stat-change {
            font-size: 0.75rem;
            margin-top: 0.5rem;
            font-weight: 600;
        }

        .stat-change.positive {
            color: #38a169;
        }

        .stat-change.negative {
            color: #e53e3e;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d3748;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .table-card {
            background: white;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            text-align: left;
            padding: 1rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            border-bottom: 1px solid #e1e5e9;
        }

        td {
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #f1f3f4;
            font-size: 0.875rem;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        tbody tr:last-child td {
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

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-confirmed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
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

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .filters-grid {
                grid-template-columns: 1fr;
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
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-th-large"></i>
                        Multi-Branch
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.patients') }}">
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
                    <a class="nav-link active" href="{{ route('admin.branch.report') }}">
                        <i class="fas fa-chart-line"></i>
                        Branch Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.billing.system') }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Billing System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.staff.management') }}">
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
                <input type="text" class="form-control" placeholder="Search across all branches..." autocomplete="off">
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
                        <a class="dropdown-item text-danger" href="#logout">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Report Header -->
            <div class="report-header">
                <h4 class="page-title">Branch Report</h4>
                <p class="page-subtitle">Comprehensive analytics and performance metrics across all clinic branches</p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Filters Section -->
                <div class="filters-section">
                    <h3 class="filter-title">Report Filters</h3>
                    <div class="filters-grid">
                        <div class="filter-group">
                            <label class="filter-label">Branch</label>
                            <select class="form-select" id="branchSelect">
                                <option value="">All Branches</option>
                                <option value="daraga" selected>Daraga</option>
                                <option value="stodomingo">Sto Domingo</option>
                                <option value="arimbay">Arimbay</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Time Period</label>
                            <select class="form-select" id="periodSelect">
                                <option value="week">This Week</option>
                                <option value="month" selected>This Month</option>
                                <option value="quarter">This Quarter</option>
                                <option value="year">This Year</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Start Date</label>
                            <input type="date" class="form-control" value="2025-10-01">
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">End Date</label>
                            <input type="date" class="form-control" value="2025-10-04">
                        </div>
                        <div class="filter-group">
                            <button class="btn btn-primary">
                                <i class="fas fa-sync-alt me-1"></i>Refresh Data
                            </button>
                        </div>
                        <div class="filter-group">
                            <button class="btn btn-outline-secondary" onclick="window.print()">
                                <i class="fas fa-file-pdf me-1"></i>Export PDF
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number blue">312</div>
                        <div class="stat-label">Total Patients</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 12% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number green">₱156,450.00</div>
                        <div class="stat-label">Total Revenue</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 8% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number pink">156</div>
                        <div class="stat-label">Appointments</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 5% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number orange">8</div>
                        <div class="stat-label">Active Labor Cases</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i> 2 from yesterday
                        </div>
                    </div>
                </div>

                <!-- Charts Grid -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <h3 class="chart-title">Revenue Trends</h3>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3 class="chart-title">Patient Statistics</h3>
                        <div class="chart-container">
                            <canvas id="patientChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="charts-grid">
                    <div class="chart-card">
                        <h3 class="chart-title">Appointment Status</h3>
                        <div class="chart-container">
                            <canvas id="appointmentChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3 class="chart-title">Service Distribution</h3>
                        <div class="chart-container">
                            <canvas id="serviceChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Recent Activities</h3>
                        <button class="btn btn-outline-secondary btn-sm">View All</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Date & Time</th>
                                <th>Service</th>
                                <th>Assigned Staff</th>
                                <th>Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-name">Andrea Garcia</div>
                                        <div class="patient-contact">andrea@email.com</div>
                                    </div>
                                </td>
                                <td>
                                    10:00 AM<br>
                                    <small class="text-muted">March 25, 2025</small>
                                </td>
                                <td>Consultation</td>
                                <td>Dr. Sarah Wilson</td>
                                <td>₱1,500.00</td>
                                <td><span class="status-badge status-confirmed">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-name">Maria Santos</div>
                                        <div class="patient-contact">maria@email.com</div>
                                    </div>
                                </td>
                                <td>
                                    10:00 AM<br>
                                    <small class="text-muted">March 25, 2025</small>
                                </td>
                                <td>Consultation</td>
                                <td>Dr. Sarah Wilson</td>
                                <td>₱1,500.00</td>
                                <td><span class="status-badge status-confirmed">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-name">Lovely Cruz</div>
                                        <div class="patient-contact">lovely@email.com</div>
                                    </div>
                                </td>
                                <td>
                                    10:00 AM<br>
                                    <small class="text-muted">March 25, 2025</small>
                                </td>
                                <td>Consultation</td>
                                <td>Dr. Sarah Wilson</td>
                                <td>₱1,500.00</td>
                                <td><span class="status-badge status-confirmed">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-name">Jessica Reyes</div>
                                        <div class="patient-contact">jessica@email.com</div>
                                    </div>
                                </td>
                                <td>
                                    11:30 AM<br>
                                    <small class="text-muted">March 25, 2025</small>
                                </td>
                                <td>Prenatal Checkup</td>
                                <td>Dr. Sarah Wilson</td>
                                <td>₱2,000.00</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-name">Anna Martinez</div>
                                        <div class="patient-contact">anna@email.com</div>
                                    </div>
                                </td>
                                <td>
                                    02:00 PM<br>
                                    <small class="text-muted">March 25, 2025</small>
                                </td>
                                <td>Ultrasound</td>
                                <td>Dr. Sarah Wilson</td>
                                <td>₱3,500.00</td>
                                <td><span class="status-badge status-completed">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
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
        // Mobile Sidebar Toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Revenue Trends Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Revenue (₱)',
                    data: [35000, 42000, 38000, 41450],
                    borderColor: '#d63384',
                    backgroundColor: 'rgba(214, 51, 132, 0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Patient Statistics Chart
        const patientCtx = document.getElementById('patientChart').getContext('2d');
        new Chart(patientCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'New Patients',
                    data: [65, 78, 72, 97],
                    backgroundColor: '#38a169'
                }, {
                    label: 'Follow-up',
                    data: [45, 52, 48, 61],
                    backgroundColor: '#3182ce'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Appointment Status Chart
        const appointmentCtx = document.getElementById('appointmentChart').getContext('2d');
        new Chart(appointmentCtx, {
            type: 'doughnut',
            data: {
                labels: ['Confirmed', 'Pending', 'Completed', 'Cancelled'],
                datasets: [{
                    data: [85, 42, 28, 5],
                    backgroundColor: ['#38a169', '#f59e0b', '#3182ce', '#e53e3e']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Service Distribution Chart
        const serviceCtx = document.getElementById('serviceChart').getContext('2d');
        new Chart(serviceCtx, {
            type: 'pie',
            data: {
                labels: ['Consultation', 'Prenatal', 'Delivery', 'Ultrasound', 'Others'],
                datasets: [{
                    data: [45, 30, 12, 8, 5],
                    backgroundColor: ['#d63384', '#38a169', '#3182ce', '#f59e0b', '#8b5cf6']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>