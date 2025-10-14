<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Technician extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'profile_picture',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'skills',
        'service_areas',
        'id_proof',
        'certificate',
        'rating',
        'total_jobs',
        'completed_jobs',
        'status',
        'is_available',
        'available_from',
        'available_to',
        'available_days',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'approved_at' => 'datetime',
        'password' => 'hashed',
        'rating' => 'decimal:2',
        'total_jobs' => 'integer',
        'completed_jobs' => 'integer',
        'is_available' => 'boolean',
        'available_days' => 'array',
        'skills' => 'array',
        'service_areas' => 'array',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(TechnicianSkill::class);
    }

    public function serviceAreas(): HasMany
    {
        return $this->hasMany(ServiceArea::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'recipient_id')->where('recipient_type', 'technician');
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullAddressAttribute(): string
    {
        $address = $this->address;
        if ($this->city) $address .= ', ' . $this->city;
        if ($this->state) $address .= ', ' . $this->state;
        if ($this->postal_code) $address .= ' ' . $this->postal_code;
        return $address;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'approved')->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
