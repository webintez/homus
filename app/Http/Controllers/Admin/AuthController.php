<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        $smtpConfigured = $this->isSmtpConfigured();
        return view('admin.auth.login', compact('smtpConfigured'));
    }

    /**
     * Check if SMTP is properly configured
     */
    private function isSmtpConfigured()
    {
        $smtpHost = Setting::get('smtp_host');
        $smtpPort = Setting::get('smtp_port');
        $smtpUsername = Setting::get('smtp_username');
        $smtpPassword = Setting::get('smtp_password');
        
        return !empty($smtpHost) && !empty($smtpPort) && !empty($smtpUsername) && !empty($smtpPassword);
    }

    /**
     * Send OTP to admin email
     */
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        
        // Check if user is admin (you can add admin role check here)
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Admin account not found.'
            ], 404);
        }

        // Generate OTP
        $otp = Otp::generate($request->email);

        // Send OTP via email (you can implement SMS here too)
        try {
            Mail::raw("Your admin login OTP is: {$otp->code}\n\nThis code will expire in 10 minutes.", function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Admin Login OTP');
            });

            return response()->json([
                'success' => true,
                'message' => 'OTP sent to your email address.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.'
            ], 500);
        }
    }

    /**
     * Verify OTP and login admin
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify OTP
        if (Otp::verify($request->otp, $request->email)) {
            $user = User::where('email', $request->email)->first();
            
            if ($user) {
                Auth::login($user);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful.',
                    'redirect' => route('admin.dashboard')
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP.'
        ], 401);
    }

    /**
     * Traditional email/password login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input.',
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            
            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'redirect' => route('admin.dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password.'
        ], 401);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
