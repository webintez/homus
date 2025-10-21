<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | HomeUs</title>
    <meta name="description" content="Track and manage your appliance repair bookings with HomeUs.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'pulse-slow': 'pulse 3s infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Dark Mode Script -->
    <script>
        // Prevent FOUC (Flash of Unstyled Content)
        if (localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    
    <style>
        /* Custom animations */
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }
        .animate-bounce-slow { animation: bounce-slow 2s ease-in-out infinite; }
        
        /* Gradient text */
        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .text-gradient-light {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: #fbbf24; /* Fallback color */
        }
        .dark .text-gradient-light {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: #fbbf24; /* Fallback color */
        }
        
        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .dark .glass {
            background: rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Button styles */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .service-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .service-card:hover {
            background: linear-gradient(145deg, #f8fafc 0%, #ffffff 100%);
            border-color: #667eea;
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .dark .service-card {
            background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
            border-color: #374151;
        }
        .dark .service-card:hover {
            background: linear-gradient(145deg, #111827 0%, #1f2937 100%);
            border-color: #667eea;
        }
        .category-card {
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .dark .category-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        .search-input {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        .search-input:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
        }
        .dark .search-input {
            background: rgba(31, 41, 55, 0.95);
            border-color: rgba(75, 85, 99, 0.3);
        }
        .dark .search-input:focus {
            border-color: rgba(75, 85, 99, 0.5);
            box-shadow: 0 0 0 4px rgba(75, 85, 99, 0.1);
        }
        
        /* Dark mode overrides */
        .dark .text-gray-900 {
            color: #ffffff !important;
        }
        
        .dark .text-gray-800 {
            color: #f9fafb !important;
        }
        
        .dark .text-gray-700 {
            color: #d1d5db !important;
        }
        
        .dark .text-gray-600 {
            color: #9ca3af !important;
        }
        
        .dark .text-gray-500 {
            color: #6b7280 !important;
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
        
        .dark .bg-red-50 {
            background-color: #7f1d1d !important;
        }
        
        .dark .bg-yellow-50 {
            background-color: #451a03 !important;
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
        
        .dark .text-red-700 {
            color: #fca5a5 !important;
        }
        
        .dark .text-yellow-700 {
            color: #fde68a !important;
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
        
        .dark .border-red-200 {
            border-color: #dc2626 !important;
        }
        
        .dark .border-yellow-200 {
            border-color: #d97706 !important;
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
                        <div class="h-10 w-10 md:h-12 md:w-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="h-5 w-5 md:h-7 md:w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3 md:ml-4">
                        <h1 class="text-lg md:text-2xl font-bold text-gradient">Customer Portal</h1>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 hidden sm:block">Home Appliance Repair Service</p>
                    </div>
                </div>
                
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('customer.services') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                        Browse Services
                    </a>
                    <a href="{{ route('customer.profile') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                        <svg id="sun-icon" class="h-5 w-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moon-icon" class="h-5 w-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    
                    <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <!-- Header -->
        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-3xl shadow-2xl mb-8">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative px-6 py-12 md:px-12 md:py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                        My <span class="text-gradient-light">Bookings</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                        Track and manage your appliance repair service bookings. Stay updated on your service requests.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('customer.services') }}" class="bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-white/30 transition-all duration-300">
                            Browse Services
                        </a>
                        <span class="bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-2xl text-lg font-semibold">
                            Total: {{ $bookings ? $bookings->count() : 0 }} Bookings
                        </span>
                    </div>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-8">
            <div class="service-card rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-gradient">Filter Bookings</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">View bookings by status</p>
                    </div>
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent flex-1 ml-6"></div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        All Bookings
                    </button>
                    <button class="px-6 py-3 bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Pending
                    </button>
                    <button class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        In Progress
                    </button>
                    <button class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Completed
                    </button>
                </div>
            </div>
        </div>

        <!-- Bookings List -->
        @if($bookings && count($bookings) > 0)
            <div class="space-y-6">
                @foreach($bookings as $booking)
                    <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden card-hover">
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-6">
                                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </h3>
                                        <p class="text-lg text-gray-500 dark:text-gray-400 mt-1">
                                                Booking #{{ $booking->booking_number }} • {{ $booking->preferred_date }} at {{ $booking->preferred_time }}
                                            </p>
                                        <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                {{ Str::limit($booking->issue_description, 100) }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                        <span class="inline-flex items-center px-6 py-3 rounded-2xl text-lg font-bold shadow-lg
                                            @if($booking->status === 'pending') bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 dark:from-yellow-900/20 dark:to-amber-900/20 dark:text-yellow-400
                                            @elseif($booking->status === 'accepted') bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 dark:from-blue-900/20 dark:to-indigo-900/20 dark:text-blue-400
                                            @elseif($booking->status === 'in_progress') bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 dark:from-purple-900/20 dark:to-pink-900/20 dark:text-purple-400
                                            @elseif($booking->status === 'completed') bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 dark:from-green-900/20 dark:to-emerald-900/20 dark:text-green-400
                                            @else bg-gradient-to-r from-red-100 to-pink-100 text-red-800 dark:from-red-900/20 dark:to-pink-900/20 dark:text-red-400
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                <div class="category-card bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center mb-3">
                                        <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="text-sm font-bold text-gray-700 dark:text-gray-300">Service Address</p>
                                    </div>
                                    <p class="text-gray-900 dark:text-white font-medium">{{ $booking->customer_address }}</p>
                                </div>
                                <div class="category-card bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center mb-3">
                                        <svg class="h-5 w-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <p class="text-sm font-bold text-gray-700 dark:text-gray-300">Estimated Price</p>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₹{{ number_format($booking->estimated_price, 2) }}</p>
                                </div>
                                <div class="category-card bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center mb-3">
                                        <svg class="h-5 w-5 text-purple-600 dark:text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <p class="text-sm font-bold text-gray-700 dark:text-gray-300">Technician</p>
                                    </div>
                                    <p class="text-gray-900 dark:text-white font-medium">
                                        @if($booking->technician)
                                            {{ $booking->technician->first_name }} {{ $booking->technician->last_name }}
                                        @else
                                            <span class="text-gray-500 dark:text-gray-400">Not assigned yet</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-600">
                                <div class="flex space-x-4">
                                    <a href="{{ route('customer.bookings.show', $booking) }}" 
                                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 hover:from-indigo-700 hover:to-purple-700">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </a>
                                    @if($booking->status === 'pending')
                                        <form method="POST" action="{{ route('customer.bookings.cancel', $booking) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 hover:from-red-700 hover:to-pink-700"
                                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancel Booking
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">
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
                <div class="w-24 h-24 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                    <svg class="h-12 w-12 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No bookings found</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-8 text-lg">Get started by booking your first repair service.</p>
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-100 to-amber-100 dark:from-yellow-900/20 dark:to-amber-900/20 rounded-full text-yellow-800 dark:text-yellow-400 text-sm font-semibold animate-pulse-slow mb-8">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Ready to book your first service...
                </div>
                <div>
                    <a href="{{ route('customer.services') }}" class="inline-flex items-center px-10 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 hover:from-indigo-700 hover:to-purple-700">
                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Book a Service
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Dark Mode Toggle Script -->
    <script>
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
        document.addEventListener('DOMContentLoaded', function() {
            const savedMode = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedMode === 'true' || (!savedMode && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        });

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
            if (!localStorage.getItem('darkMode')) {
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
            <a href="{{ route('customer.dashboard') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                </svg>
                <span class="text-xs font-medium">Dashboard</span>
            </a>

            <!-- Services -->
            <a href="{{ route('customer.services') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
                <span class="text-xs font-medium">Services</span>
            </a>

            <!-- Bookings (Active) -->
            <a href="{{ route('customer.bookings') }}" class="flex flex-col items-center py-2 px-3 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span class="text-xs font-medium">Bookings</span>
            </a>

            <!-- Profile -->
            <a href="{{ route('customer.profile') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-xs font-medium">Profile</span>
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



