<?php

namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
}

/*
// app/Models/Billing/Order.php
namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_status_id',
        'payment_method_id',
        'subtotal',
        'tax',
        'total',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'float',
        'tax' => 'float',
        'total' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\OrderStatus::class, 'order_status_id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Billing\PaymentMethod::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(\App\Models\Billing\OrderItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(\App\Models\Billing\Payment::class);
    }
}
*/
