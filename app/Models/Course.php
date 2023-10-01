<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_start', 'date_end','contents', 'started_at', 'ended_at', 'fee'];

    public function registrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }
}
