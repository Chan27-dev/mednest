<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\LaborController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Patient Management
    Route::resource('patients', PatientController::class);
    Route::get('/patients/export', [PatientController::class, 'export'])->name('patients.export');
    
    // Appointments
    Route::resource('appointments', AppointmentController::class);
    
    // Staff Management
    Route::resource('staff', StaffController::class);
    
    // Labor Monitoring
    Route::get('/labor', [LaborController::class, 'index'])->name('labor.index');
    Route::post('/labor', [LaborController::class, 'store'])->name('labor.store');
    Route::get('/labor/{id}', [LaborController::class, 'show'])->name('labor.show');
    Route::put('/labor/{id}', [LaborController::class, 'update'])->name('labor.update');
    
    // Billing System
    Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
    Route::post('/billing', [BillingController::class, 'store'])->name('billing.store');
    Route::get('/billing/{id}', [BillingController::class, 'show'])->name('billing.show');
    
    // Referrals
    Route::resource('referrals', ReferralController::class);
    
    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
    
    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    
    // Profile & Settings
    Route::get('/profile', function() {
        return view('admin.profile.show');
    })->name('profile.show');
    
    Route::get('/settings', function() {
        return view('admin.settings.index');
    })->name('settings.index');
});

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin/api')->name('admin.api.')->group(function () {
    
    // Dashboard APIs
    Route::get('/stats', [DashboardController::class, 'getStats'])->name('stats');
    Route::get('/activities', [DashboardController::class, 'getActivities'])->name('activities');
    Route::post('/export', [DashboardController::class, 'export'])->name('export');
    Route::delete('/cache', [DashboardController::class, 'clearCache'])->name('cache.clear');
    
    // Global Search
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
    
    // Patient APIs
    Route::get('/patients', [PatientController::class, 'getPatients'])->name('patients');
    Route::get('/patients/stats', [PatientController::class, 'getStats'])->name('patients.stats');
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
    
    // Appointment APIs
    Route::get('/appointments', [AppointmentController::class, 'getAppointments'])->name('appointments');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    
    // Notification APIs
    Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    
});

/*
|--------------------------------------------------------------------------
| Route Model Bindings
|--------------------------------------------------------------------------
*/

Route::bind('patient', function ($value) {
    return \App\Models\Patient::findOrFail($value);
});

Route::bind('appointment', function ($value) {
    return \App\Models\Appointment::findOrFail($value);
});

Route::bind('staff', function ($value) {
    return \App\Models\Staff::findOrFail($value);
});

/*
|--------------------------------------------------------------------------
| Example Usage in Blade Templates
|--------------------------------------------------------------------------
*/

/*
<!-- Dashboard Navigation -->
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
<a href="{{ route('admin.patients.index') }}">Patients</a>
<a href="{{ route('admin.appointments.index') }}">Appointments</a>

<!-- Quick Actions -->
<a href="{{ route('admin.appointments.create') }}">New Appointment</a>
<a href="{{ route('admin.patients.create') }}">Add Patient</a>

<!-- API Calls in JavaScript -->
<script>
// Get dashboard stats
fetch('{{ route("admin.api.stats") }}')
    .then(response => response.json())
    .then(data => console.log(data));

// Search functionality
fetch('{{ route("admin.api.search") }}?q=maria')
    .then(response => response.json())
    .then(data => console.log(data.results));

// Export report
fetch('{{ route("admin.api.export") }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        format: 'pdf',
        date_range: 'month'
    })
});
</script>
*/

