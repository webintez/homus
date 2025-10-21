<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Component;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RepairServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    // Dashboard
    public function dashboard()
    {
        $stats = [
            'total_customers' => Customer::count(),
            'total_technicians' => Technician::count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::pending()->count(),
            'completed_bookings' => Booking::completed()->count(),
            'total_revenue' => Booking::completed()->sum('final_price'),
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

        return view('admin.repair-service.dashboard', compact('stats', 'recentBookings', 'recentTechnicians', 'pendingTechnicians'));
    }

    // Customer Management
    public function customers()
    {
        $customers = Customer::withCount('bookings')
            ->latest()
            ->paginate(15);

        return view('admin.repair-service.customers.index', compact('customers'));
    }

    public function showCustomer(Customer $customer)
    {
        $customer->loadCount('bookings');
        $bookings = $customer->bookings()
            ->with(['service', 'technician'])
            ->latest()
            ->paginate(10);

        return view('admin.repair-service.customers.show', compact('customer', 'bookings'));
    }

    public function updateCustomerStatus(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'is_active' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $customer->update(['is_active' => $request->is_active]);

        return redirect()->back()
            ->with('success', 'Customer status updated successfully.');
    }

    // Technician Management
    public function technicians()
    {
        $technicians = Technician::withCount('bookings')
            ->latest()
            ->paginate(15);

        return view('admin.repair-service.technicians.index', compact('technicians'));
    }

    public function showTechnician(Technician $technician)
    {
        $technician->loadCount('bookings');
        $bookings = $technician->bookings()
            ->with(['customer', 'service'])
            ->latest()
            ->paginate(10);

        return view('admin.repair-service.technicians.show', compact('technician', 'bookings'));
    }

    public function approveTechnician(Request $request, Technician $technician)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $technician->update([
            'status' => $request->status,
            'approved_at' => $request->status === 'approved' ? now() : null,
        ]);

        // Send notification to technician
        Notification::create([
            'type' => 'email',
            'recipient_type' => 'technician',
            'recipient_id' => $technician->id,
            'subject' => 'Application ' . ucfirst($request->status),
            'message' => 'Your technician application has been ' . $request->status . '. ' . ($request->admin_notes ?? ''),
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Technician application ' . $request->status . ' successfully.');
    }

    public function updateTechnicianStatus(Request $request, Technician $technician)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,approved,rejected,suspended',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $technician->update($request->only(['status', 'is_available']));

        return redirect()->back()
            ->with('success', 'Technician status updated successfully.');
    }

    // Service Management
    public function serviceCategories()
    {
        $categories = ServiceCategory::withCount('services')
            ->ordered()
            ->paginate(15);

        return view('admin.repair-service.service-categories.index', compact('categories'));
    }

    public function createServiceCategory()
    {
        return view('admin.repair-service.service-categories.create');
    }

    public function storeServiceCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        ServiceCategory::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.repair-service.service-categories')
            ->with('success', 'Service category created successfully.');
    }

    public function editServiceCategory(ServiceCategory $category)
    {
        return view('admin.repair-service.service-categories.edit', compact('category'));
    }

    public function updateServiceCategory(Request $request, ServiceCategory $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.repair-service.service-categories')
            ->with('success', 'Service category updated successfully.');
    }

    public function destroyServiceCategory(ServiceCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.repair-service.service-categories')
            ->with('success', 'Service category deleted successfully.');
    }

    public function services()
    {
        $services = Service::with(['category'])
            ->ordered()
            ->paginate(15);

        return view('admin.repair-service.services.index', compact('services'));
    }

    public function createService()
    {
        $categories = ServiceCategory::active()->ordered()->get();
        return view('admin.repair-service.services.create', compact('categories'));
    }

    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'base_price' => 'required|numeric|min:0',
            'hourly_rate' => 'nullable|numeric|min:0',
            'estimated_duration' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'category_id', 'name', 'description', 'base_price', 'hourly_rate',
            'estimated_duration', 'is_active', 'sort_order'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        // Add slug to data
        $data['slug'] = \Str::slug($request->name);

        Service::create($data);

        return redirect()->route('admin.repair-service.services')
            ->with('success', 'Service created successfully.');
    }

    public function editService(Service $service)
    {
        $categories = ServiceCategory::active()->ordered()->get();
        return view('admin.repair-service.services.edit', compact('service', 'categories'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'base_price' => 'required|numeric|min:0',
            'hourly_rate' => 'nullable|numeric|min:0',
            'estimated_duration' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'category_id', 'name', 'description', 'base_price', 'hourly_rate',
            'estimated_duration', 'is_active', 'sort_order'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        // Add slug to data
        $data['slug'] = \Str::slug($request->name);

        $service->update($data);

        return redirect()->route('admin.repair-service.services')
            ->with('success', 'Service updated successfully.');
    }

    public function destroyService(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.repair-service.services')
            ->with('success', 'Service deleted successfully.');
    }

    // Booking Management
    public function bookings()
    {
        $bookings = Booking::with(['customer', 'technician', 'service'])
            ->latest()
            ->paginate(15);

        return view('admin.repair-service.bookings.index', compact('bookings'));
    }

    public function showBooking(Booking $booking)
    {
        $booking->load(['customer', 'technician', 'service', 'statuses']);
        return view('admin.repair-service.bookings.show', compact('booking'));
    }

    public function assignTechnician(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'technician_id' => 'required|exists:technicians,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $booking->update(['technician_id' => $request->technician_id]);

        // Send notification to technician
        Notification::create([
            'type' => 'email',
            'recipient_type' => 'technician',
            'recipient_id' => $request->technician_id,
            'subject' => 'New Booking Assignment',
            'message' => 'You have been assigned a new booking: ' . $booking->booking_number,
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Technician assigned successfully.');
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,accepted,in_progress,completed,cancelled,rejected',
            'admin_notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $booking->update(['status' => $request->status]);

        // Create status record
        $booking->statuses()->create([
            'status' => $request->status,
            'notes' => $request->admin_notes ?? 'Status updated by admin',
            'updated_by' => auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', 'Booking status updated successfully.');
    }

    // Component Management
    public function components()
    {
        $components = Component::ordered()
            ->paginate(15);

        return view('admin.repair-service.components.index', compact('components'));
    }

    public function createComponent()
    {
        return view('admin.repair-service.components.create');
    }

    public function storeComponent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'part_number' => 'required|string|max:255|unique:components',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'brand' => 'nullable|string|max:100',
            'model' => 'nullable|string|max:100',
            'compatible_appliances' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'name', 'part_number', 'description', 'price', 'stock_quantity',
            'min_stock_level', 'category', 'brand', 'model', 'compatible_appliances', 'is_active'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('components', 'public');
        }

        Component::create($data);

        return redirect()->route('admin.repair-service.components')
            ->with('success', 'Component created successfully.');
    }

    public function editComponent(Component $component)
    {
        return view('admin.repair-service.components.edit', compact('component'));
    }

    public function updateComponent(Request $request, Component $component)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'part_number' => 'required|string|max:255|unique:components,part_number,' . $component->id,
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'category' => 'nullable|string|max:100',
            'brand' => 'nullable|string|max:100',
            'model' => 'nullable|string|max:100',
            'compatible_appliances' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'name', 'part_number', 'description', 'price', 'stock_quantity',
            'min_stock_level', 'category', 'brand', 'model', 'compatible_appliances', 'is_active'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($component->image) {
                Storage::disk('public')->delete($component->image);
            }
            $data['image'] = $request->file('image')->store('components', 'public');
        }

        $component->update($data);

        return redirect()->route('admin.repair-service.components')
            ->with('success', 'Component updated successfully.');
    }

    public function destroyComponent(Component $component)
    {
        // Delete image if exists
        if ($component->image) {
            Storage::disk('public')->delete($component->image);
        }

        $component->delete();

        return redirect()->route('admin.repair-service.components')
            ->with('success', 'Component deleted successfully.');
    }

    // Reports
    public function reports()
    {
        $stats = [
            'total_customers' => Customer::count(),
            'total_technicians' => Technician::count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::pending()->count(),
            'completed_bookings' => Booking::completed()->count(),
            'cancelled_bookings' => Booking::cancelled()->count(),
            'total_revenue' => Booking::completed()->sum('final_price') ?? 0,
            'monthly_revenue' => Booking::completed()
                ->whereMonth('completed_at', now()->month)
                ->sum('final_price') ?? 0,
            'pending_technicians' => Technician::pending()->count(),
        ];

        $monthlyBookings = Booking::selectRaw('strftime("%m", created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $categoryStats = ServiceCategory::withCount('services')
            ->orderBy('services_count', 'desc')
            ->get();

        return view('admin.repair-service.reports', compact('stats', 'monthlyBookings', 'categoryStats'));
    }
}
