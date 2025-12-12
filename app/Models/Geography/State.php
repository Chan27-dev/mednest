<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
}

/*
// app/Models/Geography/State.php
namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['country_id', 'name', 'code'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Geography\Country::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(\App\Models\Geography\City::class);
    }
}
*/