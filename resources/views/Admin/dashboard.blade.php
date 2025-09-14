<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Branch Overview - MedNest Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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

        .dashboard-header {
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

        .loading-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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

        .stat-trend {
            font-size: 0.75rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .trend-up { color: #38a169; }
        .trend-down { color: #e53e3e; }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }

        .view-toggle {
            margin-bottom: 2rem;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .branch-overview {
            margin-bottom: 2rem;
        }

        .branch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .branch-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 4px solid;
        }

        .branch-card[data-branch="daraga"] { border-left-color: #f6ad55; }
        .branch-card[data-branch="sto_domingo"] { border-left-color: #48bb78; }
        .branch-card[data-branch="arimbay"] { border-left-color: #ed64a6; }

        .branch-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .branch-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            justify-content: space-between;
        }

        .branch-icon {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .branch-icon.status-online { background: #48bb78; }
        .branch-icon.status-offline { background: #e53e3e; }
        .branch-icon.status-maintenance { background: #ed8936; }

        .branch-name {
            font-weight: 600;
            font-size: 1rem;
            color: #2d3748;
            flex: 1;
        }

        .branch-status {
            font-size: 0.75rem;
            color: #718096;
            font-weight: 500;
        }

        .branch-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .branch-stat {
            text-align: center;
        }

        .branch-stat .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            line-height: 1;
        }

        .branch-stat .stat-label {
            font-size: 0.75rem;
            color: #718096;
            margin-top: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-revenue {
            font-size: 1.125rem;
            font-weight: 700;
            color: #2d3748;
            margin-top: 0.5rem;
        }

        .quick-actions {
            margin-bottom: 2rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            border: 2px solid transparent;
        }

        .action-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            color: inherit;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.15);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }

        .action-icon.pink { background: linear-gradient(135deg, #e91e63, #d63384); }
        .action-icon.purple { background: linear-gradient(135deg, #9f7aea, #805ad5); }
        .action-icon.green { background: linear-gradient(135deg, #48bb78, #38a169); }
        .action-icon.blue { background: linear-gradient(135deg, #4299e1, #3182ce); }

        .action-title {
            font-weight: 600;
            font-size: 0.875rem;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .action-description {
            font-size: 0.75rem;
            color: #718096;
        }

        .recent-activity {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .activity-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .activity-list {
            padding: 0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f7fafc;
            transition: background 0.2s ease;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:hover {
            background: #f8f9fa;
        }

        .activity-time {
            font-size: 0.75rem;
            color: #718096;
            font-weight: 500;
            min-width: 60px;
        }

        .activity-details {
            flex: 1;
            margin-left: 1rem;
        }

        .activity-title {
            font-weight: 600;
            font-size: 0.875rem;
            color: #2d3748;
            margin-bottom: 0.125rem;
        }

        .activity-subtitle {
            font-size: 0.75rem;
            color: #718096;
        }

        .activity-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .activity-branch {
            font-size: 0.6875rem;
            color: #718096;
            background: #f7fafc;
            padding: 0.125rem 0.5rem;
            border-radius: 12px;
        }

        .status-badge {
            font-size: 0.6875rem;
            padding: 0.125rem 0.5rem;
            border-radius: 12px;
            font-weight: 500;
        }

        .status-completed {
            background: #c6f6d5;
            color: #22543d;
        }

        .status-active {
            background: #fed7d7;
            color: #742a2a;
        }

        .notifications-panel {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: right 0.3s ease;
            overflow-y: auto;
        }

        .notifications-panel.show {
            right: 0;
        }

        .panel-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

            .actions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .branch-grid {
                grid-template-columns: 1fr;
            }

            .notifications-panel {
                width: 100%;
                right: -100%;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .admin-profile .user-name {
                display: none;
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
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.patients') }}">
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
                    <a class="nav-link" href="#labor">
                        <i class="fas fa-baby"></i>
                        Labor Monitoring
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#billing">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Billing System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#referral">
                        <i class="fas fa-share-alt"></i>
                        Referrals
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#staff">
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
                <div class="search-results" id="searchResults"></div>
            </div>
            
            <div class="admin-profile dropdown">
                <div class="admin-profile-trigger" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="admin-avatar">SA</div>
                    <span class="user-name fw-bold">Super Admin </span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <div class="dropdown-header">
                            <strong>Admin</strong><br>
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
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h4 class="page-title">Multi-Branch Overview</h4>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Loading Indicator -->
                <div class="loading-indicator" id="loadingIndicator" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="ms-2">Updating data...</span>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid" id="statsGrid">
                    <div class="stat-card">
                        <div class="stat-number blue" id="totalPatients">1,247</div>
                        <div class="stat-label">Total Patients (All Branches)</div>
                        <div class="stat-trend" id="patientsTrend">
                            <span class="trend-up"><i class="fas fa-arrow-up"></i> +5.2%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number orange" id="totalAppointments">89</div>
                        <div class="stat-label">Total Appointments</div>
                        <div class="stat-trend" id="appointmentsTrend">
                            <span class="trend-up"><i class="fas fa-arrow-up"></i> +12.3%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number pink" id="totalLaborCases">15</div>
                        <div class="stat-label">Total Active Labor Cases</div>
                        <div class="stat-trend" id="laborTrend">
                            <span class="trend-up"><i class="fas fa-arrow-up"></i> +2</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number green" id="monthlyRevenue">₱2,450,000</div>
                        <div class="stat-label">Total Monthly Revenue</div>
                        <div class="stat-trend" id="revenueTrend">
                            <span class="trend-up"><i class="fas fa-arrow-up"></i> +8.7%</span>
                        </div>
                    </div>
                </div>

                <!-- Toggle Branch View -->
                <div class="view-toggle mb-4">
                    <button type="button" class="btn btn-outline-primary btn-sm" id="toggleBranchView">
                        <i class="fas fa-eye me-1"></i>Show Branch Details
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm ms-2" id="refreshData">
                        <i class="fas fa-sync me-1"></i>Refresh Data
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm ms-2" id="exportReport">
                        <i class="fas fa-download me-1"></i>Export Report
                    </button>
                </div>

                <!-- Branch Performance Cards -->
                <div class="branch-overview" id="branchOverview" style="display: none;">
                    <h2 class="section-title">Branch Performance</h2>
                    <div class="branch-grid">
                        <div class="branch-card" data-branch="daraga">
                            <div class="branch-header">
                                <div style="display: flex; align-items: center;">
                                    <div class="branch-icon status-online"></div>
                                    <div class="branch-name">Daraga Branch</div>
                                </div>
                                <div class="branch-status">Online</div>
                            </div>
                            <div class="branch-stats">
                                <div class="branch-stat">
                                    <div class="stat-number">425</div>
                                    <div class="stat-label">Patients</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">28</div>
                                    <div class="stat-label">Today's Appointments</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">6</div>
                                    <div class="stat-label">Active Labor</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-revenue">₱850,000</div>
                                    <div class="stat-label">Monthly Revenue</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="branch-card" data-branch="sto_domingo">
                            <div class="branch-header">
                                <div style="display: flex; align-items: center;">
                                    <div class="branch-icon status-online"></div>
                                    <div class="branch-name">Sto. Domingo Branch</div>
                                </div>
                                <div class="branch-status">Online</div>
                            </div>
                            <div class="branch-stats">
                                <div class="branch-stat">
                                    <div class="stat-number">398</div>
                                    <div class="stat-label">Patients</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">32</div>
                                    <div class="stat-label">Today's Appointments</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">5</div>
                                    <div class="stat-label">Active Labor</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-revenue">₱780,000</div>
                                    <div class="stat-label">Monthly Revenue</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="branch-card" data-branch="arimbay">
                            <div class="branch-header">
                                <div style="display: flex; align-items: center;">
                                    <div class="branch-icon status-online"></div>
                                    <div class="branch-name">Arimbay Branch</div>
                                </div>
                                <div class="branch-status">Online</div>
                            </div>
                            <div class="branch-stats">
                                <div class="branch-stat">
                                    <div class="stat-number">424</div>
                                    <div class="stat-label">Patients</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">29</div>
                                    <div class="stat-label">Today's Appointments</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-number">4</div>
                                    <div class="stat-label">Active Labor</div>
                                </div>
                                <div class="branch-stat">
                                    <div class="stat-revenue">₱820,000</div>
                                    <div class="stat-label">Monthly Revenue</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h2 class="section-title">Quick Actions</h2>
                    <div class="actions-grid">
                        <a href="#new-appointment" class="action-card" data-action="New Appointment">
                            <div class="action-icon pink">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="action-title">New Appointment</div>
                            <div class="action-description">Schedule patient appointment</div>
                        </a>
                        <a href="#patient-records" class="action-card" data-action="Patient Records">
                            <div class="action-icon blue">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="action-title">Patient Records</div>
                            <div class="action-description">Access patient information</div>
                        </a>
                        <a href="#labor-monitoring" class="action-card" data-action="Labor Monitoring">
                            <div class="action-icon green">
                                <i class="fas fa-baby"></i>
                            </div>
                            <div class="action-title">Labor Monitoring</div>
                            <div class="action-description">Monitor ongoing deliveries</div>
                        </a>
                        <a href="#generate-reports" class="action-card" data-action="Generate Reports">
                            <div class="action-icon purple">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="action-title">Generate Reports</div>
                            <div class="action-description">Create detailed reports</div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="recent-activity">
                    <div class="activity-header">
                        <h2 class="section-title">Recent Activity</h2>
                        <button class="btn btn-sm btn-outline-primary" id="refreshActivity">
                            <i class="fas fa-sync"></i>
                        </button>
                    </div>
                    <div class="activity-list" id="activityList">
                        <div class="activity-item">
                            <div class="activity-time">10:30</div>
                            <div class="activity-details">
                                <div class="activity-title">New appointment scheduled</div>
                                <div class="activity-subtitle">Maria Santos - Prenatal Checkup</div>
                            </div>
                            <div class="activity-status">
                                <div class="activity-branch">Daraga</div>
                                <div class="status-badge status-completed">Confirmed</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-time">10:15</div>
                            <div class="activity-details">
                                <div class="activity-title">Labor admission</div>
                                <div class="activity-subtitle">Anna Cruz - Emergency</div>
                            </div>
                            <div class="activity-status">
                                <div class="activity-branch">Sto. Domingo</div>
                                <div class="status-badge status-active">Active</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-time">09:45</div>
                            <div class="activity-details">
                                <div class="activity-title">Ultrasound completed</div>
                                <div class="activity-subtitle">Jennifer Lopez - 20 weeks</div>
                            </div>
                            <div class="activity-status">
                                <div class="activity-branch">Arimbay</div>
                                <div class="status-badge status-completed">Completed</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-time">09:30</div>
                            <div class="activity-details">
                                <div class="activity-title">Payment received</div>
                                <div class="activity-subtitle">Lisa Garcia - ₱3,500</div>
                            </div>
                            <div class="activity-status">
                                <div class="activity-branch">Daraga</div>
                                <div class="status-badge status-completed">Paid</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-time">09:00</div>
                            <div class="activity-details">
                                <div class="activity-title">Staff check-in</div>
                                <div class="activity-subtitle">Dr. Martinez - Morning shift</div>
                            </div>
                            <div class="activity-status">
                                <div class="activity-branch">Sto. Domingo</div>
                                <div class="status-badge status-active">On Duty</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications Panel -->
    <div class="notifications-panel" id="notificationsPanel">
        <div class="panel-header">
            <h3>Recent Notifications</h3>
            <button class="btn-close" id="closeNotifications"></button>
        </div>
        <div class="notifications-list" id="notificationsList">
            <!-- Notifications loaded via AJAX -->
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
        <i class="fas fa-bars"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

        // Global search functionality
        const searchInput = document.getElementById('globalSearch');
        const searchResults = document.getElementById('searchResults');
        let searchTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            if (query.length < 2) {
                searchResults.style.display = 'none';
                return;
            }

            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        // Close search results when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });

        // Toggle branch view
        document.getElementById('toggleBranchView').addEventListener('click', function() {
            const branchOverview = document.getElementById('branchOverview');
            const isVisible = branchOverview.style.display !== 'none';
            
            branchOverview.style.display = isVisible ? 'none' : 'block';
            this.innerHTML = isVisible ? 
                '<i class="fas fa-eye me-1"></i>Show Branch Details' : 
                '<i class="fas fa-eye-slash me-1"></i>Hide Branch Details';
        });

        // Refresh data
        document.getElementById('refreshData').addEventListener('click', function() {
            refreshDashboardData();
        });

        // Export report
        document.getElementById('exportReport').addEventListener('click', function() {
            exportReport();
        });

        // Refresh activity
        document.getElementById('refreshActivity').addEventListener('click', function() {
            refreshActivity();
        });

        // Branch card clicks
        document.querySelectorAll('.branch-card').forEach(card => {
            card.addEventListener('click', function() {
                const branch = this.dataset.branch;
                console.log(`Navigating to ${branch} branch`);
                showNotification(`Loading ${branch} branch details...`, 'info');
            });
        });

        // Action card analytics
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.dataset.action;
                console.log(`Quick action clicked: ${action}`);
                
                // Add click animation
                this.style.transform = 'translateY(-2px) scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-2px)';
                }, 150);
                
                showNotification(`Opening ${action}...`, 'info');
            });
        });

        // Handle logout functionality
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-action="logout"]')) {
                e.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    showNotification('Logging out...', 'info');
                    setTimeout(() => {
                        console.log('Logout process initiated');
                    }, 1000);
                }
            }
        });

        // Auto-refresh data every 30 seconds
        setInterval(refreshDashboardData, 30000);
    });

    function performSearch(query) {
        // Simulate search API call
        const mockResults = {
            patients: [
                { name: 'Maria Santos', id: 1, branch: 'Daraga' },
                { name: 'Anna Cruz', id: 2, branch: 'Sto. Domingo' }
            ],
            appointments: [
                { patient: 'Jennifer Lopez', id: 3, branch: 'Arimbay' }
            ]
        };
        
        displaySearchResults(mockResults);
    }

    function displaySearchResults(results) {
        const searchResults = document.getElementById('searchResults');
        let html = '';

        if (Object.keys(results).length === 0) {
            html = '<div class="search-result-item"><div class="result-title">No results found</div></div>';
        } else {
            Object.keys(results).forEach(category => {
                results[category].forEach(item => {
                    html += `
                        <div class="search-result-item" onclick="goToResult('${category}', '${item.id}')">
                            <div class="result-type">${category}</div>
                            <div class="result-title">${item.name || item.patient}</div>
                            <div class="result-subtitle">${item.branch}</div>
                        </div>
                    `;
                });
            });
        }

        searchResults.innerHTML = html;
        searchResults.style.display = 'block';
    }

    function goToResult(type, id) {
        console.log(`Navigating to ${type} with ID: ${id}`);
        showNotification(`Loading ${type} details...`, 'info');
        document.getElementById('searchResults').style.display = 'none';
    }

    function refreshDashboardData() {
        const loadingIndicator = document.getElementById('loadingIndicator');
        loadingIndicator.style.display = 'flex';

        // Simulate API call
        setTimeout(() => {
            updateStats();
            loadingIndicator.style.display = 'none';
            showNotification('Data refreshed successfully', 'success');
        }, 2000);
    }

    function updateStats() {
        // Update main stats with random variations
        const stats = [
            { id: 'totalPatients', base: 1247 },
            { id: 'totalAppointments', base: 89 },
            { id: 'totalLaborCases', base: 15 },
        ];

        stats.forEach(stat => {
            const element = document.getElementById(stat.id);
            if (element) {
                const variation = Math.floor(Math.random() * 10) - 5;
                element.textContent = stat.base + variation;
            }
        });

        // Update revenue with formatting
        const revenueElement = document.getElementById('monthlyRevenue');
        if (revenueElement) {
            const baseRevenue = 2450000;
            const variation = Math.floor(Math.random() * 100000) - 50000;
            revenueElement.textContent = '₱' + (baseRevenue + variation).toLocaleString();
        }
    }

    function refreshActivity() {
        const refreshBtn = document.getElementById('refreshActivity');
        const originalHtml = refreshBtn.innerHTML;
        refreshBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        setTimeout(() => {
            refreshBtn.innerHTML = originalHtml;
            showNotification('Activity updated', 'success');
        }, 1500);
    }

    function exportReport() {
        const btn = document.getElementById('exportReport');
        const originalHtml = btn.innerHTML;
        
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Generating...';
        btn.disabled = true;

        setTimeout(() => {
            btn.innerHTML = originalHtml;
            btn.disabled = false;
            showNotification('Report generated successfully', 'success');
        }, 3000);
    }

    function showNotification(message, type = 'info') {
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

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            document.getElementById('globalSearch').focus();
        }
        
        // Escape to close modals/panels
        if (e.key === 'Escape') {
            document.getElementById('searchResults').style.display = 'none';
        }
    });
    </script>
</body>
</html>