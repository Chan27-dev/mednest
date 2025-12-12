<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    //
}

/*
// app/Models/Patient/Pregnancy.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregnancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'estimated_due_date',
        'status',
        'outcome',
        'delivery_date',
    ];

    protected $casts = [
        'estimated_due_date' => 'date',
        'delivery_date' => 'datetime',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Patient::class);
    }

    public function prenatalCheckups(): HasMany
    {
        return $this->hasMany(\App\Models\Patient\PrenatalCheckup::class);
    }

    public function postpartumCheckups(): HasMany
    {
        return $this->hasMany(\App\Models\Patient\PostpartumCheckup::class);
    }

    public function labResults(): HasMany
    {
        return $this->hasMany(\App\Models\Patient\LabResult::class);
    }

    public function newborn(): HasOne
    {
        return $this->hasOne(\App\Models\Patient\Newborn::class);
    }

    public function laborMonitorings(): HasMany
    {
        return $this->hasMany(\App\Models\Patient\LaborMonitoring::class);
    }
}
*/