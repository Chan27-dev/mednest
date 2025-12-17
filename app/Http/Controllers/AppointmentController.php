<?php

namespace App\Http\Controllers;

use App\Models\Clinic\Appointment;
use App\Models\Billing\Service;
use App\Models\Clinic\Branch;
use App\Models\Clinic\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display the appointment form with auto-filled user data
     */
    public function create()
    {
        $user = Auth::user();

        // Load branches and services from database
        $branches = Branch::all();
        $services = Service::where('status', 'active')->orWhere('status', 'draft')->get();

        // Pass user data to pre-fill the form
        return view('user.appointment', [
            'user' => $user,
            'branches' => $branches,
            'services' => $services,
            'patientName' => $user->full_name ?? $user->name ?? '',
            'contactNumber' => $user->contact_number ?? $user->phone ?? '',
            'email' => $user->email ?? '',
        ]);
    }

    /**
     * Store a new appointment in the database
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request data
        $validated = $request->validate([
            'branch' => 'required|exists:branches,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_type' => 'required|exists:services,id',
            'preferred_time' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ]);

        // 1. Get patient_id from authenticated user
        if (!$user->patient) {
            return back()->withErrors(['error' => 'Patient record not found. Please complete your profile first.'])->withInput();
        }
        $patientId = $user->patient->id;

        // 2. Use Branch ID directly
        $branchId = $validated['branch'];

        // 3. Use Service ID directly
        $serviceId = $validated['appointment_type'];

        // 4. Auto-assign Staff: Find Branch Admin for the selected branch
        $staff = Staff::where('branch_id', $branchId)
            ->where('role', 'Branch Admin')
            ->first();

        // Fallback: If no Branch Admin, try to find any staff in that branch
        if (!$staff) {
            $staff = Staff::where('branch_id', $branchId)->first();
        }

        if (!$staff) {
            return back()->withErrors(['error' => 'No staff available for the selected branch. Please contact support.'])->withInput();
        }
        $staffId = $staff->id;

        // 5. Format DateTime: Combine appointment_date and preferred_time
        try {
            // Parse the date (Y-m-d format)
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $validated['appointment_date']);

            // Parse the time (e.g., "8:00 AM" or "2:30 PM")
            $time = \Carbon\Carbon::parse($validated['preferred_time']);

            // Combine date and time
            $startTime = $date->setTimeFrom($time);

            // Set end_time to 1 hour later
            $endTime = $startTime->copy()->addHour();
        } catch (\Exception $e) {
            return back()->withErrors(['preferred_time' => 'Invalid date or time format.'])->withInput();
        }

        // 6. Create the appointment with resolved IDs
        $appointment = Appointment::create([
            'patient_id' => $patientId,
            'branch_id' => $branchId,
            'service_id' => $serviceId,
            'staff_id' => $staffId,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => 'scheduled',
            'notes' => $validated['notes'] ?? null,
        ]);

        // Redirect to confirmation page with the appointment data
        return redirect()->route('user.confirmation', ['id' => $appointment->id])
            ->with('success', 'Your appointment has been scheduled successfully!');
    }

    /**
     * Display the confirmation page
     */
    public function confirmation($id)
    {
        $user = Auth::user();

        // Find the appointment by ID with relationships
        $appointment = Appointment::with(['patient', 'branch', 'service', 'staff'])
            ->where('id', $id)
            ->firstOrFail();

        // Verify the appointment belongs to the authenticated user
        if ($appointment->patient->user_id !== $user->id) {
            abort(403, 'Unauthorized access to appointment');
        }

        // Return the confirmation view with appointment data
        return view('user.confirmation', compact('appointment', 'user'));
    }

    /**
     * Display all appointments for the authenticated user
     */
    public function index()
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Please complete your profile first.');
        }

        // Get appointments for the authenticated user's patient record
        $appointments = Appointment::where('patient_id', $patient->id)
            ->with(['branch', 'service', 'staff'])
            ->orderBy('start_time', 'desc')
            ->get();

        return view('user.appointments', compact('appointments', 'user'));
    }

    /**
     * Cancel an appointment
     */
    public function cancel($id)
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Patient record not found.');
        }

        // Find the appointment and ensure it belongs to the authenticated user
        $appointment = Appointment::where('id', $id)
            ->where('patient_id', $patient->id)
            ->whereIn('status', ['scheduled', 'pending'])
            ->firstOrFail();

        // Update status to cancelled
        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('user.dashboard')
            ->with('success', 'Appointment cancelled successfully.');
    }

    /**
     * Show reschedule form
     */
    public function rescheduleForm($id)
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Patient record not found.');
        }

        // Find the appointment
        $appointment = Appointment::where('id', $id)
            ->where('patient_id', $patient->id)
            ->with(['branch', 'service', 'staff'])
            ->firstOrFail();

        // Load branches and services
        $branches = \App\Models\Branch::all();
        $services = \App\Models\Service::where('status', 'active')->get();

        return view('user.reschedule', compact('appointment', 'user', 'branches', 'services'));
    }

    /**
     * Reschedule an appointment
     */
    public function reschedule(Request $request, $id)
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Patient record not found.');
        }

        $validated = $request->validate([
            'appointment_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ]);

        // Find the appointment
        $appointment = Appointment::where('id', $id)
            ->where('patient_id', $patient->id)
            ->firstOrFail();

        // Format DateTime: Combine appointment_date and preferred_time
        try {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $validated['appointment_date']);
            $time = \Carbon\Carbon::parse($validated['preferred_time']);
            $startTime = $date->setTimeFrom($time);
            $endTime = $startTime->copy()->addHour();
        } catch (\Exception $e) {
            return back()->withErrors(['preferred_time' => 'Invalid date or time format.'])->withInput();
        }

        // Update appointment
        $appointment->update([
            'start_time' => $startTime,
            'end_time' => $endTime,
            'notes' => $validated['notes'] ?? $appointment->notes,
            'status' => 'scheduled', // Reset to scheduled after rescheduling
        ]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Appointment rescheduled successfully!');
    }

    /**
     * View appointment details
     */
    public function show($id)
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Patient record not found.');
        }

        // Find the appointment
        $appointment = Appointment::where('id', $id)
            ->where('patient_id', $patient->id)
            ->with(['branch', 'service', 'staff'])
            ->firstOrFail();

        return view('user.appointment_details', compact('appointment', 'user'));
    }
}