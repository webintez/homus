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
    <title>Technician Dashboard - Home Appliance Repair Service</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .btn-primary { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold text-gray-900">Technician Portal</h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
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
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Welcome back, {{ $technician->first_name }}!</h2>
            <p class="mt-2 text-gray-600">Manage your repair jobs and availability</p>
        </div>

        <!-- Status Alert -->
        @if($technician->status === 'pending')
            <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-md p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Application Under Review</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>Your technician application is currently being reviewed. You'll be notified once it's approved.</p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($technician->status === 'rejected')
            <div class="mb-6 bg-red-50 border border-red-200 rounded-md p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Application Rejected</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <p>Unfortunately, your technician application was not approved. Please contact support for more information.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Jobs</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['total_jobs'] ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Completed</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['completed_jobs'] ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">In Progress</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['in_progress_jobs'] ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Rating</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ number_format($technician->rating ?? 0, 1) }}/5</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('technician.bookings') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow card-hover">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">View Jobs</h4>
                            <p class="text-sm text-gray-500">Check your assigned jobs</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('technician.profile') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow card-hover">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Update Profile</h4>
                            <p class="text-sm text-gray-500">Manage your information</p>
                        </div>
                    </div>
                </a>

                <button onclick="toggleAvailability()" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow card-hover text-left w-full">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Toggle Availability</h4>
                            <p class="text-sm text-gray-500">Update your availability status</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <!-- Recent Jobs -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Recent Jobs</h3>
                @if($recentBookings && count($recentBookings) > 0)
                    <div class="flow-root">
                        <ul class="-my-5 divide-y divide-gray-200">
                            @foreach($recentBookings as $booking)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Booking #{{ $booking->booking_number }} • {{ $booking->preferred_date }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
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
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('technician.bookings') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            View all jobs →
                        </a>
                    </div>
                @else
                    <div class="text-center py-6">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No jobs assigned yet</h3>
                        <p class="mt-1 text-sm text-gray-500">You'll be notified when new jobs are assigned to you.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Availability Toggle Modal -->
    <div id="availabilityModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Update Availability</h3>
                <form method="POST" action="{{ route('technician.availability.update') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_available" value="1" {{ $technician->is_available ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">I am available for new jobs</span>
                        </label>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="toggleAvailability()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium">
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary text-white px-4 py-2 rounded-md text-sm font-medium">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleAvailability() {
            document.getElementById('availabilityModal').classList.toggle('hidden');
        }
    </script>
</body>
</html>
