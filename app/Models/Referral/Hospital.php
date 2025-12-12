<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
}

/*
// app/Models/Referral/Hospital.php
namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory, SoftDeletes;
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'address_line_1',
        'city',
        'state',
        'zip_code',
        'country_id',
        'phone',
        'is_partnered',
    ];

    protected $casts = [
        'is_partnered' => 'boolean',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Geography\Country::class);
    }
}
*/