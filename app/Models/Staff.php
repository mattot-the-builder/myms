<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Staff extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable = [
        'staff_status',
        'name',
        'front_ic',
        'back_ic',
        'ic_number',
        'age',
        'gender',
        'contact',
        'address',
        'dob',
        'pob',
        'position',
        'marital_status',
        'start_date_working',
        'spouse_name',
        'spouse_contact',
        'spouse_position',
        'spouse_company',
        'emergency_contact',
        'emergency_contact_relationship',
        'education',
        'vehicle_registration',
        'vehicle_type',
        'vehicle_model',
        'is_approved'
    ];

    public function mileageClaims(): HasMany
    {
        return $this->hasMany(MileageClaim::class);
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
