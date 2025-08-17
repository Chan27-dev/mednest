

<?php $__env->startSection('title', 'MedNest Dashboard'); ?>

<?php $__env->startSection('extra-css'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Success/Error Messages -->
<?php if(session('message')): ?>
    <div class="alert alert-info alert-dismissible fade show" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        <?php echo e(session('message')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <div class="logo-image">
        <img src="<?php echo e(asset('images/mednest-logo.png')); ?>" alt="MedNest Logo"> 
            
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>THE MODERN MATERNITY CLINIC</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('dashboard.index')); ?>">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.patients')); ?>">
                    <i class="fas fa-users"></i>
                    Patients Record
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.appointments')); ?>">
                    <i class="fas fa-calendar-alt"></i>
                    Appointments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.labor')); ?>">
                    <i class="fas fa-baby"></i>
                    Labor Monitoring
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.billing')); ?>">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Billing System
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="referrals">
                    <i class="fas fa-share-alt"></i>
                    Referrals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="reports">
                    <i class="fas fa-chart-bar"></i>
                    Branch Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="staff">
                    <i class="fas fa-user-cog"></i>
                    Staff Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="settings">
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
                    <a class="dropdown-item" href="#" data-action="profile">
                        <i class="fas fa-user me-2"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#" data-action="settings">
                        <i class="fas fa-cog me-2"></i>
                        Account Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#" data-action="notifications">
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

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <h4 class="mb-4">Multi-Branch Overview</h4>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card patients" data-bs-toggle="tooltip" data-bs-placement="top" title="Total patients across all branches">
                    <div class="stats-number"><?php echo e($data['stats']['total_patients']); ?></div>
                    <div class="stats-label">Total Patients (All Branches)</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card appointments" data-bs-toggle="tooltip" data-bs-placement="top" title="Scheduled appointments today">
                    <div class="stats-number"><?php echo e($data['stats']['total_appointments']); ?></div>
                    <div class="stats-label">Total Appointment</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card revenue" data-bs-toggle="tooltip" data-bs-placement="top" title="Current active labor cases">
                    <div class="stats-number"><?php echo e($data['stats']['active_labor_cases']); ?></div>
                    <div class="stats-label">Total Active Labor Cases</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card rating" data-bs-toggle="tooltip" data-bs-placement="top" title="Average customer satisfaction rating">
                    <div class="stats-number"><?php echo e($data['stats']['monthly_revenue']); ?></div>
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
                <?php $__currentLoopData = $data['recent_activities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="activity-item" data-activity-id="<?php echo e($loop->index); ?>">
                    <div class="activity-time"><?php echo e($activity['time']); ?></div>
                    <div class="activity-details">
                        <strong><?php echo e($activity['activity']); ?></strong><br>
                        <small class="text-muted"><?php echo e($activity['patient']); ?></small>
                    </div>
                    <div class="branch-badge branch-<?php echo e(strtolower(str_replace(' ', '', $activity['branch']))); ?>">
                        <?php echo e($activity['branch']); ?>

                    </div>
                    <div class="status-badge status-<?php echo e($activity['status_class']); ?>">
                        <?php echo e($activity['status']); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <select class="form-select form-select-lg" id="branchFilter">
                            <option value="">All Branches</option>
                            <option value="sinag">Sto. Domingo Branch</option>
                            <option value="bill">Daraga Branch</option>
                            <option value="anthony">Arimbay Branch</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-lg" id="statusFilter">
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
                    <?php echo csrf_field(); ?>
                    
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

                    <!-- Select Service Section -->
                    <div class="section-header mb-3">
                        <h6 class="fw-bold text-secondary mb-3">Select Service</h6>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="service-card active" data-service="prenatal" data-price="FREE">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Pre-natal Check Up</h6>
                                    <small class="text-muted">Regular monitoring during pregnancy</small>
                                </div>
                                <div class="service-price text-success fw-bold mt-2">FREE</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service="consultation" data-price="₱1,500">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">General Consultation</h6>
                                    <small class="text-muted">Medical consultation & advice</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱1,500</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card" data-service="ultrasound" data-price="₱2,500">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Ultrasound Imaging</h6>
                                    <small class="text-muted">Imaging & monitoring</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱2,500</div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="service-card" data-service="immunization" data-price="₱800">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Immunization</h6>
                                    <small class="text-muted">Vaccination programs</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱800</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-card" data-service="family-planning" data-price="₱1,200">
                                <div class="service-header">
                                    <h6 class="fw-bold mb-1">Family Planning</h6>
                                    <small class="text-muted">Comprehensive planning services</small>
                                </div>
                                <div class="service-price text-primary fw-bold mt-2">₱1,200</div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Date Section -->
                    <div class="section-header mb-3">
                        <h6 class="fw-bold text-secondary mb-3">Preferred Date <span class="text-danger">*</span></h6>
                    </div>

                    <div class="mb-4">
                        <input type="date" class="form-control form-control-lg border-0 bg-light" id="preferredDate" name="preferred_date" required>
                    </div>

                    <input type="hidden" id="selectedService" name="selected_service" value="prenatal">
                    <input type="hidden" id="servicePrice" name="service_price" value="FREE">
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary px-4" id="confirmAppointmentBtn">
                    <i class="fas fa-check me-2"></i>Confirm Appointment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Toggle (for responsive) -->
<button class="btn btn-primary d-md-none" id="sidebarToggle" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">
    <i class="fas fa-bars"></i>
</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
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

        // Auto-refresh functionality (optional)
        let autoRefreshEnabled = false;
        let refreshInterval;

        function toggleAutoRefresh() {
            if (autoRefreshEnabled) {
                clearInterval(refreshInterval);
                autoRefreshEnabled = false;
            } else {
                refreshInterval = setInterval(() => {
                    // In a real application, you would refresh data via AJAX
                    console.log('Auto-refreshing dashboard data...');
                }, 60000); // Refresh every minute
                autoRefreshEnabled = true;
            }
        }

        // Handle admin profile dropdown actions
        const adminDropdownItems = document.querySelectorAll('.admin-profile .dropdown-item');
        adminDropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.getAttribute('data-action');
                
                switch(action) {
                    case 'profile':
                        window.MedNestDashboard.prototype.showNotification('Profile page opened', 'info');
                        break;
                    case 'settings':
                        window.MedNestDashboard.prototype.showNotification('Account settings opened', 'info');
                        break;
                    case 'notifications':
                        window.MedNestDashboard.prototype.showNotification('Notifications panel opened', 'info');
                        break;
                    case 'logout':
                        handleLogout();
                        break;
                }
            });
        });

        // Debug: Test if Bootstrap modal is working
        console.log('Bootstrap version:', bootstrap?.Modal ? 'Loaded' : 'Not loaded');
        console.log('Add Patient button found:', document.getElementById('addPatientBtn') ? 'Yes' : 'No');
        console.log('Modal element found:', document.getElementById('addPatientModal') ? 'Yes' : 'No');

        // Backup method - if Bootstrap modal fails, use simple display
        function openPatientModal() {
            const modalElement = document.getElementById('addPatientModal');
            
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                // Use Bootstrap modal
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
                console.log('Bootstrap modal opened');
            } else {
                // Fallback - manual display
                modalElement.style.display = 'block';
                modalElement.classList.add('show');
                modalElement.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modal-open');
                
                // Add backdrop
                const backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade show';
                document.body.appendChild(backdrop);
                
                console.log('Manual modal opened');
            }
        }

        // Updated Add Patient button handler
        document.addEventListener('DOMContentLoaded', function() {
            const addPatientBtn = document.getElementById('addPatientBtn');
            
            if (addPatientBtn) {
                addPatientBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    console.log('Add New Patient clicked!');
                    openPatientModal();
                });
                console.log('Add Patient button event listener attached');
            } else {
                console.error('Add Patient button not found!');
            }
        });

        // Handle modal events
        const addPatientModal = document.getElementById('addPatientModal');
        if (addPatientModal) {
            // Reset form when modal is closed
            addPatientModal.addEventListener('hidden.bs.modal', function () {
                const form = document.getElementById('addPatientForm');
                if (form) {
                    form.reset();
                    
                    // Reset service selection to first option
                    const serviceCards = document.querySelectorAll('.service-card');
                    serviceCards.forEach(card => card.classList.remove('active'));
                    if (serviceCards[0]) {
                        serviceCards[0].classList.add('active');
                    }
                    
                    // Reset hidden fields
                    document.getElementById('selectedService').value = 'prenatal';
                    document.getElementById('servicePrice').value = 'FREE';
                    
                    // Remove validation classes
                    const inputs = form.querySelectorAll('.form-control');
                    inputs.forEach(input => {
                        input.classList.remove('is-invalid', 'is-valid');
                    });
                }
            });

            // Set default date when modal opens
            addPatientModal.addEventListener('shown.bs.modal', function () {
                const today = new Date().toISOString().split('T')[0];
                const dateInput = document.getElementById('preferredDate');
                if (dateInput && !dateInput.value) {
                    dateInput.value = today;
                    dateInput.min = today; // Prevent past dates
                }
            });
        }
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove active class from all cards
                serviceCards.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked card
                this.classList.add('active');
                
                // Update hidden fields
                const service = this.getAttribute('data-service');
                const price = this.getAttribute('data-price');
                
                document.getElementById('selectedService').value = service;
                document.getElementById('servicePrice').value = price;
            });
        });

        // Handle Form Submission
        const confirmBtn = document.getElementById('confirmAppointmentBtn');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                const form = document.getElementById('addPatientForm');
                const formData = new FormData(form);
                
                // Validate required fields
                const requiredFields = ['full_name', 'age', 'contact_number', 'preferred_date'];
                let isValid = true;
                
                requiredFields.forEach(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    window.MedNestDashboard.prototype.showNotification('Please fill in all required fields', 'warning');
                    return;
                }
                
                // Show loading state
                const originalText = confirmBtn.innerHTML;
                confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                confirmBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Success
                    const patientName = formData.get('full_name');
                    const service = document.querySelector('.service-card.active h6').textContent;
                    
                    window.MedNestDashboard.prototype.showNotification(
                        `Appointment scheduled successfully for ${patientName} - ${service}`, 
                        'success'
                    );
                    
                    // Reset form and close modal
                    form.reset();
                    serviceCards[0].classList.add('active'); // Reset to first service
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addPatientModal'));
                    modal.hide();
                    
                    // Reset button
                    confirmBtn.innerHTML = originalText;
                    confirmBtn.disabled = false;
                    
                }, 2000);
            });
        }

        // Handle modal close buttons
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-bs-dismiss="modal"]') || e.target.matches('.btn-close')) {
                const modal = document.getElementById('addPatientModal');
                
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                } else {
                    // Manual close
                    modal.style.display = 'none';
                    modal.classList.remove('show');
                    modal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('modal-open');
                    
                    // Remove backdrop
                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) {
                        backdrop.remove();
                    }
                }
            }
        });
        const today = new Date().toISOString().split('T')[0];
        const dateInput = document.getElementById('preferredDate');
        if (dateInput) {
            dateInput.value = today;
            dateInput.min = today; // Prevent past dates
        }

        // Auto-format phone number
        const phoneInputs = document.querySelectorAll('input[type="tel"]');
        phoneInputs.forEach(input => {
            input.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-digits
                if (value.length >= 10) {
                    // Format as Philippine mobile number
                    value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
                }
                e.target.value = value;
            });
        });

        // Logout functionality
        function handleLogout() {
            // Show confirmation dialog
            if (confirm('Are you sure you want to logout?')) {
                // Show loading state
                const logoutItem = document.querySelector('[data-action="logout"]');
                const originalContent = logoutItem.innerHTML;
                logoutItem.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Logging out...';
                
                // Simulate logout process
                setTimeout(() => {
                    // In a real app, you would redirect to logout route
                    // window.location.href = '/logout';
                    
                    // For demo, show success and reload
                    window.MedNestDashboard.prototype.showNotification('Successfully logged out!', 'success');
                    
                    // Reset the button
                    logoutItem.innerHTML = originalContent;
                    
                    // In a real app, redirect to login page
                    setTimeout(() => {
                        alert('Demo: In a real app, you would be redirected to the login page.');
                    }, 1500);
                }, 1000);
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.admin-profile .dropdown-menu');
            const trigger = document.querySelector('.admin-profile-trigger');
            
            if (dropdown && !dropdown.contains(e.target) && !trigger.contains(e.target)) {
                const dropdownInstance = bootstrap.Dropdown.getOrCreateInstance(trigger);
                dropdownInstance.hide();
            }
        });

        // Handle Quick Actions (updated to work with modal)
        const actionBtns = document.querySelectorAll('.action-btn:not(#addPatientBtn)'); // Exclude Add Patient button
        
        actionBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Add loading animation
                const originalContent = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span>Loading...</span>';
                btn.style.pointerEvents = 'none';
                
                // Get action name
                const actionName = btn.querySelector('span').textContent;
                
                // Simulate API call
                setTimeout(() => {
                    // Restore original content
                    btn.innerHTML = originalContent;
                    btn.style.pointerEvents = 'auto';
                    
                    // Show success message
                    window.MedNestDashboard.prototype.showNotification(`${actionName} action triggered!`, 'success');
                }, 1000);
            });
            
            // Add hover effect
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
                btn.style.boxShadow = '0 6px 12px rgba(0,0,0,0.15)';
            });
            
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
                btn.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
        });
            // Ctrl/Cmd + / for search focus
            if ((e.ctrlKey || e.metaKey) && e.key === '/') {
                e.preventDefault();
                document.querySelector('.search-box input').focus();
            }
            
            // Esc to clear search
            if (e.key === 'Escape') {
                const searchInput = document.querySelector('.search-box input');
                if (searchInput === document.activeElement) {
                    searchInput.value = '';
                    searchInput.blur();
                }
            }
        });

        // Add loading states for form submissions
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    submitBtn.disabled = true;
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/dashboard/index.blade.php ENDPATH**/ ?>