<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\StaffController;

// User routes (your pages now inside resources/views/user/)
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
    Route::get('/patients', [DashboardController::class, 'patients'])->name('patients');
    Route::get('/appointments', [DashboardController::class, 'appointments'])->name('appointments');
    Route::get('/labor', [DashboardController::class, 'labor'])->name('labor');
    Route::get('/billing', [DashboardController::class, 'billing'])->name('billing');
    Route::get('/staff', [DashboardController::class, 'staff'])->name('staff');
    
    Route::get('/referrals', fn() => redirect()->route('dashboard.index')->with('message', 'Referrals section - Frontend demo'))->name('referrals');
    Route::get('/reports', fn() => redirect()->route('dashboard.index')->with('message', 'Branch Reports section - Frontend demo'))->name('reports');
    Route::get('/settings', fn() => redirect()->route('dashboard.index')->with('message', 'Settings section - Frontend demo'))->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/account-settings', [DashboardController::class, 'accountSettings'])->name('account.settings');
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
// Authentication Routes (Demo)
// -------------------------------------------------------------
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/login', function() {
    return redirect()->route('dashboard.index')->with('message', 'Demo: Login page - redirected to dashboard');
})->name('login');

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
        Route::get('/search', [DashboardController::class, 'searchStaff'])->name('search');
        Route::get('/stats', [DashboardController::class, 'getStaffStats'])->name('stats');
        Route::post('/quick-status-update', [DashboardController::class, 'quickStatusUpdate'])->name('quick.status.update');
        Route::get('/on-duty', [DashboardController::class, 'getOnDutyStaff'])->name('on.duty');
        Route::get('/departments', [DashboardController::class, 'getDepartments'])->name('departments');
        Route::get('/schedule/{id}', [DashboardController::class, 'getStaffSchedule'])->name('schedule');
        Route::post('/bulk-update', [DashboardController::class, 'bulkUpdateStatus'])->name('bulk.update');
    });
});

// -------------------------------------------------------------
// Fallback Route
// -------------------------------------------------------------
Route::fallback(function () {
    return redirect()->route('dashboard.index')->with('message', 'Page not found - redirected to dashboard');
});
