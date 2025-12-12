<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address_line_1', 'city', 'state', 'zip_code', 'country_id', 'phone', 'operating_hours'];

    /**
     * Get the staff members for the branch.
     */
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
