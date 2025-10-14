<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TechnicianAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.technician.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:technicians',
            'phone' => 'required|string|max:20|unique:technicians',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'skills' => 'required|array|min:1',
            'skills.*' => 'required|string',
            'service_areas' => 'required|array|min:1',
            'service_areas.*' => 'required|string',
            'id_proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file uploads
        $idProofPath = $request->file('id_proof')->store('technician-documents', 'public');
        $certificatePath = $request->file('certificate')->store('technician-documents', 'public');

        $technician = Technician::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'skills' => $request->skills,
            'service_areas' => $request->service_areas,
            'id_proof' => $idProofPath,
            'certificate' => $certificatePath,
            'status' => 'pending',
        ]);

        // Send OTP for email verification
        $this->sendOtpEmail($technician->email, 'email_verification');

        return redirect()->route('technician.login')
            ->with('success', 'Registration successful! Your application is under review. Please verify your email.');
    }

    public function showLoginForm()
    {
        return view('auth.technician.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::guard('technician')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('technician.dashboard'));
        }

        return redirect()->back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('technician')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('technician.login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.technician.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:technicians',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $technician = Technician::where('email', $request->email)->first();
        $this->sendOtpEmail($technician->email, 'password_reset');

        return redirect()->back()
            ->with('success', 'Password reset link sent to your email.');
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('auth.technician.reset-password', ['email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:technicians',
            'otp' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $otp = Otp::where('email', $request->email)
            ->where('code', $request->otp)
            ->where('type', 'password_reset')
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return redirect()->back()
                ->withErrors(['otp' => 'Invalid or expired OTP.'])
                ->withInput();
        }

        $technician = Technician::where('email', $request->email)->first();
        $technician->update(['password' => Hash::make($request->password)]);

        $otp->update(['is_used' => true]);

        return redirect()->route('technician.login')
            ->with('success', 'Password reset successful! Please login with your new password.');
    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:technicians',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid email'], 400);
        }

        $this->sendOtpEmail($request->email, 'email_verification');

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:technicians',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        $otp = Otp::where('email', $request->email)
            ->where('code', $request->otp)
            ->where('type', 'email_verification')
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return response()->json(['error' => 'Invalid or expired OTP'], 400);
        }

        $technician = Technician::where('email', $request->email)->first();
        $technician->update(['email_verified_at' => now()]);
        $otp->update(['is_used' => true]);

        return response()->json(['message' => 'Email verified successfully']);
    }

    private function sendOtpEmail($email, $type)
    {
        $otp = Otp::create([
            'email' => $email,
            'code' => str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'type' => $type,
            'expires_at' => now()->addMinutes(10),
        ]);

        // Here you would send the OTP via email
        // For now, we'll just log it
        \Log::info("OTP for {$email}: {$otp->code}");
    }
}
