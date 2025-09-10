<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillingController;

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
    
    // Demo routes for other sections (redirects to main dashboard)
    Route::get('/referrals', function() {
        return redirect()->route('dashboard.index')->with('message', 'Referrals section - Frontend demo');
    })->name('referrals');
    
    Route::get('/reports', function() {
        return redirect()->route('dashboard.index')->with('message', 'Branch Reports section - Frontend demo');
    })->name('reports');
    
    Route::get('/staff', function() {
        return redirect()->route('dashboard.index')->with('message', 'Staff Management section - Frontend demo');
    })->name('staff');
    
    Route::get('/settings', function() {
        return redirect()->route('dashboard.index')->with('message', 'Settings section - Frontend demo');
    })->name('settings');
    
    // Profile routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/account-settings', [DashboardController::class, 'accountSettings'])->name('account.settings');
    Route::get('/notifications', [DashboardController::class, 'notificationsPage'])->name('notifications');
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
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('dashboard.index')->with('message', 'Page not found - redirected to dashboard');
});