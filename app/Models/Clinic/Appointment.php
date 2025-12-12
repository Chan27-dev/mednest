<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
}

/*
// app/Models/Clinic/Appointment.php
namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'staff_id',
        'branch_id',
        'service_id',
        'order_id',
        'start_time',
        'end_time',
        'status',
        'notes',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Patient::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Staff::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Branch::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\Service::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\Order::class);
    }
}
*/