<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WalkInPatientController;

Route::prefix('user')->group(function () {
    Route::get('/about', function () {
        return view('user.about');
    })->name('user.about');

    Route::get('/services', function () {
        return view('user.services');
    })->name('user.services');

    Route::get('/appointment', function () {
        return view('user.appointment');
    })->name('user.appointment');

    Route::get('/landing_page', function () {
        return view('user.landing_page');
    })->name('user.landing_page');
});

// ✅ Default route (optional – can point to user landing page)
Route::get('/', function () {
    return view('user.landing_page');
})->name('user.landing_page');

// -------------------------------------------------------------
// MedNest Dashboard Routes
// -------------------------------------------------------------
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Corrected routes for patient management
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    // Route specifically for the walk-in patient modal
    Route::post('/walk-in-patient', [WalkInPatientController::class, 'store'])->name('walkin.store');

    Route::get('/appointments', [DashboardController::class, 'appointments'])->name('appointments');
    Route::get('/labor', [DashboardController::class, 'labor'])->name('labor');
    Route::get('/billing', [DashboardController::class, 'billing'])->name('billing');

    // Demo routes for other sections (redirects to main dashboard)
    Route::get('/referrals', function() {
        return redirect()->route('dashboard.index')->with('message', 'Referrals section - Frontend demo');
    })->name('referrals');

    Route::get('/reports', function() {
        return redirect()->route('dashboard.index')->with('message', 'Branch Reports section - Frontend demo');
    })->name('reports');

    // Settings route - now a real page
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    // Profile routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/notifications', [DashboardController::class, 'notificationsPage'])->name('notifications');
});

// -------------------------------------------------------------
// Staff Management Routes
// -------------------------------------------------------------
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('index');
    Route::get('/create', [StaffController::class, 'create'])->name('create');
    Route::post('/store', [StaffController::class, 'store'])->name('store');
    Route::get('/{id}', [StaffController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StaffController::class, 'update'])->name('update');
    Route::delete('/{id}', [StaffController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/toggle-status', [StaffController::class, 'toggleStatus'])->name('toggle.status');
    Route::get('/department/{department}', [StaffController::class, 'byDepartment'])->name('by.department');
    Route::get('/export/pdf', [StaffController::class, 'exportPDF'])->name('export.pdf');
    Route::get('/export/excel', [StaffController::class, 'exportExcel'])->name('export.excel');
});

// -------------------------------------------------------------
// Billing Routes
// -------------------------------------------------------------
Route::prefix('billing')->name('billing.')->group(function () {
    Route::get('/', [BillingController::class, 'index'])->name('index');
    Route::get('/create', [BillingController::class, 'create'])->name('create');
    Route::get('/patient/{patientId}', [BillingController::class, 'show'])->name('patient');
    Route::get('/edit/{id}', [BillingController::class, 'edit'])->name('edit');

    // Demo billing routes
    Route::post('/store', fn() => redirect()->route('dashboard.billing')->with('message', 'Invoice created successfully - Demo functionality'))->name('store');
    Route::put('/update/{id}', fn($id) => redirect()->route('dashboard.billing')->with('message', 'Billing updated successfully - Demo functionality'))->name('update');
    Route::delete('/delete/{id}', fn($id) => redirect()->route('dashboard.billing')->with('message', 'Billing record deleted - Demo functionality'))->name('delete');
});

// -------------------------------------------------------------
// Authentication Routes
// -------------------------------------------------------------
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

