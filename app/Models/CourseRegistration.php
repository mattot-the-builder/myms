<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'course_id', 'name', 'ic_number', 'contact', 'company_name', 'address', 'is_sponsored', 'competency', 'position', 'payment_id', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
