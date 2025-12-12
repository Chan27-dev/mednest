<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        // Static data for frontend demo
        $data = [
            'stats' => [
                'total_patients' => 156,
                'total_appointments' => 42,
                'active_labor_cases' => '₱85,420',
                'monthly_revenue' => 4.8
            ],
            'recent_activities' => [
                [
                    'time' => '08:04 AM',
                    'activity' => 'Prenatal Checkup',
                    'patient' => 'Maria Santos',
                    'branch' => 'Sto. Domingo',
                    'status' => 'Completed',
                    'status_class' => 'completed'
                ],
                [
                    'time' => '10:15 AM',
                    'activity' => 'Labor Monitoring',
                    'patient' => 'Ana Cruz',
                    'branch' => 'Daraga',
                    'status' => 'Active',
                    'status_class' => 'active'
                ],
                [
                    'time' => '01:45 AM',
                    'activity' => 'Appointment Scheduled',
                    'patient' => 'Carmen Lopez',
                    'branch' => 'Arimbay',
                    'status' => 'Pending',
                    'status_class' => 'pending'
                ]
            ],
            'today_summary' => [
                'new_patients' => 12,
                'deliveries' => 8,
                'pending' => 5
            ],
            'branch_status' => [
                ['name' => 'Sto. Domingo Branch', 'status' => 'Online', 'class' => 'success'],
                ['name' => 'Daraga', 'status' => 'Online', 'class' => 'success'],
                ['name' => 'Arimbay Branch', 'status' => 'Maintenance', 'class' => 'warning']
            ]
        ];

        return view('dashboard.index', compact('data'));
    }

    public function patients()
    {
        // Fetch paginated patient records from the database, ordering by the latest.
        // You can adjust the number of items per page as needed.
        $patients = Patient::latest()->paginate(10);

        return view('dashboard.patients', compact('patients'));
    }

    public function appointments()
    {
        $appointments = [
            [
                'patient' => 'Antonette',
                'email' => 'kim@email.com',
                'date_time' => '10:00 AM',
                'date' => 'March 25, 2025',
                'service' => 'Consultation',
                'assigned_staff' => 'Dr. Budnessa B. Ocampo',
                'payment' => '₱1,500.00',
                'status' => 'CONFIRMED',
                'actions' => ['edit', 'delete']
            ],
            [
                'patient' => 'Errole',
                'email' => 'john.e@email.com',
                'date_time' => '10:00 AM',
                'date' => 'March 25, 2025',
                'service' => 'Labor Monitoring',
                'assigned_staff' => 'Dr. Muriel D. Medel',
                'payment' => '₱1,500.00',
                'status' => 'CONFIRMED',
                'actions' => ['edit', 'delete']
            ],
            [
                'patient' => 'Christian',
                'email' => 'john.chris@email.com',
                'date_time' => '10:00 AM',
                'date' => 'March 25, 2025',
                'service' => 'Pre-natal Check Up',
                'assigned_staff' => 'Dr. Budnessa B. Ocampo',
                'payment' => '₱1,500.00',
                'status' => 'CONFIRMED',
                'actions' => ['edit', 'delete']
            ],
            [
                'patient' => 'Joven',
                'email' => 'mark@email.com',
                'date_time' => '10:00 AM',
                'date' => 'March 25, 2025',
                'service' => 'Ultrasound',
                'assigned_staff' => 'Dr. Budnessa B. Ocampo',
                'payment' => '₱1,500.00',
                'status' => 'CONFIRMED',
                'actions' => ['edit', 'delete']
            ]
        ];

        return view('dashboard.appointments', compact('appointments'));
    }

    public function labor()
    {
        $laborCases = [
            [
                'id' => 1,
                'patient' => 'Ana Cruz',
                'stage' => 'Active Labor',
                'duration' => '4 hours 20 minutes',
                'dilation' => '7 cm',
                'contractions' => '3 min apart',
                'doctor' => 'Dr. Martinez',
                'branch' => 'Daraga'
            ]
        ];

        return view('dashboard.labor', compact('laborCases'));
    }

    // =========================
    // BILLING METHODS
    // =========================

    /**
     * Display the main billing dashboard
     */
    public function billing(): View
    {
        // Sample billing records - replace with actual database queries
        $billingRecords = [
            [
                'id' => 'P-001',
                'name' => 'Maria Santos',
                'email' => 'maria.santos@email.com',
                'service' => 'Consultation',
                'date' => 'May 30, 2025',
                'amount' => '₱1,500.00',
                'status' => 'paid'
            ],
            [
                'id' => 'P-002',
                'name' => 'Ana Cruz',
                'email' => 'ana.cruz@email.com',
                'service' => 'Pre-natal Check Up',
                'date' => 'May 28, 2025',
                'amount' => '₱2,000.00',
                'status' => 'pending'
            ],
            [
                'id' => 'P-003',
                'name' => 'Maria Garcia',
                'email' => 'maria.garcia@email.com',
                'service' => 'Ultrasound',
                'date' => 'May 15, 2025',
                'amount' => '₱2,500.00',
                'status' => 'overdue'
            ],
            [
                'id' => 'P-004',
                'name' => 'Carmen Lopez',
                'email' => 'carmen.lopez@email.com',
                'service' => 'Consultation',
                'date' => 'May 25, 2025',
                'amount' => '₱1,500.00',
                'status' => 'paid'
            ]
        ];

        // Sample statistics
        $stats = [
            'monthly_revenue' => '₱125,400',
            'pending_payments' => 23,
            'total_patients' => 156,
            'overdue_count' => 5
        ];

        return view('dashboard.billing', compact('billingRecords', 'stats'));
    }

    /**
     * Show the form for creating a new invoice
     */
    public function billingCreate(): View
    {
        // Get patients for dropdown - replace with actual query
        $patients = [
            ['id' => 1, 'name' => 'Maria Santos'],
            ['id' => 2, 'name' => 'Ana Cruz'],
            ['id' => 3, 'name' => 'Maria Garcia'],
            ['id' => 4, 'name' => 'Carmen Lopez']
        ];

        // Get services for dropdown
        $services = [
            ['id' => 'consultation', 'name' => 'Consultation', 'price' => 1500],
            ['id' => 'prenatal', 'name' => 'Pre-natal Check Up', 'price' => 2000],
            ['id' => 'ultrasound', 'name' => 'Ultrasound', 'price' => 2500],
            ['id' => 'delivery', 'name' => 'Delivery', 'price' => 15000]
        ];

        return view('billing.create', compact('patients', 'services'));
    }

    /**
     * Store a newly created invoice
     */
    public function billingStore(Request $request): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'service' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'service_date' => 'required|date',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Here you would typically save to database
        // Example:
        /*
        $invoice = new Invoice();
        $invoice->patient_name = $validated['patient_name'];
        $invoice->service = $validated['service'];
        $invoice->amount = $validated['amount'];
        $invoice->service_date = $validated['service_date'];
        $invoice->notes = $validated['notes'];
        $invoice->status = 'pending';
        $invoice->save();
        */

        return redirect()->route('dashboard.billing')
            ->with('message', 'Invoice created successfully for ' . $validated['patient_name']);
    }

    /**
     * Display patient billing details
     */
    public function billingShow(string $patientId): View
    {
        // Sample patient data - replace with actual database query
        $patient = [
            'id' => $patientId,
            'name' => 'Maria Santos',
            'email' => 'maria.santos@email.com',
            'age' => 28,
            'contact' => '0917-123-4567',
            'total_amount' => 2500.00,
            'amount_paid' => 1500.00,
            'balance' => 1000.00,
            'last_visit' => 'May 30, 2025'
        ];

        // Sample transactions
        $transactions = [
            [
                'id' => 1,
                'date' => 'May 30, 2025',
                'service' => 'Consultation',
                'amount' => 1500.00,
                'status' => 'paid'
            ],
            [
                'id' => 2,
                'date' => 'May 15, 2025',
                'service' => 'Ultrasound',
                'amount' => 1000.00,
                'status' => 'pending'
            ]
        ];

        return view('billing.show', compact('patient', 'transactions'));
    }

    /**
     * Show the form for editing a billing record
     */
    public function billingEdit(string $id): View
    {
        // Sample patient data - replace with actual database query
        $patient = [
            'id' => $id,
            'name' => 'Maria Santos',
            'email' => 'maria.santos@email.com',
            'age' => 28,
            'contact' => '0917-123-4567',
            'status' => 'active',
            'notes' => 'Regular patient, no complications'
        ];

        return view('billing.edit', compact('patient'));
    }

    /**
     * Update the specified billing record
     */
    public function billingUpdate(Request $request, string $id): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'contact' => 'required|string|max:20',
            'status' => 'required|in:paid,pending,overdue,cancelled',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Here you would typically update the database
        // Example:
        /*
        $patient = Patient::findOrFail($id);
        $patient->name = $validated['patient_name'];
        $patient->age = $validated['age'];
        $patient->contact = $validated['contact'];
        $patient->status = $validated['status'];
        $patient->notes = $validated['notes'];
        $patient->save();
        */

        return redirect()->route('dashboard.billing')
            ->with('message', 'Patient record updated successfully for ' . $validated['patient_name']);
    }

    /**
     * Remove the specified billing record
     */
    public function billingDelete(string $id): RedirectResponse
    {
        // Here you would typically delete from database
        // Example:
        /*
        $patient = Patient::findOrFail($id);
        $patient->delete();
        */

        return redirect()->route('dashboard.billing')
            ->with('message', 'Billing record deleted successfully');
    }

    /**
     * Search for patients (AJAX endpoint)
     */
    public function billingSearchPatients(Request $request)
    {
        $query = $request->get('query', '');
        
        // Sample search results - replace with actual database search
        $patients = [
            ['id' => 'P-001', 'name' => 'Maria Santos', 'contact' => '0917-123-4567'],
            ['id' => 'P-002', 'name' => 'Ana Cruz', 'contact' => '0918-765-4321'],
            ['id' => 'P-003', 'name' => 'Maria Garcia', 'contact' => '0919-555-1234'],
            ['id' => 'P-004', 'name' => 'Carmen Lopez', 'contact' => '0917-123-9567']
        ];

        // Filter based on query
        if ($query) {
            $patients = array_filter($patients, function($patient) use ($query) {
                return stripos($patient['name'], $query) !== false ||
                       stripos($patient['id'], $query) !== false ||
                       stripos($patient['contact'], $query) !== false;
            });
        }

        return response()->json([
            'patients' => array_values($patients)
        ]);
    }

    /**
     * Get billing statistics (AJAX endpoint)
     */
    public function billingGetStats()
    {
        // Calculate real-time statistics - replace with actual calculations
        $stats = [
            'monthly_revenue' => [
                'value' => '₱125,400',
                'change' => '+12.5%',
                'trend' => 'up'
            ],
            'pending_payments' => [
                'value' => 23,
                'change' => '-3',
                'trend' => 'down'
            ],
            'total_invoices' => [
                'value' => 156,
                'change' => '+8',
                'trend' => 'up'
            ],
            'overdue_count' => [
                'value' => 5,
                'change' => '-2',
                'trend' => 'down'
            ]
        ];

        return response()->json($stats);
    }

    /**
     * Get patient balance
     */
    public function billingGetPatientBalance(string $patientId)
    {
        // Calculate patient balance - replace with actual calculation
        $balance = [
            'total_amount' => 2500.00,
            'amount_paid' => 1500.00,
            'balance' => 1000.00,
            'last_payment_date' => 'May 30, 2025',
            'payment_history' => [
                ['date' => 'May 30, 2025', 'amount' => 1500.00, 'method' => 'Cash'],
                ['date' => 'April 15, 2025', 'amount' => 500.00, 'method' => 'Card']
            ]
        ];

        return response()->json($balance);
    }

    /**
     * Record a payment
     */
    public function billingRecordPayment(Request $request, string $patientId): RedirectResponse
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|in:cash,card,check,bank_transfer',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string|max:500'
        ]);

        // Here you would record the payment in database
        // Example:
        /*
        $payment = new Payment();
        $payment->patient_id = $patientId;
        $payment->amount = $validated['amount'];
        $payment->payment_method = $validated['payment_method'];
        $payment->payment_date = $validated['payment_date'];
        $payment->notes = $validated['notes'];
        $payment->save();
        */

        return redirect()->route('billing.patient', $patientId)
            ->with('message', 'Payment of ₱' . number_format($validated['amount'], 2) . ' recorded successfully');
    }

    /**
     * Generate billing reports
     */
    public function billingReports(Request $request): View
    {
        $type = $request->get('type', 'monthly');
        $startDate = $request->get('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', now()->endOfMonth()->format('Y-m-d'));

        // Generate report data based on type
        $reportData = $this->generateBillingReportData($type, $startDate, $endDate);

        return view('billing.reports', compact('reportData', 'type', 'startDate', 'endDate'));
    }

    // =========================
    // STAFF METHODS
    // =========================

    /**
     * Display the main staff management dashboard
     */
    public function staff(): View
    {
        // Sample staff records - replace with actual database queries
        $staffRecords = [
            [
                'id' => 'ST-001',
                'name' => 'Dr. Michelle Garcia',
                'designation' => 'Obstetrician',
                'department' => 'Labor & Delivery',
                'contact' => '0917-123-4567',
                'qr_gyn' => 'OB-GYN',
                'last_visit' => 'Oct 23, 2024',
                'status' => 'On Duty'
            ],
            [
                'id' => 'ST-002',
                'name' => 'Nurse Maria Martinez',
                'designation' => 'Registered Nurse',
                'department' => 'Maternity',
                'contact' => '0918-765-4321',
                'qr_gyn' => 'OB-GYN',
                'last_visit' => 'Oct 23, 2024',
                'status' => 'Off Duty'
            ],
            [
                'id' => 'ST-003',
                'name' => 'Midwife Carmen Santos',
                'designation' => 'Licensed Midwife',
                'department' => 'Prenatal Care',
                'contact' => '0919-456-7890',
                'qr_gyn' => 'OB-GYN',
                'last_visit' => 'Oct 22, 2024',
                'status' => 'On Duty'
            ],
            [
                'id' => 'ST-004',
                'name' => 'Dr. James Wilson',
                'designation' => 'Gynecologist',
                'department' => 'Gynecology',
                'contact' => '0920-567-8901',
                'qr_gyn' => 'OB-GYN',
                'last_visit' => 'Oct 21, 2024',
                'status' => 'On Duty'
            ]
        ];

        // Sample statistics
        $stats = [
            'total_staff' => 12,
            'on_duty_today' => 8,
            'off_duty' => 4,
            'departments' => 6
        ];

        return view('dashboard.staff', compact('staffRecords', 'stats'));
    }

    /**
     * Search for staff members (AJAX endpoint)
     */
    public function staffSearchMembers(Request $request)
    {
        $query = $request->get('query', '');
        $department = $request->get('department', '');
        $status = $request->get('status', '');
        
        // Sample search results - replace with actual database search
        $staff = [
            ['id' => 'ST-001', 'name' => 'Dr. Michelle Garcia', 'designation' => 'Obstetrician', 'department' => 'Labor & Delivery', 'status' => 'On Duty'],
            ['id' => 'ST-002', 'name' => 'Nurse Maria Martinez', 'designation' => 'Registered Nurse', 'department' => 'Maternity', 'status' => 'Off Duty'],
            ['id' => 'ST-003', 'name' => 'Midwife Carmen Santos', 'designation' => 'Licensed Midwife', 'department' => 'Prenatal Care', 'status' => 'On Duty'],
            ['id' => 'ST-004', 'name' => 'Dr. James Wilson', 'designation' => 'Gynecologist', 'department' => 'Gynecology', 'status' => 'On Duty']
        ];

        // Apply filters
        if ($query) {
            $staff = array_filter($staff, function($member) use ($query) {
                return stripos($member['name'], $query) !== false ||
                       stripos($member['designation'], $query) !== false ||
                       stripos($member['id'], $query) !== false;
            });
        }

        if ($department) {
            $staff = array_filter($staff, function($member) use ($department) {
                return $member['department'] === $department;
            });
        }

        if ($status) {
            $staff = array_filter($staff, function($member) use ($status) {
                return $member['status'] === $status;
            });
        }

        return response()->json([
            'staff' => array_values($staff),
            'total' => count($staff)
        ]);
    }

    /**
     * Get staff statistics (AJAX endpoint)
     */
    public function staffGetStats()
    {
        // Calculate real-time statistics - replace with actual calculations
        $stats = [
            'total_staff' => [
                'value' => 12,
                'change' => '+2',
                'trend' => 'up'
            ],
            'on_duty_today' => [
                'value' => 8,
                'change' => '+1',
                'trend' => 'up'
            ],
            'departments' => [
                'value' => 6,
                'change' => '0',
                'trend' => 'stable'
            ],
            'performance' => [
                'value' => '94.5%',
                'change' => '+2.1%',
                'trend' => 'up'
            ]
        ];

        // Department breakdown
        $departmentStats = [
            'Labor & Delivery' => ['total' => 3, 'on_duty' => 2],
            'Maternity' => ['total' => 4, 'on_duty' => 3],
            'Prenatal Care' => ['total' => 2, 'on_duty' => 1],
            'Gynecology' => ['total' => 2, 'on_duty' => 2],
            'Pharmacy' => ['total' => 1, 'on_duty' => 0]
        ];

        return response()->json([
            'stats' => $stats,
            'department_stats' => $departmentStats,
            'recent_activities' => [
                ['staff' => 'Dr. Michelle Garcia', 'action' => 'Clock In', 'time' => '8:00 AM'],
                ['staff' => 'Nurse Maria Martinez', 'action' => 'Patient Care', 'time' => '7:30 AM'],
                ['staff' => 'Midwife Carmen Santos', 'action' => 'Consultation', 'time' => '7:15 AM']
            ]
        ]);
    }

    /**
     * Get on-duty staff (AJAX endpoint)
     */
    public function staffGetOnDuty()
    {
        // Sample on-duty staff - replace with actual database query
        $onDutyStaff = [
            [
                'id' => 'ST-001',
                'name' => 'Dr. Michelle Garcia',
                'designation' => 'Obstetrician',
                'department' => 'Labor & Delivery',
                'shift_start' => '08:00 AM',
                'shift_end' => '05:00 PM'
            ],
            [
                'id' => 'ST-003',
                'name' => 'Midwife Carmen Santos',
                'designation' => 'Licensed Midwife',
                'department' => 'Prenatal Care',
                'shift_start' => '02:00 PM',
                'shift_end' => '10:00 PM'
            ],
            [
                'id' => 'ST-004',
                'name' => 'Dr. James Wilson',
                'designation' => 'Gynecologist',
                'department' => 'Gynecology',
                'shift_start' => '10:00 AM',
                'shift_end' => '07:00 PM'
            ]
        ];

        return response()->json([
            'on_duty_staff' => $onDutyStaff,
            'total_on_duty' => count($onDutyStaff),
            'departments_covered' => array_unique(array_column($onDutyStaff, 'department'))
        ]);
    }

    /**
     * Quick status update (AJAX endpoint)
     */
    public function staffQuickStatusUpdate(Request $request)
    {
        $staffId = $request->get('staff_id');
        $newStatus = $request->get('status');
        
        $validated = $request->validate([
            'staff_id' => 'required|string',
            'status' => 'required|in:On Duty,Off Duty'
        ]);

        // Here you would update the database
        // Example:
        /*
        Staff::where('id', $staffId)->update([
            'status' => $newStatus,
            'last_status_change' => now()
        ]);
        */

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'staff_id' => $staffId,
            'new_status' => $newStatus,
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Get staff schedule (AJAX endpoint)
     */
    public function staffGetSchedule(string $staffId)
    {
        // Sample schedule data - replace with actual database query
        $schedule = [
            [
                'date' => '2024-10-24',
                'shift_start' => '08:00 AM',
                'shift_end' => '05:00 PM',
                'department' => 'Labor & Delivery',
                'status' => 'Scheduled'
            ],
            [
                'date' => '2024-10-25',
                'shift_start' => '08:00 AM',
                'shift_end' => '05:00 PM',
                'department' => 'Labor & Delivery',
                'status' => 'Scheduled'
            ],
            [
                'date' => '2024-10-26',
                'shift_start' => 'OFF',
                'shift_end' => 'OFF',
                'department' => 'N/A',
                'status' => 'Day Off'
            ]
        ];

        return response()->json([
            'staff_id' => $staffId,
            'schedule' => $schedule,
            'weekly_hours' => 40,
            'next_shift' => [
                'date' => '2024-10-24',
                'start_time' => '08:00 AM',
                'department' => 'Labor & Delivery'
            ]
        ]);
    }

    // =========================
    // ORIGINAL API ENDPOINTS
    // =========================

    public function getStats(Request $request)
    {
        return response()->json([
            'total_patients' => rand(150, 160),
            'total_appointments' => rand(40, 45),
            'active_labor_cases' => '₱' . number_format(rand(80000, 90000)),
            'monthly_revenue' => round(rand(45, 50) / 10, 1)
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Demo search results
        $results = [
            'patients' => [
                ['name' => 'Maria Santos', 'type' => 'patient'],
                ['name' => 'Ana Cruz', 'type' => 'patient']
            ],
            'appointments' => [
                ['title' => 'Prenatal Checkup - Maria Santos', 'type' => 'appointment'],
            ]
        ];

        return response()->json($results);
    }

    public function quickAction(Request $request)
    {
        $action = $request->input('action');
        
        // Simulate different actions
        switch($action) {
            case 'add-patient':
                return response()->json(['message' => 'Patient form opened', 'status' => 'success']);
            case 'schedule-appointment':
                return response()->json(['message' => 'Appointment scheduler opened', 'status' => 'success']);
            case 'monitor-labor':
                return response()->json(['message' => 'Labor monitoring dashboard opened', 'status' => 'success']);
            case 'generate-bill':
                return response()->json(['message' => 'Billing form opened', 'status' => 'success']);
            default:
                return response()->json(['message' => 'Unknown action', 'status' => 'error']);
        }
    }

    // Profile related methods
    public function profile()
    {
        $profileData = [
            'name' => 'Admin Clerk',
            'email' => 'admin@mednest.com',
            'role' => 'System Administrator',
            'branch' => 'All Branches',
            'phone' => '+63 917 123 4567',
            'address' => '123 Medical Center Drive, Tabaco City, Albay',
            'last_login' => '2025-08-22 08:00:00',
            'joined_date' => '2024-01-15',
            'permissions' => ['view_all', 'edit_patients', 'manage_appointments', 'billing_access'],
            'stats' => [
                'patients_managed' => 156,
                'appointments_scheduled' => 342,
                'reports_generated' => 28,
                'active_days' => 156
            ]
        ];

        return view('dashboard.profile', compact('profileData'));
    }

    public function accountSettings()
    {
        $settingsData = [
            'user' => [
                'name' => 'Admin Clerk',
                'email' => 'admin@mednest.com',
                'phone' => '+63 917 123 4567',
                'timezone' => 'Asia/Manila',
                'language' => 'English'
            ],
            'security' => [
                'two_factor_enabled' => true,
                'last_password_change' => '2025-07-15',
                'active_sessions' => 2
            ],
            'preferences' => [
                'email_notifications' => true,
                'sms_notifications' => false,
                'desktop_notifications' => true,
                'dark_mode' => false,
                'compact_view' => false
            ]
        ];

        return view('dashboard.settings', compact('settingsData'));
    }

    public function notificationsPage()
    {
        $notifications = [
            [
                'id' => 1,
                'title' => 'New Patient Registration',
                'message' => 'Maria Santos has been registered in Sinag branch',
                'type' => 'patient',
                'time' => '2 minutes ago',
                'read' => false,
                'icon' => 'user-plus',
                'color' => 'primary'
            ],
            [
                'id' => 2,
                'title' => 'Labor Alert',
                'message' => 'Ana Cruz is in active labor - Bill Dayandog branch',
                'type' => 'emergency',
                'time' => '15 minutes ago',
                'read' => false,
                'icon' => 'exclamation-triangle',
                'color' => 'warning'
            ],
            [
                'id' => 3,
                'title' => 'Appointment Reminder',
                'message' => 'Carmen Lopez appointment in 1 hour',
                'type' => 'appointment',
                'time' => '1 hour ago',
                'read' => false,
                'icon' => 'calendar-check',
                'color' => 'success'
            ],
            [
                'id' => 4,
                'title' => 'System Update',
                'message' => 'MedNest dashboard has been updated to version 2.1.0',
                'type' => 'system',
                'time' => '2 hours ago',
                'read' => true,
                'icon' => 'cog',
                'color' => 'info'
            ],
            [
                'id' => 5,
                'title' => 'Payment Received',
                'message' => 'Payment of ₱15,500 received from Maria Santos',
                'type' => 'payment',
                'time' => '3 hours ago',
                'read' => true,
                'icon' => 'credit-card',
                'color' => 'success'
            ]
        ];

        return view('dashboard.notifications', compact('notifications'));
    }

    public function notifications()
    {
        $notifications = [
            [
                'id' => 1,
                'title' => 'New Patient Registration',
                'message' => 'Maria Santos has been registered in Sinag branch',
                'time' => '2 minutes ago',
                'type' => 'info',
                'read' => false
            ],
            [
                'id' => 2,
                'title' => 'Labor Alert',
                'message' => 'Ana Cruz is in active labor - Bill Dayandog branch',
                'time' => '15 minutes ago',
                'type' => 'warning',
                'read' => false
            ],
            [
                'id' => 3,
                'title' => 'Appointment Reminder',
                'message' => 'Carmen Lopez appointment in 1 hour',
                'time' => '1 hour ago',
                'type' => 'success',
                'read' => true
            ]
        ];

        return response()->json($notifications);
    }

    public function settings()
{
    $settingsData = [
        'user' => [
            'name' => 'Admin Clerk',
            'email' => 'admin@mednest.com',
            'phone' => '+63 917 123 4567',
            'timezone' => 'Asia/Manila',
            'language' => 'English'
        ],
        'general' => [
            'clinic_name' => 'MedNest Maternity Clinic',
            'timezone' => 'Asia/Manila',
            'date_format' => 'Y-m-d',
            'time_format' => '12-hour',
            'currency' => 'PHP'
        ],
        'branches' => [
            ['id' => 1, 'name' => 'Sto. Domingo Branch', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Daraga', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Arimbay Branch', 'status' => 'Maintenance']
        ],
        'security' => [
            'two_factor_enabled' => true,
            'last_password_change' => '2025-07-15',
            'active_sessions' => 2
        ],
        'preferences' => [
            'email_notifications' => true,
            'sms_notifications' => false,
            'desktop_notifications' => true,
            'dark_mode' => false,
            'compact_view' => false
        ]
    ];

    return view('dashboard.settings', compact('settingsData'));
}

/**
 * Generate report data for billing
 */
private function generateBillingReportData(string $type, string $startDate, string $endDate): array
{
    // Sample report data - replace with actual database queries
    return [
        'summary' => [
            'total_revenue' => 125400,
            'total_invoices' => 156,
            'paid_invoices' => 133,
            'pending_invoices' => 18,
            'overdue_invoices' => 5
        ],
        'chart_data' => [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'revenue' => [85000, 92000, 78000, 105000, 125400],
            'invoices' => [120, 135, 118, 142, 156]
        ],
        'top_services' => [
            ['name' => 'Consultation', 'count' => 89, 'revenue' => 133500],
            ['name' => 'Pre-natal Check Up', 'count' => 45, 'revenue' => 90000],
            ['name' => 'Ultrasound', 'count' => 22, 'revenue' => 55000]
        ]
    ];
}

    /**
     * Display the login view.
     */
    public function loginCreate(): View
    {
        return view('adminLogin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginPost(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Expanded role-based redirection for owner and admin
            if ($user->hasRole('owner') || $user->hasRole('admin')) {
                return redirect()->intended(route('admin.dashboard'));
            }
            
            // Default redirect for clerks and other authenticated users
            return redirect()->intended(route('dashboard.index'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been successfully logged out.');
    }
}
