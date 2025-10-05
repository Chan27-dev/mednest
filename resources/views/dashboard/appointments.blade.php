@extends('layouts.app')

@section('title', 'Appointments - MedNest')

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
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ffffff 0%, #fce4ec 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3), 0 2px 8px rgba(214, 51, 132, 0.4);
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .sidebar .logo .logo-image::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .sidebar .logo .logo-image:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4), 0 4px 12px rgba(214, 51, 132, 0.6);
    }

    .sidebar .logo .logo-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        padding: 8px;
    }

    .sidebar .logo .logo-image .logo-fallback {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        display: none;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
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

    .appointments-header {
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

    .date-picker {
        position: relative;
    }

    .date-picker input {
        border-radius: 8px;
        border: 1px solid #e1e5e9;
        padding: 0.75rem 1rem;
        min-width: 150px;
    }

    .date-picker input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
    }

    .appointments-container {
        background: white;
        margin: 0;
        padding: 0;
    }

    .appointments-table {
        margin: 0;
    }

    .appointments-table table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .appointments-table th {
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

    .appointments-table td {
        padding: 1rem 1.5rem;
        border: none;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .appointments-table tr:hover {
        background-color: #f8f9fa;
    }

    .patient-info {
        display: flex;
        flex-direction: column;
    }

    .patient-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }

    .patient-email {
        color: #6c757d;
        font-size: 0.875rem;
    }

    .appointment-time {
        display: flex;
        flex-direction: column;
    }

    .time {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }

    .date {
        color: #6c757d;
        font-size: 0.875rem;
    }

    .service-badge {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: #212529;
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .staff-name {
        color: #333;
        font-weight: 500;
    }

    .payment-amount {
        color: var(--primary-color);
        font-weight: 600;
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

    .status-confirmed {
        background-color: #d4edda;
        color: #155724;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
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

    .btn-edit {
        background-color: #28a745;
        color: white;
    }

    .btn-edit:hover {
        background-color: #1e7e34;
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
        
        .appointments-table {
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
            <img src="{{ asset('images/mednest-logo.png') }}" alt="MedNest Logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"> 
            <div class="logo-fallback">
                <i class="fas fa-heart"></i>
            </div>
        </div>
        <div class="logo-text">
            <h5>MedNest</h5>
            <small>DEL ROSARIO MATERNITY CLINIC</small>
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
                <a class="nav-link" href="{{ route('dashboard.patients') }}">
                    <i class="fas fa-users"></i>
                    Patients Record
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.appointments') }}">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.staff') }}">
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
        <!-- Appointments Header -->
        <div class="appointments-header">
            <h4 class="page-title">Appointment Management</h4>
            <p class="page-subtitle">Manage and track all patient appointments</p>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-search">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="form-control" id="appointmentSearchInput" placeholder="Search patients, services, or staff...">
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="filter-dropdown">
                <select class="form-select" id="serviceFilter">
                    <option value="">All Services</option>
                    <option value="consultation">Consultation</option>
                    <option value="prenatal">Pre-natal Check Up</option>
                    <option value="ultrasound">Ultrasound</option>
                    <option value="labor">Labor Monitoring</option>
                </select>
            </div>
            <div class="date-picker">
                <input type="date" class="form-control" id="dateFilter" placeholder="dd/mm/yyyy">
            </div>
        </div>

        <!-- Appointments Container -->
        <div class="appointments-container">
            <!-- Appointments Table -->
            <div class="appointments-table">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Date & Time</th>
                            <th>Service</th>
                            <th>Assigned Staff</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentsTableBody">
                        @foreach($appointments as $index => $appointment)
                        <tr data-appointment-id="{{ $index + 1 }}">
                            <td>
                                <div class="patient-info">
                                    <div class="patient-name">{{ $appointment['patient'] }}</div>
                                    <div class="patient-email">{{ $appointment['email'] }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="appointment-time">
                                    <div class="time">{{ $appointment['date_time'] }}</div>
                                    <div class="date">{{ $appointment['date'] }}</div>
                                </div>
                            </td>
                            <td>
                                <span class="service-badge">{{ $appointment['service'] }}</span>
                            </td>
                            <td>
                                <div class="staff-name">{{ $appointment['assigned_staff'] }}</div>
                            </td>
                            <td>
                                <div class="payment-amount">{{ $appointment['payment'] }}</div>
                            </td>
                            <td>
                                <span class="status-badge status-{{ strtolower($appointment['status']) }}">
                                    {{ $appointment['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn btn-edit" data-action="edit" data-patient="{{ $appointment['patient'] }}" title="Edit Appointment">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn btn-delete" data-action="delete" data-patient="{{ $appointment['patient'] }}" title="Delete Appointment">
                                        <i class="fas fa-trash"></i>
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

<!-- Mobile Sidebar Toggle (for responsive) -->
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
        const searchInput = document.getElementById('appointmentSearchInput');
        const statusFilter = document.getElementById('statusFilter');
        const serviceFilter = document.getElementById('serviceFilter');
        const dateFilter = document.getElementById('dateFilter');
        const tableBody = document.getElementById('appointmentsTableBody');
        const rows = tableBody.querySelectorAll('tr');

        function filterAppointments() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const statusValue = statusFilter.value.toLowerCase();
            const serviceValue = serviceFilter.value.toLowerCase();
            const dateValue = dateFilter.value;
            
            let visibleCount = 0;

            rows.forEach(row => {
                const patientName = row.querySelector('.patient-name').textContent.toLowerCase();
                const patientEmail = row.querySelector('.patient-email').textContent.toLowerCase();
                const service = row.querySelector('.service-badge').textContent.toLowerCase();
                const staff = row.querySelector('.staff-name').textContent.toLowerCase();
                const status = row.querySelector('.status-badge').textContent.toLowerCase();
                const appointmentDate = row.querySelector('.date').textContent;
                
                let shouldShow = true;
                
                // Search filter
                if (searchTerm && !patientName.includes(searchTerm) && 
                    !patientEmail.includes(searchTerm) && 
                    !service.includes(searchTerm) && 
                    !staff.includes(searchTerm)) {
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
                
                // Date filter (simple check for now)
                if (dateValue) {
                    const filterDate = new Date(dateValue);
                    const appointmentDateObj = new Date(appointmentDate);
                    if (appointmentDateObj.toDateString() !== filterDate.toDateString()) {
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

            // Show message if no results
            if (visibleCount === 0) {
                if (!document.getElementById('noResultsMessage')) {
                    const noResultsRow = document.createElement('tr');
                    noResultsRow.id = 'noResultsMessage';
                    noResultsRow.innerHTML = `
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fas fa-search mb-2" style="font-size: 2rem; opacity: 0.5;"></i><br>
                            No appointments found matching your criteria
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
        if (searchInput) {
            searchInput.addEventListener('input', filterAppointments);
        }
        if (statusFilter) {
            statusFilter.addEventListener('change', filterAppointments);
        }
        if (serviceFilter) {
            serviceFilter.addEventListener('change', filterAppointments);
        }
        if (dateFilter) {
            dateFilter.addEventListener('change', filterAppointments);
        }

        // Handle action buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('.action-btn')) {
                const btn = e.target.closest('.action-btn');
                const action = btn.getAttribute('data-action');
                const patientName = btn.getAttribute('data-patient');
                
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
                        case 'edit':
                            showNotification(`Opening edit form for ${patientName}'s appointment`, 'info');
                            break;
                        case 'delete':
                            if (confirm(`Are you sure you want to delete ${patientName}'s appointment?`)) {
                                // Remove the row with animation
                                const row = btn.closest('tr');
                                row.style.transform = 'translateX(100%)';
                                row.style.opacity = '0';
                                
                                setTimeout(() => {
                                    row.remove();
                                    showNotification(`${patientName}'s appointment has been deleted`, 'success');
                                    
                                    // Check if we need to show empty state
                                    const remainingRows = tableBody.querySelectorAll('tr:not(#noResultsMessage)');
                                    if (remainingRows.length === 0) {
                                        filterAppointments(); // This will show the no results message
                                    }
                                }, 300);
                            }
                            break;
                        default:
                            showNotification(`${action} action for ${patientName}`, 'info');
                    }
                }, 1000);
            }
        });

        // Handle logout functionality
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-action="logout"]')) {
                e.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    // Redirect to logout route
                    window.location.href = '/logout';
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

        // Table row hover effects
        const tableRows = document.querySelectorAll('.appointments-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.boxShadow = '0 2px 8px rgba(214, 51, 132, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });

        // Set today's date as default for date filter
        const today = new Date();
        const todayString = today.toISOString().split('T')[0];
        if (dateFilter) {
            // Don't set default date, let user choose
            dateFilter.placeholder = 'Select date...';
        }
    });
</script>
@endsection