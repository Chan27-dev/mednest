<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records - MedNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print {
            body * { visibility: hidden; }
            .print-area, .print-area * { visibility: visible; }
            .print-area { position: absolute; left: 0; top: 0; }
        }

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

        .page-header {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .page-title i {
            color: var(--primary-color);
        }

        .add-patient-btn {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .add-patient-btn:hover {
            background: linear-gradient(135deg, #c2185b, var(--primary-color));
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.4);
            color: white;
        }

        .patients-container {
            background: white;
            margin: 0;
            padding: 0;
        }

        .search-section {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f1f3f4;
            background: #fafbfc;
        }

        .patient-search {
            position: relative;
            max-width: 400px;
        }

        .patient-search input {
            border-radius: 10px;
            padding-left: 40px;
            border: 1px solid #e1e5e9;
            padding: 0.75rem 1rem 0.75rem 40px;
        }

        .patient-search .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .patient-search input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
        }

        .patients-table {
            margin: 0;
        }

        .patients-table table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .patients-table th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 0.875rem;
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

        .patients-table tr:hover {
            background-color: #f8f9fa;
        }

        .patient-id {
            font-weight: 600;
            color: #495057;
        }

        .patient-name {
            font-weight: 600;
            color: #333;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-in-labor {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-scheduled {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-completed {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-near-due {
            background-color: #fff3cd;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            border: none;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-view {
            background-color: #007bff;
            color: white;
        }

        .btn-view:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background-color: #1e7e34;
            transform: translateY(-1px);
        }

        .btn-monitor {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-monitor:hover {
            background-color: #e0a800;
            transform: translateY(-1px);
        }

        .btn-archive {
            background-color: #6c757d;
            color: white;
        }

        .btn-archive:hover {
            background-color: #545b62;
            transform: translateY(-1px);
        }

        .btn-referral {
            background-color: #9c27b0;
            color: white;
        }

        .btn-referral:hover {
            background-color: #7b1fa2;
            transform: translateY(-1px);
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

        /* Enhanced Update Form Styles */
        .update-form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 2rem;
        }

        .update-form-header {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            color: white;
            padding: 2rem;
            position: relative;
        }

        .update-form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .update-form-header .header-content {
            position: relative;
            z-index: 1;
        }

        .form-progress {
            background: rgba(255, 255, 255, 0.2);
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 1.5rem;
        }

        .form-progress-fill {
            background: white;
            height: 100%;
            transition: width 0.5s ease;
            border-radius: 4px;
        }

        .section-navigation {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .section-nav-item {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-nav-item:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .section-nav-item.active {
            background: white;
            color: var(--primary-color);
            font-weight: 600;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .form-body {
            padding: 2.5rem;
        }

        .form-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section-title i {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .form-section-description {
            color: #6b7280;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .enhanced-form-group {
            margin-bottom: 1.5rem;
        }

        .enhanced-form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.95rem;
        }

        .enhanced-form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .enhanced-form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
            outline: none;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .enhanced-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .enhanced-checkbox:hover {
            border-color: var(--primary-color);
            background: #fef7f7;
        }

        .enhanced-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
            cursor: pointer;
        }

        .enhanced-checkbox label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            color: #374151;
            line-height: 1.4;
        }

        .form-navigation {
            background: #f9fafb;
            padding: 1.5rem 2.5rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-button {
            padding: 0.875rem 2rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-button-primary {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            color: white;
        }

        .nav-button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.3);
        }

        .nav-button-secondary {
            background: #6b7280;
            color: white;
        }

        .nav-button-secondary:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }

        .nav-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #6b7280;
            font-weight: 500;
        }

        .mini-progress {
            width: 120px;
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .mini-progress-fill {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            height: 100%;
            transition: width 0.5s ease;
        }

        /* Enhanced Referral Form Styles */
        .referral-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 2rem;
        }

        .referral-header {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            color: white;
            padding: 2rem;
            position: relative;
        }

        .referral-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .referral-header .header-content {
            position: relative;
            z-index: 1;
        }

        .referral-body {
            padding: 2.5rem;
        }

        .referral-section {
            margin-bottom: 2rem;
        }

        .referral-section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .referral-section-title i {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .referral-form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .referral-actions {
            background: #f9fafb;
            padding: 2rem 2.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .referral-button {
            padding: 1rem 2rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            margin-right: 1rem;
            margin-bottom: 0.5rem;
        }

        .referral-button-primary {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .referral-button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .referral-button-secondary {
            background: #6b7280;
            color: white;
        }

        .referral-button-secondary:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }

        .referral-button-purple {
            background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
            color: white;
        }

        .referral-button-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.3);
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
            
            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .patients-table {
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }

            .update-form-container,
            .referral-container {
                margin: 1rem;
            }

            .form-body,
            .referral-body {
                padding: 1.5rem;
            }

            .section-navigation {
                gap: 0.5rem;
            }

            .section-nav-item {
                font-size: 0.75rem;
                padding: 0.5rem 0.75rem;
            }

            .form-grid,
            .referral-form-grid {
                grid-template-columns: 1fr;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
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
                    <a class="nav-link" href="#" onclick="showDashboard()">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="showDashboard()">
                        <i class="fas fa-users"></i>
                        Patients Record
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar-alt"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Billing System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-share-alt"></i>
                        Referrals
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
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
                <input type="text" class="form-control" placeholder="Search across all branches...">
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
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user me-2"></i>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog me-2"></i>
                            Account Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
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

        <!-- Dashboard View -->
        <div id="dashboard-view" class="page-content">
            <!-- Page Header -->
            <div class="page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">
                    <i class="fas fa-users"></i>
                    Patient Records Management
                </h4>
                <button type="button" class="add-patient-btn" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                    <i class="fas fa-plus me-2"></i>Add new Patient
                </button>
            </div>

            <!-- Patients Container -->
            <div class="patients-container">
                <!-- Search Section -->
                <div class="search-section">
                    <div class="patient-search">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="form-control" id="patientSearchInput" placeholder="Search patients by name, ID, or contact...">
                    </div>
                </div>

                <!-- Patients Table -->
                <div class="patients-table">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Contact</th>
                                <th>Last Visit</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="patientsTableBody">
                            <tr data-patient-id="P-001">
                                <td class="patient-id">P-001</td>
                                <td class="patient-name">Maria Santos</td>
                                <td>28</td>
                                <td>09123456789</td>
                                <td>2 days ago</td>
                                <td>
                                    <span class="status-badge status-active">ACTIVE</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn btn-edit" onclick="showUpdateForm('Maria Santos')">Update Records</button>
                                        <button class="action-btn btn-referral" onclick="showReferrals('Maria Santos')">Referrals</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-patient-id="P-002">
                                <td class="patient-id">P-002</td>
                                <td class="patient-name">Ana Garcia</td>
                                <td>32</td>
                                <td>09234567890</td>
                                <td>1 day ago</td>
                                <td>
                                    <span class="status-badge status-near-due">NEAR DUE</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn btn-edit" onclick="showUpdateForm('Ana Garcia')">Update Records</button>
                                        <button class="action-btn btn-monitor" onclick="showMonitor('Ana Garcia')">Monitor</button>
                                        <button class="action-btn btn-referral" onclick="showReferrals('Ana Garcia')">Referrals</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-patient-id="P-003">
                                <td class="patient-id">P-003</td>
                                <td class="patient-name">Rosa Cruz</td>
                                <td>25</td>
                                <td>09345678901</td>
                                <td>1 week ago</td>
                                <td>
                                    <span class="status-badge status-active">ACTIVE</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn btn-edit" onclick="showUpdateForm('Rosa Cruz')">Update Records</button>
                                        <button class="action-btn btn-referral" onclick="showReferrals('Rosa Cruz')">Referrals</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Enhanced Update Records Form -->
        <div id="update-form" class="page-content" style="display: none;">
            <div class="update-form-container">
                <div class="update-form-header">
                    <div class="header-content">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h2 class="mb-2" style="font-size: 1.75rem; font-weight: 700;">
                                    <span id="patient-name">Patient Name</span> - Medical Records
                                </h2>
                                <p class="mb-0" style="opacity: 0.9; font-size: 1rem;">
                                    <span id="current-section-title">Mother's Clinical Record</span> • 
                                    Step <span id="current-step">1</span> of <span id="total-steps">11</span>
                                </p>
                            </div>
                            <div class="d-flex gap-2">
                                <button onclick="saveData()" class="btn btn-light btn-sm fw-bold">
                                    <i class="fas fa-save me-1"></i>Save
                                </button>
                                <button onclick="downloadData()" class="btn btn-light btn-sm fw-bold">
                                    <i class="fas fa-download me-1"></i>Download
                                </button>
                                <button onclick="printData()" class="btn btn-light btn-sm fw-bold">
                                    <i class="fas fa-print me-1"></i>Print
                                </button>
                                <button onclick="showDashboard()" class="btn btn-outline-light btn-sm fw-bold">
                                    <i class="fas fa-times me-1"></i>Exit
                                </button>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="form-progress">
                            <div id="progress-bar" class="form-progress-fill" style="width: 9%"></div>
                        </div>

                        <!-- Section navigation -->
                        <div id="section-tabs" class="section-navigation">
                            <!-- Tabs will be generated by JavaScript -->
                        </div>
                    </div>
                </div>

                <div class="form-body">
                    <div class="form-section-title">
                        <i id="section-icon" class="fas fa-user-nurse"></i>
                        <span id="section-title-text">Mother's Clinical Record</span>
                    </div>
                    <p class="form-section-description" id="section-description">
                        Complete the clinical information and medical history for the patient.
                    </p>

                    <div id="form-content">
                        <!-- Form content will be dynamically loaded here -->
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="form-navigation">
                    <button id="back-btn" onclick="previousStep()" class="nav-button nav-button-secondary">
                        <i class="fas fa-arrow-left"></i>Previous
                    </button>
                    
                    <div class="step-indicator">
                        <span><span id="step-counter">1</span> of <span id="step-total">11</span></span>
                        <div class="mini-progress">
                            <div class="mini-progress-fill" id="mini-progress" style="width: 9%"></div>
                        </div>
                    </div>

                    <button id="next-btn" onclick="nextStep()" class="nav-button nav-button-primary">
                        Next<i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Enhanced Labor Monitor Form -->
        <div id="monitor-form" class="page-content" style="display: none;">
            <!-- Header -->
            <div class="bg-white shadow-sm border-bottom mb-4">
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-color), #ff6b9d); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-heart-pulse text-white" style="font-size: 1.25rem;"></i>
                            </div>
                            <div>
                                <h2 class="h3 mb-1" style="color: #2d3748; font-weight: 700;">
                                    Digital Partograph - <span id="monitor-patient-name">Patient Name</span>
                                </h2>
                                <p class="text-muted mb-0">Labor Progress Monitoring System</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-center">
                                <div class="h5 mb-0" id="currentTime" style="color: var(--primary-color); font-weight: 600;"></div>
                                <small class="text-muted">Current Time</small>
                            </div>
                            <div class="px-3 py-2 rounded" style="background: rgba(214, 51, 132, 0.1); border: 1px solid rgba(214, 51, 132, 0.2);">
                                <span class="status-indicator"></span>
                                <small class="fw-medium" style="color: var(--primary-color);">System Active</small>
                            </div>
                            <button onclick="showDashboard()" class="btn btn-danger fw-semibold">
                                <i class="fas fa-home me-1"></i>Back to Dashboard
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- Alert Status Panel -->
                <div id="alertStatus" class="bg-white rounded shadow p-4 mb-4" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-bell text-danger" style="font-size: 1.25rem;"></i>
                            </div>
                            <div>
                                <h5 class="text-danger mb-1 fw-bold">ACTIVE ALERT</h5>
                                <p class="text-muted mb-0" id="alertStatusText">Critical intervention required</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Alert Time</small>
                            <div class="fw-bold" id="alertTime"></div>
                        </div>
                    </div>
                </div>

                <!-- Zone Status Indicator -->
                <div id="zoneStatus" class="bg-white rounded shadow p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div id="zoneIcon" class="bg-success bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-check-circle text-success" style="font-size: 1.25rem;"></i>
                            </div>
                            <div>
                                <h5 id="zoneTitle" class="text-success mb-1 fw-bold">GREEN ZONE</h5>
                                <p id="zoneDescription" class="text-muted mb-0">Labor progressing normally</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Red Zone Count</small>
                            <div class="fw-bold h4 mb-0" style="color: var(--primary-color);" id="redZoneCounter">0</div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Patient Information -->
                    <div class="col-12">
                        <div class="bg-white rounded shadow p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                    <i class="fas fa-user-injured text-primary" style="font-size: 1.25rem;"></i>
                                </div>
                                <h4 class="mb-0 fw-bold" style="color: #2d3748;">Patient Information</h4>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Patient Name</label>
                                    <input type="text" id="patientName" class="form-control form-control-lg" placeholder="Enter patient name" style="border: 2px solid #e5e7eb; border-radius: 10px;">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Age (Years)</label>
                                    <input type="number" id="patientAge" class="form-control form-control-lg" placeholder="Age" min="15" max="50" style="border: 2px solid #e5e7eb; border-radius: 10px;">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Labor Start Time</label>
                                    <input type="time" id="startTime" class="form-control form-control-lg" style="border: 2px solid #e5e7eb; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Input -->
                    <div class="col-12">
                        <div class="bg-white rounded shadow p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-plus-circle text-success" style="font-size: 1.25rem;"></i>
                                    </div>
                                    <h4 class="mb-0 fw-bold" style="color: #2d3748;">Add New Measurement</h4>
                                </div>
                                <div class="px-3 py-2 rounded" style="background: rgba(214, 51, 132, 0.1);">
                                    <small class="fw-medium" style="color: var(--primary-color);">Total Points: <span id="totalPoints">0</span></small>
                                </div>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-lg-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-clock me-2" style="color: #3b82f6;"></i>Time (Hours)
                                    </label>
                                    <input type="number" id="timeInput" min="0" max="12" step="0.5" placeholder="0.0" class="form-control form-control-lg text-center" style="border: 2px solid #e5e7eb; border-radius: 10px; font-size: 1.1rem;">
                                    <small class="text-muted">Hours from labor start</small>
                                </div>
                                
                                <div class="col-lg-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-ruler-vertical me-2" style="color: #10b981;"></i>Dilation (cm)
                                    </label>
                                    <input type="number" id="dilationInput" min="0" max="10" step="0.5" placeholder="0.0" class="form-control form-control-lg text-center" style="border: 2px solid #e5e7eb; border-radius: 10px; font-size: 1.1rem;">
                                    <small class="text-muted">Cervical dilation</small>
                                </div>
                                
                                <div class="col-lg-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-tag me-2" style="color: #8b5cf6;"></i>Measurement Type
                                    </label>
                                    <select id="measurementType" class="form-select form-select-lg" style="border: 2px solid #e5e7eb; border-radius: 10px;">
                                        <option value="actual">📈 Actual Progress</option>
                                        <option value="alert">⚠️ Alert Line</option>
                                        <option value="action">🚨 Action Line</option>
                                    </select>
                                </div>
                                
                                <div class="col-lg-3">
                                    <label class="form-label fw-semibold" style="opacity: 0;">Action</label>
                                    <button id="addButton" class="btn btn-lg w-100 fw-semibold" style="background: linear-gradient(135deg, var(--primary-color), #ff6b9d); color: white; border-radius: 10px; border: none;">
                                        <i class="fas fa-plus me-2"></i>Add Point
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="col-12">
                        <div class="bg-white rounded shadow p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 p-3 rounded me-3">
                                        <i class="fas fa-chart-line text-info" style="font-size: 1.25rem;"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 fw-bold" style="color: #2d3748;">Labor Progress Chart</h4>
                                        <p class="text-muted mb-0">Real-time cervical dilation monitoring</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2" style="width: 16px; height: 4px; background: #10b981; border-radius: 2px;"></div>
                                        <small class="fw-medium text-muted">Actual</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2" style="width: 16px; height: 4px; background: #f59e0b; border-radius: 2px;"></div>
                                        <small class="fw-medium text-muted">Alert</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2" style="width: 16px; height: 4px; background: #ef4444; border-radius: 2px;"></div>
                                        <small class="fw-medium text-muted">Action</small>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light rounded p-3" style="height: 500px;">
                                <canvas id="partographChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="col-12">
                        <div class="bg-white rounded shadow p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-warning bg-opacity-10 p-3 rounded me-3">
                                    <i class="fas fa-table text-warning" style="font-size: 1.25rem;"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 fw-bold" style="color: #2d3748;">Measurement History</h4>
                                    <p class="text-muted mb-0">Complete record of all measurements</p>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="background: #f8f9fa;">
                                        <tr>
                                            <th class="fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Time</th>
                                            <th class="fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Dilation</th>
                                            <th class="fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Type</th>
                                            <th class="fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #6b7280;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="measurementTable">
                                        <!-- Dynamic content -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Critical Alert Modal -->
            <div id="criticalAlertModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-body p-5 text-center">
                            <div class="bg-danger bg-opacity-10 p-4 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="text-danger fw-bold mb-4">CRITICAL ALERT</h3>
                            <p class="text-muted mb-4" id="alertMessage">Labor progress has reached the action line. Immediate medical intervention required.</p>
                            <div class="d-grid gap-2">
                                <button onclick="acknowledgeAlert()" class="btn btn-danger btn-lg fw-bold">
                                    <i class="fas fa-check me-2"></i>Acknowledge Alert
                                </button>
                                <button onclick="closeAlert()" class="btn btn-outline-secondary">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Referrals View -->
        <div id="referrals-view" class="page-content" style="display: none;">
            <div class="referral-container">
                <div class="referral-header">
                    <div class="header-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="mb-2" style="font-size: 1.75rem; font-weight: 700;">
                                    Patient Referral Form
                                </h2>
                                <p class="mb-0" style="opacity: 0.9; font-size: 1rem;">
                                    Creating referral for <span id="referral-patient-name" style="font-weight: 600;">Patient Name</span>
                                </p>
                            </div>
                            <button onclick="showDashboard()" class="btn btn-outline-light fw-bold">
                                <i class="fas fa-home me-2"></i>Back to Dashboard
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="referral-body">
                    <!-- Institution Information -->
                    <div class="referral-section">
                        <div class="referral-section-title">
                            <i class="fas fa-hospital"></i>
                            Institution Information
                        </div>
                        <div class="referral-form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Referring Hospital/Clinic *</label>
                                <input type="text" class="enhanced-form-control" placeholder="Enter the name of referring institution">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Institution Address</label>
                                <input type="text" class="enhanced-form-control" placeholder="Complete address of the institution">
                            </div>
                        </div>
                    </div>

                    <!-- Medical Information -->
                    <div class="referral-section">
                        <div class="referral-section-title">
                            <i class="fas fa-stethoscope"></i>
                            Medical Information
                        </div>
                        <div class="enhanced-form-group">
                            <label class="enhanced-form-label">Reason for Referral *</label>
                            <textarea class="enhanced-form-control" rows="4" placeholder="Provide detailed medical reason for referral, including current condition, symptoms, and urgency level..."></textarea>
                        </div>
                        <div class="referral-form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Primary Diagnosis</label>
                                <input type="text" class="enhanced-form-control" placeholder="Enter primary diagnosis">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Urgency Level</label>
                                <select class="enhanced-form-control">
                                    <option value="">Select urgency level</option>
                                    <option value="routine">Routine</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="emergency">Emergency</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Healthcare Provider Information -->
                    <div class="referral-section">
                        <div class="referral-section-title">
                            <i class="fas fa-user-md"></i>
                            Healthcare Provider Information
                        </div>
                        <div class="referral-form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Referring Doctor *</label>
                                <input type="text" class="enhanced-form-control" placeholder="Enter doctor's full name">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Medical License Number</label>
                                <input type="text" class="enhanced-form-control" placeholder="Enter license number">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Contact Number *</label>
                                <input type="tel" class="enhanced-form-control" placeholder="Enter contact number">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Email Address</label>
                                <input type="email" class="enhanced-form-control" placeholder="Enter email address">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="referral-section">
                        <div class="referral-section-title">
                            <i class="fas fa-clipboard-list"></i>
                            Additional Information
                        </div>
                        <div class="enhanced-form-group">
                            <label class="enhanced-form-label">Patient's Medical History</label>
                            <textarea class="enhanced-form-control" rows="3" placeholder="Brief summary of relevant medical history..."></textarea>
                        </div>
                        <div class="enhanced-form-group">
                            <label class="enhanced-form-label">Special Instructions & Notes</label>
                            <textarea class="enhanced-form-control" rows="3" placeholder="Any special instructions, patient preferences, or additional information..."></textarea>
                        </div>
                        <div class="referral-form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Preferred Appointment Date</label>
                                <input type="date" class="enhanced-form-control">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Patient Insurance</label>
                                <input type="text" class="enhanced-form-control" placeholder="Insurance provider or plan">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="referral-actions">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div>
                            <button class="referral-button referral-button-primary">
                                <i class="fas fa-paper-plane"></i>Submit Referral
                            </button>
                            <button class="referral-button referral-button-secondary">
                                <i class="fas fa-save"></i>Save as Draft
                            </button>
                        </div>
                        <div>
                            <button class="referral-button referral-button-secondary">
                                <i class="fas fa-print"></i>Print Form
                            </button>
                            <button class="referral-button referral-button-purple">
                                <i class="fas fa-envelope"></i>Email Referral
                            </button>
                        </div>
                    </div>
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
                        <i class="fas fa-user-plus me-2"></i>Add New Patient
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4">
                    <form id="addPatientForm">
                        <!-- Patient Information Section -->
                        <div class="section-header mb-3">
                            <h6 class="fw-bold text-secondary mb-3">Patient Information</h6>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="fullName" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="fullName" name="full_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="age" class="form-label fw-semibold">Age <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg border-0 bg-light" id="age" name="age" min="1" max="100" required>
                                    <span class="input-group-text bg-light border-0">
                                        <i class="fas fa-calendar-alt text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label fw-semibold">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-lg border-0 bg-light" id="contactNumber" name="contact_number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email (Optional)</label>
                                <input type="email" class="form-control form-control-lg border-0 bg-light" id="email" name="email">
                            </div>
                        </div>

                        <!-- Medical History Section -->
                        <div class="section-header mb-3">
                            <h6 class="fw-bold text-secondary mb-3">Medical History</h6>
                        </div>

                        <div class="mb-4">
                            <textarea class="form-control border-0 bg-light" id="medicalHistory" name="medical_history" rows="4" 
                                      placeholder="Any relevant medical history, allergies, or current medications"></textarea>
                        </div>

                        <!-- Emergency Contact Section -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="emergencyContactName" class="form-label fw-semibold">Emergency Contact Name</label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="emergencyContactName" name="emergency_contact_name">
                            </div>
                            <div class="col-md-6">
                                <label for="emergencyContactNumber" class="form-label fw-semibold">Emergency Contact Number</label>
                                <input type="tel" class="form-control form-control-lg border-0 bg-light" id="emergencyContactNumber" name="emergency_contact_number">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="button" class="btn btn-primary px-4" id="savePatientBtn">
                        <i class="fas fa-save me-2"></i>Save Patient
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
        <i class="fas fa-bars"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        // Global variables
        let currentStep = 0;
        let currentPatient = '';
        let formData = {};

        // Partograph variables
        let measurements = {
            actual: [],
            alert: [],
            action: []
        };
        let chart = null;
        let alertActive = false;
        let alertAcknowledged = false;
        let redZoneCount = 0;
        let currentZone = 'green';

        const formSections = [
            { id: 'clinical', title: "Mother's Clinical Record", icon: 'fas fa-user-nurse', description: 'Complete the clinical information and medical history for the patient.' },
            { id: 'pahintulot', title: 'Pahintulot sa Pangangalaga/Pag-aasikaso', icon: 'fas fa-file-contract', description: 'Consent form for patient care and treatment authorization.' },
            { id: 'partograph', title: 'Partograph', icon: 'fas fa-chart-line', description: 'Labor monitoring chart and progress tracking during delivery.' },
            { id: 'doctors_order', title: "Doctor's Order", icon: 'fas fa-user-md', description: 'Medical orders and prescriptions from attending physician.' },
            { id: 'history_exam', title: 'Comprehensive History and Physical Examination', icon: 'fas fa-clipboard-list', description: 'Detailed patient history and physical examination findings.' },
            { id: 'obstetrical', title: 'Obstetrical Record', icon: 'fas fa-baby', description: 'Pregnancy and delivery related medical information.' },
            { id: 'nurses_note', title: 'Nurses/Midwife Note', icon: 'fas fa-notes-medical', description: 'Nursing observations, care provided, and patient status updates.' },
            { id: 'medication', title: 'Medication Sheet', icon: 'fas fa-pills', description: 'Medication administration record and drug therapy monitoring.' },
            { id: 'laboratory', title: 'Laboratory', icon: 'fas fa-microscope', description: 'Laboratory test results and diagnostic findings.' },
            { id: 'postpartum', title: 'Postpartum Record', icon: 'fas fa-heart', description: 'Post-delivery care and recovery monitoring.' },
            { id: 'discharge', title: 'Discharge Plan', icon: 'fas fa-door-open', description: 'Discharge summary and follow-up care instructions.' }
        ];

        // Partograph Functions
        function updateCurrentTime() {
            const now = new Date();
            const timeElement = document.getElementById('currentTime');
            if (timeElement) {
                timeElement.textContent = now.toLocaleTimeString();
            }
        }

        function initChart() {
            const ctx = document.getElementById('partographChart');
            if (!ctx) return;

            try {
                chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [
                            {
                                label: 'Actual Progress',
                                data: [],
                                borderColor: '#10B981',
                                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                                borderWidth: 3,
                                pointRadius: 6,
                                pointHoverRadius: 8,
                                pointBackgroundColor: '#10B981',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                tension: 0.2,
                                fill: false
                            },
                            {
                                label: 'Alert Line',
                                data: [],
                                borderColor: '#F59E0B',
                                backgroundColor: 'rgba(245, 158, 11, 0.1)',
                                borderWidth: 3,
                                pointRadius: 5,
                                pointBackgroundColor: '#F59E0B',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                borderDash: [8, 4],
                                tension: 0.1,
                                fill: false
                            },
                            {
                                label: 'Action Line',
                                data: [],
                                borderColor: '#EF4444',
                                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                                borderWidth: 3,
                                pointRadius: 5,
                                pointBackgroundColor: '#EF4444',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                borderDash: [12, 6],
                                tension: 0.1,
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                borderColor: '#374151',
                                borderWidth: 1,
                                cornerRadius: 8
                            }
                        },
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom',
                                min: 0,
                                max: 12,
                                title: {
                                    display: true,
                                    text: 'Time (hours from start of labor)',
                                    font: { size: 14, weight: '600' },
                                    color: '#374151'
                                },
                                grid: {
                                    display: true,
                                    color: 'rgba(156, 163, 175, 0.3)'
                                },
                                ticks: {
                                    stepSize: 1,
                                    color: '#6B7280',
                                    font: { size: 12 }
                                }
                            },
                            y: {
                                min: 0,
                                max: 10,
                                title: {
                                    display: true,
                                    text: 'Cervical Dilation (cm)',
                                    font: { size: 14, weight: '600' },
                                    color: '#374151'
                                },
                                grid: {
                                    display: true,
                                    color: 'rgba(156, 163, 175, 0.3)'
                                },
                                ticks: {
                                    stepSize: 1,
                                    color: '#6B7280',
                                    font: { size: 12 }
                                }
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error initializing chart:', error);
            }
        }

        function addMeasurement() {
            const timeInput = document.getElementById('timeInput');
            const dilationInput = document.getElementById('dilationInput');
            const typeInput = document.getElementById('measurementType');

            if (!timeInput || !dilationInput || !typeInput) {
                showNotification('Form elements not found', 'danger');
                return;
            }

            const timeValue = timeInput.value.trim();
            const dilationValue = dilationInput.value.trim();
            const type = typeInput.value;

            if (!timeValue || !dilationValue) {
                showNotification('Please enter both time and dilation values', 'warning');
                return;
            }

            const time = parseFloat(timeValue);
            const dilation = parseFloat(dilationValue);

            if (isNaN(time) || isNaN(dilation)) {
                showNotification('Please enter valid numbers', 'warning');
                return;
            }

            if (time < 0 || time > 12) {
                showNotification('Time must be between 0 and 12 hours', 'warning');
                return;
            }

            if (dilation < 0 || dilation > 10) {
                showNotification('Dilation must be between 0 and 10 cm', 'warning');
                return;
            }

            const newPoint = { x: time, y: dilation, timestamp: new Date().toLocaleString() };
            measurements[type].push(newPoint);
            measurements[type].sort((a, b) => a.x - b.x);

            checkCriticalConditions(type, time, dilation);
            updateChart();
            updateTable();
            updateTotalPoints();

            timeInput.value = '';
            dilationInput.value = '';

            showNotification('Measurement added successfully!', 'success');
        }

        function checkCriticalConditions(measurementType, time, dilation) {
            if (measurementType !== 'actual') return;

            const zone = determineZone(dilation, time);
            const alertLineValue = getAlertLineValueAtTime(time);
            const actionLineValue = getActionLineValueAtTime(time);
            
            updateZoneStatus(zone, dilation, time, alertLineValue, actionLineValue);

            if (zone === 'red') {
                redZoneCount++;
                if (redZoneCount === 1) {
                    showNotification('🔴 ENTERED RED ZONE - First dangerous measurement detected', 'danger');
                } else if (redZoneCount === 2) {
                    showNotification('🔴 RED ZONE - Second consecutive dangerous measurement!', 'danger');
                } else if (redZoneCount >= 3 && !alertActive) {
                    triggerCriticalAlert(time, dilation, actionLineValue, redZoneCount);
                }
            } else if (zone === 'yellow') {
                if (redZoneCount > 0) {
                    showNotification('🟡 YELLOW ZONE - Caution: Labor progress slowing but improved from red zone', 'warning');
                    redZoneCount = 0;
                } else {
                    showNotification('🟡 YELLOW ZONE - Caution: Monitor labor progress closely', 'warning');
                }
            } else if (zone === 'green') {
                if (redZoneCount > 0 || currentZone !== 'green') {
                    showNotification('🟢 GREEN ZONE - Labor progressing normally', 'success');
                    redZoneCount = 0;
                }
            }

            currentZone = zone;
        }

        function updateZoneStatus(zone, dilation, time, alertLineValue, actionLineValue) {
            const zoneIcon = document.getElementById('zoneIcon');
            const zoneTitle = document.getElementById('zoneTitle');
            const zoneDescription = document.getElementById('zoneDescription');
            const redZoneCounter = document.getElementById('redZoneCounter');

            if (redZoneCounter) {
                redZoneCounter.textContent = redZoneCount;
            }

            if (!zoneIcon || !zoneTitle || !zoneDescription) return;

            if (zone === 'green') {
                zoneIcon.className = 'bg-success bg-opacity-10 p-3 rounded me-3';
                zoneIcon.innerHTML = '<i class="fas fa-check-circle text-success" style="font-size: 1.25rem;"></i>';
                zoneTitle.textContent = 'GREEN ZONE';
                zoneTitle.className = 'text-success mb-1 fw-bold';
                zoneDescription.textContent = `Labor progressing normally (${dilation}cm at ${time}h)`;
            } else if (zone === 'yellow') {
                zoneIcon.className = 'bg-warning bg-opacity-10 p-3 rounded me-3';
                zoneIcon.innerHTML = '<i class="fas fa-exclamation-triangle text-warning" style="font-size: 1.25rem;"></i>';
                zoneTitle.textContent = 'YELLOW ZONE';
                zoneTitle.className = 'text-warning mb-1 fw-bold';
                zoneDescription.textContent = `Caution: Labor progress slowing (${dilation}cm at ${time}h)`;
            } else if (zone === 'red') {
                zoneIcon.className = 'bg-danger bg-opacity-10 p-3 rounded me-3';
                zoneIcon.innerHTML = '<i class="fas fa-exclamation-circle text-danger" style="font-size: 1.25rem;"></i>';
                zoneTitle.textContent = 'RED ZONE';
                zoneTitle.className = 'text-danger mb-1 fw-bold';
                zoneDescription.textContent = `DANGER: Prolonged labor (${dilation}cm at ${time}h) - Measurement #${redZoneCount}`;
            }
        }

        function getAlertLineValueAtTime(time) {
            if (time <= 0) return 4;
            if (time >= 8) return 10;
            const slope = (10 - 4) / (8 - 0);
            return 4 + (slope * time);
        }

        function getActionLineValueAtTime(time) {
            if (time <= 0) return 4;
            if (time >= 12) return 10;
            const slope = (10 - 4) / (12 - 0);
            return 4 + (slope * time);
        }

        function determineZone(dilation, time) {
            const alertLineValue = getAlertLineValueAtTime(time);
            const actionLineValue = getActionLineValueAtTime(time);
            
            if (dilation > alertLineValue) {
                return 'green';
            } else if (dilation > actionLineValue) {
                return 'yellow';
            } else {
                return 'red';
            }
        }

        function triggerCriticalAlert(time, actualDilation, actionLineValue, consecutiveRedCount) {
            alertActive = true;
            alertAcknowledged = false;
            
            const alertTime = new Date().toLocaleString();
            
            const modal = document.getElementById('criticalAlertModal');
            const message = document.getElementById('alertMessage');
            
            message.innerHTML = `
                <strong>🚨 LABOR EMERGENCY - RED ZONE ALERT 🚨</strong><br><br>
                <div class="text-start bg-danger bg-opacity-10 p-4 rounded mb-4 border border-danger">
                    <div class="fw-semibold mb-2 text-danger">⚠️ CRITICAL SITUATION DETECTED:</div>
                    <div>• <strong>Time:</strong> ${time} hours from labor start</div>
                    <div>• <strong>Actual dilation:</strong> ${actualDilation} cm</div>
                    <div>• <strong>Red zone threshold:</strong> ${actionLineValue.toFixed(1)} cm</div>
                    <div class="text-danger fw-bold mt-3">
                        🔴 ${consecutiveRedCount} CONSECUTIVE MEASUREMENTS IN RED ZONE
                    </div>
                </div>
                <div class="text-start bg-warning bg-opacity-10 p-4 rounded mb-4 border border-warning">
                    <strong class="text-danger">⚡ IMMEDIATE ACTIONS REQUIRED:</strong><br><br>
                    <div class="space-y-1">
                        <div>🏥 <strong>1. CESAREAN DELIVERY - Consider immediately</strong></div>
                        <div>🚑 <strong>2. HOSPITAL TRANSFER - If not in tertiary facility</strong></div>
                        <div>📊 <strong>3. CONTINUOUS FETAL MONITORING - Start now</strong></div>
                        <div>👨‍⚕️ <strong>4. SENIOR OBSTETRICIAN - Call immediately</strong></div>
                        <div>📝 <strong>5. DOCUMENT ALL INTERVENTIONS</strong></div>
                    </div>
                </div>
            `;
            
            const modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
            
            const statusPanel = document.getElementById('alertStatus');
            const statusText = document.getElementById('alertStatusText');
            const alertTimeElement = document.getElementById('alertTime');
            
            statusText.textContent = `🚨 RED ZONE EMERGENCY: ${consecutiveRedCount} consecutive dangerous measurements - CRITICAL INTERVENTION REQUIRED`;
            alertTimeElement.textContent = alertTime;
            statusPanel.style.display = 'block';
        }

        function acknowledgeAlert() {
            alertAcknowledged = true;
            const modal = bootstrap.Modal.getInstance(document.getElementById('criticalAlertModal'));
            modal.hide();
            showNotification('Critical alert acknowledged. Continue monitoring patient closely.', 'warning');
        }

        function closeAlert() {
            if (!alertAcknowledged) {
                showNotification('Please acknowledge the alert first for patient safety', 'danger');
                return;
            }
            const modal = bootstrap.Modal.getInstance(document.getElementById('criticalAlertModal'));
            modal.hide();
        }

        function updateChart() {
            if (!chart) return;
            try {
                chart.data.datasets[0].data = measurements.actual;
                chart.data.datasets[1].data = measurements.alert;
                chart.data.datasets[2].data = measurements.action;
                chart.update();
            } catch (error) {
                console.error('Error updating chart:', error);
            }
        }

        function updateTable() {
            const tableBody = document.getElementById('measurementTable');
            if (!tableBody) return;

            tableBody.innerHTML = '';

            const allMeasurements = [];
            Object.keys(measurements).forEach(type => {
                measurements[type].forEach(point => {
                    allMeasurements.push({
                        time: point.x,
                        dilation: point.y,
                        type: type,
                        timestamp: point.timestamp
                    });
                });
            });

            allMeasurements.sort((a, b) => a.time - b.time);

            if (allMeasurements.length === 0) {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td colspan="4" class="text-center py-4 text-muted">
                        No measurements recorded yet
                    </td>
                `;
                return;
            }

            allMeasurements.forEach(measurement => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td class="fw-medium">${measurement.time}h</td>
                    <td class="fw-medium">${measurement.dilation} cm</td>
                    <td>
                        <span class="badge ${getTypeStyle(measurement.type)}">
                            ${measurement.type.charAt(0).toUpperCase() + measurement.type.slice(1)}
                        </span>
                    </td>
                    <td>
                        <button onclick="removeMeasurement('${measurement.type}', ${measurement.time}, ${measurement.dilation})" 
                                class="btn btn-sm btn-outline-danger">
                            Remove
                        </button>
                    </td>
                `;
            });
        }

        function getTypeStyle(type) {
            const styles = {
                actual: 'bg-success',
                alert: 'bg-warning',
                action: 'bg-danger'
            };
            return styles[type] || 'bg-secondary';
        }

        function updateTotalPoints() {
            const total = Object.values(measurements).reduce((sum, arr) => sum + arr.length, 0);
            const totalElement = document.getElementById('totalPoints');
            if (totalElement) {
                totalElement.textContent = total;
            }
        }

        function removeMeasurement(type, time, dilation) {
            measurements[type] = measurements[type].filter(point => 
                !(Math.abs(point.x - time) < 0.001 && Math.abs(point.y - dilation) < 0.001)
            );
            updateChart();
            updateTable();
            updateTotalPoints();
            showNotification('Measurement removed', 'success');
        }

        // Main application functions
        function showDashboard() {
            document.getElementById('dashboard-view').style.display = 'block';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
        }

        function showUpdateForm(patientName) {
            currentPatient = patientName;
            currentStep = 0;
            document.getElementById('patient-name').textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'block';
            
            generateSectionTabs();
            updateFormContent();
            updateProgressBar();
            updateNavigationButtons();
        }

        function showMonitor(patientName) {
            document.getElementById('monitor-patient-name').textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'block';

            // Initialize partograph when monitor is shown
            setTimeout(() => {
                initChart();
                updateCurrentTime();
                setInterval(updateCurrentTime, 1000);
                
                // Set default start time
                const now = new Date();
                const timeString = now.getHours().toString().padStart(2, '0') + ':' + 
                                  now.getMinutes().toString().padStart(2, '0');
                const startTimeInput = document.getElementById('startTime');
                if (startTimeInput) {
                    startTimeInput.value = timeString;
                }
                
                updateTotalPoints();
                updateTable();
                
                // Add event listener to add button
                const addButton = document.getElementById('addButton');
                if (addButton) {
                    addButton.removeEventListener('click', addMeasurement); // Remove existing listener
                    addButton.addEventListener('click', addMeasurement);
                }
            }, 100);
        }

        function showReferrals(patientName) {
            document.getElementById('referral-patient-name').textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'block';
        }

        function generateSectionTabs() {
            const tabsContainer = document.getElementById('section-tabs');
            tabsContainer.innerHTML = '';
            
            formSections.forEach((section, index) => {
                const tab = document.createElement('div');
                const isActive = currentStep === index;
                tab.className = `section-nav-item ${isActive ? 'active' : ''}`;
                tab.onclick = () => goToStep(index);
                tab.innerHTML = `<i class="${section.icon}"></i>${section.title}`;
                tabsContainer.appendChild(tab);
            });
        }

        function updateFormContent() {
            const section = formSections[currentStep];
            document.getElementById('current-section-title').textContent = section.title;
            document.getElementById('section-title-text').textContent = section.title;
            document.getElementById('section-description').textContent = section.description;
            document.getElementById('section-icon').className = section.icon;
            document.getElementById('current-step').textContent = currentStep + 1;
            document.getElementById('total-steps').textContent = formSections.length;
            document.getElementById('step-counter').textContent = currentStep + 1;
            document.getElementById('step-total').textContent = formSections.length;
            
            const formContent = document.getElementById('form-content');
            formContent.innerHTML = getFormSectionHTML(section.id);
        }

        function getFormSectionHTML(sectionId) {
            switch (sectionId) {
                case 'clinical':
                    return `
                        <div class="form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Name of Patient</label>
                                <input type="text" class="enhanced-form-control" id="clinical-name">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Age</label>
                                <input type="number" class="enhanced-form-control" id="clinical-age">
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Address</label>
                                <input type="text" class="enhanced-form-control" id="clinical-address">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Date Admitted</label>
                                <input type="datetime-local" class="enhanced-form-control" id="clinical-admitted">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Date Discharge</label>
                                <input type="datetime-local" class="enhanced-form-control" id="clinical-discharge">
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Admitting Diagnosis</label>
                                <textarea class="enhanced-form-control" rows="3" id="clinical-admitting-diagnosis"></textarea>
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Final Diagnosis</label>
                                <textarea class="enhanced-form-control" rows="3" id="clinical-final-diagnosis"></textarea>
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Attending Midwife</label>
                                <input type="text" class="enhanced-form-control" id="clinical-midwife">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Discharged Status</label>
                                <div style="margin-top: 0.75rem;">
                                    <div class="form-check mb-2">
                                        <input type="radio" name="dischargedStatus" value="Improved" class="form-check-input" id="status1">
                                        <label class="form-check-label fw-medium" for="status1">Improved</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="radio" name="dischargedStatus" value="Absconded" class="form-check-input" id="status2">
                                        <label class="form-check-label fw-medium" for="status2">Absconded</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="radio" name="dischargedStatus" value="Home Against Advice" class="form-check-input" id="status3">
                                        <label class="form-check-label fw-medium" for="status3">Home Against Advice</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="dischargedStatus" value="Transferred" class="form-check-input" id="status4">
                                        <label class="form-check-label fw-medium" for="status4">Transferred</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                case 'pahintulot':
                    return `
                        <div class="form-grid">
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Patient Photo</label>
                                <div style="border: 2px dashed #d1d5db; border-radius: 12px; padding: 2rem; text-align: center; background: #f9fafb;">
                                    <i class="fas fa-camera fa-3x text-muted mb-3" style="color: var(--primary-color); opacity: 0.6;"></i>
                                    <p class="text-muted mb-3 fw-medium">Upload patient photo</p>
                                    <input type="file" accept="image/*" class="enhanced-form-control">
                                </div>
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Consent Details</label>
                                <textarea class="enhanced-form-control" rows="5" placeholder="Pahintulot sa pangangalaga/pag-aasikaso details..."></textarea>
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Guardian Name</label>
                                <input type="text" class="enhanced-form-control">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Relationship</label>
                                <input type="text" class="enhanced-form-control">
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Date of Consent</label>
                                <input type="date" class="enhanced-form-control">
                            </div>
                        </div>
                    `;

                case 'nurses_note':
                    return `
                        <div class="form-grid">
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Date & Time</label>
                                <input type="datetime-local" class="enhanced-form-control">
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Standard Nursing Notes</label>
                                <div class="checkbox-group">
                                    ${[
                                        "Admitted Ambulatory woman accompanied by her husband",
                                        "Consent secured and signed", 
                                        "Vitals signs taken and recorded",
                                        "BOW ruptured clearly",
                                        "Advised proper bearing down / walking exercise",
                                        "Delivered via NSVD, Cephalic Baby, A/S OF 8/9",
                                        "Placenta out completely",
                                        "Clotted blood evacuated",
                                        "Cold compress applied",
                                        "Uterus contracted",
                                        "Medicine given",
                                        "Transfer to ward for proper management",
                                        "Endorse"
                                    ].map((note, index) => `
                                        <div class="enhanced-checkbox">
                                            <input type="checkbox" id="note${index + 1}">
                                            <label for="note${index + 1}">${note}</label>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                            <div class="enhanced-form-group">
                                <label class="enhanced-form-label">Birth Weight</label>
                                <input type="text" class="enhanced-form-control" placeholder="Enter birth weight">
                            </div>
                            <div class="enhanced-form-group" style="grid-column: 1 / -1;">
                                <label class="enhanced-form-label">Additional Notes</label>
                                <textarea class="enhanced-form-control" rows="4" placeholder="Enter additional nursing notes..."></textarea>
                            </div>
                        </div>
                    `;

                default:
                    return `
                        <div style="background: #f9fafb; border: 2px dashed #d1d5db; border-radius: 12px; padding: 3rem; text-align: center;">
                            <i class="fas fa-construction fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted mb-3">Form Section In Development</h5>
                            <p class="text-muted mb-4">The ${formSections.find(s => s.id === sectionId)?.title} section will include all relevant fields based on clinic requirements.</p>
                            <div class="enhanced-form-group" style="max-width: 500px; margin: 0 auto; text-align: left;">
                                <label class="enhanced-form-label">Notes & Comments</label>
                                <textarea class="enhanced-form-control" rows="4" placeholder="Enter additional notes for this section..."></textarea>
                            </div>
                        </div>
                    `;
            }
        }

        function updateProgressBar() {
            const progressBar = document.getElementById('progress-bar');
            const miniProgress = document.getElementById('mini-progress');
            const percentage = ((currentStep + 1) / formSections.length) * 100;
            progressBar.style.width = percentage + '%';
            miniProgress.style.width = percentage + '%';
        }

        function updateNavigationButtons() {
            const backBtn = document.getElementById('back-btn');
            const nextBtn = document.getElementById('next-btn');
            
            backBtn.disabled = currentStep === 0;
            nextBtn.disabled = currentStep === formSections.length - 1;
        }

        function goToStep(stepIndex) {
            currentStep = stepIndex;
            generateSectionTabs();
            updateFormContent();
            updateProgressBar();
            updateNavigationButtons();
        }

        function nextStep() {
            if (currentStep < formSections.length - 1) {
                currentStep++;
                generateSectionTabs();
                updateFormContent();
                updateProgressBar();
                updateNavigationButtons();
            }
        }

        function previousStep() {
            if (currentStep > 0) {
                currentStep--;
                generateSectionTabs();
                updateFormContent();
                updateProgressBar();
                updateNavigationButtons();
            }
        }

        function saveData() {
            const currentSection = formSections[currentStep].id;
            const formElements = document.querySelectorAll('#form-content input, #form-content textarea, #form-content select');
            
            if (!formData[currentPatient]) {
                formData[currentPatient] = {};
            }
            
            if (!formData[currentPatient][currentSection]) {
                formData[currentPatient][currentSection] = {};
            }
            
            formElements.forEach(element => {
                if (element.id) {
                    formData[currentPatient][currentSection][element.id] = element.value;
                } else if (element.name) {
                    formData[currentPatient][currentSection][element.name] = element.value;
                } else if (element.type === 'checkbox') {
                    const label = element.closest('.enhanced-checkbox')?.querySelector('label')?.textContent?.trim();
                    if (label) {
                        formData[currentPatient][currentSection][label] = element.checked;
                    }
                }
            });
            
            showNotification('Data saved successfully! All changes have been preserved.', 'success');
        }

        function downloadData() {
            if (formData[currentPatient]) {
                const dataStr = JSON.stringify(formData[currentPatient], null, 2);
                const dataBlob = new Blob([dataStr], {type: 'application/json'});
                const url = URL.createObjectURL(dataBlob);
                const link = document.createElement('a');
                link.href = url;
                link.download = `${currentPatient.replace(/\s+/g, '_')}_medical_records.json`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(url);
                showNotification('Medical records downloaded successfully!', 'success');
            } else {
                showNotification('No data available for download. Please save some information first.', 'warning');
            }
        }

        function printData() {
            window.print();
        }

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                opacity: 0;
                transform: translateX(100%);
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                border-radius: 10px;
                border: none;
            `;
            
            const icons = {
                'success': 'fas fa-check-circle',
                'info': 'fas fa-info-circle',
                'warning': 'fas fa-exclamation-triangle',
                'danger': 'fas fa-times-circle'
            };
            
            notification.innerHTML = `
                <i class="${icons[type] || icons.info} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '1';
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }

            // Patient search functionality
            const searchInput = document.getElementById('patientSearchInput');
            const tableBody = document.getElementById('patientsTableBody');
            const rows = tableBody.querySelectorAll('tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                rows.forEach(row => {
                    const patientId = row.querySelector('.patient-id').textContent.toLowerCase();
                    const patientName = row.querySelector('.patient-name').textContent.toLowerCase();
                    const contact = row.cells[3].textContent.toLowerCase();
                    
                    if (patientId.includes(searchTerm) || 
                        patientName.includes(searchTerm) || 
                        contact.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Handle Save Patient
            const savePatientBtn = document.getElementById('savePatientBtn');
            if (savePatientBtn) {
                savePatientBtn.addEventListener('click', function() {
                    const form = document.getElementById('addPatientForm');
                    const formData = new FormData(form);
                    
                    const requiredFields = ['full_name', 'age', 'contact_number'];
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (!input.value.trim()) {
                            input.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            input.classList.remove('is-invalid');
                            input.classList.add('is-valid');
                        }
                    });
                    
                    if (!isValid) {
                        showNotification('Please fill in all required fields', 'warning');
                        return;
                    }
                    
                    const originalText = savePatientBtn.innerHTML;
                    savePatientBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
                    savePatientBtn.disabled = true;
                    
                    setTimeout(() => {
                        const patientName = formData.get('full_name');
                        const age = formData.get('age');
                        const contact = formData.get('contact_number');
                        
                        const newPatientId = `P-${String(tableBody.children.length + 1).padStart(3, '0')}`;
                        const newRow = document.createElement('tr');
                        newRow.setAttribute('data-patient-id', newPatientId);
                        newRow.innerHTML = `
                            <td class="patient-id">${newPatientId}</td>
                            <td class="patient-name">${patientName}</td>
                            <td>${age}</td>
                            <td>${contact}</td>
                            <td>Today</td>
                            <td>
                                <span class="status-badge status-active">ACTIVE</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn btn-edit" onclick="showUpdateForm('${patientName}')">Update Records</button>
                                    <button class="action-btn btn-referral" onclick="showReferrals('${patientName}')">Referrals</button>
                                </div>
                            </td>
                        `;
                        
                        tableBody.insertBefore(newRow, tableBody.firstChild);
                        
                        newRow.style.backgroundColor = '#d4edda';
                        setTimeout(() => {
                            newRow.style.backgroundColor = '';
                        }, 3000);
                        
                        showNotification(`Patient ${patientName} added successfully!`, 'success');
                        
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addPatientModal'));
                        modal.hide();
                        
                        savePatientBtn.innerHTML = originalText;
                        savePatientBtn.disabled = false;
                        
                    }, 2000);
                });
            }

            // Add keyboard support for partograph inputs
            document.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && (e.target.id === 'timeInput' || e.target.id === 'dilationInput')) {
                    addMeasurement();
                }
            });

            // Initialize the application
            showDashboard();
        });
    </script>
</body>
</html><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/dashboard/patients.blade.php ENDPATH**/ ?>