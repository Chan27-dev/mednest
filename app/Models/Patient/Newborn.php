<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class Newborn extends Model
{
    //
}

/*
// app/Models/Patient/Newborn.php
namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Newborn extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregnancy_id',
        'birth_weight_kg',
        'apgar_score',
        'health_notes',
    ];

    protected $casts = [
        'birth_weight_kg' => 'float',
    ];

    public function pregnancy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Patient\Pregnancy::class);
    }
}
*/