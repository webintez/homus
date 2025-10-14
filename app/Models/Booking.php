<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $fillable = [
        'booking_number',
        'customer_id',
        'technician_id',
        'service_id',
        'appliance_type',
        'issue_description',
        'issue_images',
        'issue_videos',
        'customer_address',
        'customer_city',
        'customer_state',
        'customer_postal_code',
        'customer_phone',
        'customer_alternate_phone',
        'preferred_date',
        'preferred_time',
        'status',
        'estimated_price',
        'final_price',
        'technician_notes',
        'customer_notes',
        'admin_notes',
        'payment_status',
        'payment_method',
        'accepted_at',
        'started_at',
        'completed_at',
        'cancelled_at',
    ];

    protected $casts = [
        'issue_images' => 'array',
        'issue_videos' => 'array',
        'preferred_date' => 'datetime',
        'preferred_time' => 'datetime',
        'estimated_price' => 'decimal:2',
        'final_price' => 'decimal:2',
        'accepted_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(BookingStatus::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeByCustomer($query, $customerId)
    {
        return $query->where('customer_id', $customerId);
    }

    public function scopeByTechnician($query, $technicianId)
    {
        return $query->where('technician_id', $technicianId);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->final_price ?? $this->estimated_price ?? 0, 2);
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'accepted' => 'bg-blue-100 text-blue-800',
            'in_progress' => 'bg-purple-100 text-purple-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            'rejected' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
