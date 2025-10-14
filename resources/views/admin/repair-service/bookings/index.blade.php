@extends('admin.layouts.app')

@section('title', 'Bookings')

@section('content')
<div class="space-y-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Bookings</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Monitor and manage all repair service bookings</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-purple-50 dark:from-gray-800 dark:to-purple-900/20 p-2 rounded-2xl shadow-lg border border-purple-200 dark:border-purple-800">
                <nav class="flex space-x-2">
                    <a href="#" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm shadow-lg transform hover:scale-105 transition-all duration-200">
                        All Bookings
                    </a>
                    <a href="#" class="bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 text-orange-700 dark:text-orange-300 hover:from-orange-100 hover:to-yellow-100 dark:hover:from-orange-900/30 dark:hover:to-yellow-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        Pending
                    </a>
                    <a href="#" class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 text-blue-700 dark:text-blue-300 hover:from-blue-100 hover:to-cyan-100 dark:hover:from-blue-900/30 dark:hover:to-cyan-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        In Progress
                    </a>
                    <a href="#" class="bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20 text-emerald-700 dark:text-emerald-300 hover:from-emerald-100 hover:to-green-100 dark:hover:from-emerald-900/30 dark:hover:to-green-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        Completed
                    </a>
                </nav>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if($bookings && count($bookings) > 0)
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($bookings as $booking)
                        <li class="hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/10 dark:hover:to-pink-900/10 transition-all duration-200">
                            <div class="px-6 py-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 flex items-center justify-center shadow-lg">
                                            <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </p>
                                            <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                @if($booking->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-300
                                                @elseif($booking->status === 'accepted') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                                @elseif($booking->status === 'in_progress') bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-300
                                                @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-purple-600 dark:text-purple-400 font-medium">
                                            Booking #{{ $booking->booking_number }} • {{ $booking->customer->first_name }} {{ $booking->customer->last_name }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $booking->preferred_date }} at {{ $booking->preferred_time }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-6">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <p class="font-medium">Price: <span class="text-green-600 dark:text-green-400 font-semibold">${{ number_format($booking->estimated_price, 2) }}</span></p>
                                        <p>{{ $booking->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.repair-service.bookings.show', $booking) }}" 
                                           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-purple-600 bg-purple-50 hover:bg-purple-100 dark:bg-purple-900/20 dark:text-purple-400 dark:hover:bg-purple-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                            View Details
                                        </a>
                                        @if($booking->status === 'pending' && !$booking->technician_id)
                                            <button class="inline-flex items-center px-4 py-2 text-sm font-semibold text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                                Assign Technician
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/10 dark:to-pink-900/10 border-t border-purple-200 dark:border-purple-800">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="mx-auto h-16 w-16 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No bookings found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No bookings have been created yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
