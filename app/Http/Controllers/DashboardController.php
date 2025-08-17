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
                    'branch' => 'Sinag',
                    'status' => 'Completed',
                    'status_class' => 'completed'
                ],
                [
                    'time' => '10:15 AM',
                    'activity' => 'Labor Monitoring',
                    'patient' => 'Ana Cruz',
                    'branch' => 'Bill Dayandog',
                    'status' => 'Active',
                    'status_class' => 'active'
                ],
                [
                    'time' => '01:45 AM',
                    'activity' => 'Appointment Scheduled',
                    'patient' => 'Carmen Lopez',
                    'branch' => 'Anthony',
                    'status' => 'Pending',
                    'status_class' => 'pending'
                ]
            ]
        ];

        return view('dashboard.index', compact('data'));
    }
}