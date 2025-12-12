<?php

namespace App\Http\Controllers;

use App\Models\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch paginated patients from the database
        $patients = Patient::latest()->paginate(10);

        // Pass the patients data to the view
        return view('dashboard.patients', ['patients' => $patients]);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255|unique:patients,email',
            'blood_type' => 'nullable|string|max:10',
            'medical_history' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Create and save the new patient
        try {
            DB::beginTransaction();

            $patient = Patient::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->contact_number,
                'address' => $request->address,
                'email' => $request->email,
                'blood_type' => $request->blood_type,
                'medical_history' => $request->medical_history,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_number,
                'user_id' => null, // Explicitly set to null
                'gender' => $request->gender ?? null, // Set to null if not provided
            ]);

            DB::commit();

            // 3. Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Patient added successfully!',
                'patient' => $patient
            ], 201);

        } catch (\Exception $e) {
            // Log the error for debugging
            DB::rollBack();
            Log::error('Failed to create patient: ' . $e->getMessage());

            // Return a generic error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the patient. Please try again.'
            ], 500);
        }
    }
}