/*
|--------------------------------------------------------------------------
| Middleware Setup Instructions
|--------------------------------------------------------------------------

1. Create Admin Middleware:
php artisan make:middleware AdminMiddleware

2. In app/Http/Middleware/AdminMiddleware.php:

<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            return redirect('/')->with('error', 'Unauthorized access');
        }
        return $next($request);
    }
}

3. Register in app/Http/Kernel.php:

protected $middlewareAliases = [
    // ... other middleware
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];

|--------------------------------------------------------------------------
| Database Seeder for Testing
|--------------------------------------------------------------------------

// In database/seeders/AdminDashboardSeeder.php

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Branch;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Staff;
use Carbon\Carbon;

class AdminDashboardSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mednest.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 'admin'
        ]);

        // Create branches
        $branches = [
            ['name' => 'Daraga', 'address' => 'Daraga, Albay', 'phone' => '+63-912-345-6789'],
            ['name' => 'Sto. Domingo', 'address' => 'Sto. Domingo, Albay', 'phone' => '+63-917-654-3210'],
            ['name' => 'Arimbay', 'address' => 'Arimbay, Albay', 'phone' => '+63-928-765-4321']
        ];

        foreach ($branches as $branchData) {
            Branch::create($branchData);
        }

        // Create sample patients, appointments, and payments
        $this->createSampleData();
    }

    private function createSampleData()
    {
        $branches = Branch::all();
        
        foreach ($branches as $branch) {
            // Create patients for each branch
            for ($i = 1; $i <= 100; $i++) {
                $patient = Patient::create([
                    'patient_id' => 'MN' . str_pad($branch->id . $i, 6, '0', STR_PAD_LEFT),
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'email' => fake()->unique()->safeEmail(),
                    'phone' => '+63-9' . fake()->numberBetween(100000000, 999999999),
                    'date_of_birth' => fake()->dateTimeBetween('-45 years', '-18 years'),
                    'gender' => 'female',
                    'address' => fake()->address(),
                    'branch_id' => $branch->id,
                    'emergency_contact' => fake()->name(),
                    'emergency_phone' => '+63-9' . fake()->numberBetween(100000000, 999999999),
                    'insurance_type' => fake()->randomElement([null, 'philhealth', 'private']),
                    'status' => fake()->randomElement(['active', 'inactive'])
                ]);

                // Create appointments for some patients
                if (fake()->boolean(70)) {
                    $appointment = Appointment::create([
                        'patient_id' => $patient->id,
                        'branch_id' => $branch->id,
                        'appointment_date' => fake()->dateTimeBetween('now', '+30 days'),
                        'service_type' => fake()->randomElement(['consultation', 'prenatal', 'ultrasound', 'labor']),
                        'status' => fake()->randomElement(['scheduled', 'confirmed', 'completed']),
                        'fee' => fake()->numberBetween(1000, 5000)
                    ]);

                    // Create payment for some appointments
                    if (fake()->boolean(80)) {
                        Payment::create([
                            'patient_id' => $patient->id,
                            'appointment_id' => $appointment->id,
                            'payment_reference' => 'PAY-' . strtoupper(fake()->bothify('???###')),
                            'amount' => $appointment->fee,
                            'payment_method' => fake()->randomElement(['cash', 'card', 'insurance']),
                            'status' => fake()->randomElement(['completed', 'pending']),
                            'payment_date' => fake()->dateTimeBetween('-30 days', 'now'),
                            'description' => 'Payment for ' . $appointment->service_type
                        ]);
                    }
                }
            }
        }
    }
}

|--------------------------------------------------------------------------
| Installation Instructions
|--------------------------------------------------------------------------

1. Create the Blade template:
   - Save the dashboard blade template as: resources/views/admin/dashboard.blade.php

2. Create the layout and partials:
   - Create: resources/views/layouts/admin.blade.php
   - Create: resources/views/admin/partials/sidebar.blade.php  
   - Create: resources/views/admin/partials/header.blade.php

3. Create the controller:
   - Save as: app/Http/Controllers/Admin/DashboardController.php

4. Add routes:
   - Add the route configuration to your routes/web.php

5. Run migrations and seeders:
   php artisan migrate
   php artisan db:seed --class=AdminDashboardSeeder

6. Create the middleware:
   php artisan make:middleware AdminMiddleware

7. Test the dashboard:
   - Visit: /admin/dashboard
   - Login with: admin@mednest.com / password

|--------------------------------------------------------------------------
| Additional Features You May Want to Add
|--------------------------------------------------------------------------

- Real-time notifications using Laravel Broadcasting
- Advanced charting with Chart.js integration
- Data export in multiple formats (Excel, PDF, CSV)
- User activity logging and audit trails
- Advanced filtering and search capabilities
- Mobile app API endpoints
- Automated report scheduling
- Integration with external medical systems
*/