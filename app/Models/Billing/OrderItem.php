<?php

namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
}

/*
// app/Models/Billing/OrderItem.php
namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_id',
        'quantity',
        'price',
    ];

    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\Order::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\Service::class);
    }
}
*/