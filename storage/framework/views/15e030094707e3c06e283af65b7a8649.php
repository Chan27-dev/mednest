


<?php $__env->startSection('title', 'Staff Management - MedNest'); ?>

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
        align-items: center;
    }

    .btn-add-staff {
        background: linear-gradient(135deg, var(--primary-color), #e91e63);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(214, 51, 132, 0.3);
    }

    .btn-add-staff:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(214, 51, 132, 0.4);
        color: white;
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
        border-radius: 8px;
        padding-left: 40px;
        border: 1px solid #e1e5e9;
        padding: 0.75rem 1rem 0.75rem 40px;
        width: 100%;
    }

    .filter-search .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .filter-search input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
    }

    .filter-dropdown {
        min-width: 150px;
    }

    .form-select {
        border-radius: 8px;
        border: 1px solid #e1e5e9;
        padding: 0.75rem 1rem;
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
    }

    .staff-container {
        background: white;
        margin: 0;
        padding: 0;
    }

    .staff-table {
        margin: 0;
    }

    .staff-table table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .staff-table th {
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

    .staff-table td {
        padding: 1rem 1.5rem;
        border: none;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .staff-table tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(214, 51, 132, 0.1);
    }

    .staff-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .staff-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e9ecef;
    }

    .staff-details {
        display: flex;
        flex-direction: column;
    }

    .staff-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }

    .staff-id {
        color: #6c757d;
        font-size: 0.875rem;
    }

    .designation-badge {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .department-info {
        color: #333;
        font-weight: 500;
    }

    .contact-info {
        color: #6c757d;
        font-size: 0.875rem;
    }

    .status-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-on-duty {
        background-color: #d4edda;
        color: #155724;
    }

    .status-off-duty {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: currentColor;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-view {
        background-color: #17a2b8;
        color: white;
    }

    .btn-view:hover {
        background-color: #138496;
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

    .btn-toggle {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-toggle:hover {
        background-color: #e0a800;
        transform: translateY(-1px);
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
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

    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .modal-header {
        background: var(--sidebar-bg);
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 1.5rem;
    }

    .modal-title {
        font-weight: 600;
    }

    .btn-close-white {
        filter: brightness(0) invert(1);
    }

    .modal-body {
        padding: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #e1e5e9;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
    }

    .alert {
        border-radius: 10px;
        border: none;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
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
        
        .staff-header {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }
        
        .filters-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-search {
            min-width: auto;
        }
        
        .staff-table {
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <div class="logo-image">
            <img src="<?php echo e(asset('images/mednest-logo.png')); ?>" alt="MedNest Logo"> 
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>DEL ROSARIO MATERNITY CLINIC</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
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
                <a class="nav-link" href="<?php echo e(route('dashboard.referrals')); ?>">
                    <i class="fas fa-share-alt"></i>
                    Referrals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.reports')); ?>">
                    <i class="fas fa-chart-bar"></i>
                    Branch Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('dashboard.staff')); ?>">
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
            <div class="admin-profile-trigger" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
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
                    <a class="dropdown-item" href="<?php echo e(route('dashboard.profile')); ?>">
                        <i class="fas fa-user me-2"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('dashboard.account.settings')); ?>">
                        <i class="fas fa-cog me-2"></i>
                        Account Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('dashboard.notifications')); ?>">
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
                <p class="page-subtitle">Manage and track all staff members across departments</p>
            </div>
            <div class="header-actions">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('staff.export.pdf')); ?>">
                            <i class="fas fa-file-pdf me-2"></i>Export as PDF
                        </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('staff.export.excel')); ?>">
                            <i class="fas fa-file-excel me-2"></i>Export as Excel
                        </a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-add-staff" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                    <i class="fas fa-plus me-2"></i>Add Staff Member
                </button>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-search">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="form-control" id="staffSearchInput" placeholder="Search staff by name, ID, or designation...">
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="departmentFilter">
                    <option value="">All Departments</option>
                    <option value="Labor & Delivery">Labor & Delivery</option>
                    <option value="Maternity">Maternity</option>
                    <option value="Prenatal Care">Prenatal Care</option>
                    <option value="Gynecology">Gynecology</option>
                    <option value="Emergency">Emergency</option>
                    <option value="Pharmacy">Pharmacy</option>
                </select>
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="On Duty">On Duty</option>
                    <option value="Off Duty">Off Duty</option>
                </select>
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="designationFilter">
                    <option value="">All Designations</option>
                    <option value="Obstetrician">Obstetrician</option>
                    <option value="Gynecologist">Gynecologist</option>
                    <option value="Registered Nurse">Registered Nurse</option>
                    <option value="Licensed Midwife">Licensed Midwife</option>
                    <option value="Licensed Pharmacist">Licensed Pharmacist</option>
                </select>
            </div>
        </div>

        <!-- Success/Error Messages -->
        <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- Staff Container -->
        <div class="staff-container">
            <!-- Staff Table -->
            <div class="staff-table">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Staff Member</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Contact</th>
                            <th>Last Visit</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="staffTableBody">
                        <?php $__empty_1 = true; $__currentLoopData = $staffRecords ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr data-staff-id="<?php echo e($staff['id']); ?>">
                            <td>
                                <div class="staff-info">
                                    <img src="https://via.placeholder.com/45/4CAF50/FFFFFF?text=<?php echo e(substr($staff['name'], 0, 2)); ?>" 
                                         alt="<?php echo e($staff['name']); ?>" class="staff-avatar">
                                    <div class="staff-details">
                                        <div class="staff-name"><?php echo e($staff['name']); ?></div>
                                        <div class="staff-id"><?php echo e($staff['id']); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="designation-badge"><?php echo e($staff['designation']); ?></span>
                            </td>
                            <td>
                                <div class="department-info"><?php echo e($staff['department']); ?></div>
                            </td>
                            <td>
                                <div class="contact-info"><?php echo e($staff['contact']); ?></div>
                            </td>
                            <td>
                                <div class="contact-info"><?php echo e($staff['last_visit']); ?></div>
                            </td>
                            <td>
                                <span class="status-badge status-<?php echo e(strtolower(str_replace(' ', '-', $staff['status']))); ?>">
                                    <span class="status-indicator"></span>
                                    <?php echo e($staff['status']); ?>

                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('staff.show', $staff['id'])); ?>" class="action-btn btn-view" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('staff.edit', $staff['id'])); ?>" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="action-btn btn-toggle" onclick="toggleStatus('<?php echo e($staff['id']); ?>')" title="Toggle Status">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                    <button class="action-btn btn-delete" onclick="deleteStaff('<?php echo e($staff['id']); ?>', '<?php echo e($staff['name']); ?>')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="empty-state">
                                <i class="fas fa-users"></i>
                                <h5>No Staff Members Found</h5>
                                <p>Start by adding your first staff member using the "Add Staff Member" button above.</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Add New Staff Member</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('staff.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffName" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="staffName" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="staffEmail" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffDesignation" class="form-label">Designation *</label>
                                <select class="form-select" id="staffDesignation" name="designation" required>
                                    <option value="">Select Designation</option>
                                    <option value="Obstetrician">Obstetrician</option>
                                    <option value="Gynecologist">Gynecologist</option>
                                    <option value="Pediatrician">Pediatrician</option>
                                    <option value="Registered Nurse">Registered Nurse</option>
                                    <option value="Licensed Midwife">Licensed Midwife</option>
                                    <option value="Medical Assistant">Medical Assistant</option>
                                    <option value="Licensed Pharmacist">Licensed Pharmacist</option>
                                    <option value="Laboratory Technician">Laboratory Technician</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffDepartment" class="form-label">Department *</label>
                                <select class="form-select" id="staffDepartment" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="Labor & Delivery">Labor & Delivery</option>
                                    <option value="Maternity">Maternity</option>
                                    <option value="Prenatal Care">Prenatal Care</option>
                                    <option value="Gynecology">Gynecology</option>
                                    <option value="Emergency">Emergency</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Administration">Administration</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffContact" class="form-label">Contact Number *</label>
                                <input type="text" class="form-control" id="staffContact" name="contact" placeholder="09XX-XXX-XXXX" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffQrGyn" class="form-label">Specialization *</label>
                                <select class="form-select" id="staffQrGyn" name="qr_gyn" required>
                                    <option value="">Select Specialization</option>
                                    <option value="OB-GYN">OB-GYN</option>
                                    <option value="General">General</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Emergency">Emergency</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffHireDate" class="form-label">Hire Date *</label>
                                <input type="date" class="form-control" id="staffHireDate" name="hire_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffStatus" class="form-label">Initial Status *</label>
                                <select class="form-select" id="staffStatus" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="On Duty">On Duty</option>
                                    <option value="Off Duty">Off Duty</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffSalary" class="form-label">Monthly Salary</label>
                                <input type="number" class="form-control" id="staffSalary" name="salary" placeholder="₱ 0.00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staffEmergencyContact" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="staffEmergencyContact" name="emergency_contact" placeholder="09XX-XXX-XXXX">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="staffAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="staffAddress" name="address" rows="2" placeholder="Complete address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="staffNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="staffNotes" name="notes" rows="3" placeholder="Additional notes about the staff member"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Staff Member
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
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

        // Search functionality
        const searchInput = document.getElementById('staffSearchInput');
        const departmentFilter = document.getElementById('departmentFilter');
        const statusFilter = document.getElementById('statusFilter');
        const designationFilter = document.getElementById('designationFilter');
        const tableBody = document.getElementById('staffTableBody');
        const rows = tableBody.querySelectorAll('tr');

        function filterStaff() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const departmentValue = departmentFilter.value;
            const statusValue = statusFilter.value;
            const designationValue = designationFilter.value;
            
            let visibleCount = 0;

            rows.forEach(row => {
                if (row.querySelector('.empty-state')) return;
                
                const staffName = row.querySelector('.staff-name')?.textContent.toLowerCase() || '';
                const staffId = row.querySelector('.staff-id')?.textContent.toLowerCase() || '';
                const designation = row.querySelector('.designation-badge')?.textContent.toLowerCase() || '';
                const department = row.querySelector('.department-info')?.textContent || '';
                const status = row.querySelector('.status-badge')?.textContent.trim() || '';
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !staffName.includes(searchTerm) && 
                    !staffId.includes(searchTerm) && 
                    !designation.includes(searchTerm) && 
                    !department.toLowerCase().includes(searchTerm)) {
                    shouldShow = false;
                }
                
                // Department filter
                if (departmentValue && department !== departmentValue) {
                    shouldShow = false;
                }
                
                // Status filter
                if (statusValue && !status.includes(statusValue)) {
                    shouldShow = false;
                }
                
                // Designation filter
                if (designationValue && !designation.includes(designationValue.toLowerCase())) {
                    shouldShow = false;
                }
                
                if (shouldShow) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show message if no results
            if (visibleCount === 0 && !document.getElementById('noResultsMessage')) {
                const noResultsRow = document.createElement('tr');
                noResultsRow.id = 'noResultsMessage';
                noResultsRow.innerHTML = `
                    <td colspan="7" class="empty-state">
                        <i class="fas fa-search"></i>
                        <h5>No Staff Members Found</h5>
                        <p>No staff members match your current filter criteria</p>
                    </td>
                `;
                tableBody.appendChild(noResultsRow);
            } else if (visibleCount > 0) {
                const noResultsMessage = document.getElementById('noResultsMessage');
                if (noResultsMessage) {
                    noResultsMessage.remove();
                }
            }
        }

        // Add event listeners for filters
        if (searchInput) {
            searchInput.addEventListener('input', filterStaff);
        }
        if (departmentFilter) {
            departmentFilter.addEventListener('change', filterStaff);
        }
        if (statusFilter) {
            statusFilter.addEventListener('change', filterStaff);
        }
        if (designationFilter) {
            designationFilter.addEventListener('change', filterStaff);
        }

        // Handle logout functionality
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-action="logout"]')) {
                e.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    // Create a form to submit logout request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '<?php echo e(route("logout")); ?>';
                    
                    const tokenField = document.createElement('input');
                    tokenField.type = 'hidden';
                    tokenField.name = '_token';
                    tokenField.value = '<?php echo e(csrf_token()); ?>';
                    
                    form.appendChild(tokenField);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        });

        // Add hover effects to table rows
        const tableRows = document.querySelectorAll('.staff-table tbody tr');
        tableRows.forEach(row => {
            if (!row.querySelector('.empty-state')) {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.boxShadow = '0 2px 8px rgba(214, 51, 132, 0.1)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = 'none';
                });
            }
        });
    });

    // Toggle staff status function
    function toggleStatus(staffId) {
        if (confirm('Are you sure you want to change this staff member\'s status?')) {
            // Create a form to submit status toggle request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/staff/${staffId}/toggle-status`;
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'POST';
            
            const tokenField = document.createElement('input');
            tokenField.type = 'hidden';
            tokenField.name = '_token';
            tokenField.value = '<?php echo e(csrf_token()); ?>';
            
            form.appendChild(methodField);
            form.appendChild(tokenField);
            document.body.appendChild(form);
            form.submit();
        }
    }

    // Delete staff function
    function deleteStaff(staffId, staffName) {
        if (confirm(`Are you sure you want to delete ${staffName}? This action cannot be undone.`)) {
            // Create a form to submit DELETE request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/staff/${staffId}`;
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            const tokenField = document.createElement('input');
            tokenField.type = 'hidden';
            tokenField.name = '_token';
            tokenField.value = '<?php echo e(csrf_token()); ?>';
            
            form.appendChild(methodField);
            form.appendChild(tokenField);
            document.body.appendChild(form);
            form.submit();
        }
    }

    // Show notification helper function
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
        
        // Animate in
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 3 seconds
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/dashboard/staff.blade.php ENDPATH**/ ?>