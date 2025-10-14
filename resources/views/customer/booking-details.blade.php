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
    <title>Booking Details - Customer Dashboard</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
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
                    <a href="{{ route('customer.bookings') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        My Bookings
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
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Booking Details</h2>
                    <p class="mt-2 text-gray-600">Booking #{{ $booking->booking_number }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('customer.bookings') }}" class="text-gray-600 hover:text-gray-900">
                        ← Back to Bookings
                    </a>
                    @if($booking->status === 'pending')
                        <form method="POST" action="{{ route('customer.bookings.cancel', $booking) }}" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700"
                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                Cancel Booking
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Service Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Service Type</p>
                                <p class="text-sm text-gray-900">{{ $booking->service->name ?? 'Service' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Appliance Type</p>
                                <p class="text-sm text-gray-900">{{ $booking->appliance_type }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Preferred Date</p>
                                <p class="text-sm text-gray-900">{{ $booking->preferred_date }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Preferred Time</p>
                                <p class="text-sm text-gray-900">{{ $booking->preferred_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Issue Description -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Issue Description</h3>
                        <p class="text-sm text-gray-900">{{ $booking->issue_description }}</p>
                        
                        @if($booking->customer_notes)
                            <div class="mt-4">
                                <p class="text-sm font-medium text-gray-500">Additional Notes</p>
                                <p class="text-sm text-gray-900">{{ $booking->customer_notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Issue Images/Videos -->
                @if($booking->issue_images && count($booking->issue_images) > 0)
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Issue Images</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($booking->issue_images as $image)
                                    <img src="{{ Storage::url($image) }}" alt="Issue Image" class="w-full h-32 object-cover rounded-lg">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if($booking->issue_videos && count($booking->issue_videos) > 0)
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Issue Videos</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($booking->issue_videos as $video)
                                    <video controls class="w-full h-48 object-cover rounded-lg">
                                        <source src="{{ Storage::url($video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Technician Notes -->
                @if($booking->technician_notes)
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Technician Notes</h3>
                            <p class="text-sm text-gray-900">{{ $booking->technician_notes }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Status</h3>
                        <div class="flex items-center">
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

                <!-- Technician Information -->
                @if($booking->technician)
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Assigned Technician</h3>
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center">
                                        @if($booking->technician->profile_picture)
                                            <img src="{{ Storage::url($booking->technician->profile_picture) }}" alt="Technician" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $booking->technician->first_name }} {{ $booking->technician->last_name }}
                                    </p>
                                    <p class="text-sm text-gray-500">{{ $booking->technician->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Pricing Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pricing</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Estimated Price</span>
                                <span class="text-sm font-medium text-gray-900">${{ number_format($booking->estimated_price, 2) }}</span>
                            </div>
                            @if($booking->final_price)
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">Final Price</span>
                                    <span class="text-sm font-medium text-gray-900">${{ number_format($booking->final_price, 2) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information</h3>
                        <div class="space-y-2">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone</p>
                                <p class="text-sm text-gray-900">{{ $booking->customer_phone }}</p>
                            </div>
                            @if($booking->customer_alternate_phone)
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Alternate Phone</p>
                                    <p class="text-sm text-gray-900">{{ $booking->customer_alternate_phone }}</p>
                                </div>
                            @endif
                            <div>
                                <p class="text-sm font-medium text-gray-500">Service Address</p>
                                <p class="text-sm text-gray-900">{{ $booking->customer_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Timeline</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Created</p>
                                <p class="text-sm text-gray-500">{{ $booking->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                            @if($booking->accepted_at)
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Accepted</p>
                                    <p class="text-sm text-gray-500">{{ $booking->accepted_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                            @endif
                            @if($booking->started_at)
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Started</p>
                                    <p class="text-sm text-gray-500">{{ $booking->started_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                            @endif
                            @if($booking->completed_at)
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Completed</p>
                                    <p class="text-sm text-gray-500">{{ $booking->completed_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
