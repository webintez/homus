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
    <title>Notifications - Customer Dashboard</title>
    
    
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
            <h2 class="text-3xl font-bold text-gray-900">Notifications</h2>
            <p class="mt-2 text-gray-600">Stay updated with your booking status and important updates</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a href="#" class="border-indigo-500 text-indigo-600 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        All Notifications
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        Unread
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        Booking Updates
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        System Messages
                    </a>
                </nav>
            </div>
        </div>

        <!-- Notifications List -->
        @if($notifications && count($notifications) > 0)
            <div class="space-y-4">
                @foreach($notifications as $notification)
                    <div class="bg-white shadow rounded-lg card-hover {{ $notification->status === 'delivered' ? 'opacity-75' : '' }}">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-start">
                                <!-- Notification Icon -->
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full flex items-center justify-center
                                        @if($notification->type === 'email') bg-blue-100 text-blue-600
                                        @elseif($notification->type === 'sms') bg-green-100 text-green-600
                                        @elseif($notification->type === 'push') bg-purple-100 text-purple-600
                                        @else bg-gray-100 text-gray-600
                                        @endif">
                                        @if($notification->type === 'email')
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        @elseif($notification->type === 'sms')
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        @elseif($notification->type === 'push')
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17H12l-2.586-2.586a2 2 0 00-2.828 0L4.828 17z"></path>
                                            </svg>
                                        @else
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17H12l-2.586-2.586a2 2 0 00-2.828 0L4.828 17z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                <!-- Notification Content -->
                                <div class="flex-1 min-w-0 ml-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">{{ $notification->subject }}</h3>
                                        <div class="flex items-center space-x-2">
                                            <!-- Status Badge -->
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($notification->status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($notification->status === 'sent') bg-blue-100 text-blue-800
                                                @elseif($notification->status === 'delivered') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($notification->status) }}
                                            </span>
                                            <!-- Unread Indicator -->
                                            @if($notification->status !== 'delivered')
                                                <div class="h-2 w-2 bg-indigo-600 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <p class="mt-1 text-sm text-gray-600">{{ $notification->message }}</p>
                                    
                                    <!-- Timestamp -->
                                    <div class="mt-2 flex items-center text-xs text-gray-500">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @if($notification->sent_at)
                                            Sent {{ $notification->sent_at->diffForHumans() }}
                                        @else
                                            Created {{ $notification->created_at->diffForHumans() }}
                                        @endif
                                    </div>

                                    <!-- Additional Data -->
                                    @if($notification->data)
                                        @php
                                            $data = is_string($notification->data) ? json_decode($notification->data, true) : $notification->data;
                                        @endphp
                                        @if(isset($data['booking_id']))
                                            <div class="mt-2">
                                                <a href="{{ route('customer.bookings.show', $data['booking_id']) }}" 
                                                   class="text-indigo-600 hover:text-indigo-500 text-xs font-medium">
                                                    View Related Booking →
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $notifications->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17H12l-2.586-2.586a2 2 0 00-2.828 0L4.828 17z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No notifications</h3>
                <p class="mt-1 text-sm text-gray-500">You're all caught up! We'll notify you when there are updates.</p>
            </div>
        @endif

        <!-- Notification Settings -->
        <div class="mt-12 bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Notification Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Email Notifications</h4>
                            <p class="text-sm text-gray-500">Receive updates via email</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">SMS Notifications</h4>
                            <p class="text-sm text-gray-500">Receive updates via text message</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Push Notifications</h4>
                            <p class="text-sm text-gray-500">Receive browser notifications</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
