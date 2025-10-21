<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingStatus extends Model
{
    protected $fillable = [
        'booking_id',
        'status',
        'notes',
        'updated_by',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'updated_by');
    }
}
