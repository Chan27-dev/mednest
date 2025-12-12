<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    //
}

/*
// app/Models/Patient/LabResult.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregnancy_id',
        'prenatal_checkup_id',
        'test_name',
        'result',
        'test_date',
        'notes',
    ];

    protected $casts = [
        'test_date' => 'date',
    ];

    public function pregnancy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Pregnancy::class);
    }

    public function prenatalCheckup(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\PrenatalCheckup::class);
    }
}
*/