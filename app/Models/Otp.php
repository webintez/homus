<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = [
        'code',
        'email',
        'phone',
        'is_used',
        'expires_at',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'expires_at' => 'datetime',
    ];

    /**
     * Generate a new OTP
     */
    public static function generate($email = null, $phone = null, $expiryMinutes = 10)
    {
        // Clean up old unused OTPs
        self::where('expires_at', '<', now())->delete();
        
        $code = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        
        return self::create([
            'code' => $code,
            'email' => $email,
            'phone' => $phone,
            'expires_at' => now()->addMinutes($expiryMinutes),
        ]);
    }

    /**
     * Verify OTP code
     */
    public static function verify($code, $email = null, $phone = null)
    {
        $otp = self::where('code', $code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->when($email, function($query) use ($email) {
                return $query->where('email', $email);
            })
            ->when($phone, function($query) use ($phone) {
                return $query->where('phone', $phone);
            })
            ->first();

        if ($otp) {
            $otp->update(['is_used' => true]);
            return true;
        }

        return false;
    }

    /**
     * Check if OTP is expired
     */
    public function isExpired()
    {
        return $this->expires_at < now();
    }
}
