<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'civil_status',
        'occupation',
        'blood_type',
        'emergency_contact_name',
        'emergency_contact_phone',
        'medical_history',
        'lmp',
        'gp',
        'tt_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Get the patient's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the patient's age.
     *
     * @return int
     */
    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    // --- RELATIONSHIPS ---

    public function user(): BelongsTo
    {
        // Adjust namespace if your User model is in App\Models or App\Models\Auth
        return $this->belongsTo(\App\Models\User::class); 
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(\App\Models\Clinic\Appointment::class);
    }

    public function medicalHistory(): HasMany
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function pregnancies(): HasMany
    {
        return $this->hasMany(Pregnancy::class);
    }

    public function immunizations(): HasMany
    {
        return $this->hasMany(Immunization::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(\App\Models\Referral\Referral::class);
    }
}
