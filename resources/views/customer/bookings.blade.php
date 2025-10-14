<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - Customer Dashboard</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-8 w-8 gradient-bg rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold text-gray-900">Customer Portal</h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('customer.services') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Browse Services
                    </a>
                    <a href="{{ route('customer.profile') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">My Bookings</h2>
            <p class="mt-2 text-gray-600">Track and manage your repair service bookings</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a href="#" class="border-indigo-500 text-indigo-600 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        All Bookings
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        Pending
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        In Progress
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        Completed
                    </a>
                </nav>
            </div>
        </div>

        <!-- Bookings List -->
        @if($bookings && count($bookings) > 0)
            <div class="space-y-6">
                @foreach($bookings as $booking)
                    <div class="bg-white shadow rounded-lg card-hover">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-medium text-gray-900">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Booking #{{ $booking->booking_number }} • {{ $booking->preferred_date }} at {{ $booking->preferred_time }}
                                            </p>
                                            <p class="text-sm text-gray-600 mt-1">
                                                {{ Str::limit($booking->issue_description, 100) }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
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
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Service Address</p>
                                    <p class="text-sm text-gray-900">{{ $booking->customer_address }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Estimated Price</p>
                                    <p class="text-sm text-gray-900">${{ number_format($booking->estimated_price, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Technician</p>
                                    <p class="text-sm text-gray-900">
                                        @if($booking->technician)
                                            {{ $booking->technician->first_name }} {{ $booking->technician->last_name }}
                                        @else
                                            <span class="text-gray-500">Not assigned yet</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <a href="{{ route('customer.bookings.show', $booking) }}" 
                                       class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                                        View Details
                                    </a>
                                    @if($booking->status === 'pending')
                                        <form method="POST" action="{{ route('customer.bookings.cancel', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-500 text-sm font-medium"
                                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                Cancel Booking
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500">
                                    Created {{ $booking->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $bookings->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No bookings found</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by booking your first repair service.</p>
                <div class="mt-6">
                    <a href="{{ route('customer.services') }}" class="btn-primary text-white px-4 py-2 rounded-md text-sm font-medium">
                        Book a Service
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
