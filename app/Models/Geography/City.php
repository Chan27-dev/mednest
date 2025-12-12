<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
}

/*
// app/Models/Geography/City.php
namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['state_id', 'name'];

    public function state(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Geography\State::class);
    }
}
*/