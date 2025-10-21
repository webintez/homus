@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service - {{ $service->name }} | HomeUs</title>
    <meta name="description" content="Book {{ $service->name }} service with HomeUs. Professional home services at your doorstep.">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Dark Mode Script -->
    <script>
        // Prevent FOUC (Flash of Unstyled Content)
        (function() {
            const theme = localStorage.getItem('theme') || 
                         (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
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
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
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
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .category-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .category-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .search-input {
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            transform: scale(1.02);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Dark mode overrides */
        .dark .service-card {
            background: #1f2937;
            border: 1px solid #374151;
        }
        
        .dark .category-card {
            background: #1f2937;
            border: 1px solid #374151;
        }
        
        .dark .glass {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid rgba(75, 85, 99, 0.3);
        }
        
        /* Mobile bottom navigation */
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
</head>
<body class="h-full">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-900 shadow-lg border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('customer.services') }}" class="flex items-center">
                            <div class="h-8 w-8 hero-bg rounded-lg flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xl font-bold text-gradient">HomeUs</span>
                        </a>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('customer.services') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Browse Services
                    </a>
                    <a href="{{ route('customer.bookings') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        My Bookings
                    </a>
                    <a href="{{ route('customer.profile') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Profile
                    </a>
                    <button onclick="toggleDarkMode()" class="p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">
                        <svg id="sun-icon" class="h-5 w-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moon-icon" class="h-5 w-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Book <span class="text-gradient-light">Service</span>
                </h1>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Complete your booking for {{ $service->name }} - {{ $service->category->name }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('customer.services.show', $service) }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 backdrop-blur-sm">
                        ← Back to Service Details
                    </a>
                    <a href="{{ route('customer.services') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 backdrop-blur-sm">
                        Browse All Services
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <div class="service-card p-6">
                    <form method="POST" action="{{ route('customer.services.book.store', $service) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Success/Error Messages -->
                        @if (session('success'))
                            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-600 dark:text-green-300 px-4 py-3 rounded mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 text-red-600 dark:text-red-300 px-4 py-3 rounded mb-6">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Appliance Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Appliance Information</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="appliance_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Appliance Type</label>
                                    <input type="text" name="appliance_type" id="appliance_type" value="{{ old('appliance_type') }}" 
                                           placeholder="e.g., Samsung Refrigerator, LG Washing Machine" required
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('appliance_type') border-red-500 @enderror">
                                    @error('appliance_type')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="issue_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issue Description</label>
                                    <textarea name="issue_description" id="issue_description" rows="4" required
                                              placeholder="Please describe the problem you're experiencing with your appliance..."
                                              class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('issue_description') border-red-500 @enderror">{{ old('issue_description') }}</textarea>
                                    @error('issue_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Issue Images -->
                                <div>
                                    <label for="issue_images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issue Images (Optional)</label>
                                    <input type="file" name="issue_images[]" id="issue_images" multiple accept="image/*" 
                                           class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300">
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload photos of the issue (JPG, PNG up to 2MB each)</p>
                                </div>

                                <!-- Issue Videos -->
                                <div>
                                    <label for="issue_videos" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issue Videos (Optional)</label>
                                    <input type="file" name="issue_videos[]" id="issue_videos" multiple accept="video/*" 
                                           class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300">
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload videos of the issue (MP4, AVI, MOV up to 10MB each)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Service Address -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Service Address</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="customer_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Street Address</label>
                                    <textarea name="customer_address" id="customer_address" rows="3" required
                                              placeholder="Enter the complete address where the service will be performed..."
                                              class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_address') border-red-500 @enderror">{{ old('customer_address', $customer->address) }}</textarea>
                                    @error('customer_address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="customer_city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                        <input type="text" name="customer_city" id="customer_city" value="{{ old('customer_city', $customer->city) }}" required
                                               class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_city') border-red-500 @enderror">
                                        @error('customer_city')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="customer_state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                                        <input type="text" name="customer_state" id="customer_state" value="{{ old('customer_state', $customer->state) }}" required
                                               class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_state') border-red-500 @enderror">
                                        @error('customer_state')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="customer_postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postal Code</label>
                                        <input type="text" name="customer_postal_code" id="customer_postal_code" value="{{ old('customer_postal_code', $customer->postal_code) }}" required
                                               class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_postal_code') border-red-500 @enderror">
                                        @error('customer_postal_code')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                                    <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $customer->phone) }}" required
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_phone') border-red-500 @enderror">
                                    @error('customer_phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_alternate_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alternate Phone (Optional)</label>
                                    <input type="tel" name="customer_alternate_phone" id="customer_alternate_phone" value="{{ old('customer_alternate_phone') }}"
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Preferred Schedule -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Preferred Schedule</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="preferred_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preferred Date</label>
                                    <input type="date" name="preferred_date" id="preferred_date" value="{{ old('preferred_date') }}" required
                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('preferred_date') border-red-500 @enderror">
                                    @error('preferred_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="preferred_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preferred Time</label>
                                    <select name="preferred_time" id="preferred_time" required
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('preferred_time') border-red-500 @enderror">
                                        <option value="">Select a time</option>
                                        <option value="09:00" {{ old('preferred_time') == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                                        <option value="10:00" {{ old('preferred_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                        <option value="11:00" {{ old('preferred_time') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                        <option value="12:00" {{ old('preferred_time') == '12:00' ? 'selected' : '' }}>12:00 PM</option>
                                        <option value="13:00" {{ old('preferred_time') == '13:00' ? 'selected' : '' }}>1:00 PM</option>
                                        <option value="14:00" {{ old('preferred_time') == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                                        <option value="15:00" {{ old('preferred_time') == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                                        <option value="16:00" {{ old('preferred_time') == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                                        <option value="17:00" {{ old('preferred_time') == '17:00' ? 'selected' : '' }}>5:00 PM</option>
                                    </select>
                                    @error('preferred_time')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Notes -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Additional Notes</h3>
                            <div>
                                <label for="customer_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Special Instructions (Optional)</label>
                                <textarea name="customer_notes" id="customer_notes" rows="3"
                                          placeholder="Any special instructions or additional information..."
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('customer_notes') }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="btn-primary text-white py-3 px-8 rounded-lg text-sm font-medium">
                                Submit Booking Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Service Summary -->
            <div class="lg:col-span-1">
                <div class="service-card p-6 sticky top-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Service Summary</h3>
                    
                    <!-- Service Info -->
                    <div class="mb-6">
                        <!-- Service Image -->
                        @if($service->image)
                        <div class="mb-4">
                            <img src="{{ Storage::url($service->image) }}" 
                                 alt="{{ $service->name }}" 
                                 class="w-full h-32 object-cover rounded-lg">
                        </div>
                        @endif
                        
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $service->name }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $service->category->name }}</p>
                    </div>

                    <!-- Pricing -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Base Price</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">₹{{ number_format($service->base_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Hourly Rate</span>
                            <span class="text-sm text-gray-900 dark:text-white">₹{{ number_format($service->hourly_rate, 2) }}/hr</span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">* Final price may vary based on complexity</p>
                    </div>

                    <!-- What's Included -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-3">What's Included</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Professional diagnosis
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Quality replacement parts
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Expert repair work
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                30-day warranty
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Need Help?</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Contact us if you have any questions about this service or booking process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation for Mobile -->
    <nav class="bottom-nav-mobile fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 md:hidden">
        <div class="flex justify-around py-2">
            <a href="{{ route('customer.dashboard') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
                <span class="text-xs mt-1">Dashboard</span>
            </a>
            <a href="{{ route('customer.services') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="text-xs mt-1">Services</span>
            </a>
            <a href="{{ route('customer.bookings') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span class="text-xs mt-1">Bookings</span>
            </a>
            <a href="{{ route('customer.profile') }}" class="flex flex-col items-center py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-xs mt-1">Profile</span>
            </a>
        </div>
    </nav>

    <!-- Dark Mode Toggle Script -->
    <script>
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>