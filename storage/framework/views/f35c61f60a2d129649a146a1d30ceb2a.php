

<?php $__env->startSection('title', 'Patient Records - MedNest'); ?>

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
        justify-content: between;
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
        margin-left: auto;
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
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                <a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('dashboard.patients')); ?>">
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
                <a class="nav-link" href="<?php echo e(route('dashboard.staff')); ?>">
                    <i class="fas fa-user-cog"></i>
                    Staff Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard.settings')); ?>">
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
                    <a class="dropdown-item" href="<?php echo e(route('dashboard.profile')); ?>">
                        <i class="fas fa-user me-2"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('dashboard.settings')); ?>">
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
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-patient-id="<?php echo e($patient['id']); ?>">
                            <td class="patient-id"><?php echo e($patient['id']); ?></td>
                            <td class="patient-name"><?php echo e($patient['name']); ?></td>
                            <td><?php echo e($patient['age']); ?></td>
                            <td><?php echo e($patient['contact']); ?></td>
                            <td><?php echo e($patient['last_visit']); ?></td>
                            <td>
                                <span class="status-badge status-<?php echo e(strtolower(str_replace(' ', '-', $patient['status']))); ?>">
                                    <?php echo e($patient['status']); ?>

                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <?php $__currentLoopData = $patient['actions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="action-btn btn-<?php echo e(strtolower($action)); ?>" data-action="<?php echo e(strtolower($action)); ?>" data-patient="<?php echo e($patient['name']); ?>">
                                            <?php echo e($action); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add New Patient Modal (Reuse from dashboard) -->
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

<!-- Mobile Sidebar Toggle (for responsive) -->
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

            // Show message if no results
            const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
            if (visibleRows.length === 0 && searchTerm !== '') {
                if (!document.getElementById('noResultsMessage')) {
                    const noResultsRow = document.createElement('tr');
                    noResultsRow.id = 'noResultsMessage';
                    noResultsRow.innerHTML = `
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fas fa-search mb-2" style="font-size: 2rem; opacity: 0.5;"></i><br>
                            No patients found matching "${searchTerm}"
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
        });

        // Handle action buttons
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('action-btn')) {
                const action = e.target.getAttribute('data-action');
                const patientName = e.target.getAttribute('data-patient');
                
                // Add loading state
                const originalText = e.target.textContent;
                e.target.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                e.target.disabled = true;
                
                setTimeout(() => {
                    // Reset button
                    e.target.textContent = originalText;
                    e.target.disabled = false;
                    
                    // Handle different actions
                    switch(action) {
                        case 'view':
                            showNotification(`Viewing details for ${patientName}`, 'info');
                            break;
                        case 'edit':
                            showNotification(`Opening edit form for ${patientName}`, 'info');
                            break;
                        case 'monitor':
                            showNotification(`Opening labor monitoring for ${patientName}`, 'warning');
                            break;
                        case 'archive':
                            if (confirm(`Archive patient record for ${patientName}?`)) {
                                showNotification(`${patientName} has been archived`, 'success');
                                // Update status to completed
                                const row = e.target.closest('tr');
                                const statusBadge = row.querySelector('.status-badge');
                                statusBadge.textContent = 'COMPLETED';
                                statusBadge.className = 'status-badge status-completed';
                            }
                            break;
                        default:
                            showNotification(`${action} action for ${patientName}`, 'info');
                    }
                }, 1000);
            }
        });

        // Handle Add Patient Modal
        const addPatientModal = document.getElementById('addPatientModal');
        if (addPatientModal) {
            // Reset form when modal is closed
            addPatientModal.addEventListener('hidden.bs.modal', function () {
                const form = document.getElementById('addPatientForm');
                if (form) {
                    form.reset();
                    
                    // Remove validation classes
                    const inputs = form.querySelectorAll('.form-control');
                    inputs.forEach(input => {
                        input.classList.remove('is-invalid', 'is-valid');
                    });
                }
            });
        }

        // Handle Save Patient
        const savePatientBtn = document.getElementById('savePatientBtn');
        if (savePatientBtn) {
            savePatientBtn.addEventListener('click', function() {
                const form = document.getElementById('addPatientForm');
                const formData = new FormData(form);
                
                // Validate required fields
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
                
                // Show loading state
                const originalText = savePatientBtn.innerHTML;
                savePatientBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
                savePatientBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Success
                    const patientName = formData.get('full_name');
                    const age = formData.get('age');
                    const contact = formData.get('contact_number');
                    
                    // Add new row to table
                    const newPatientId = `P - ${String(tableBody.children.length + 1).padStart(3, '0')}`;
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
                                <button class="action-btn btn-view" data-action="view" data-patient="${patientName}">View</button>
                                <button class="action-btn btn-edit" data-action="edit" data-patient="${patientName}">Edit</button>
                            </div>
                        </td>
                    `;
                    
                    // Add to top of table
                    tableBody.insertBefore(newRow, tableBody.firstChild);
                    
                    // Highlight new row
                    newRow.style.backgroundColor = '#d4edda';
                    setTimeout(() => {
                        newRow.style.backgroundColor = '';
                    }, 3000);
                    
                    showNotification(`Patient ${patientName} added successfully!`, 'success');
                    
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(addPatientModal);
                    modal.hide();
                    
                    // Reset button
                    savePatientBtn.innerHTML = originalText;
                    savePatientBtn.disabled = false;
                    
                }, 2000);
            });
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

        // Handle logout functionality
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-action="logout"]')) {
                e.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    showNotification('Logging out...', 'info');
                    setTimeout(() => {
                        alert('Demo: In a real app, you would be redirected to the login page.');
                    }, 1500);
                }
            }
        });

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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\4th yr 1st sem\mednest\resources\views/dashboard/patients.blade.php ENDPATH**/ ?>