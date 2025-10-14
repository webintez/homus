@extends('admin.layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="space-y-6">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('admin.repair-service.customers') }}" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                        ← Back to Customers
                    </a>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Customer Details</h2>
                    <p class="mt-2 text-gray-600">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('admin.repair-service.customers.status', $customer) }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="px-4 py-2 rounded-md text-sm font-medium {{ $customer->is_active ? 'bg-red-600 text-white hover:bg-red-700' : 'bg-green-600 text-white hover:bg-green-700' }}">
                            {{ $customer->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">First Name</p>
                                <p class="text-sm text-gray-900">{{ $customer->first_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Last Name</p>
                                <p class="text-sm text-gray-900">{{ $customer->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-sm text-gray-900">{{ $customer->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone</p>
                                <p class="text-sm text-gray-900">{{ $customer->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Address Information</h3>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-900">{{ $customer->address }}</p>
                            <p class="text-sm text-gray-900">{{ $customer->city }}, {{ $customer->state }} {{ $customer->postal_code }}</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Bookings</h3>
                        @if($customer->bookings && count($customer->bookings) > 0)
                            <div class="space-y-4">
                                @foreach($customer->bookings->take(5) as $booking)
                                    <div class="border rounded-lg p-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    Booking #{{ $booking->booking_number }} • {{ $booking->preferred_date }}
                                                </p>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($booking->status === 'accepted') bg-blue-100 text-blue-800
                                                @elseif($booking->status === 'in_progress') bg-purple-100 text-purple-800
                                                @elseif($booking->status === 'completed') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-gray-500">No bookings found for this customer.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Profile Picture -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Picture</h3>
                        <div class="text-center">
                            @if($customer->profile_picture)
                                <img src="{{ Storage::url($customer->profile_picture) }}" alt="Profile" class="h-24 w-24 rounded-full object-cover mx-auto">
                            @else
                                <div class="h-24 w-24 rounded-full bg-gray-100 flex items-center justify-center mx-auto">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Account Status</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Status</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($customer->is_active) bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ $customer->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Email Verified</span>
                                <span class="text-sm text-gray-900">
                                    @if($customer->email_verified_at)
                                        <span class="text-green-600">✓ Verified</span>
                                    @else
                                        <span class="text-red-600">✗ Not Verified</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Phone Verified</span>
                                <span class="text-sm text-gray-900">
                                    @if($customer->phone_verified_at)
                                        <span class="text-green-600">✓ Verified</span>
                                    @else
                                        <span class="text-red-600">✗ Not Verified</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Statistics -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Account Statistics</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Total Bookings</span>
                                <span class="text-sm font-medium text-gray-900">{{ $customer->bookings_count ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Completed Bookings</span>
                                <span class="text-sm font-medium text-gray-900">{{ $customer->bookings->where('status', 'completed')->count() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Member Since</span>
                                <span class="text-sm text-gray-900">{{ $customer->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
