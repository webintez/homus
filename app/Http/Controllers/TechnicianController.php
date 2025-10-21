<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TechnicianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:technician');
    }

    public function dashboard()
    {
        $technician = Auth::guard('technician')->user();
        
        $recentBookings = $technician->bookings()
            ->with(['customer', 'service'])
            ->latest()
            ->limit(5)
            ->get();

        $stats = [
            'total_jobs' => $technician->total_jobs,
            'completed_jobs' => $technician->completed_jobs,
            'pending_jobs' => $technician->bookings()->pending()->count(),
            'in_progress_jobs' => $technician->bookings()->inProgress()->count(),
            'rating' => $technician->rating,
        ];

        return view('technician.dashboard', compact('technician', 'recentBookings', 'stats'));
    }

    public function profile()
    {
        $technician = Auth::guard('technician')->user();
        $technician->load(['skills.serviceCategory', 'serviceAreas']);
        
        // Prepare selected skills for the form
        $selectedSkills = [];
        if ($technician->skills) {
            $selectedSkills = is_string($technician->skills) 
                ? explode(',', $technician->skills) 
                : (array) $technician->skills;
        }
        
        // Prepare selected service areas for the form
        $selectedServiceAreas = [];
        if ($technician->service_areas) {
            $selectedServiceAreas = is_string($technician->service_areas) 
                ? explode(',', $technician->service_areas) 
                : (array) $technician->service_areas;
        }
        
        // Prepare selected days for the form
        $selectedDays = [];
        if ($technician->available_days) {
            $selectedDays = is_string($technician->available_days) 
                ? explode(',', $technician->available_days) 
                : (array) $technician->available_days;
        }
        
        return view('technician.profile', compact('technician', 'selectedSkills', 'selectedServiceAreas', 'selectedDays'));
    }

    public function updateProfile(Request $request)
    {
        $technician = Auth::guard('technician')->user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:technicians,phone,' . $technician->id,
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'required|array|min:1',
            'skills.*' => 'required|string',
            'service_areas' => 'required|array|min:1',
            'service_areas.*' => 'required|string',
            'available_from' => 'nullable|date_format:H:i',
            'available_to' => 'nullable|date_format:H:i|after:available_from',
            'available_days' => 'nullable|array',
            'available_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'first_name', 'last_name', 'phone', 'address', 'city', 'state', 'postal_code',
            'skills', 'service_areas', 'available_from', 'available_to', 'available_days'
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture
            if ($technician->profile_picture) {
                Storage::disk('public')->delete($technician->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('technician-profiles', 'public');
        }

        $technician->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function bookings()
    {
        $technician = Auth::guard('technician')->user();
        $bookings = $technician->bookings()
            ->with(['customer', 'service'])
            ->latest()
            ->paginate(10);

        return view('technician.bookings', compact('bookings'));
    }

    public function showBooking(Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        $booking->load(['customer', 'service', 'statuses']);

        return view('technician.booking-details', compact('booking'));
    }

    public function acceptBooking(Request $request, Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Only allow acceptance if booking is pending
        if ($booking->status !== 'pending') {
            return redirect()->back()
                ->with('error', 'This booking cannot be accepted.');
        }

        $booking->update([
            'status' => 'accepted',
            'accepted_at' => now(),
        ]);

        // Create status record
        $booking->statuses()->create([
            'status' => 'accepted',
            'notes' => $request->notes ?? 'Booking accepted by technician',
            'updated_by' => $technician->id,
        ]);

        return redirect()->back()
            ->with('success', 'Booking accepted successfully.');
    }

    public function rejectBooking(Request $request, Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Only allow rejection if booking is pending
        if ($booking->status !== 'pending') {
            return redirect()->back()
                ->with('error', 'This booking cannot be rejected.');
        }

        $booking->update([
            'status' => 'rejected',
        ]);

        // Create status record
        $booking->statuses()->create([
            'status' => 'rejected',
            'notes' => $request->rejection_reason ?? 'Booking rejected by technician',
            'updated_by' => $technician->id,
        ]);

        return redirect()->back()
            ->with('success', 'Booking rejected.');
    }

    public function startJob(Request $request, Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Only allow starting if booking is accepted
        if ($booking->status !== 'accepted') {
            return redirect()->back()
                ->with('error', 'This booking cannot be started.');
        }

        $booking->update([
            'status' => 'in_progress',
            'started_at' => now(),
        ]);

        // Create status record
        $booking->statuses()->create([
            'status' => 'in_progress',
            'notes' => $request->notes ?? 'Job started by technician',
            'updated_by' => $technician->id,
        ]);

        return redirect()->back()
            ->with('success', 'Job started successfully.');
    }

    public function completeJob(Request $request, Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Only allow completion if booking is in progress
        if ($booking->status !== 'in_progress') {
            return redirect()->back()
                ->with('error', 'This booking cannot be completed.');
        }

        $validator = Validator::make($request->all(), [
            'final_price' => 'required|numeric|min:0',
            'technician_notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update([
            'status' => 'completed',
            'final_price' => $request->final_price,
            'technician_notes' => $request->technician_notes,
            'completed_at' => now(),
        ]);

        // Update technician stats
        $technician->increment('completed_jobs');
        $technician->increment('total_jobs');

        // Create status record
        $booking->statuses()->create([
            'status' => 'completed',
            'notes' => $request->technician_notes ?? 'Job completed by technician',
            'updated_by' => $technician->id,
        ]);

        return redirect()->back()
            ->with('success', 'Job completed successfully.');
    }

    public function updateAvailability(Request $request)
    {
        $technician = Auth::guard('technician')->user();

        $validator = Validator::make($request->all(), [
            'is_available' => 'required|boolean',
            'available_from' => 'nullable|date_format:H:i',
            'available_to' => 'nullable|date_format:H:i|after:available_from',
            'available_days' => 'nullable|array',
            'available_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $technician->update($request->only([
            'is_available', 'available_from', 'available_to', 'available_days'
        ]));

        return redirect()->back()
            ->with('success', 'Availability updated successfully.');
    }

    public function updateNotes(Request $request, Booking $booking)
    {
        $technician = Auth::guard('technician')->user();

        // Ensure the booking belongs to the authenticated technician
        if ($booking->technician_id !== $technician->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        $validator = Validator::make($request->all(), [
            'technician_notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update([
            'technician_notes' => $request->technician_notes,
        ]);

        return redirect()->back()
            ->with('success', 'Notes updated successfully.');
    }

    public function notifications()
    {
        $technician = Auth::guard('technician')->user();
        $notifications = $technician->notifications()
            ->latest()
            ->paginate(10);

        return view('technician.notifications', compact('notifications'));
    }
}
