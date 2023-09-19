<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MileageClaim extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'staff_id',
        'trip_date',
        'trip_name',
        'starting_location',
        'destination',
        'mileage',
        'fuel_cost',
        'total_claim',
        'status'
    ];
}
