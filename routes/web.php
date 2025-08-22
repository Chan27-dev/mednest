<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    Route::get('/settings', [DashboardController::class, 'accountSettings'])->name('settings');
    Route::get('/notifications', [DashboardController::class, 'notificationsPage'])->name('notifications');
});

// Authentication Routes (Demo)
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/login', function() {
    return redirect()->route('dashboard.index')->with('message', 'Demo: Login page - redirected to dashboard');
})->name('login');

// API Routes for AJAX calls
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/stats', [DashboardController::class, 'getStats'])->name('stats');
    Route::post('/search', [DashboardController::class, 'search'])->name('search');
    Route::post('/quick-action', [DashboardController::class, 'quickAction'])->name('quick-action');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('dashboard.index')->with('message', 'Page not found - redirected to dashboard');
});