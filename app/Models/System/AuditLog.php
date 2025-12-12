<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    //
}

/*
// app/Models/System/AuditLog.php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\User;

class AuditLog extends Model
{
    use HasFactory;

    const UPDATED_AT = null; // Only has created_at
    protected $fillable = [
        'user_id',
        'action',
        'model',
        'model_id',
        'changes',
    ];

    protected $casts = [
        'changes' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
*/