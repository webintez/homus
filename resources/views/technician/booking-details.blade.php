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
    <title>Job Details - Technician Dashboard</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .btn-primary { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold text-gray-900">Technician Portal</h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('technician.dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('technician.bookings') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        My Jobs
                    </a>
                    <a href="{{ route('technician.profile') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Profile
                    </a>
                    <a href="{{ route('technician.notifications') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Notifications
                    </a>
                    <form method="POST" action="{{ route('technician.logout') }}" class="inline">
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
                    <a href="{{ route('technician.bookings') }}" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                        ← Back to My Jobs
                    </a>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Job Details</h2>
                    <p class="mt-2 text-gray-600">Booking #{{ $booking->booking_number }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    @if($booking->status === 'pending')
                        <form method="POST" action="{{ route('technician.bookings.accept', $booking) }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">
                                Accept Job
                            </button>
                        </form>
                        <form method="POST" action="{{ route('technician.bookings.reject', $booking) }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700"
                                    onclick="return confirm('Are you sure you want to reject this job?')">
                                Reject Job
                            </button>
                        </form>
                    @elseif($booking->status === 'accepted')
                        <form method="POST" action="{{ route('technician.bookings.start', $booking) }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                                Start Job
                            </button>
                        </form>
                    @elseif($booking->status === 'in_progress')
                        <button onclick="showCompleteModal()" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">
                            Complete Job
                        </button>
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
                                <p class="text-sm font-medium text-gray-500">Customer Notes</p>
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

                <!-- Technician Notes Form -->
                @if($booking->status === 'in_progress' || $booking->status === 'completed')
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Technician Notes</h3>
                            @if($booking->technician_notes)
                                <p class="text-sm text-gray-900 mb-4">{{ $booking->technician_notes }}</p>
                            @endif
                            
                            <form method="POST" action="{{ route('technician.bookings.update-notes', $booking) }}">
                                @csrf
                                <div>
                                    <label for="technician_notes" class="block text-sm font-medium text-gray-700">Update Notes</label>
                                    <textarea name="technician_notes" id="technician_notes" rows="4" 
                                              placeholder="Add your notes about the repair work..."
                                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('technician_notes', $booking->technician_notes) }}</textarea>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn-primary text-white py-2 px-4 rounded-md text-sm font-medium">
                                        Update Notes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Job Status</h3>
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

                <!-- Customer Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Name</p>
                                <p class="text-sm text-gray-900">{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</p>
                            </div>
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
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-sm text-gray-900">{{ $booking->customer->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service Address -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Address</h3>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-900">{{ $booking->customer_address }}</p>
                            <p class="text-sm text-gray-900">{{ $booking->customer_city }}, {{ $booking->customer_state }} {{ $booking->customer_postal_code }}</p>
                        </div>
                    </div>
                </div>

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

    <!-- Complete Job Modal -->
    <div id="completeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Complete Job</h3>
                <form method="POST" action="{{ route('technician.bookings.complete', $booking) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="final_price" class="block text-sm font-medium text-gray-700">Final Price</label>
                        <input type="number" name="final_price" id="final_price" step="0.01" min="0" 
                               value="{{ $booking->estimated_price }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="technician_notes" class="block text-sm font-medium text-gray-700">Completion Notes</label>
                        <textarea name="technician_notes" id="technician_notes" rows="3" 
                                  placeholder="Describe the work completed..."
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="hideCompleteModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium">
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md text-sm font-medium">
                            Complete Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showCompleteModal() {
            document.getElementById('completeModal').classList.remove('hidden');
        }

        function hideCompleteModal() {
            document.getElementById('completeModal').classList.add('hidden');
        }
    </script>
</body>
</html>
