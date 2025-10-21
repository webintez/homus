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
    <title>Notifications - Technician Dashboard</title>
    
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
        
        .dark .text-indigo-600 {
            color: #818cf8 !important;
        }
        
        /* Links dark mode */
        .dark a {
            color: #60a5fa !important;
        }
        
        .dark a:hover {
            color: #93c5fd !important;
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
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 gradient-bg dark:gradient-bg-dark rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold text-gradient">Technician Portal</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Notifications</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-2">
                    <a href="{{ route('technician.dashboard') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        Dashboard
                        </div>
                    </a>
                    <a href="{{ route('technician.bookings') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        My Jobs
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
            <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-3xl p-8 shadow-2xl">
                <div class="flex items-center justify-between">
                    <div class="text-white">
                        <h2 class="text-4xl font-bold mb-2">Notifications 🔔</h2>
                        <p class="text-xl text-purple-100 mb-4">Stay updated with job assignments and important updates</p>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse mr-2"></div>
                                <span class="text-purple-100">Total: {{ $notifications ? count($notifications) : 0 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17l2.586-2.586a2 2 0 012.828 0L12 17H4.828z"></path>
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
                    <h3 class="text-xl font-bold text-gradient">Notification Filters</h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent flex-1 ml-6"></div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        All Notifications
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        Unread
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        Job Assignments
                    </button>
                    <button class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        System Messages
                    </button>
                </div>
            </div>
        </div>

        <!-- Notifications List -->
        @if($notifications && count($notifications) > 0)
            <div class="space-y-6">
                @foreach($notifications as $notification)
                    <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden card-hover {{ $notification->status === 'delivered' ? 'opacity-75' : '' }}">
                        <div class="px-8 py-6">
                            <div class="flex items-start">
                                <!-- Notification Icon -->
                                <div class="flex-shrink-0">
                                    <div class="h-16 w-16 rounded-2xl flex items-center justify-center shadow-lg
                                        @if($notification->type === 'email') bg-gradient-to-r from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 text-blue-600 dark:text-blue-400
                                        @elseif($notification->type === 'sms') bg-gradient-to-r from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 text-green-600 dark:text-green-400
                                        @elseif($notification->type === 'push') bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 text-purple-600 dark:text-purple-400
                                        @else bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 text-gray-600 dark:text-gray-400
                                        @endif">
                                        @if($notification->type === 'email')
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        @elseif($notification->type === 'sms')
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        @elseif($notification->type === 'push')
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17H12l-2.586-2.586a2 2 0 00-2.828 0L4.828 17z"></path>
                                            </svg>
                                        @else
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17H12l-2.586-2.586a2 2 0 00-2.828 0L4.828 17z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                <!-- Notification Content -->
                                <div class="flex-1 min-w-0 ml-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $notification->subject }}</h3>
                                        <div class="flex items-center space-x-3">
                                            <!-- Status Badge -->
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                                                @if($notification->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                                @elseif($notification->status === 'sent') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                                @elseif($notification->status === 'delivered') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ ucfirst($notification->status) }}
                                            </span>
                                            <!-- Unread Indicator -->
                                            @if($notification->status !== 'delivered')
                                                <div class="h-3 w-3 bg-indigo-600 rounded-full animate-pulse"></div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-600 dark:text-gray-400 text-base mb-4">{{ $notification->message }}</p>
                                    
                                    <!-- Timestamp -->
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-500 mb-4">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <div class="mt-4">
                                                <a href="{{ route('technician.bookings.show', $data['booking_id']) }}" 
                                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    View Job Details
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
            <div class="text-center py-16">
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="h-10 w-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828zM4.828 17l2.586-2.586a2 2 0 012.828 0L12 17H4.828z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No notifications yet</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">You're all caught up! We'll notify you when there are updates.</p>
                <div class="inline-flex items-center px-4 py-2 bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 rounded-lg">
                    <svg class="h-4 w-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                    <span class="text-sm font-medium">Waiting for updates...</span>
                </div>
            </div>
        @endif

        <!-- Notification Settings -->
        <div class="mt-12 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-8 py-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gradient">Notification Settings</h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent flex-1 ml-6"></div>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Email Notifications</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Receive job assignments and updates via email</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-12 h-6 bg-gray-200 dark:bg-gray-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl border border-green-200 dark:border-green-800">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">SMS Notifications</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Receive urgent updates via text message</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-12 h-6 bg-gray-200 dark:bg-gray-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border border-purple-200 dark:border-purple-800">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Push Notifications</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Receive browser notifications for new jobs</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-12 h-6 bg-gray-200 dark:bg-gray-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
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
</body>
</html>
