<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'base_price',
        'hourly_rate',
        'estimated_duration',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'estimated_duration' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}
