<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Model;

class StaffSchedule extends Model
{
    //
}

/*
// app/Models/Clinic/StaffSchedule.php
namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffSchedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'branch_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Staff::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Clinic\Branch::class);
    }
}
*/