<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        try {
            $stats = [
                'total_customers' => Customer::count(),
                'total_technicians' => Technician::count(),
                'total_bookings' => Booking::count(),
                'pending_bookings' => Booking::pending()->count(),
                'completed_bookings' => Booking::completed()->count(),
                'total_revenue' => Booking::completed()->sum('final_price') ?? 0,
                'pending_technicians' => Technician::pending()->count(),
            ];

            $recentBookings = Booking::with(['customer', 'technician', 'service'])
                ->latest()
                ->limit(10)
                ->get();

            $recentTechnicians = Technician::latest()
                ->limit(5)
                ->get();

            $pendingTechnicians = Technician::pending()
                ->latest()
                ->limit(5)
                ->get();

            return view('admin.dashboard', compact('stats', 'recentBookings', 'recentTechnicians', 'pendingTechnicians'));
        } catch (\Exception $e) {
            // Fallback data if there are any errors
            $stats = [
                'total_customers' => 0,
                'total_technicians' => 0,
                'total_bookings' => 0,
                'pending_bookings' => 0,
                'completed_bookings' => 0,
                'total_revenue' => 0,
                'pending_technicians' => 0,
            ];

            $recentBookings = collect();
            $recentTechnicians = collect();
            $pendingTechnicians = collect();

            return view('admin.dashboard', compact('stats', 'recentBookings', 'recentTechnicians', 'pendingTechnicians'));
        }
    }
}
