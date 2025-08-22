<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                    'branch' => 'Daraga ',
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
                ['name' => 'Daraga Branch', 'status' => 'Online', 'class' => 'success'],
                ['name' => 'Arimbay Branch', 'status' => 'Maintenance', 'class' => 'warning']
            ]
        ];

        return view('dashboard.index', compact('data'));
    }

    public function patients()
    {
        // Demo data for patients page
        $patients = [
            [
                'id' => 1,
                'name' => 'Maria Santos',
                'age' => 28,
                'due_date' => '2025-09-15',
                'branch' => 'Sto. Domingo',
                'status' => 'Active'
            ],
            [
                'id' => 2,
                'name' => 'Ana Cruz',
                'age' => 32,
                'due_date' => '2025-08-22',
                'branch' => 'Daraga ',
                'status' => 'In Labor'
            ],
            [
                'id' => 3,
                'name' => 'Carmen Lopez',
                'age' => 25,
                'due_date' => '2025-10-03',
                'branch' => 'Arimbay',
                'status' => 'Scheduled'
            ]
        ];

        return view('dashboard.patients', compact('patients'));
    }

    public function appointments()
    {
        $appointments = [
            [
                'id' => 1,
                'patient' => 'Maria Santos',
                'date' => '2025-08-17',
                'time' => '09:00 AM',
                'type' => 'Prenatal Checkup',
                'doctor' => 'Dr. Smith',
                'branch' => 'Sto. Domingo'
            ],
            [
                'id' => 2,
                'patient' => 'Carmen Lopez',
                'date' => '2025-08-18',
                'time' => '02:30 PM',
                'type' => 'Ultrasound',
                'doctor' => 'Dr. Johnson',
                'branch' => 'Arimbay'
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

    public function billing()
    {
        $bills = [
            [
                'id' => 'INV-001',
                'patient' => 'Maria Santos',
                'amount' => '₱15,500',
                'date' => '2025-08-16',
                'status' => 'Paid',
                'branch' => 'Daraga'
            ],
            [
                'id' => 'INV-002',
                'patient' => 'Carmen Lopez',
                'amount' => '₱8,200',
                'date' => '2025-08-15',
                'status' => 'Pending',
                'branch' => 'Daraga'
            ]
        ];

        return view('dashboard.billing', compact('bills'));
    }

    // API endpoints for AJAX calls (optional)
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

    public function logout(Request $request)
    {
        // In a real app, you would handle authentication here
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Successfully logged out from MedNest Dashboard');
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
}