<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    //
}

/*
// app/Models/Patient/Immunization.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Immunization extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'vaccine_name',
        'dose',
        'administration_date',
        'notes',
    ];

    protected $casts = [
        'administration_date' => 'date',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Patient::class);
    }
}
*/