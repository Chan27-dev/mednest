<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System - MedNest</title>
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

        .content {
            padding: 2rem;
        }

        .billing-sections {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .billing-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .section-header {
            background: var(--primary-color);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .billing-table {
            width: 100%;
        }

        .billing-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .billing-table th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.75rem 1rem;
            border: none;
            border-bottom: 1px solid #e1e5e9;
            text-align: left;
        }

        .billing-table td {
            padding: 0.75rem 1rem;
            border: none;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
            font-size: 0.875rem;
        }

        .billing-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .billing-table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-paid {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-overdue {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .amount {
            font-weight: 600;
            color: #2d3748;
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

            .billing-sections {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
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
                    <a class="nav-link" href="{{ route('admin.branch.report') }}">
                        <i class="fas fa-file-invoice-dollar"></i>
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
                        <a class="dropdown-item text-danger" href="#" data-action="logout">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="billing-sections">
                <!-- Recent Payments -->
                <div class="billing-section">
                    <div class="section-header">
                        <i class="fas fa-money-bill-wave"></i>
                        Recent Payments
                    </div>
                    <div class="billing-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Patient</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PAY001</td>
                                    <td>John Doe</td>
                                    <td class="amount">₱3,500</td>
                                    <td>Credit Card</td>
                                    <td><span class="status-badge status-paid">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>PAY002</td>
                                    <td>Jane Smith</td>
                                    <td class="amount">₱2,800</td>
                                    <td>Cash</td>
                                    <td><span class="status-badge status-paid">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>PAY003</td>
                                    <td>Maria Santos</td>
                                    <td class="amount">₱4,200</td>
                                    <td>Insurance</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>PAY004</td>
                                    <td>Ana Cruz</td>
                                    <td class="amount">₱1,900</td>
                                    <td>Debit Card</td>
                                    <td><span class="status-badge status-paid">Paid</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Invoices -->
                <div class="billing-section">
                    <div class="section-header">
                        <i class="fas fa-file-invoice"></i>
                        Recent Invoices
                    </div>
                    <div class="billing-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>INV001</td>
                                    <td>Sarah Davis</td>
                                    <td>Consultation</td>
                                    <td class="amount">₱3,500</td>
                                    <td><span class="status-badge status-paid">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>INV002</td>
                                    <td>Lisa Brown</td>
                                    <td>Consultation</td>
                                    <td class="amount">₱2,500</td>
                                    <td><span class="status-badge status-paid">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>INV003</td>
                                    <td>Emma Wilson</td>
                                    <td>Consultation</td>
                                    <td class="amount">₱3,500</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>INV004</td>
                                    <td>Sofia Reyes</td>
                                    <td>Consultation</td>
                                    <td class="amount">₱2,500</td>
                                    <td><span class="status-badge status-overdue">Overdue</span></td>
                                </tr>
                            </tbody>
                        </table>
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
        document.addEventListener('DOMContentLoaded', function() {
            setupMobileToggle();
        });

        function setupMobileToggle() {
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
    </script>
</body>
</html>