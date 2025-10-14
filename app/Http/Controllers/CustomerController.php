<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function dashboard()
    {
        $customer = Auth::guard('customer')->user();
        $recentBookings = $customer->bookings()
            ->with(['service', 'technician'])
            ->latest()
            ->limit(5)
            ->get();

        $stats = [
            'total_bookings' => $customer->bookings()->count(),
            'pending_bookings' => $customer->bookings()->pending()->count(),
            'completed_bookings' => $customer->bookings()->completed()->count(),
            'cancelled_bookings' => $customer->bookings()->cancelled()->count(),
        ];

        return view('customer.dashboard', compact('customer', 'recentBookings', 'stats'));
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.profile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:customers,phone,' . $customer->id,
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'first_name', 'last_name', 'phone', 'address', 'city', 'state', 'postal_code'
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture
            if ($customer->profile_picture) {
                Storage::disk('public')->delete($customer->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('customer-profiles', 'public');
        }

        $customer->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function bookings()
    {
        $customer = Auth::guard('customer')->user();
        $bookings = $customer->bookings()
            ->with(['service', 'technician'])
            ->latest()
            ->paginate(10);

        return view('customer.bookings', compact('bookings'));
    }

    public function showBooking(Booking $booking)
    {
        $customer = Auth::guard('customer')->user();

        // Ensure the booking belongs to the authenticated customer
        if ($booking->customer_id !== $customer->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        $booking->load(['service', 'technician', 'statuses']);

        return view('customer.booking-details', compact('booking'));
    }

    public function cancelBooking(Request $request, Booking $booking)
    {
        $customer = Auth::guard('customer')->user();

        // Ensure the booking belongs to the authenticated customer
        if ($booking->customer_id !== $customer->id) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Only allow cancellation if booking is pending or accepted
        if (!in_array($booking->status, ['pending', 'accepted'])) {
            return redirect()->back()
                ->with('error', 'This booking cannot be cancelled.');
        }

        $booking->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        // Create status record
        $booking->statuses()->create([
            'status' => 'cancelled',
            'notes' => $request->cancellation_reason ?? 'Cancelled by customer',
            'updated_by' => $customer->id,
        ]);

        return redirect()->back()
            ->with('success', 'Booking cancelled successfully.');
    }

    public function services()
    {
        $categories = ServiceCategory::active()->ordered()->with(['services' => function($query) {
            $query->active()->ordered();
        }])->get();

        return view('customer.services', compact('categories'));
    }

    public function showService(Service $service)
    {
        $service->load('category');
        return view('customer.service-details', compact('service'));
    }

    public function createBooking(Service $service)
    {
        $service->load('category');
        return view('customer.create-booking', compact('service'));
    }

    public function storeBooking(Request $request, Service $service)
    {
        $customer = Auth::guard('customer')->user();

        $validator = Validator::make($request->all(), [
            'appliance_type' => 'required|string|max:255',
            'issue_description' => 'required|string|max:1000',
            'issue_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'issue_videos.*' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'customer_address' => 'required|string|max:500',
            'customer_city' => 'required|string|max:100',
            'customer_state' => 'required|string|max:100',
            'customer_postal_code' => 'required|string|max:20',
            'customer_phone' => 'required|string|max:20',
            'customer_alternate_phone' => 'nullable|string|max:20',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|date_format:H:i',
            'customer_notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file uploads
        $issueImages = [];
        if ($request->hasFile('issue_images')) {
            foreach ($request->file('issue_images') as $image) {
                $issueImages[] = $image->store('booking-images', 'public');
            }
        }

        $issueVideos = [];
        if ($request->hasFile('issue_videos')) {
            foreach ($request->file('issue_videos') as $video) {
                $issueVideos[] = $video->store('booking-videos', 'public');
            }
        }

        // Generate booking number
        $bookingNumber = 'BK' . date('Ymd') . str_pad(Booking::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);

        $booking = Booking::create([
            'booking_number' => $bookingNumber,
            'customer_id' => $customer->id,
            'service_id' => $service->id,
            'appliance_type' => $request->appliance_type,
            'issue_description' => $request->issue_description,
            'issue_images' => $issueImages,
            'issue_videos' => $issueVideos,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_state' => $request->customer_state,
            'customer_postal_code' => $request->customer_postal_code,
            'customer_phone' => $request->customer_phone,
            'customer_alternate_phone' => $request->customer_alternate_phone,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'customer_notes' => $request->customer_notes,
            'estimated_price' => $service->base_price,
            'status' => 'pending',
        ]);

        // Create initial status record
        $booking->statuses()->create([
            'status' => 'pending',
            'notes' => 'Booking created by customer',
            'updated_by' => $customer->id,
        ]);

        return redirect()->route('customer.bookings')
            ->with('success', 'Booking created successfully! We will contact you soon.');
    }

    public function notifications()
    {
        $customer = Auth::guard('customer')->user();
        $notifications = $customer->notifications()
            ->latest()
            ->paginate(10);

        return view('customer.notifications', compact('notifications'));
    }
}
