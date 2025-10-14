<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'recipient_type',
        'recipient_id',
        'subject',
        'message',
        'data',
        'status',
        'sent_at',
        'delivered_at',
        'error_message',
    ];

    protected $casts = [
        'data' => 'array',
        'sent_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeSent($query)
    {
        return $query->where('status', 'sent');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByRecipient($query, $recipientType, $recipientId)
    {
        return $query->where('recipient_type', $recipientType)->where('recipient_id', $recipientId);
    }
}
