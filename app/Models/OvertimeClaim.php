<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OvertimeClaim extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 'total_hours', 'ot_code', 'items', 'total_claim', 'status'
    ];

    protected $casts = [
        'items' => 'array'
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
