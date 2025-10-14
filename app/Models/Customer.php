<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
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
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'recipient_id')->where('recipient_type', 'customer');
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
        return $query->where('is_active', true);
    }
}
