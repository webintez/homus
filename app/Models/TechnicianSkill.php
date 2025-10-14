<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicianSkill extends Model
{
    protected $fillable = [
        'technician_id',
        'service_category_id',
        'experience_years',
        'rating',
        'is_primary',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'rating' => 'decimal:2',
        'is_primary' => 'boolean',
    ];

    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }
}
