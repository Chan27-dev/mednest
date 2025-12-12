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
            font-size: 0.8125rem; /* reduced from 0.875rem */
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
            font-size: 0.8125rem; /* reduced from 0.875rem */
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/>',
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/>',
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

        /* PATIENT PROFILE WITH 11 TABS - FIXED LAYOUT */
        #patient-profile {
            display: none;
            background: #f8f9fa;
            padding: 0;
        }

        #patient-profile .container-fluid {
            padding: 0;
        }

        #patient-profile .bg-white {
            padding: 1rem 2rem;
            border-bottom: 2px solid #dee2e6;
        }

        #patient-profile #profile-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
        }

        #patient-profile #profile-name {
            color: #d63384;
            font-weight: 700;
        }

        #patient-profile .nav-tabs {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border: none;
            padding: 0 1rem;
        }

        #patient-profile .nav-tabs .nav-item {
            white-space: nowrap;
        }

        #patient-profile .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            border-radius: 0;
            color: #6c757d;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            transition: all 0.3s;
        }

        #patient-profile .nav-tabs .nav-link.active {
            border-bottom: 3px solid #d63384;
            color: #333;
        }

        #patient-profile .tab-content {
            background: white;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            min-height: 65vh;
            padding: 2rem;
        }

        #patient-profile .tab-pane {
            display: none;
        }

        #patient-profile .tab-pane.fade.show {
            display: block;
        }

        /* Specific styles for each tab content */
        #patient-profile #clinical {
            display: block;
        }

        #patient-profile .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        #patient-profile .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 0.95rem;
        }

        #patient-profile .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
            outline: none;
        }

        #patient-profile .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        #patient-profile .btn-primary {
            background: linear-gradient(135deg, #d63384, #ff6b9d);
            color: white;
            border: none;
        }

        #patient-profile .btn-primary:hover {
            background: linear-gradient(135deg, #c2185b, #d63384);
            transform: translateY(-1px);
        }

        #patient-profile .btn-success {
            background: #10b981;
            color: white;
            border: none;
        }

        #patient-profile .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        #patient-profile .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
        }

        #patient-profile .btn-danger:hover {
            background: #c82333;
            transform: translateY(-1px);
        }

        #patient-profile .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 10px;
        }

        #patient-profile .badge.bg-success {
            background-color: #d4edda;
            color: #155724;
        }

        #patient-profile .badge.bg-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        #patient-profile .badge.bg-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        #patient-profile .accordion-button {
            background: #f8f9fa;
            color: #333;
            font-weight: 500;
            padding: 1rem;
            border: 1px solid #e1e5e9;
            border-radius: 8px;
            transition: all 0.3s;
        }

        #patient-profile .accordion-button:hover {
            background: #e2e6ea;
        }

        #patient-profile .accordion-button:not(.collapsed) {
            background: #e2e6ea;
            color: #333;
        }

        #patient-profile .accordion-body {
            padding: 1rem;
            background: #f9fafb;
            border-radius: 0 0 8px 8px;
        }

        #patient-profile .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        #patient-profile .table th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 0.8125rem; /* reduced from 0.875rem */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #e1e5e9;
            text-align: left;
        }

        #patient-profile .table td {
            padding: 1rem 1.5rem;
            border: none;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
            font-size: 0.8125rem; /* reduced from 0.875rem */
        }

        #patient-profile .table tr:hover {
            background-color: #f8f9fa;
        }

        /* LABORATORY ORDER MODAL */
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #d63384, #ff6b9d);
            color: white;
            border: none;
            position: relative;
        }

        .modal-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/>',
            opacity: 0.3;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.25rem;
            margin: 0;
        }

        .modal-body {
            padding: 2rem;
        }

        .accordion-button {
            background: #f8f9fa;
            color: #333;
            font-weight: 500;
            padding: 1rem;
            border: 1px solid #e1e5e9;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .accordion-button:hover {
            background: #e2e6ea;
        }

        .accordion-button:not(.collapsed) {
            background: #e2e6ea;
            color: #333;
        }

        .accordion-body {
            padding: 1rem;
            background: #f9fafb;
            border-radius: 0 0 8px 8px;
        }

        /* General improvements */
        .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding: 0 0.5rem;
            }

            .modal-dialog {
                max-width: 90%;
                margin: 1.75rem auto;
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
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.patients') }}">
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
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" data-action="logout">
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
                    <div class="d-flex align-items-center gap-3">
                        <div class="patient-search" style="min-width: 320px;">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control" id="patientSearchInput" placeholder="Search patients by name, ID, or contact...">
                        </div>
                        <div class="branch-filter" style="min-width: 200px;">
                            <label for="branchFilterSelect" class="form-label visually-hidden">Branch</label>
                            <select id="branchFilterSelect" class="form-select">
                                <option value="all">All Branches</option>
                                <option value="Sto Domingo">Sto Domingo</option>
                                <option value="Daraga">Daraga</option>
                                <option value="Bacacay">Bacacay</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Patients Table -->
                <div class="patients-table">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Full Name</th>
                                <th>Date of Birth</th>
                                <th>Blood Type</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Medical History</th>
                                <th>Emergency Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="patientsTableBody">
                            @forelse($patients as $patient)
                                <tr data-patient-id="{{ $patient->id }}">
                                    <td class="patient-id">P-{{ str_pad($patient->id, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td class="patient-name">{{ $patient->full_name }}</td>
                                    {{-- Ensure date_of_birth is cast to a date in your Patient model --}}
                                    <td>
                                        @if($patient->date_of_birth)
                                            {{ $patient->date_of_birth->format('M d, Y') }}
                                            ({{ $patient->date_of_birth->age }} years)
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $patient->blood_type ?? 'N/A' }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->medical_history ?? 'None' }}</td>
                                    <td>{{ $patient->emergency_contact_name }} ({{ $patient->emergency_contact_phone }})</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn btn-view" onclick="showUpdateForm('{{ $patient->full_name }}')">View Records</button>
                                            <button class="action-btn btn-monitor" onclick="showMonitor('{{ $patient->full_name }}')">Monitor</button>
                                            <button class="action-btn btn-referral" onclick="showReferrals('{{ $patient->full_name }}')">Referrals</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">No Patients Found</h5>
                                        <p class="text-muted">There are currently no patient records in the database.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            {{ $patients->links() }}
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
                        @csrf
                        <!-- Patient Information Section -->
                        <div class="section-header mb-3">
                            <h6 class="fw-bold text-secondary mb-3">Patient Information</h6>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="last_name" name="last_name" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label fw-semibold">Date of Birth <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-lg border-0 bg-light" id="date_of_birth" name="date_of_birth" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_number" class="form-label fw-semibold">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-lg border-0 bg-light" id="contact_number" name="contact_number" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label for="address" class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="address" name="address" placeholder="Street, Barangay, City/Province" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
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
                                <label for="emergency_contact_name" class="form-label fw-semibold">Emergency Contact Name</label>
                                <input type="text" class="form-control form-control-lg border-0 bg-light" id="emergency_contact_name" name="emergency_contact_name">
                            </div>
                            <div class="col-md-6">
                                <label for="emergency_contact_number" class="form-label fw-semibold">Emergency Contact Number</label>
                                <input type="tel" class="form-control form-control-lg border-0 bg-light" id="emergency_contact_number" name="emergency_contact_number">
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

    <!-- PATIENT PROFILE WITH 11 TABS - FIXED LAYOUT -->
    <div id="patient-profile" class="page-content" style="display:none; background: #f8f9fa; padding: 0;">
        <!-- Header Section -->
        <div class="bg-white border-bottom" style="padding: 1rem 2rem;">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <button onclick="backToList()" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </button>
                <h4 class="mb-0" id="profile-title">
                    <span id="profile-name" style="color: #d63384; font-weight: 700;">Patient Name</span>
                    <span style="color: #6c757d; font-weight: 500; font-size: 1rem; margin-left: 0.5rem;">- Complete Medical Record</span>
                </h4>
            </div>
        </div>

        <!-- SCROLLABLE TABS -->
        <div style="background: white; border-bottom: 2px solid #dee2e6; overflow-x: auto; -webkit-overflow-scrolling: touch; padding: 0;">
            <ul class="nav nav-tabs mb-0" id="recordTabs" style="min-width: max-content; border: none; padding: 0; margin: 0;">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#clinical" style="border: none; border-bottom: 3px solid #d63384; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-user-nurse me-2"></i>Clinical
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#consent" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-file-contract me-2"></i>Consent
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#partograph" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-chart-line me-2"></i>Partograph
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#doctors" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-user-md me-2"></i>Doctor's Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#history" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-clipboard-list me-2"></i>History
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#obstetrical" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-baby me-2"></i>Obstetrical
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#nurses" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-notes-medical me-2"></i>Nurses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#medication" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-pills me-2"></i>Medication
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#laboratory" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-microscope me-2"></i>Laboratory
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#postpartum" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-heart me-2"></i>Postpartum
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#discharge" style="border: none; border-bottom: 3px solid transparent; border-radius: 0; color: #6c757d; font-weight: 600; padding: 0.75rem 1.25rem; white-space: nowrap;">
                        <i class="fas fa-door-open me-2"></i>Discharge
                    </a>
                </li>
            </ul>
        </div>

        <!-- TAB CONTENT -->
        <div class="tab-content bg-white" style="min-height: 60vh; padding: 1.5rem 2rem;">
            <!-- CLINICAL TAB -->
            <div class="tab-pane fade show active" id="clinical">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Mother's Clinical Record</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Complete the clinical information and medical history for the patient.</p>
                <form id="clinicalForm">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Obstetric History</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Previous pregnancies, deliveries, complications..."></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Current Pregnancy Details</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="LMP, EDC, any symptoms..."></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Blood Pressure</label>
                            <input type="text" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="120/80 mmHg">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Weight (kg)</label>
                            <input type="number" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="e.g., 65">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;" onclick="saveClinical()">
                            <i class="fas fa-save me-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- PAHINTULOT TAB -->
            <div class="tab-pane fade" id="consent">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Pahintulot sa Pangangalaga</h5>
                <div class="alert alert-info mb-3" style="background: #e7f3ff; border: none; border-left: 4px solid #0066cc; border-radius: 8px; font-size: 0.9rem;">
                    <i class="fas fa-info-circle me-2"></i>Informed consent document for maternal care procedures
                </div>
                <form>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="consent1" style="width: 1.1rem; height: 1.1rem;">
                        <label class="form-check-label ms-3" for="consent1" style="font-weight: 500; color: #374151; font-size: 0.9rem;">
                            Ako ay sumasang-ayon sa lahat ng medical procedures na kinakailangan para sa aking kalusugan.
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="consent2" style="width: 1.1rem; height: 1.1rem;">
                        <label class="form-check-label ms-3" for="consent2" style="font-weight: 500; color: #374151; font-size: 0.9rem;">
                            Naintindihan ko ang lahat ng risks at benefits.
                        </label>
                    </div>
                    <button type="button" class="btn" style="background: #10b981; color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                        <i class="fas fa-check me-2"></i>Mark Consent
                    </button>
                </form>
            </div>

            <!-- PARTOGRAPH TAB -->
            <div class="tab-pane fade" id="partograph">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Partograph</h5>
                <p class="text-muted mb-3" style="font-size: 0.9rem;">Labor progress chart and monitoring data.</p>
                <div id="partographChart" style="height: 350px; background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <p class="text-muted"><i class="fas fa-chart-line me-2"></i>Chart will load here</p>
                </div>
            </div>

            <!-- DOCTOR'S ORDER TAB -->
            <div class="tab-pane fade" id="doctors">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Doctor's Order</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Medications Prescribed</label>
                        <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="List medications with dosage..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Special Instructions</label>
                        <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Any special care instructions..."></textarea>
                    </div>
                    <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                        <i class="fas fa-save me-2"></i>Save
                    </button>
                </form>
            </div>

            <!-- HISTORY & PHYSICAL EXAM TAB -->
            <div class="tab-pane fade" id="history">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">History & Physical Exam</h5>
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Chief Complaint</label>
                            <input type="text" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="Primary reason for visit">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Temperature (°C)</label>
                            <input type="number" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" step="0.1" placeholder="e.g., 37.2">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Heart Rate (bpm)</label>
                            <input type="number" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="e.g., 80">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Physical Examination Findings</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Detailed findings..."></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                            <i class="fas fa-save me-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- OBSTETRICAL RECORD TAB -->
            <div class="tab-pane fade" id="obstetrical">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Obstetrical Record</h5>
                <form>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Number of Pregnancies</label>
                            <input type="number" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="Gravida">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Number of Deliveries</label>
                            <input type="number" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="Para">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Labor Notes</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Labor duration, complications, mode of delivery..."></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                            <i class="fas fa-save me-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- NURSES/MIDWIFE NOTE TAB -->
            <div class="tab-pane fade" id="nurses">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Nurses/Midwife Note</h5>
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Shift Note</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="4" placeholder="Patient status, interventions, observations..."></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Time of Entry</label>
                            <input type="time" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Nurse Name</label>
                            <input type="text" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" placeholder="Full name">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                            <i class="fas fa-save me-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- MEDICATION SHEET TAB -->
            <div class="tab-pane fade" id="medication">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Medication Sheet</h5>
                <button class="btn mb-3" style="background: #10b981; color: white; padding: 0.5rem 1.25rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;" onclick="addMedicationRow()">
                    <i class="fas fa-plus me-2"></i>Add Medication
                </button>
                <div class="table-responsive" style="font-size: 0.9rem;">
                    <table class="table table-sm table-bordered">
                        <thead style="background: #f3f4f6;">
                            <tr>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Date/Time</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Medication</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Dosage</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Route</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Nurse</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="medicationTable">
                            <tr>
                                <td><input type="datetime-local" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;"></td>
                                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="e.g., Oxytocin"></td>
                                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="e.g., 10 IU"></td>
                                <td><select class="form-select form-select-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;"><option>IV</option><option>IM</option><option>PO</option></select></td>
                                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="Name"></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                        <i class="fas fa-save me-2"></i>Save
                    </button>
                </div>
            </div>

            <!-- LABORATORY TAB -->
            <div class="tab-pane fade" id="laboratory">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Laboratory Results</h5>
                <button class="btn mb-3" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.25rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#labModal">
                    <i class="fas fa-flask me-2"></i>Order Lab Tests
                </button>
                <div class="table-responsive" style="font-size: 0.9rem;">
                    <table class="table table-sm">
                        <thead style="background: #f3f4f6;">
                            <tr>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Date</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Test Name</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Result</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Normal Range</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Status</th>
                                <th style="color: #374151; font-weight: 700; border-color: #e5e7eb;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="lab-history" style="border-color: #e5e7eb;">
                            <tr>
                                <td style="border-color: #e5e7eb;">2025-12-10</td>
                                <td style="border-color: #e5e7eb;">Complete Blood Count (CBC)</td>
                                <td style="border-color: #e5e7eb;">Hb: 11.2 g/dL</td>
                                <td style="border-color: #e5e7eb;">12-16 g/dL</td>
                                <td style="border-color: #e5e7eb;"><span class="badge bg-warning" style="color: #000; font-size: 0.8rem;">Low</span></td>
                                <td style="border-color: #e5e7eb;"><button class="btn btn-sm btn-outline-primary">View</button></td>
                            </tr>
                            <tr>
                                <td style="border-color: #e5e7eb;">2025-12-08</td>
                                <td style="border-color: #e5e7eb;">Blood Typing</td>
                                <td style="border-color: #e5e7eb;">O+</td>
                                <td style="border-color: #e5e7eb;">-</td>
                                <td style="border-color: #e5e7eb;"><span class="badge bg-success" style="font-size: 0.8rem;">Normal</span></td>
                                <td style="border-color: #e5e7eb;"><button class="btn btn-sm btn-outline-primary">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- POSTPARTUM TAB -->
            <div class="tab-pane fade" id="postpartum">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Postpartum Record</h5>
                <form>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Date of Delivery</label>
                            <input type="date" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Mode of Delivery</label>
                            <select class="form-select" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                                <option>Spontaneous Vaginal Delivery</option>
                                <option>Cesarean Section</option>
                                <option>Assisted Delivery</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Postpartum Complications</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Any complications, recovery notes..."></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: linear-gradient(135deg, #d63384, #ff6b9d); color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                            <i class="fas fa-save me-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- DISCHARGE TAB -->
            <div class="tab-pane fade" id="discharge">
                <h5 class="mb-2" style="color: #2d3748; font-weight: 700;">Discharge Plan</h5>
                <form>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Discharge Date</label>
                            <input type="date" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Discharge Status</label>
                            <select class="form-select" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                                <option>Home Care</option>
                                <option>Referred to Hospital</option>
                                <option>Follow-up Required</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Discharge Instructions</label>
                            <textarea class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;" rows="3" placeholder="Medications, diet, activity restrictions..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="color: #374151; font-size: 0.9rem;">Follow-up Appointment</label>
                            <input type="date" class="form-control" style="border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn" style="background: #10b981; color: white; padding: 0.5rem 1.5rem; font-weight: 600; border: none; border-radius: 8px; font-size: 0.9rem;">
                            <i class="fas fa-check me-2"></i>Mark Discharged
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- LABORATORY ORDER MODAL -->
    <div class="modal fade" id="labModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-flask me-2"></i>Order Laboratory Tests
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="labCategories">
                        <!-- HEMATOLOGY -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#hematology">
                                    <i class="fas fa-droplet me-2"></i>Hematology Tests
                                </button>
                            </h2>
                            <div id="hematology" class="accordion-collapse collapse show" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> CBC, Platelet – ₱250</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Blood Typing – ₱150</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> ESR – ₱250</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> CT, BT – ₱100</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- URINALYSIS & STOOL -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#urinalysis">
                                    <i class="fas fa-flask-vial me-2"></i>Urinalysis & Stool
                                </button>
                            </h2>
                            <div id="urinalysis" class="accordion-collapse collapse" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Urinalysis – ₱65</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Fecalysis – ₱65</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PREGNANCY TESTS -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#pregnancy">
                                    <i class="fas fa-heart me-2"></i>Pregnancy Tests
                                </button>
                            </h2>
                            <div id="pregnancy" class="accordion-collapse collapse" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Pregnancy Test (Blood) – ₱300</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Pregnancy Test (Urine) – ₱200</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEROLOGY & INFECTIOUS DISEASE -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#serology">
                                    <i class="fas fa-vial me-2"></i>Serology & Infectious Disease
                                </button>
                            </h2>
                            <div id="serology" class="accordion-collapse collapse" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> HBsAg – ₱220</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Hepa A Screening – ₱600</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> ASO Titer – ₱250</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> RPR – ₱180</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Hepa B Antibody Test (Qualitative) – ₱350</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Hepa B Antibody Test (Quantitative) – ₱950</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- METABOLIC & RENAL FUNCTION -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#metabolic">
                                    <i class="fas fa-flask me-2"></i>Metabolic & Renal Function
                                </button>
                            </h2>
                            <div id="metabolic" class="accordion-collapse collapse" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> FBS – ₱80</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> BUN – ₱140</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Creatinine – ₱110</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Uric Acid – ₱110</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> Lipid Profile – ₱350</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- LIVER FUNCTION & GLUCOSE -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#liver">
                                    <i class="fas fa-microscope me-2"></i>Liver Function & Glucose
                                </button>
                            </h2>
                            <div id="liver" class="accordion-collapse collapse" data-bs-parent="#labCategories">
                                <div class="accordion-body">
                                    <div class="row g-2">
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> SGPT – ₱210</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> SGOT – ₱210</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> HBA1C – ₱750</label></div>
                                        <div class="col-md-6"><label class="form-check"><input type="checkbox" class="form-check-input"> 75 GMS OGTT – ₱750</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="orderSelectedTests()">
                        <i class="fas fa-check me-2"></i>Order Selected Tests
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        // ==================== FORM NAVIGATION STATE ====================
        let currentStep = 0;
        let currentPatient = '';
        let formData = {}; // Store patient form data per section

        const formSections = [
            { id: 'clinical', title: "Mother's Clinical Record", icon: 'fas fa-user-nurse' },
            { id: 'pahintulot', title: 'Pahintulot sa Pangangalaga', icon: 'fas fa-file-contract' },
            { id: 'partograph', title: 'Partograph', icon: 'fas fa-chart-line' },
            { id: 'doctors_order', title: "Doctor's Order", icon: 'fas fa-user-md' },
            { id: 'history_exam', title: 'History & Physical Exam', icon: 'fas fa-clipboard-list' },
            { id: 'obstetrical', title: 'Obstetrical Record', icon: 'fas fa-baby' },
            { id: 'nurses_note', title: 'Nurses/Midwife Note', icon: 'fas fa-notes-medical' },
            { id: 'medication', title: 'Medication Sheet', icon: 'fas fa-pills' },
            { id: 'laboratory', title: 'Laboratory', icon: 'fas fa-microscope' },
            { id: 'postpartum', title: 'Postpartum Record', icon: 'fas fa-heart' },
            { id: 'discharge', title: 'Discharge Plan', icon: 'fas fa-door-open' }
        ];

        // ==================== SECTION VISIBILITY FUNCTIONS ====================
        function showDashboard() {
            document.getElementById('dashboard-view').style.display = 'block';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'none';
        }

        function showUpdateForm(patientName) {
            currentPatient = patientName;
            const nameEl = document.getElementById('patient-name');
            if (nameEl) nameEl.textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'block';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'none';

            currentStep = 0;
            generateSectionTabs();
            updateFormContent();
            updateProgressBar();
            updateNavigationButtons();
        }

        function showMonitor(patientName) {
            const monitorName = document.getElementById('monitor-patient-name');
            if (monitorName) monitorName.textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'block';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'none';

            // Re-initialize partograph
            setTimeout(() => {
                if (typeof initChart === 'function') {
                    try { initChart(); } catch (e) { console.warn('initChart error', e); }
                }
                if (typeof updateCurrentTime === 'function') {
                    try { updateCurrentTime(); } catch (e) { }
                }
            }, 100);
        }

        function showReferrals(patientName) {
            const referralName = document.getElementById('referral-patient-name');
            if (referralName) referralName.textContent = patientName;
            
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'block';
            document.getElementById('patient-profile').style.display = 'none';
        }

        function showPatientProfile(patientName) {
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'block';
            document.getElementById('profile-name').textContent = patientName;
        }

        // ==================== FORM SECTION NAVIGATION ====================
        function generateSectionTabs() {
            const container = document.getElementById('section-tabs');
            if (!container) return;

            container.innerHTML = '';
            formSections.forEach((section, i) => {
                const tab = document.createElement('div');
                tab.className = `section-nav-item ${i === currentStep ? 'active' : ''}`;
                tab.innerHTML = `<i class="${section.icon}"></i> ${section.title}`;
                tab.onclick = () => goToStep(i);
                container.appendChild(tab);
            });
        }

        function updateFormContent() {
            const section = formSections[currentStep];

            // Update all section title elements
            const sectionTitle = document.getElementById('current-section-title');
            if (sectionTitle) sectionTitle.textContent = section.title;

            const sectionTitleText = document.getElementById('section-title-text');
            if (sectionTitleText) sectionTitleText.textContent = section.title;

            const sectionIcon = document.getElementById('section-icon');
            if (sectionIcon) sectionIcon.className = section.icon;

            // Update step counter elements
            const currentStepEl = document.getElementById('current-step');
            if (currentStepEl) currentStepEl.textContent = currentStep + 1;

            const totalStepsEl = document.getElementById('total-steps');
            if (totalStepsEl) totalStepsEl.textContent = formSections.length;

            const stepCounterEl = document.getElementById('step-counter');
            if (stepCounterEl) stepCounterEl.textContent = currentStep + 1;

            const stepTotalEl = document.getElementById('step-total');
            if (stepTotalEl) stepTotalEl.textContent = formSections.length;

            // Update form content
            const formContent = document.getElementById('form-content');
            if (formContent) {
                formContent.innerHTML = getFormSectionHTML(section.id);
            }
        }

        function getFormSectionHTML(id) {
            const forms = {
                clinical: `<div class="alert alert-info"><i class="fas fa-info-circle"></i> Mother's Clinical Record form goes here</div>`,
                pahintulot: `<div class="alert alert-info"><i class="fas fa-info-circle"></i> Consent form (Tagalog) goes here</div>`,
                nurses_note: `
                    <div class="checkbox-group">
                        ${["Admitted Ambulatory", "Consent secured", "Vitals taken", "Delivered via NSVD"].map(n => `
                            <div class="enhanced-checkbox">
                                <input type="checkbox" id="note-${n.toLowerCase().replace(/\s+/g, '-')}">
                                <label for="note-${n.toLowerCase().replace(/\s+/g, '-')}">${n}</label>
                            </div>
                        `).join('')}
                    </div>
                `,
                default: `<div class="text-center py-5"><h5>Form section coming soon</h5></div>`
            };
            return forms[id] || forms.default;
        }

        function goToStep(n) {
            currentStep = n;
            generateSectionTabs();
            updateFormContent();
            updateProgressBar();
            updateNavigationButtons();
        }

        function nextStep() {
            if (currentStep < formSections.length - 1) {
                goToStep(currentStep + 1);
            }
        }

        function previousStep() {
            if (currentStep > 0) {
                goToStep(currentStep - 1);
            }
        }

        function updateProgressBar() {
            const percent = ((currentStep + 1) / formSections.length) * 100;
            
            const progressBar = document.getElementById('progress-bar');
            if (progressBar) progressBar.style.width = percent + '%';

            const miniProgress = document.getElementById('mini-progress');
            if (miniProgress) miniProgress.style.width = percent + '%';
        }

        function updateNavigationButtons() {
            const backBtn = document.getElementById('back-btn');
            if (backBtn) backBtn.disabled = currentStep === 0;

            const nextBtn = document.getElementById('next-btn');
            if (nextBtn) nextBtn.disabled = currentStep === formSections.length - 1;
        }

        // ==================== NOTIFICATIONS ====================
        function showNotification(message, type = 'info') {
            const div = document.createElement('div');
            div.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            div.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            div.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(div);
            setTimeout(() => {
                if (div && div.parentNode) div.remove();
            }, 4000);
        }

        // ==================== ADD PATIENT MODAL SAVE ====================
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize on page load
            showDashboard();

            // Add Patient form save handler
            const savePatientBtn = document.getElementById('savePatientBtn');
            if (savePatientBtn) {
                savePatientBtn.addEventListener('click', async function () {
                    const form = document.getElementById('addPatientForm');
                    if (!form) return;

                    // Basic client-side validation
                    const firstName = (form.querySelector('[name="first_name"]')?.value || '').trim();
                    const lastName  = (form.querySelector('[name="last_name"]')?.value || '').trim();
                    const dob       = (form.querySelector('[name="date_of_birth"]')?.value || '').trim();
                    const contact   = (form.querySelector('[name="contact_number"]')?.value || '').trim();
                    const address   = (form.querySelector('[name="address"]')?.value || '').trim();

                    if (!firstName || !lastName || !dob || !contact || !address) {
                        showNotification('Please fill in all required fields.', 'warning');
                        return;
                    }

                    const formData = new FormData(form);

                    // Show loading state
                    const originalText = savePatientBtn.innerHTML;
                    savePatientBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
                    savePatientBtn.disabled = true;

                    try {
                        const response = await fetch("{{ route('dashboard.walkin.store') }}", {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        });

                        let result = null;
                        try { 
                            result = await response.json(); 
                        } catch (e) { 
                            result = null; 
                        }

                        if (response.ok) {
                            const msg = result?.message || 'Patient added successfully!';
                            showNotification(msg, 'success');

                            // Close modal if present
                            const modalEl = document.getElementById('addPatientModal');
                            if (modalEl) {
                                try {
                                    const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                                    modalInstance.hide();
                            } catch (e) { }
                        }

                        form.reset();

                        // Reset service card default if present
                        document.querySelectorAll('.service-card').forEach(c => c.classList.remove('active'));
                        const defaultCard = document.querySelector('.service-card[data-service-name="prenatal"]');
                        if (defaultCard) defaultCard.classList.add('active');

                        // Reload after a brief delay to show new patient
                        setTimeout(() => location.reload(), 800);
                        } else {
                            let errorMsg = result?.message || 'Error saving patient.';
                            if (result?.errors) {
                                errorMsg = Object.values(result.errors).flat().join('\n');
                            }
                            showNotification(errorMsg, 'danger');
                            console.error('Save failed:', result);
                        }
                    } catch (err) {
                        console.error(err);
                        showNotification('Network error. Please try again.', 'danger');
                    } finally {
                        savePatientBtn.innerHTML = originalText;
                        savePatientBtn.disabled = false;
                    }
                });
            }
        });

        // Keep your existing partograph functions (initChart, addMeasurement, etc.) as-is
        // They will work alongside this script without conflicts

        // View switcher functions
        function showDashboard() {
            document.getElementById('dashboard-view').style.display = 'block';
            document.getElementById('patient-profile').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
        }

        function showUpdateForm(patientName) {
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'block';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'none';
            document.getElementById('profile-name').textContent = patientName;
        }

        function backToList() {
            showDashboard();
        }

        function showMonitor(patientName) {
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'block';
            document.getElementById('referrals-view').style.display = 'none';
        }

        function showReferrals(patientName) {
            document.getElementById('dashboard-view').style.display = 'none';
            document.getElementById('patient-profile').style.display = 'none';
            document.getElementById('monitor-form').style.display = 'none';
            document.getElementById('referrals-view').style.display = 'block';
        }

        // Helper functions
        function saveClinical() {
            showNotification('Clinical record saved successfully!', 'success');
        }

        function addMedicationRow() {
            const table = document.getElementById('medicationTable');
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td><input type="datetime-local" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;"></td>
                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="e.g., Oxytocin"></td>
                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="e.g., 10 IU"></td>
                <td><select class="form-select form-select-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;"><option>IV</option><option>IM</option><option>PO</option></select></td>
                <td><input type="text" class="form-control form-control-sm" style="border: 1px solid #e5e7eb; font-size: 0.85rem;" placeholder="Name"></td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">Remove</button></td>
            `;
        }

        function orderSelectedTests() {
            const selected = Array.from(document.querySelectorAll('#labModal input[type="checkbox"]:checked'))
                .map(cb => cb.nextElementSibling.textContent.trim());
            
            if (selected.length === 0) {
                showNotification('Please select at least one test.', 'warning');
                return;
            }
            
            showNotification(`${selected.length} test(s) ordered successfully!`, 'success');
            bootstrap.Modal.getInstance(document.getElementById('labModal')).hide();
        }

        function showNotification(message, type = 'info') {
            const div = document.createElement('div');
            div.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            div.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            div.innerHTML = `${message} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
            document.body.appendChild(div);
            setTimeout(() => div.remove(), 4000);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showDashboard();
        });
    </script>
</body>
</html>
