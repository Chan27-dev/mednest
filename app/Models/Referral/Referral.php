<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //
}

/*
// app/Models/Referral/Referral.php
namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'pregnancy_id',
        'referring_staff_id',
        'hospital_id',
        'reason',
        'referral_date',
        'status',
        'philhealth_submission_date',
        'notes',
    ];

    protected $casts = [
        'referral_date' => 'datetime',
        'philhealth_submission_date' => 'date',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Patient::class);
    }

    public function pregnancy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Pregnancy::class);
    }

    public function referringStaff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Staff::class, 'referring_staff_id');
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Referral\Hospital::class);
    }
}
*/