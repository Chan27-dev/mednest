@extends('layouts.app')

@section('title', 'Notifications - MedNest')

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

    .breadcrumb-nav {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #6c757d;
    }

    .breadcrumb-nav a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .breadcrumb-nav a:hover {
        text-decoration: underline;
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
        padding: 2rem;
    }

    .notifications-header {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .notifications-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }

    .notifications-controls {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: between;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .notification-filters {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        border: 1px solid #dee2e6;
        background: white;
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn.active {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        color: white;
        border-color: var(--primary-color);
    }

    .filter-btn:hover:not(.active) {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .notifications-list {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .notification-item {
        padding: 1.5rem;
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }

    .notification-item.unread {
        background: linear-gradient(90deg, rgba(214, 51, 132, 0.05) 0%, rgba(255, 255, 255, 1) 20%);
        border-left: 4px solid var(--primary-color);
    }

    .notification-item.unread::before {
        content: '';
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        width: 8px;
        height: 8px;
        background: var(--primary-color);
        border-radius: 50%;
    }

    .notification-content {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .notification-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .notification-icon.primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
    }

    .notification-icon.warning {
        background: linear-gradient(135deg, #ffc107, #e0a800);
    }

    .notification-icon.success {
        background: linear-gradient(135deg, #28a745, #1e7e34);
    }

    .notification-icon.info {
        background: linear-gradient(135deg, #17a2b8, #117a8b);
    }

    .notification-icon.danger {
        background: linear-gradient(135deg, #dc3545, #bd2130);
    }

    .notification-details {
        flex-grow: 1;
    }

    .notification-title {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .notification-message {
        color: #6c757d;
        margin-bottom: 0.5rem;
        line-height: 1.5;
    }

    .notification-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.875rem;
        color: #6c757d;
    }

    .notification-type {
        background: #f8f9fa;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .notification-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff6b9d);
        border: none;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #c2185b, var(--primary-color));
        transform: translateY(-1px);
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

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
        }
        
        .sidebar {
            transform: translateX(-100%);
        }

        .notifications-controls {
            flex-direction: column;
            align-items: stretch;
        }

        .notification-filters {
            justify-content: center;
        }

        .notification-content {
            gap: 0.75rem;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
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
                <a class="nav-link" href="{{ route('dashboard.patients') }}">
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
                <a class="nav-link {{ request()->routeIs('dashboard.labor') ? 'active' : '' }}" href="{{ route('dashboard.labor') }}">
                    <i class="fas fa-heartbeat"></i>
                    Labor Monitoring
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.billing') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Billing System
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.referrals') }}">
                    <i class="fas fa-share-alt"></i>
                    Referrals
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings') }}">
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
        <div class="breadcrumb-nav">
            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <i class="fas fa-chevron-right"></i>
            <span>Notifications</span>
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
        <!-- Notifications Header -->
        <div class="notifications-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <i class="fas fa-bell" style="font-size: 3rem; opacity: 0.8;"></i>
                    </div>
                    <div>
                        <h2 class="mb-1">Notifications</h2>
                        <p class="mb-0 opacity-75">Stay updated with your latest activities and alerts</p>
                    </div>
                </div>
                <div>
                    <button class="btn btn-light me-2">
                        <i class="fas fa-check-double me-2"></i>Mark All Read
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-cog me-2"></i>Settings
                    </button>
                </div>
            </div>
        </div>

        <!-- Notifications Controls -->
        <div class="notifications-controls">
            <div class="notification-filters">
                <span class="me-3 fw-semibold text-muted">Filter by:</span>
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-list me-1"></i> All
                </button>
                <button class="filter-btn" data-filter="unread">
                    <i class="fas fa-envelope me-1"></i> Unread (3)
                </button>
                <button class="filter-btn" data-filter="patient">
                    <i class="fas fa-user-plus me-1"></i> Patients
                </button>
                <button class="filter-btn" data-filter="emergency">
                    <i class="fas fa-exclamation-triangle me-1"></i> Emergency
                </button>
                <button class="filter-btn" data-filter="appointment">
                    <i class="fas fa-calendar-check me-1"></i> Appointments
                </button>
                <button class="filter-btn" data-filter="system">
                    <i class="fas fa-cog me-1"></i> System
                </button>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-trash me-1"></i> Clear All
                </button>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="notifications-list" id="notificationsList">
            @foreach($notifications as $notification)
            <div class="notification-item {{ !$notification['read'] ? 'unread' : '' }}" 
                 data-type="{{ $notification['type'] }}" 
                 data-id="{{ $notification['id'] }}">
                <div class="notification-content">
                    <div class="notification-icon {{ $notification['color'] }}">
                        <i class="fas fa-{{ $notification['icon'] }}"></i>
                    </div>
                    <div class="notification-details">
                        <div class="notification-title">{{ $notification['title'] }}</div>
                        <div class="notification-message">{{ $notification['message'] }}</div>
                        <div class="notification-meta">
                            <span class="notification-type">{{ ucfirst($notification['type']) }}</span>
                            <span><i class="fas fa-clock me-1"></i>{{ $notification['time'] }}</span>
                            @if(!$notification['read'])
                                <span class="text-primary fw-semibold">New</span>
                            @endif
                        </div>
                        <div class="notification-actions">
                            @if(!$notification['read'])
                                <button class="btn btn-sm btn-primary mark-read-btn">
                                    <i class="fas fa-check me-1"></i>Mark as Read
                                </button>
                            @endif
                            <button class="btn btn-sm btn-outline-secondary view-details-btn">
                                <i class="fas fa-eye me-1"></i>View Details
                            </button>
                            <button class="btn btn-sm btn-outline-secondary delete-btn">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State (hidden by default) -->
        <div class="notifications-list empty-state" id="emptyState" style="display: none;">
            <i class="fas fa-bell-slash"></i>
            <h5 class="mt-3 mb-2">No notifications found</h5>
            <p>You're all caught up! No notifications match your current filter.</p>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const notifications = document.querySelectorAll('.notification-item');
        const notificationsList = document.getElementById('notificationsList');
        const emptyState = document.getElementById('emptyState');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                let visibleCount = 0;

                notifications.forEach(notification => {
                    const notificationType = notification.getAttribute('data-type');
                    const isUnread = notification.classList.contains('unread');

                    let shouldShow = false;

                    if (filter === 'all') {
                        shouldShow = true;
                    } else if (filter === 'unread') {
                        shouldShow = isUnread;
                    } else {
                        shouldShow = notificationType === filter;
                    }

                    if (shouldShow) {
                        notification.style.display = 'block';
                        visibleCount++;
                    } else {
                        notification.style.display = 'none';
                    }
                });

                // Show/hide empty state
                if (visibleCount === 0) {
                    notificationsList.style.display = 'none';
                    emptyState.style.display = 'block';
                } else {
                    notificationsList.style.display = 'block';
                    emptyState.style.display = 'none';
                }
            });
        });

        // Mark as read functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.mark-read-btn')) {
                e.preventDefault();
                const notificationItem = e.target.closest('.notification-item');
                const markReadBtn = e.target.closest('.mark-read-btn');
                
                // Visual feedback
                markReadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Marking...';
                markReadBtn.disabled = true;

                setTimeout(() => {
                    // Remove unread styling
                    notificationItem.classList.remove('unread');
                    
                    // Remove the "New" badge
                    const newBadge = notificationItem.querySelector('.text-primary.fw-semibold');
                    if (newBadge) {
                        newBadge.remove();
                    }
                    
                    // Remove the mark as read button
                    markReadBtn.remove();
                    
                    // Update unread count in filter
                    updateUnreadCount();
                    
                    // Show success message
                    showNotification('Notification marked as read', 'success');
                }, 1000);
            }
        });

        // View details functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.view-details-btn')) {
                e.preventDefault();
                const notificationItem = e.target.closest('.notification-item');
                const title = notificationItem.querySelector('.notification-title').textContent;
                const message = notificationItem.querySelector('.notification-message').textContent;
                
                // Create modal or show details
                alert(`Notification Details:\n\nTitle: ${title}\nMessage: ${message}\n\nDemo: In a real app, this would open a detailed view.`);
            }
        });

        // Delete functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-btn')) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this notification?')) {
                    const notificationItem = e.target.closest('.notification-item');
                    
                    // Animate out
                    notificationItem.style.transform = 'translateX(100%)';
                    notificationItem.style.opacity = '0';
                    
                    setTimeout(() => {
                        notificationItem.remove();
                        updateUnreadCount();
                        
                        // Check if we need to show empty state
                        const remainingNotifications = document.querySelectorAll('.notification-item');
                        if (remainingNotifications.length === 0) {
                            notificationsList.style.display = 'none';
                            emptyState.style.display = 'block';
                        }
                        
                        showNotification('Notification deleted', 'info');
                    }, 300);
                }
            }
        });

        // Mark all as read functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('button') && e.target.closest('button').textContent.includes('Mark All Read')) {
                e.preventDefault();
                
                const unreadNotifications = document.querySelectorAll('.notification-item.unread');
                
                if (unreadNotifications.length === 0) {
                    showNotification('No unread notifications', 'info');
                    return;
                }

                if (confirm(`Mark all ${unreadNotifications.length} notifications as read?`)) {
                    const btn = e.target.closest('button');
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Marking...';
                    btn.disabled = true;

                    setTimeout(() => {
                        unreadNotifications.forEach(notification => {
                            notification.classList.remove('unread');
                            
                            // Remove "New" badges
                            const newBadge = notification.querySelector('.text-primary.fw-semibold');
                            if (newBadge) {
                                newBadge.remove();
                            }
                            
                            // Remove mark as read buttons
                            const markReadBtn = notification.querySelector('.mark-read-btn');
                            if (markReadBtn) {
                                markReadBtn.remove();
                            }
                        });
                        
                        updateUnreadCount();
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        
                        showNotification('All notifications marked as read', 'success');
                    }, 1500);
                }
            }
        });

        // Clear all functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('button') && e.target.closest('button').textContent.includes('Clear All')) {
                e.preventDefault();
                
                const allNotifications = document.querySelectorAll('.notification-item');
                
                if (allNotifications.length === 0) {
                    showNotification('No notifications to clear', 'info');
                    return;
                }

                if (confirm(`Delete all ${allNotifications.length} notifications? This action cannot be undone.`)) {
                    const btn = e.target.closest('button');
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Clearing...';
                    btn.disabled = true;

                    setTimeout(() => {
                        allNotifications.forEach(notification => {
                            notification.style.transform = 'translateX(100%)';
                            notification.style.opacity = '0';
                        });
                        
                        setTimeout(() => {
                            allNotifications.forEach(notification => notification.remove());
                            
                            notificationsList.style.display = 'none';
                            emptyState.style.display = 'block';
                            
                            updateUnreadCount();
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                            
                            showNotification('All notifications cleared', 'success');
                        }, 300);
                    }, 1000);
                }
            }
        });

        // Update unread count in filter button
        function updateUnreadCount() {
            const unreadCount = document.querySelectorAll('.notification-item.unread').length;
            const unreadBtn = document.querySelector('[data-filter="unread"]');
            unreadBtn.innerHTML = `<i class="fas fa-envelope me-1"></i> Unread (${unreadCount})`;
            
            // Update dropdown badge
            const dropdownBadge = document.querySelector('.admin-profile .badge');
            if (dropdownBadge) {
                if (unreadCount > 0) {
                    dropdownBadge.textContent = unreadCount;
                    dropdownBadge.style.display = 'inline';
                } else {
                    dropdownBadge.style.display = 'none';
                }
            }
        }

        // Show notification helper
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
            `;
            
            notification.innerHTML = `
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

        // Notification click handler (mark as read when clicked)
        document.addEventListener('click', function(e) {
            if (e.target.closest('.notification-item') && !e.target.closest('button')) {
                const notificationItem = e.target.closest('.notification-item');
                if (notificationItem.classList.contains('unread')) {
                    // Automatically mark as read when clicked
                    notificationItem.classList.remove('unread');
                    
                    const newBadge = notificationItem.querySelector('.text-primary.fw-semibold');
                    if (newBadge) {
                        newBadge.remove();
                    }
                    
                    const markReadBtn = notificationItem.querySelector('.mark-read-btn');
                    if (markReadBtn) {
                        markReadBtn.remove();
                    }
                    
                    updateUnreadCount();
                }
            }
        });
    });
</script>
@endsection