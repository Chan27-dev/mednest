<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display the multi-branch admin dashboard overview
     */
    public function index(): View
    {
        // Aggregate data from all branches
        $overviewData = [
            'total_stats' => [
                'total_patients' => 156,
                'total_appointments' => 42,
                'total_labor_cases' => 85420, // This will be formatted as currency
                'monthly_revenue' => 4.8
            ],
            'branch_data' => [
                'daraga' => [
                    'name' => 'Daraga Branch',
                    'patients' => 89,
                    'appointments_today' => 12,
                    'active_labor' => 3,
                    'monthly_revenue' => 45200,
                    'status' => 'online'
                ],
                'sto_domingo' => [
                    'name' => 'Sto. Domingo Branch',
                    'patients' => 76,
                    'appointments_today' => 8,
                    'active_labor' => 2,
                    'monthly_revenue' => 38600,
                    'status' => 'online'
                ],
                'arimbay' => [
                    'name' => 'Arimbay Branch',
                    'patients' => 82,
                    'appointments_today' => 14,
                    'active_labor' => 3,
                    'monthly_revenue' => 41600,
                    'status' => 'online'
                ]
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
                    'time' => '01:45 PM',
                    'activity' => 'Appointment Scheduled',
                    'patient' => 'Carmen Lopez',
                    'branch' => 'Arimbay',
                    'status' => 'Completed',
                    'status_class' => 'completed'
                ],
                [
                    'time' => '02:30 PM',
                    'activity' => 'Emergency Consultation',
                    'patient' => 'Jennifer Reyes',
                    'branch' => 'Daraga',
                    'status' => 'In Progress',
                    'status_class' => 'active'
                ],
                [
                    'time' => '03:15 PM',
                    'activity' => 'Post-natal Checkup',
                    'patient' => 'Grace Villanueva',
                    'branch' => 'Sto. Domingo',
                    'status' => 'Completed',
                    'status_class' => 'completed'
                ]
            ],
            'quick_actions' => [
                [
                    'title' => 'Add New Patient',
                    'description' => 'Register across any branch',
                    'icon' => 'fas fa-user-plus',
                    'color' => 'pink',
                    'route' => 'admin.patients.create'
                ],
                [
                    'title' => 'Schedule Appointment',
                    'description' => 'Book for any branch',
                    'icon' => 'fas fa-calendar-check',
                    'color' => 'purple',
                    'route' => 'admin.appointments.create'
                ],
                [
                    'title' => 'Monitor Labor',
                    'description' => 'Track all active cases',
                    'icon' => 'fas fa-heartbeat',
                    'color' => 'green',
                    'route' => 'admin.labor.monitor'
                ],
                [
                    'title' => 'Generate Bill',
                    'description' => 'Create invoices',
                    'icon' => 'fas fa-file-invoice',
                    'color' => 'blue',
                    'route' => 'admin.billing.create'
                ]
            ]
        ];

        return view('admin.dashboard', compact('overviewData'));
    }

    /**
     * Get branch-specific data
     */
    public function getBranchData($branch): View
    {
        $branchData = $this->getBranchDataById($branch);
        
        if (!$branchData) {
            abort(404, 'Branch not found');
        }

        return view('admin.branch-detail', compact('branchData', 'branch'));
    }

    /**
     * Get real-time statistics for AJAX calls
     */
    public function getStats()
    {
        $stats = [
            'total_patients' => rand(150, 160),
            'total_appointments' => rand(40, 50),
            'total_labor_cases' => rand(80000, 90000),
            'monthly_revenue' => round(rand(45, 52) / 10, 1),
            'branches' => [
                'daraga' => [
                    'patients' => rand(85, 95),
                    'appointments' => rand(10, 15),
                    'labor' => rand(2, 4),
                    'revenue' => rand(42000, 48000)
                ],
                'sto_domingo' => [
                    'patients' => rand(72, 80),
                    'appointments' => rand(6, 10),
                    'labor' => rand(1, 3),
                    'revenue' => rand(35000, 42000)
                ],
                'arimbay' => [
                    'patients' => rand(78, 86),
                    'appointments' => rand(12, 16),
                    'labor' => rand(2, 4),
                    'revenue' => rand(38000, 45000)
                ]
            ],
            'last_updated' => now()->format('Y-m-d H:i:s')
        ];

        return response()->json($stats);
    }

    /**
     * Get recent activities for AJAX calls
     */
    public function getRecentActivities()
    {
        $activities = [
            [
                'time' => now()->subMinutes(5)->format('h:i A'),
                'activity' => 'New Patient Registration',
                'patient' => 'Sarah Johnson',
                'branch' => 'Daraga',
                'status' => 'Completed',
                'status_class' => 'completed'
            ],
            [
                'time' => now()->subMinutes(12)->format('h:i A'),
                'activity' => 'Ultrasound Appointment',
                'patient' => 'Michelle Davis',
                'branch' => 'Sto. Domingo',
                'status' => 'In Progress',
                'status_class' => 'active'
            ],
            [
                'time' => now()->subMinutes(18)->format('h:i A'),
                'activity' => 'Labor Monitoring',
                'patient' => 'Lisa Tan',
                'branch' => 'Arimbay',
                'status' => 'Active',
                'status_class' => 'active'
            ]
        ];

        return response()->json($activities);
    }

    /**
     * Global search across all branches
     */
    public function globalSearch(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json(['results' => []]);
        }

        // Sample search results - replace with actual database search
        $results = [
            'patients' => [
                [
                    'type' => 'patient',
                    'id' => 'P-001',
                    'name' => 'Maria Santos',
                    'branch' => 'Sto. Domingo',
                    'last_visit' => '2024-01-15',
                    'route' => 'admin.patients.show'
                ],
                [
                    'type' => 'patient',
                    'id' => 'P-002',
                    'name' => 'Ana Cruz',
                    'branch' => 'Daraga',
                    'last_visit' => '2024-01-14',
                    'route' => 'admin.patients.show'
                ]
            ],
            'appointments' => [
                [
                    'type' => 'appointment',
                    'id' => 'A-001',
                    'patient' => 'Carmen Lopez',
                    'branch' => 'Arimbay',
                    'date' => '2024-01-16',
                    'time' => '10:00 AM',
                    'route' => 'admin.appointments.show'
                ]
            ],
            'staff' => [
                [
                    'type' => 'staff',
                    'id' => 'ST-001',
                    'name' => 'Dr. Michelle Garcia',
                    'designation' => 'Obstetrician',
                    'branch' => 'Daraga',
                    'route' => 'admin.staff.show'
                ]
            ]
        ];

        // Filter results based on query
        $filteredResults = [];
        foreach ($results as $category => $items) {
            $filtered = array_filter($items, function($item) use ($query) {
                return stripos($item['name'] ?? $item['patient'] ?? '', $query) !== false ||
                       stripos($item['id'], $query) !== false;
            });
            
            if (!empty($filtered)) {
                $filteredResults[$category] = array_values($filtered);
            }
        }

        return response()->json(['results' => $filteredResults]);
    }

    /**
     * Get branch performance analytics
     */
    public function getBranchAnalytics($branch = null)
    {
        $analytics = [
            'daily_stats' => [
                'patients_today' => rand(15, 25),
                'appointments_today' => rand(8, 15),
                'revenue_today' => rand(5000, 12000),
                'labor_cases_today' => rand(1, 3)
            ],
            'weekly_trends' => [
                'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                'patients' => [12, 19, 15, 22, 18, 8, 5],
                'appointments' => [8, 12, 10, 15, 14, 6, 3],
                'revenue' => [8500, 12300, 9800, 15200, 11900, 4500, 2100]
            ],
            'monthly_summary' => [
                'total_patients' => rand(300, 400),
                'total_appointments' => rand(250, 350),
                'total_revenue' => rand(150000, 200000),
                'average_daily_patients' => rand(12, 18)
            ],
            'top_services' => [
                ['name' => 'Prenatal Checkup', 'count' => 45, 'percentage' => 35],
                ['name' => 'Ultrasound', 'count' => 32, 'percentage' => 25],
                ['name' => 'Consultation', 'count' => 28, 'percentage' => 22],
                ['name' => 'Labor Monitoring', 'count' => 15, 'percentage' => 12],
                ['name' => 'Emergency', 'count' => 8, 'percentage' => 6]
            ]
        ];

        if ($branch) {
            $analytics['branch'] = $this->getBranchDataById($branch);
        }

        return response()->json($analytics);
    }

    /**
     * Get system notifications
     */
    public function getNotifications()
    {
        $notifications = [
            [
                'id' => 1,
                'title' => 'New Patient Registration',
                'message' => 'Sarah Johnson registered at Daraga branch',
                'type' => 'patient',
                'branch' => 'Daraga',
                'time' => now()->subMinutes(5)->format('h:i A'),
                'read' => false,
                'priority' => 'normal'
            ],
            [
                'id' => 2,
                'title' => 'Labor Alert',
                'message' => 'Lisa Tan in active labor at Arimbay branch',
                'type' => 'emergency',
                'branch' => 'Arimbay',
                'time' => now()->subMinutes(15)->format('h:i A'),
                'read' => false,
                'priority' => 'high'
            ],
            [
                'id' => 3,
                'title' => 'Appointment Reminder',
                'message' => 'Carmen Lopez appointment in 30 minutes',
                'type' => 'appointment',
                'branch' => 'Sto. Domingo',
                'time' => now()->subMinutes(30)->format('h:i A'),
                'read' => true,
                'priority' => 'normal'
            ]
        ];

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => collect($notifications)->where('read', false)->count()
        ]);
    }

    /**
     * Mark notification as read
     */
    public function markNotificationRead($id)
    {
        // In a real application, update the notification in the database
        return response()->json(['success' => true]);
    }

    /**
     * Get branch comparison data
     */
    public function getBranchComparison()
    {
        $comparison = [
            'metrics' => [
                'patients' => [
                    'daraga' => 89,
                    'sto_domingo' => 76,
                    'arimbay' => 82
                ],
                'revenue' => [
                    'daraga' => 45200,
                    'sto_domingo' => 38600,
                    'arimbay' => 41600
                ],
                'appointments' => [
                    'daraga' => 12,
                    'sto_domingo' => 8,
                    'arimbay' => 14
                ],
                'labor_cases' => [
                    'daraga' => 3,
                    'sto_domingo' => 2,
                    'arimbay' => 3
                ]
            ],
            'performance_rankings' => [
                'revenue' => ['daraga', 'arimbay', 'sto_domingo'],
                'patients' => ['daraga', 'arimbay', 'sto_domingo'],
                'appointments' => ['arimbay', 'daraga', 'sto_domingo']
            ]
        ];

        return response()->json($comparison);
    }

    /**
     * Export multi-branch report
     */
    public function exportReport(Request $request)
    {
        $format = $request->get('format', 'pdf'); // pdf, excel, csv
        $dateRange = $request->get('date_range', 'month'); // day, week, month, year
        $branches = $request->get('branches', ['all']); // specific branches or all

        // In a real application, generate the actual report
        return response()->json([
            'success' => true,
            'message' => "Report generation initiated for {$format} format",
            'download_url' => route('admin.reports.download', [
                'format' => $format,
                'date_range' => $dateRange,
                'branches' => implode(',', $branches)
            ])
        ]);
    }

    /**
     * Helper method to get branch data by ID
     */
    private function getBranchDataById($branchId)
    {
        $branches = [
            'daraga' => [
                'id' => 'daraga',
                'name' => 'Daraga Branch',
                'address' => 'Daraga, Albay',
                'manager' => 'Dr. Michelle Garcia',
                'contact' => '0917-123-4567',
                'patients' => 89,
                'appointments_today' => 12,
                'active_labor' => 3,
                'monthly_revenue' => 45200,
                'status' => 'online',
                'staff_count' => 8,
                'operating_hours' => '24/7'
            ],
            'sto_domingo' => [
                'id' => 'sto_domingo',
                'name' => 'Sto. Domingo Branch',
                'address' => 'Sto. Domingo, Albay',
                'manager' => 'Dr. Ana Martinez',
                'contact' => '0918-765-4321',
                'patients' => 76,
                'appointments_today' => 8,
                'active_labor' => 2,
                'monthly_revenue' => 38600,
                'status' => 'online',
                'staff_count' => 6,
                'operating_hours' => '6:00 AM - 10:00 PM'
            ],
            'arimbay' => [
                'id' => 'arimbay',
                'name' => 'Arimbay Branch',
                'address' => 'Arimbay, Albay',
                'manager' => 'Dr. Carmen Santos',
                'contact' => '0919-456-7890',
                'patients' => 82,
                'appointments_today' => 14,
                'active_labor' => 3,
                'monthly_revenue' => 41600,
                'status' => 'online',
                'staff_count' => 7,
                'operating_hours' => '24/7'
            ]
        ];

        return $branches[$branchId] ?? null;
    }
}