<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class LaborMonitoring extends Model
{
    //
}

/*
// app/Models/Patient/LaborMonitoring.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaborMonitoring extends Model
{
    use HasFactory;
    
    protected $table = 'labor_monitorings';

    protected $fillable = [
        'pregnancy_id',
        'appointment_id',
        'staff_id',
        'monitoring_time',
        'contractions_interval_minutes',
        'cervical_dilation_cm',
        'fetal_heart_rate_bpm',
        'notes',
    ];

    protected $casts = [
        'monitoring_time' => 'datetime',
        'cervical_dilation_cm' => 'float',
    ];

    public function pregnancy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Pregnancy::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Appointment::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Staff::class);
    }
}
*/