// Apply the 'guest' middleware to redirect authenticated users away from the login page.
Route::middleware('guest')->group(function () {
    Route::get('adminLogin', [DashboardController::class, 'loginCreate'])->name('login');
    Route::post('adminLogin', [DashboardController::class, 'loginPost']);
});
// -------------------------------------------------------------
// API Routes
// -------------------------------------------------------------
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/stats', [DashboardController::class, 'getStats'])->name('stats');
    Route::post('/search', [DashboardController::class, 'search'])->name('search');
    Route::post('/quick-action', [DashboardController::class, 'quickAction'])->name('quick-action');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');

    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('/search', [BillingController::class, 'searchPatients'])->name('search');
        Route::get('/stats', [BillingController::class, 'getStats'])->name('stats');
    });

    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/search', [DashboardController::class, 'staffSearchMembers'])->name('search');
        Route::get('/stats', [DashboardController::class, 'staffGetStats'])->name('stats');
        Route::post('/quick-status-update', [DashboardController::class, 'staffQuickStatusUpdate'])->name('quick.status.update');
        Route::get('/on-duty', [DashboardController::class, 'staffGetOnDuty'])->name('on.duty');
        // The getDepartments method is missing, you may need to create it in DashboardController
        // Route::get('/departments', [DashboardController::class, 'getDepartments'])->name('departments');
        Route::get('/schedule/{id}', [DashboardController::class, 'staffGetSchedule'])->name('schedule');
        // The bulkUpdateStatus method is missing, you may need to create it in DashboardController
        // Route::post('/bulk-update', [DashboardController::class, 'bulkUpdateStatus'])->name('bulk.update');
    });
});

// -------------------------------------------------------------
// Fallback Route
// -------------------------------------------------------------
Route::fallback(function () {
    return redirect()->route('dashboard.index')->with('message', 'Page not found - redirected to dashboard');
});

// Admin Multi-Branch Management Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Main admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Patient records route
    Route::get('/patient-records', [AdminController::class, 'patients'])->name('patients');

    // Billing System route
    Route::get('/billing-system', [AdminController::class, 'billingSystem'])->name('billing.system');

    // Staff Management route
    Route::get('/staff-management', [AdminController::class, 'staffManagement'])->name('staff.management');

    // Branch Report route
    Route::get('/branch-report', [AdminController::class, 'branchReport'])->name('branch.report');

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

        // Billing System API routes
        Route::prefix('billing')->name('billing.')->group(function () {
            Route::get('/payments', [AdminController::class, 'getPayments'])->name('payments');
            Route::get('/invoices', [AdminController::class, 'getInvoices'])->name('invoices');
            Route::get('/stats', [AdminController::class, 'getBillingStats'])->name('stats');
            Route::post('/search', [AdminController::class, 'searchBilling'])->name('search');
            Route::post('/export', [AdminController::class, 'exportBilling'])->name('export');
        });

        // Branch Report API routes
        Route::prefix('report')->name('report.')->group(function () {
            Route::get('/data', [AdminController::class, 'getReportData'])->name('data');
            Route::post('/export-pdf', [AdminController::class, 'exportReportPDF'])->name('export.pdf');
            Route::post('/export-excel', [AdminController::class, 'exportReportExcel'])->name('export.excel');
        });

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

    // Placeholder routes for quick actions
    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('/create', function() {
            return redirect()->route('admin.patients')->with('message', 'Add Patient feature - Coming soon');
        })->name('create');
        Route::get('/{id}', function($id) {
            return redirect()->route('admin.patients')->with('message', 'Patient details - Demo');
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

    // Updated billing routes to avoid conflict
    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('/create', function() {
            return redirect()->route('admin.billing.system')->with('message', 'Generate Bill feature - Coming soon');
        })->name('create');
        Route::get('/invoice/{id}', function($id) {
            return redirect()->route('admin.billing.system')->with('message', 'Invoice details - Demo');
        })->name('invoice.show');
        Route::get('/payment/{id}', function($id) {
            return redirect()->route('admin.billing.system')->with('message', 'Payment details - Demo');
        })->name('payment.show');
    }); 

    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/{id}', function($id) {
            return redirect()->route('admin.dashboard')->with('message', 'Staff details - Demo');
        })->name('show');
    });
});

// Placeholder for password reset to make the link work
Route::get('/forgot-password', function () {
    return 'This is the forgot password page. It needs to be implemented.';
})->name('password.request');
