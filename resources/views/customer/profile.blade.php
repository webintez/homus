<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | HomeUs</title>
    <meta name="description" content="Manage your profile and account settings with HomeUs.">
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
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-primary { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { 
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px); 
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
        .dark .bg-white { background-color: #1f2937 !important; }
        .dark .bg-gray-50 { background-color: #111827 !important; }
        .dark .bg-gray-100 { background-color: #374151 !important; }
        .dark .text-gray-900 { color: #f9fafb !important; }
        .dark .text-gray-800 { color: #f3f4f6 !important; }
        .dark .text-gray-700 { color: #e5e7eb !important; }
        .dark .text-gray-600 { color: #d1d5db !important; }
        .dark .text-gray-500 { color: #9ca3af !important; }
        .dark .text-gray-400 { color: #6b7280 !important; }
        .dark .border-gray-200 { border-color: #374151 !important; }
        .dark .border-gray-300 { border-color: #4b5563 !important; }
        .dark .bg-gradient-to-r { background: linear-gradient(to right, #1f2937, #111827) !important; }
        .dark .bg-gradient-to-br { background: linear-gradient(to bottom right, #1f2937, #111827) !important; }
        .dark .from-indigo-50 { background-color: #1e1b4b !important; }
        .dark .to-purple-50 { background-color: #581c87 !important; }
        .dark .from-indigo-500 { background-color: #4338ca !important; }
        .dark .to-purple-500 { background-color: #7c3aed !important; }
        .dark .from-emerald-50 { background-color: #064e3b !important; }
        .dark .to-teal-50 { background-color: #134e4a !important; }
        .dark .from-emerald-500 { background-color: #10b981 !important; }
        .dark .to-teal-500 { background-color: #14b8a6 !important; }
        .dark .from-blue-50 { background-color: #1e3a8a !important; }
        .dark .to-cyan-50 { background-color: #155e75 !important; }
        .dark .from-blue-500 { background-color: #3b82f6 !important; }
        .dark .to-cyan-500 { background-color: #06b6d4 !important; }
        .dark .from-orange-50 { background-color: #9a3412 !important; }
        .dark .to-red-50 { background-color: #991b1b !important; }
        .dark .from-orange-500 { background-color: #f97316 !important; }
        .dark .to-red-500 { background-color: #ef4444 !important; }
        .dark .from-pink-50 { background-color: #831843 !important; }
        .dark .to-rose-50 { background-color: #9f1239 !important; }
        .dark .from-pink-500 { background-color: #ec4899 !important; }
        .dark .to-rose-500 { background-color: #f43f5e !important; }
        .dark .from-yellow-50 { background-color: #713f12 !important; }
        .dark .to-amber-50 { background-color: #78350f !important; }
        .dark .from-yellow-500 { background-color: #eab308 !important; }
        .dark .to-amber-500 { background-color: #f59e0b !important; }
        .dark .from-green-50 { background-color: #14532d !important; }
        .dark .to-emerald-50 { background-color: #064e3b !important; }
        .dark .from-green-500 { background-color: #22c55e !important; }
        .dark .to-emerald-500 { background-color: #10b981 !important; }
        .dark .from-violet-50 { background-color: #4c1d95 !important; }
        .dark .to-purple-50 { background-color: #581c87 !important; }
        .dark .from-violet-500 { background-color: #8b5cf6 !important; }
        .dark .to-purple-500 { background-color: #7c3aed !important; }
        .dark .from-slate-50 { background-color: #0f172a !important; }
        .dark .to-gray-50 { background-color: #111827 !important; }
        .dark .from-slate-500 { background-color: #64748b !important; }
        .dark .to-gray-500 { background-color: #6b7280 !important; }
    </style>
</head>
<body class="h-full bg-gray-50 dark:bg-black">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-900 shadow-lg border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-8 w-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">HomeUs</h1>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Dashboard</a>
                    <a href="{{ route('customer.services') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Services</a>
                    <a href="{{ route('customer.bookings') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Bookings</a>
                    <a href="{{ route('customer.profile') }}" class="text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Profile</a>
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                        <svg id="sun-icon" class="h-5 w-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moon-icon" class="h-5 w-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="relative">
                        <button onclick="toggleUserMenu()" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center">
                                <span class="text-white font-medium text-sm">{{ substr($customer->first_name, 0, 1) }}</span>
                            </div>
                        </button>
                        
                        <!-- User Dropdown -->
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                            <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Your Profile</a>
                            <a href="{{ route('customer.bookings') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Your Bookings</a>
                            <div class="border-t border-gray-200 dark:border-gray-700"></div>
                            <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Sign out
                        </button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-3xl shadow-2xl mb-12">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative px-6 py-12 md:px-12 md:py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                        My <span class="text-gradient-light">Profile</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                        Manage your personal information and account settings for the best service experience.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('customer.services') }}" class="bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-white/30 transition-all duration-300">
                            Browse Services
                        </a>
                        <a href="{{ route('customer.bookings') }}" class="bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-white/30 transition-all duration-300">
                            View Bookings
                        </a>
                    </div>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
        </div>

            <!-- Profile Overview -->
        <div class="mb-12">
            <div class="service-card rounded-3xl shadow-2xl p-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gradient mb-4">Profile Information</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-lg mb-6">
                        Keep your personal information up to date for better service experience.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="category-card bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Personal Details</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Name, email, and contact information</p>
                        </div>
                        <div class="category-card bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl p-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Address Info</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Location and service address</p>
                        </div>
                        <div class="category-card bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-2xl p-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Account Status</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Active and verified account</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Forms -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Personal Information Form -->
            <div class="service-card rounded-3xl shadow-2xl p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gradient mb-2">Personal Information</h3>
                    <p class="text-gray-600 dark:text-gray-300">Update your personal details</p>
            </div>

                <form method="POST" action="{{ route('customer.profile.update') }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $customer->first_name) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                                @error('first_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $customer->last_name) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                                @error('last_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                        <div class="pt-4">
                            <button type="submit" class="btn-primary w-full py-3 px-6 rounded-xl font-semibold text-white shadow-lg hover:shadow-xl transition-all duration-200">
                                Update Personal Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Address Information Form -->
            <div class="service-card rounded-3xl shadow-2xl p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gradient mb-2">Address Information</h3>
                    <p class="text-gray-600 dark:text-gray-300">Update your service address</p>
                </div>
                
                <form method="POST" action="{{ route('customer.profile.update') }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Street Address</label>
                            <textarea id="address" name="address" rows="3" 
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">{{ old('address', $customer->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City</label>
                                <input type="text" id="city" name="city" value="{{ old('city', $customer->city) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                                @error('city')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">State</label>
                                <input type="text" id="state" name="state" value="{{ old('state', $customer->state) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                                @error('state')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                            </div>
                                    </div>

                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $customer->postal_code) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                            @error('postal_code')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                        <div class="pt-4">
                            <button type="submit" class="btn-primary w-full py-3 px-6 rounded-xl font-semibold text-white shadow-lg hover:shadow-xl transition-all duration-200">
                                Update Address Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Password Change Form -->
        <div class="mt-8">
            <div class="service-card rounded-3xl shadow-2xl p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gradient mb-2">Change Password</h3>
                    <p class="text-gray-600 dark:text-gray-300">Update your account password</p>
                </div>
                
                <form method="POST" action="{{ route('customer.profile.update') }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Password</label>
                            <input type="password" id="current_password" name="current_password" 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                            @error('current_password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Password</label>
                                <input type="password" id="password" name="password" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                            </div>
                                    <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm New Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-white transition-all duration-200">
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="btn-primary w-full py-3 px-6 rounded-xl font-semibold text-white shadow-lg hover:shadow-xl transition-all duration-200">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

            <!-- Bookings -->
            <a href="{{ route('customer.bookings') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200">
                <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span class="text-xs font-medium">Bookings</span>
            </a>

            <!-- Profile (Active) -->
            <a href="{{ route('customer.profile') }}" class="flex flex-col items-center py-2 px-3 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg transition-all duration-200">
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

    <!-- Add padding to body for mobile to account for bottom navigation -->
    <style>
        @media (max-width: 768px) {
            body {
                padding-bottom: 80px;
            }
        }
        
        /* Ensure bottom navigation is hidden on desktop */
        @media (min-width: 769px) {
            .bottom-nav-mobile {
                display: none !important;
            }
        }
    </style>

    <script>
        // Dark mode toggle function
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

        // User menu toggle function
        function toggleUserMenu() {
            const userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        }

        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userButton = event.target.closest('button[onclick="toggleUserMenu()"]');
            
            if (!userButton && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });

        // Form validation and submission
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitButton = form.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Updating...';
                    }
                });
            });
        });
    </script>
</body>
</html>