<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class PrenatalCheckup extends Model
{
    //
}

/*
// app/Models/Patient/PrenatalCheckup.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrenatalCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregnancy_id',
        'staff_id',
        'appointment_id',
        'checkup_date',
        'patient_weight_kg',
        'blood_pressure',
        'fetal_heart_rate_bpm',
        'notes',
    ];

    protected $casts = [
        'checkup_date' => 'datetime',
        'patient_weight_kg' => 'float',
    ];

    public function pregnancy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Pregnancy::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Staff::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Appointment::class);
    }
}
*/