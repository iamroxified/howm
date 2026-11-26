<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_code',
        'event_id',
        // Personal Information
        'name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'marital_status',
        'country_of_residence',
        'state_city',
        'home_address',
        // Church Information
        'howm_member',
        'howm_branch',
        'home_church',
        'church_role',
        'pastor_name',
        // Attendance Details
        'attendance_type',
        'attendance_days',
        'accommodation_needed',
        'transportation_needed',
        // Emergency Information
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_phone',
        // Special Needs
        'medical_conditions',
        'dietary_restrictions',
        // Volunteering
        'willing_to_volunteer',
        'preferred_department',
        // Payment Information
        'registration_type',
        'payment_method',
        'proof_of_payment_path',
        // Consent
        'contact_consent',
        'information_correct',
        'checked_in_dates',
    ];

    protected $casts = [
        'attendance_days' => 'array',
        'date_of_birth' => 'date',
        'contact_consent' => 'boolean',
        'information_correct' => 'boolean',
        'checked_in_dates' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_of_residence', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_city', 'id');
    }
}
