<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceArea extends Model
{
    protected $fillable = [
        'technician_id',
        'city',
        'state',
        'postal_code',
        'radius_km',
        'is_active',
    ];

    protected $casts = [
        'radius_km' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByLocation($query, $city, $state)
    {
        return $query->where('city', $city)->where('state', $state);
    }
}
