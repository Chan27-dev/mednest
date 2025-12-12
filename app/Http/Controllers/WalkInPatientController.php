<?php

// app/Http/Controllers/WalkInPatientController.php (updated)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient\Patient;
use App\Models\Patient\MedicalHistory;
use App\Models\Clinic\Appointment;
use App\Models\Billing\Service;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WalkInPatientController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'                 => 'required|string|max:255',
            'last_name'                  => 'required|string|max:255',
            'date_of_birth'              => 'required|date|before:today',
            'contact_number'             => 'required|string|max:20',
            'address'                    => 'required|string|max:255',
            'email'                      => 'nullable|email',
            'emergency_contact_name'     => 'nullable|string',
            'emergency_contact_number'   => 'nullable|string',
            'medical_history'            => 'nullable|string',
            'blood_type'                 => 'nullable|string|max:10',
            'service_id'                 => 'nullable|exists:services,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $patient = Patient::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'blood_type' => $request->blood_type,
                'phone' => $request->contact_number,
                'email' => $request->email,  // ← ADD THIS LINE
                'address' => $request->address,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_number,
            ]);

            if ($request->filled('medical_history')) {
                MedicalHistory::create([
                    'patient_id' => $patient->id,
                    'condition' => 'Initial Walk-in History',
                    'notes' => $request->medical_history,
                    'diagnosed_at' => now(),
                ]);
            }

            if ($request->filled('service_id')) {
                $service = Service::find($request->service_id);
                $startTime = now();
                // Estimate end time based on service duration, default to 30 mins
                $duration = $service->duration_minutes ?? 30;
                $endTime = $startTime->copy()->addMinutes($duration);

                // Assuming a walk-in creates an immediate, completed appointment
                Appointment::create([
                    'patient_id' => $patient->id,
                    'staff_id' => 1, // Placeholder: You MUST determine the correct staff ID
                    'branch_id' => 1, // Placeholder: You MUST determine the correct branch ID
                    'service_id' => $request->service_id,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'status' => 'Completed', // Or 'Checked-in', depending on workflow
                    'notes' => 'Walk-in patient service.',
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Walk-in patient added successfully!',
                'patient' => [
                    'id' => $patient->id,
                    'id_formatted' => 'P-' . str_pad($patient->id, 3, '0', STR_PAD_LEFT),
                    'name' => $patient->first_name . ' ' . $patient->last_name,
                    'age' => Carbon::parse($patient->date_of_birth)->age,
                    'contact' => $patient->phone,
                    'last_visit' => 'Today',
                    'status' => 'ACTIVE',
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}