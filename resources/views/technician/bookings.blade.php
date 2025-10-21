<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-black">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Jobs - Technician Dashboard</title>
    
    <script>
        // Prevent flash of unstyled content by setting dark mode immediately
        (function() {
            const savedMode = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedMode === 'true' || (savedMode === null && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    
    <style>
        /* Base dark mode styles */
        .dark {
            color-scheme: dark;
        }
        
        .dark body {
            background-color: #000000 !important;
            color: #ffffff !important;
        }
        
        .dark * {
            border-color: #374151;
        }
        
        .gradient-bg { 
            background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
        }
        .gradient-bg-dark { 
            background: linear-gradient(135deg, #065f46 0%, #064e3b 100%); 
        }
        .btn-primary { 
            background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
            transition: all 0.3s ease;
        }
        .btn-primary:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3); 
        }
        .card-hover { 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .card-hover:hover { 
            transform: translateY(-8px) scale(1.02); 
            box-shadow: 0 25px 50px rgba(0,0,0,0.15); 
        }
        .text-gradient {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .dark .text-gradient {
            background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Ensure all text is visible in dark mode */
        .dark h1, .dark h2, .dark h3, .dark h4, .dark h5, .dark h6 {
            color: #ffffff !important;
        }
        
        .dark p, .dark span, .dark div {
            color: #e5e7eb !important;
        }
        
        .dark .text-gray-600 {
            color: #d1d5db !important;
        }
        
        .dark .text-gray-500 {
            color: #9ca3af !important;
        }
        
        .dark .text-gray-400 {
            color: #9ca3af !important;
        }
        
        .dark .text-gray-300 {
            color: #d1d5db !important;
        }
        
        /* Ensure cards have proper dark backgrounds */
        .dark .bg-white {
            background-color: #1f2937 !important;
        }
        
        .dark .bg-gray-50 {
            background-color: #111827 !important;
        }
        
        .dark .bg-gray-100 {
            background-color: #374151 !important;
        }
        
        /* Fix all gradient backgrounds in dark mode */
        .dark .bg-gradient-to-br {
            background: linear-gradient(to bottom right, #1f2937, #111827) !important;
        }
        
        .dark .bg-gradient-to-r {
            background: linear-gradient(to right, #1f2937, #111827) !important;
        }
        
        .dark .from-white {
            background-color: #1f2937 !important;
        }
        
        .dark .to-gray-50 {
            background-color: #111827 !important;
        }
        
        .dark .from-gray-50 {
            background-color: #111827 !important;
        }
        
        .dark .to-gray-100 {
            background-color: #374151 !important;
        }
        
        .dark .from-gray-100 {
            background-color: #374151 !important;
        }
        
        /* Fix specific gradient combinations */
        .dark .bg-gradient-to-br.from-white.to-gray-50 {
            background: linear-gradient(to bottom right, #1f2937, #111827) !important;
        }
        
        .dark .bg-gradient-to-br.from-gray-50.to-gray-100 {
            background: linear-gradient(to bottom right, #111827, #374151) !important;
        }
        
        .dark .bg-gradient-to-r.from-gray-50.to-gray-100 {
            background: linear-gradient(to right, #111827, #374151) !important;
        }
        
        /* Ensure borders are visible */
        .dark .border-gray-200 {
            border-color: #374151 !important;
        }
        
        .dark .border-gray-300 {
            border-color: #4b5563 !important;
        }
        
        /* Status badges dark mode */
        .dark .bg-yellow-100 {
            background-color: #451a03 !important;
        }
        
        .dark .bg-blue-100 {
            background-color: #1e3a8a !important;
        }
        
        .dark .bg-purple-100 {
            background-color: #581c87 !important;
        }
        
        .dark .bg-green-100 {
            background-color: #14532d !important;
        }
        
        .dark .bg-red-100 {
            background-color: #7f1d1d !important;
        }
        
        .dark .text-yellow-800 {
            color: #fde68a !important;
        }
        
        .dark .text-blue-800 {
            color: #93c5fd !important;
        }
        
        .dark .text-purple-800 {
            color: #c4b5fd !important;
        }
        
        .dark .text-green-800 {
            color: #86efac !important;
        }
        
        .dark .text-red-800 {
            color: #fecaca !important;
        }
        
        /* Links dark mode */
        .dark a {
            color: #60a5fa !important;
        }
        
        .dark a:hover {
            color: #93c5fd !important;
        }
        
        /* Button text dark mode */
        .dark button {
            color: #ffffff !important;
        }
        
        .dark button:hover {
            color: #e5e7eb !important;
        }
        
        /* Fix all text colors in dark mode */
        .dark .text-gray-700 {
            color: #d1d5db !important;
        }
        
        .dark .text-gray-800 {
            color: #f9fafb !important;
        }
        
        .dark .text-gray-900 {
            color: #ffffff !important;
        }
        
        /* Fix form elements */
        .dark input, .dark textarea, .dark select {
            background-color: #374151 !important;
            color: #ffffff !important;
            border-color: #4b5563 !important;
        }
        
        .dark input:focus, .dark textarea:focus, .dark select:focus {
            border-color: #60a5fa !important;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1) !important;
        }
        
        /* Fix all colored backgrounds */
        .dark .bg-blue-50 {
            background-color: #1e3a8a !important;
        }
        
        .dark .bg-green-50 {
            background-color: #14532d !important;
        }
        
        .dark .bg-purple-50 {
            background-color: #581c87 !important;
        }
        
        .dark .bg-pink-50 {
            background-color: #831843 !important;
        }
        
        .dark .bg-indigo-50 {
            background-color: #312e81 !important;
        }
        
        .dark .bg-emerald-50 {
            background-color: #064e3b !important;
        }
        
        .dark .bg-cyan-50 {
            background-color: #164e63 !important;
        }
        
        .dark .bg-teal-50 {
            background-color: #134e4a !important;
        }
        
        /* Fix colored text in dark mode */
        .dark .text-blue-700 {
            color: #93c5fd !important;
        }
        
        .dark .text-green-700 {
            color: #86efac !important;
        }
        
        .dark .text-purple-700 {
            color: #c4b5fd !important;
        }
        
        .dark .text-pink-700 {
            color: #f9a8d4 !important;
        }
        
        .dark .text-indigo-700 {
            color: #a5b4fc !important;
        }
        
        .dark .text-emerald-700 {
            color: #6ee7b7 !important;
        }
        
        .dark .text-cyan-700 {
            color: #67e8f9 !important;
        }
        
        .dark .text-teal-700 {
            color: #5eead4 !important;
        }
        
        /* Fix colored borders */
        .dark .border-blue-200 {
            border-color: #1e40af !important;
        }
        
        .dark .border-green-200 {
            border-color: #166534 !important;
        }
        
        .dark .border-purple-200 {
            border-color: #7c3aed !important;
        }
        
        .dark .border-pink-200 {
            border-color: #be185d !important;
        }
        
        .dark .border-indigo-200 {
            border-color: #4338ca !important;
        }
        
        .dark .border-emerald-200 {
            border-color: #059669 !important;
        }
        
        .dark .border-cyan-200 {
            border-color: #0891b2 !important;
        }
        
        .dark .border-teal-200 {
            border-color: #0f766e !important;
        }
    </style>
</head>
<body class="h-full bg-gray-50 dark:bg-black text-gray-900 dark:text-white">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-900 shadow-xl border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 md:h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 md:h-12 md:w-12 gradient-bg dark:gradient-bg-dark rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="h-5 w-5 md:h-7 md:w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3 md:ml-4">
                        <h1 class="text-lg md:text-2xl font-bold text-gradient">Technician Portal</h1>
                        <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400 hidden sm:block">My Jobs</p>
                    </div>
                </div>
                
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('technician.dashboard') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        Dashboard
                        </div>
                    </a>
                    <a href="{{ route('technician.profile') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        Profile
                        </div>
                    </a>
                    <a href="{{ route('technician.notifications') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17l2.586-2.586a2 2 0 012.828 0L12 17H4.828z"></path>
                            </svg>
                        Notifications
                        </div>
                    </a>
                    <button onclick="toggleDarkMode()" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                            <svg class="h-5 w-5 mr-2 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span class="dark:hidden">Dark Mode</span>
                            <span class="hidden dark:inline">Light Mode</span>
                        </div>
                    </button>
                    <div class="h-8 w-px bg-gray-300 dark:bg-gray-600"></div>
                    <form method="POST" action="{{ route('technician.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-200">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            Logout
                            </div>
                        </button>
                    </form>
                </div>
            </div>
                
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 text-gray-900 dark:text-white">
        <!-- Header -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-3xl p-8 shadow-2xl">
                <div class="flex items-center justify-between">
                    <div class="text-white">
                        <h2 class="text-4xl font-bold mb-2">My Jobs 📋</h2>
                        <p class="text-xl text-indigo-100 mb-4">Manage your assigned repair jobs and track progress</p>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse mr-2"></div>
                                <span class="text-indigo-100">Active Jobs: {{ $bookings ? count($bookings) : 0 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gradient">Job Filters</h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent flex-1 ml-6"></div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        All Jobs
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        Pending
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        In Progress
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        Completed
                    </button>
                </div>
            </div>
        </div>

        <!-- Jobs List -->
        @if($bookings && count($bookings) > 0)
            <div class="space-y-6">
                @foreach($bookings as $booking)
                    <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden card-hover">
                        <div class="px-8 py-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-6">
                                        <div class="flex-shrink-0">
                                            <div class="h-16 w-16 rounded-2xl bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 flex items-center justify-center shadow-lg">
                                                <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </h3>
                                            <div class="flex items-center space-x-4 mb-2">
                                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                                    <span class="text-indigo-600 dark:text-indigo-400">Booking #{{ $booking->booking_number }}</span>
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-500">
                                                    {{ \Carbon\Carbon::parse($booking->preferred_date)->format('M d, Y') }} at {{ $booking->preferred_time }}
                                                </p>
                                            </div>
                                            <p class="text-gray-600 dark:text-gray-400 text-base">
                                                {{ Str::limit($booking->issue_description, 120) }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                                                @if($booking->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                                @elseif($booking->status === 'accepted') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                                @elseif($booking->status === 'in_progress') bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-300
                                                @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Details -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-4 rounded-xl border border-blue-200 dark:border-blue-800">
                                    <div class="flex items-center mb-2">
                                        <svg class="h-5 w-5 text-blue-600 dark:text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-blue-700 dark:text-blue-300">Customer</p>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $booking->customer_phone }}</p>
                                </div>
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-4 rounded-xl border border-green-200 dark:border-green-800">
                                    <div class="flex items-center mb-2">
                                        <svg class="h-5 w-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-green-700 dark:text-green-300">Service Address</p>
                                    </div>
                                    <p class="text-sm text-gray-900 dark:text-white">{{ $booking->customer_address }}</p>
                                </div>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-4 rounded-xl border border-purple-200 dark:border-purple-800">
                                    <div class="flex items-center mb-2">
                                        <svg class="h-5 w-5 text-purple-600 dark:text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-purple-700 dark:text-purple-300">Estimated Price</p>
                                </div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₹{{ number_format($booking->estimated_price, 2) }}</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-8 flex items-center justify-between">
                                <div class="flex space-x-4">
                                    <a href="{{ route('technician.bookings.show', $booking) }}" 
                                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </a>
                                    @if($booking->status === 'pending')
                                        <form method="POST" action="{{ route('technician.bookings.accept', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Accept Job
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('technician.bookings.reject', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                                                    onclick="return confirm('Are you sure you want to reject this job?')">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject Job
                                            </button>
                                        </form>
                                    @elseif($booking->status === 'accepted')
                                        <form method="POST" action="{{ route('technician.bookings.start', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Start Job
                                            </button>
                                        </form>
                                    @elseif($booking->status === 'in_progress')
                                        <form method="POST" action="{{ route('technician.bookings.complete', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Complete Job
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
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
            <div class="text-center py-16">
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="h-10 w-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No jobs assigned yet</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">You'll be notified when new jobs are assigned to you.</p>
                <div class="inline-flex items-center px-4 py-2 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 rounded-lg">
                    <svg class="h-4 w-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                    <span class="text-sm font-medium">Waiting for assignments...</span>
                </div>
            </div>
        @endif
    </div>

    <script>
        // Dark mode functionality
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            } else {
                html.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            }
        }

        // Initialize dark mode on page load
        function initDarkMode() {
            const savedMode = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedMode === 'true' || (savedMode === null && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        // Initialize dark mode when page loads
        document.addEventListener('DOMContentLoaded', initDarkMode);

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
            if (localStorage.getItem('darkMode') === null) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        });

    </script>

    <!-- Bottom Navigation Bar (Mobile Only) -->
    <nav class="bottom-nav-mobile fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 z-50 block md:hidden">
        <div class="flex justify-around items-center py-2">
            <!-- Dashboard -->
            <a href="{{ route('technician.dashboard') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                </svg>
                <span class="text-xs font-medium">Dashboard</span>
            </a>

            <!-- My Jobs (Active) -->
            <a href="{{ route('technician.bookings') }}" class="flex flex-col items-center py-2 px-3 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span class="text-xs font-medium">My Jobs</span>
            </a>

            <!-- Profile -->
            <a href="{{ route('technician.profile') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-xs font-medium">Profile</span>
            </a>

            <!-- Notifications -->
            <a href="{{ route('technician.notifications') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l5 5H4l5-5zM12 2l-1 1v6l1-1V2zM12 14l1 1v6l-1-1v-6z"></path>
                </svg>
                <span class="text-xs font-medium">Alerts</span>
            </a>

            <!-- Dark Mode Toggle -->
            <button onclick="toggleDarkMode()" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg id="bottom-sun-icon" class="h-6 w-6 mb-1 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <svg id="bottom-moon-icon" class="h-6 w-6 mb-1 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
                <span class="text-xs font-medium">Theme</span>
            </button>
        </div>
    </nav>

    <!-- Add padding to body for mobile to account for bottom navigation --><style>@media (max-width: 768px) {body {padding-bottom: 80px;}}/* Ensure bottom navigation is hidden on desktop */@media (min-width: 769px) {.bottom-nav-mobile {display: none !important;}}</style>
</body>
</html>





