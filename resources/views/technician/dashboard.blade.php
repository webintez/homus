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
    <title>Technician Dashboard - Home Appliance Repair Service</title>
    
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
        .stat-card-gradient-1 { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
        .stat-card-gradient-2 { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-card-gradient-3 { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .stat-card-gradient-4 { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .animate-bounce-slow {
            animation: bounce 2s infinite;
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
        
        /* Card content dark mode styling */
        .dark .bg-gradient-to-br {
            background: linear-gradient(to bottom right, #1f2937, #111827) !important;
        }
        
        .dark .bg-gradient-to-r {
            background: linear-gradient(to right, #1f2937, #111827) !important;
        }
        
        /* Stats cards dark mode */
        .dark .bg-gradient-to-br.from-blue-50 {
            background: linear-gradient(to bottom right, #1e3a8a, #1e40af) !important;
        }
        
        .dark .bg-gradient-to-br.from-green-50 {
            background: linear-gradient(to bottom right, #14532d, #166534) !important;
        }
        
        .dark .bg-gradient-to-br.from-orange-50 {
            background: linear-gradient(to bottom right, #9a3412, #c2410c) !important;
        }
        
        .dark .bg-gradient-to-br.from-purple-50 {
            background: linear-gradient(to bottom right, #581c87, #7c2d12) !important;
        }
        
        /* Status alert cards dark mode */
        .dark .bg-gradient-to-r.from-yellow-50 {
            background: linear-gradient(to right, #451a03, #78350f) !important;
        }
        
        .dark .bg-gradient-to-r.from-red-50 {
            background: linear-gradient(to right, #7f1d1d, #991b1b) !important;
        }
        
        /* Recent jobs section dark mode */
        .dark .bg-gradient-to-br.from-white {
            background: linear-gradient(to bottom right, #1f2937, #111827) !important;
        }
        
        .dark .bg-gradient-to-r.from-indigo-50 {
            background: linear-gradient(to right, #312e81, #3730a3) !important;
        }
        
        /* Individual job cards dark mode */
        .dark .group.bg-white {
            background-color: #1f2937 !important;
        }
        
        /* Ensure all text in cards is visible */
        .dark .text-blue-600 {
            color: #60a5fa !important;
        }
        
        .dark .text-blue-700 {
            color: #93c5fd !important;
        }
        
        .dark .text-green-600 {
            color: #4ade80 !important;
        }
        
        .dark .text-green-700 {
            color: #86efac !important;
        }
        
        .dark .text-orange-600 {
            color: #fb923c !important;
        }
        
        .dark .text-orange-700 {
            color: #fdba74 !important;
        }
        
        .dark .text-purple-600 {
            color: #a78bfa !important;
        }
        
        .dark .text-purple-700 {
            color: #c4b5fd !important;
        }
        
        .dark .text-yellow-600 {
            color: #fbbf24 !important;
        }
        
        .dark .text-yellow-700 {
            color: #fcd34d !important;
        }
        
        .dark .text-yellow-800 {
            color: #fde68a !important;
        }
        
        .dark .text-red-600 {
            color: #f87171 !important;
        }
        
        .dark .text-red-700 {
            color: #fca5a5 !important;
        }
        
        .dark .text-red-800 {
            color: #fecaca !important;
        }
        
        .dark .text-indigo-600 {
            color: #818cf8 !important;
        }
        
        .dark .text-indigo-400 {
            color: #a5b4fc !important;
        }
        
        /* Star ratings dark mode */
        .dark .text-yellow-400 {
            color: #fbbf24 !important;
        }
        
        .dark .text-gray-300 {
            color: #6b7280 !important;
        }
        
        .dark .text-gray-600 {
            color: #9ca3af !important;
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
        
        /* Icon backgrounds dark mode */
        .dark .bg-yellow-100 {
            background-color: #451a03 !important;
        }
        
        .dark .bg-red-100 {
            background-color: #7f1d1d !important;
        }
        
        .dark .bg-indigo-100 {
            background-color: #312e81 !important;
        }
        
        .dark .bg-purple-100 {
            background-color: #581c87 !important;
        }
        
        /* Ensure all links are visible */
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
        
        /* Form elements dark mode */
        .dark input, .dark textarea, .dark select {
            background-color: #374151 !important;
            color: #ffffff !important;
            border-color: #4b5563 !important;
        }
        
        .dark input:focus, .dark textarea:focus, .dark select:focus {
            border-color: #60a5fa !important;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1) !important;
        }
        
        /* Modal dark mode */
        .dark #availabilityModal {
            background-color: rgba(0, 0, 0, 0.8) !important;
        }
        
        .dark #availabilityModal .bg-white {
            background-color: #1f2937 !important;
        }
        
        .dark #availabilityModal .text-gray-900 {
            color: #ffffff !important;
        }
        
        .dark #availabilityModal .text-gray-600 {
            color: #d1d5db !important;
        }
        
        .dark #availabilityModal .text-gray-400 {
            color: #9ca3af !important;
        }
        
        .dark #availabilityModal .text-gray-300 {
            color: #d1d5db !important;
        }
        
        .dark #availabilityModal .bg-gray-100 {
            background-color: #374151 !important;
        }
        
        .dark #availabilityModal .bg-gray-700 {
            background-color: #4b5563 !important;
        }
        
        .dark #availabilityModal .border-indigo-200 {
            border-color: #3730a3 !important;
        }
        
        .dark #availabilityModal .border-indigo-800 {
            border-color: #312e81 !important;
        }
        
        /* Ensure all SVG icons are visible in dark mode */
        .dark svg {
            color: inherit !important;
        }
        
        /* Table content dark mode */
        .dark table {
            background-color: #1f2937 !important;
            color: #ffffff !important;
        }
        
        .dark th {
            background-color: #374151 !important;
            color: #ffffff !important;
            border-color: #4b5563 !important;
        }
        
        .dark td {
            background-color: #1f2937 !important;
            color: #ffffff !important;
            border-color: #4b5563 !important;
        }
        
        .dark tr:hover {
            background-color: #374151 !important;
        }
        
        /* Ensure all content is visible */
        .dark * {
            color: inherit;
        }
        
        .dark .text-black {
            color: #ffffff !important;
        }
        
        .dark .text-gray-900 {
            color: #ffffff !important;
        }
        
        .dark .text-gray-800 {
            color: #e5e7eb !important;
        }
        
        .dark .text-gray-700 {
            color: #d1d5db !important;
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
                        <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400 hidden sm:block">Professional Dashboard</p>
                    </div>
                </div>
                
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-2">
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
        <!-- Welcome Section -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-3xl p-8 shadow-2xl">
                <div class="flex items-center justify-between">
                    <div class="text-white">
                        <h2 class="text-4xl font-bold mb-2">Welcome back, {{ $technician->first_name }}! 👋</h2>
                        <p class="text-xl text-emerald-100 mb-4">Ready to tackle today's repair jobs?</p>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse-slow mr-2"></div>
                                <span class="text-emerald-100">Status: {{ ucfirst($technician->status) }}</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 {{ $technician->is_available ? 'bg-green-400' : 'bg-red-400' }} rounded-full animate-pulse-slow mr-2"></div>
                                <span class="text-emerald-100">Available: {{ $technician->is_available ? 'Yes' : 'No' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Alert -->
        @if($technician->status === 'pending')
            <div class="mb-8 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 border border-yellow-200 dark:border-yellow-800 rounded-2xl p-6 shadow-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200">Application Under Review</h3>
                        <div class="mt-2 text-yellow-700 dark:text-yellow-300">
                            <p>Your technician application is currently being reviewed by our team. You'll be notified via email once it's approved and you can start accepting jobs.</p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($technician->status === 'rejected')
            <div class="mb-8 bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 border border-red-200 dark:border-red-800 rounded-2xl p-6 shadow-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">Application Rejected</h3>
                        <div class="mt-2 text-red-700 dark:text-red-300">
                            <p>Unfortunately, your technician application was not approved. Please contact our support team for more information about the decision.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Total Jobs Card -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-6 rounded-2xl shadow-xl border border-blue-200 dark:border-blue-800 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total_jobs'] ?? 0 }}</h3>
                        <p class="text-blue-700 dark:text-blue-300 font-medium">Total Jobs</p>
                        <p class="text-sm text-blue-600 dark:text-blue-400 mt-1">All time assignments</p>
                    </div>
                    <div class="h-16 w-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                    </div>
                </div>
            </div>

            <!-- Completed Jobs Card -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-6 rounded-2xl shadow-xl border border-green-200 dark:border-green-800 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['completed_jobs'] ?? 0 }}</h3>
                        <p class="text-green-700 dark:text-green-300 font-medium">Completed</p>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-1">Successfully finished</p>
                    </div>
                    <div class="h-16 w-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                    </div>
                </div>
            </div>

            <!-- In Progress Jobs Card -->
            <div class="bg-gradient-to-br from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 p-6 rounded-2xl shadow-xl border border-orange-200 dark:border-orange-800 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['in_progress_jobs'] ?? 0 }}</h3>
                        <p class="text-orange-700 dark:text-orange-300 font-medium">In Progress</p>
                        <p class="text-sm text-orange-600 dark:text-orange-400 mt-1">Currently working</p>
                    </div>
                    <div class="h-16 w-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="h-8 w-8 text-white animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                    </div>
                </div>
            </div>

            <!-- Rating Card -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-6 rounded-2xl shadow-xl border border-purple-200 dark:border-purple-800 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ number_format($technician->rating ?? 0, 1) }}</h3>
                        <p class="text-purple-700 dark:text-purple-300 font-medium">Rating</p>
                        <div class="flex items-center mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="h-4 w-4 {{ $i <= floor($technician->rating ?? 0) ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endfor
                        </div>
                    </div>
                    <div class="h-16 w-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-gradient">Quick Actions</h3>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent flex-1 ml-6"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- View Jobs Card -->
                <a href="{{ route('technician.bookings') }}" class="group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover border border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 mb-4">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">View Jobs</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Check your assigned jobs and manage your workload</p>
                        <div class="flex items-center text-blue-600 dark:text-blue-400 font-medium">
                            <span>View All Jobs</span>
                            <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Update Profile Card -->
                <a href="{{ route('technician.profile') }}" class="group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover border border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 mb-4">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Update Profile</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Manage your personal information and skills</p>
                        <div class="flex items-center text-green-600 dark:text-green-400 font-medium">
                            <span>Edit Profile</span>
                            <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Toggle Availability Card -->
                <button onclick="toggleAvailability()" class="group bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover border border-gray-200 dark:border-gray-700 text-left w-full">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 mb-4">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Toggle Availability</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Update your availability status for new jobs</p>
                        <div class="flex items-center text-purple-600 dark:text-purple-400 font-medium">
                            <span>Update Status</span>
                            <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <!-- Recent Jobs -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Recent Jobs</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Your latest job assignments and updates</p>
                    </div>
                    <div class="h-12 w-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="p-8">
                @if($recentBookings && count($recentBookings) > 0)
                    <div class="space-y-4">
                            @foreach($recentBookings as $booking)
                            <div class="group bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-600">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                                <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
                                                {{ $booking->service->name ?? 'Service' }} - {{ $booking->appliance_type }}
                                            </h4>
                                            <div class="flex items-center space-x-4 mt-1">
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    <span class="font-medium">Booking #{{ $booking->booking_number }}</span>
                                            </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-500">
                                                    {{ \Carbon\Carbon::parse($booking->preferred_date)->format('M d, Y') }}
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            @if($booking->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                            @elseif($booking->status === 'accepted') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                            @elseif($booking->status === 'in_progress') bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-300
                                            @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                            @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                        </div>
                                    </div>
                            @endforeach
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('technician.bookings') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                            <span>View All Jobs</span>
                            <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="mx-auto h-20 w-20 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="h-10 w-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No jobs assigned yet</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">You'll be notified when new jobs are assigned to you.</p>
                        <div class="inline-flex items-center px-4 py-2 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 rounded-lg">
                            <svg class="h-4 w-4 mr-2 animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                            <span class="text-sm font-medium">Waiting for assignments...</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Availability Toggle Modal -->
    <div id="availabilityModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-6 border-0 w-full max-w-md shadow-2xl rounded-2xl bg-white dark:bg-gray-800">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Update Availability</h3>
                <button onclick="toggleAvailability()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
                <form method="POST" action="{{ route('technician.availability.update') }}">
                    @csrf
                <div class="mb-6">
                    <div class="flex items-center p-4 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-xl border border-indigo-200 dark:border-indigo-800">
                        <input type="checkbox" name="is_available" value="1" {{ $technician->is_available ? 'checked' : '' }} 
                               class="h-5 w-5 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div class="ml-3">
                            <label class="text-sm font-medium text-gray-900 dark:text-white">
                                I am available for new jobs
                        </label>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                Toggle this to control whether you receive new job assignments
                            </p>
                        </div>
                    </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                    <button type="button" onclick="toggleAvailability()" 
                            class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                            Cancel
                        </button>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        Update Status
                        </button>
                    </div>
                </form>
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

        // Availability modal functionality
        function toggleAvailability() {
            const modal = document.getElementById('availabilityModal');
            modal.classList.toggle('hidden');
            
            // Add smooth animation
            if (!modal.classList.contains('hidden')) {
                modal.style.opacity = '0';
                modal.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    modal.style.opacity = '1';
                    modal.style.transform = 'scale(1)';
                }, 10);
            }
        }

        // Close modal when clicking outside
        document.getElementById('availabilityModal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleAvailability();
            }
        });

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
            <!-- Dashboard (Active) -->
            <a href="{{ route('technician.dashboard') }}" class="flex flex-col items-center py-2 px-3 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                </svg>
                <span class="text-xs font-medium">Dashboard</span>
            </a>

            <!-- My Jobs -->
            <a href="{{ route('technician.bookings') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
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


