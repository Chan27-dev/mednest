<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

// MedNest Dashboard Routes
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Main dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    // Section pages
    Route::get('/patients', [DashboardController::class, 'patients'])->name('patients');
    Route::get('/appointments', [DashboardController::class, 'appointments'])->name('appointments');
    Route::get('/labor', [DashboardController::class, 'labor'])->name('labor');
    Route::get('/billing', [DashboardController::class, 'billing'])->name('billing');
    Route::get('/staff', [DashboardController::class, 'staff'])->name('staff');
    
    // Demo routes for other sections (redirects to main dashboard)
    Route::get('/referrals', function() {
        return redirect()->route('dashboard.index')->with('message', 'Referrals section - Frontend demo');
    })->name('referrals');
    
    Route::get('/reports', function() {
        return redirect()->route('dashboard.index')->with('message', 'Branch Reports section - Frontend demo');
    })->name('reports');
    
    Route::get('/settings', function() {
        return redirect()->route('dashboard.index')->with('message', 'Settings section - Frontend demo');
    })->name('settings');
    
    // Profile routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/account-settings', [DashboardController::class, 'accountSettings'])->name('account.settings');
    Route::get('/notifications', [DashboardController::class, 'notificationsPage'])->name('notifications');
});

// Staff Management Routes
Route::prefix('staff')->name('staff.')->group(function () {
    // Main staff dashboard
    Route::get('/', [StaffController::class, 'index'])->name('index');
    
    // Staff CRUD operations
    Route::get('/create', [StaffController::class, 'create'])->name('create');
    Route::post('/store', [StaffController::class, 'store'])->name('store');
    Route::get('/{id}', [StaffController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StaffController::class, 'update'])->name('update');
    Route::delete('/{id}', [StaffController::class, 'destroy'])->name('destroy');
    
    // Additional staff management features
    Route::post('/{id}/toggle-status', [StaffController::class, 'toggleStatus'])->name('toggle.status');
    Route::get('/department/{department}', [StaffController::class, 'byDepartment'])->name('by.department');
    Route::get('/export/pdf', [StaffController::class, 'exportPDF'])->name('export.pdf');
    Route::get('/export/excel', [StaffController::class, 'exportExcel'])->name('export.excel');
});

// Simplified Billing System Routes
Route::prefix('billing')->name('billing.')->group(function () {
    // Main billing dashboard (shows patient billing table)
    Route::get('/', [BillingController::class, 'index'])->name('index');
    
    // Basic billing actions
    Route::get('/create', [BillingController::class, 'create'])->name('create');
    Route::get('/patient/{patientId}', [BillingController::class, 'show'])->name('patient');
    Route::get('/edit/{id}', [BillingController::class, 'edit'])->name('edit');
    
    // Demo routes for billing actions (for frontend demo)
    Route::post('/store', function() {
        return redirect()->route('dashboard.billing')->with('message', 'Invoice created successfully - Demo functionality');
    })->name('store');
    
    Route::put('/update/{id}', function($id) {
        return redirect()->route('dashboard.billing')->with('message', 'Billing updated successfully - Demo functionality');
    })->name('update');
    
    Route::delete('/delete/{id}', function($id) {
        return redirect()->route('dashboard.billing')->with('message', 'Billing record deleted - Demo functionality');
    })->name('delete');
});

// Authentication Routes (Demo)
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/login', function() {
    return redirect()->route('dashboard.index')->with('message', 'Demo: Login page - redirected to dashboard');
})->name('login');

// Simplified API Routes for AJAX calls
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/stats', [DashboardController::class, 'getStats'])->name('stats');
    Route::post('/search', [DashboardController::class, 'search'])->name('search');
    Route::post('/quick-action', [DashboardController::class, 'quickAction'])->name('quick-action');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
    
    // Basic billing API routes
    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('/search', [BillingController::class, 'searchPatients'])->name('search');
        Route::get('/stats', [BillingController::class, 'getStats'])->name('stats');
    });
    
    // Staff API Routes for AJAX functionality
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/search', [DashboardController::class, 'searchStaff'])->name('search');
        Route::get('/stats', [DashboardController::class, 'getStaffStats'])->name('stats');
        Route::post('/quick-status-update', [DashboardController::class, 'quickStatusUpdate'])->name('quick.status.update');
        Route::get('/on-duty', [DashboardController::class, 'getOnDutyStaff'])->name('on.duty');
        Route::get('/departments', [DashboardController::class, 'getDepartments'])->name('departments');
        Route::get('/schedule/{id}', [DashboardController::class, 'getStaffSchedule'])->name('schedule');
        Route::post('/bulk-update', [DashboardController::class, 'bulkUpdateStatus'])->name('bulk.update');
    });
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('dashboard.index')->with('message', 'Page not found - redirected to dashboard');
});

// Admin Multi-Branch Management Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Main admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
    
    // Branch-specific views
    Route::get('/branch/{branch}', [AdminController::class, 'getBranchData'])->name('branch.detail');
    
    // AJAX API endpoints for admin
    Route::prefix('api')->name('api.')->group(function () {
        // Real-time statistics
        Route::get('/stats', [AdminController::class, 'getStats'])->name('stats');
        Route::get('/activities', [AdminController::class, 'getRecentActivities'])->name('activities');
        Route::get('/notifications', [AdminController::class, 'getNotifications'])->name('notifications');
        
        // Search functionality
        Route::get('/search', [AdminController::class, 'globalSearch'])->name('search');
        
        // Analytics and reporting
        Route::get('/analytics/{branch?}', [AdminController::class, 'getBranchAnalytics'])->name('analytics');
        Route::get('/comparison', [AdminController::class, 'getBranchComparison'])->name('comparison');
        
        // Notifications management
        Route::post('/notifications/{id}/read', [AdminController::class, 'markNotificationRead'])->name('notifications.read');
        
        // Export functionality
        Route::post('/export', [AdminController::class, 'exportReport'])->name('export');
    });
    
    // Report downloads
    Route::get('/reports/download', function(Request $request) {
        // Demo download functionality
        return response()->json([
            'message' => 'Report download feature - Demo functionality',
            'parameters' => $request->all()
        ]);
    })->name('reports.download');
    
    // Placeholder routes for quick actions (you can implement these later)
    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('/create', function() {
            return redirect()->route('admin.dashboard')->with('message', 'Add Patient feature - Coming soon');
        })->name('create');
        Route::get('/{id}', function($id) {
            return redirect()->route('admin.dashboard')->with('message', 'Patient details - Demo');
        })->name('show');
    });
    
    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/create', function() {
            return redirect()->route('admin.dashboard')->with('message', 'Schedule Appointment feature - Coming soon');
        })->name('create');
        Route::get('/{id}', function($id) {
            return redirect()->route('admin.dashboard')->with('message', 'Appointment details - Demo');
        })->name('show');
    });
    
    Route::prefix('labor')->name('labor.')->group(function () {
        Route::get('/monitor', function() {
            return redirect()->route('admin.dashboard')->with('message', 'Labor Monitoring feature - Coming soon');
        })->name('monitor');
    });
    
    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('/create', function() {
            return redirect()->route('admin.dashboard')->with('message', 'Generate Bill feature - Coming soon');
        })->name('create');
    });
    
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/{id}', function($id) {
            return redirect()->route('admin.dashboard')->with('message', 'Staff details - Demo');
        })->name('show');
    });
});