<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
}

/*
// app/Models/Geography/Country.php
namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'iso_code_2', 'iso_code_3'];

    public function states(): HasMany
    {
        return $this->hasMany(\App\Models\Geography\State::class);
    }
}
*/
