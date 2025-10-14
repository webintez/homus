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
    <title>Book Service - {{ $service->name }}</title>
    
    
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
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('customer.services.show', $service) }}" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                        ← Back to Service Details
                    </a>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Book Service</h2>
                    <p class="mt-2 text-gray-600">{{ $service->name }} - {{ $service->category->name }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <form method="POST" action="{{ route('customer.services.book.store', $service) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <!-- Success/Error Messages -->
                            @if (session('success'))
                                <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded mb-6">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded mb-6">
                                    <ul class="list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Appliance Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Appliance Information</h3>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="appliance_type" class="block text-sm font-medium text-gray-700">Appliance Type</label>
                                        <input type="text" name="appliance_type" id="appliance_type" value="{{ old('appliance_type') }}" 
                                               placeholder="e.g., Samsung Refrigerator, LG Washing Machine" required
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('appliance_type') border-red-500 @enderror">
                                        @error('appliance_type')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="issue_description" class="block text-sm font-medium text-gray-700">Issue Description</label>
                                        <textarea name="issue_description" id="issue_description" rows="4" required
                                                  placeholder="Please describe the problem you're experiencing with your appliance..."
                                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('issue_description') border-red-500 @enderror">{{ old('issue_description') }}</textarea>
                                        @error('issue_description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Issue Images -->
                                    <div>
                                        <label for="issue_images" class="block text-sm font-medium text-gray-700">Issue Images (Optional)</label>
                                        <input type="file" name="issue_images[]" id="issue_images" multiple accept="image/*" 
                                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        <p class="mt-1 text-xs text-gray-500">Upload photos of the issue (JPG, PNG up to 2MB each)</p>
                                    </div>

                                    <!-- Issue Videos -->
                                    <div>
                                        <label for="issue_videos" class="block text-sm font-medium text-gray-700">Issue Videos (Optional)</label>
                                        <input type="file" name="issue_videos[]" id="issue_videos" multiple accept="video/*" 
                                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        <p class="mt-1 text-xs text-gray-500">Upload videos of the issue (MP4, AVI, MOV up to 10MB each)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Service Address -->
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Service Address</h3>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="customer_address" class="block text-sm font-medium text-gray-700">Street Address</label>
                                        <textarea name="customer_address" id="customer_address" rows="3" required
                                                  placeholder="Enter the complete address where the service will be performed..."
                                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_address') border-red-500 @enderror">{{ old('customer_address', $customer->address) }}</textarea>
                                        @error('customer_address')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label for="customer_city" class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="customer_city" id="customer_city" value="{{ old('customer_city', $customer->city) }}" required
                                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_city') border-red-500 @enderror">
                                            @error('customer_city')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="customer_state" class="block text-sm font-medium text-gray-700">State</label>
                                            <input type="text" name="customer_state" id="customer_state" value="{{ old('customer_state', $customer->state) }}" required
                                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_state') border-red-500 @enderror">
                                            @error('customer_state')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="customer_postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                            <input type="text" name="customer_postal_code" id="customer_postal_code" value="{{ old('customer_postal_code', $customer->postal_code) }}" required
                                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_postal_code') border-red-500 @enderror">
                                            @error('customer_postal_code')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="customer_phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                        <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $customer->phone) }}" required
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_phone') border-red-500 @enderror">
                                        @error('customer_phone')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="customer_alternate_phone" class="block text-sm font-medium text-gray-700">Alternate Phone (Optional)</label>
                                        <input type="tel" name="customer_alternate_phone" id="customer_alternate_phone" value="{{ old('customer_alternate_phone') }}"
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Preferred Schedule -->
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Preferred Schedule</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="preferred_date" class="block text-sm font-medium text-gray-700">Preferred Date</label>
                                        <input type="date" name="preferred_date" id="preferred_date" value="{{ old('preferred_date') }}" required
                                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('preferred_date') border-red-500 @enderror">
                                        @error('preferred_date')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="preferred_time" class="block text-sm font-medium text-gray-700">Preferred Time</label>
                                        <select name="preferred_time" id="preferred_time" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('preferred_time') border-red-500 @enderror">
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
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Notes</h3>
                                <div>
                                    <label for="customer_notes" class="block text-sm font-medium text-gray-700">Special Instructions (Optional)</label>
                                    <textarea name="customer_notes" id="customer_notes" rows="3"
                                              placeholder="Any special instructions or additional information..."
                                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('customer_notes') }}</textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="btn-primary text-white py-3 px-6 rounded-md text-sm font-medium">
                                    Submit Booking Request
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Service Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white shadow rounded-lg sticky top-6">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Service Summary</h3>
                        
                        <!-- Service Info -->
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-900">{{ $service->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $service->category->name }}</p>
                        </div>

                        <!-- Pricing -->
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-500">Base Price</span>
                                <span class="text-lg font-semibold text-gray-900">${{ number_format($service->base_price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Hourly Rate</span>
                                <span class="text-sm text-gray-900">${{ number_format($service->hourly_rate, 2) }}/hr</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">* Final price may vary based on complexity</p>
                        </div>

                        <!-- What's Included -->
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-900 mb-3">What's Included</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
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
                        <div class="border-t pt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Need Help?</h4>
                            <p class="text-xs text-gray-500">Contact us if you have any questions about this service or booking process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
