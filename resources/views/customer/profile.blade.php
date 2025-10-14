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
    <title>Profile - Customer Dashboard</title>
    
    
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
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <!-- Profile Overview -->
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Information</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your personal information and contact details.
                    </p>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('customer.profile.update') }}">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <!-- Success/Error Messages -->
                            @if (session('success'))
                                <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                                    <ul class="list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Profile Picture -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                                <div class="mt-1 flex items-center">
                                    <div class="h-20 w-20 rounded-full bg-gray-100 flex items-center justify-center">
                                        @if($customer->profile_picture)
                                            <img src="{{ Storage::url($customer->profile_picture) }}" alt="Profile" class="h-20 w-20 rounded-full object-cover">
                                        @else
                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <input type="file" name="profile_picture" accept="image/*" class="text-sm text-gray-500">
                                        <p class="text-xs text-gray-500">JPG, PNG up to 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $customer->first_name) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('first_name') border-red-500 @enderror">
                                    @error('first_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $customer->last_name) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('last_name') border-red-500 @enderror">
                                    @error('last_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('phone') border-red-500 @enderror">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div>
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Address Information</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Street Address</label>
                                        <textarea name="address" id="address" rows="3" 
                                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('address') border-red-500 @enderror">{{ old('address', $customer->address) }}</textarea>
                                        @error('address')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="city" id="city" value="{{ old('city', $customer->city) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('city') border-red-500 @enderror">
                                        @error('city')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                        <input type="text" name="state" id="state" value="{{ old('state', $customer->state) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('state') border-red-500 @enderror">
                                        @error('state')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $customer->postal_code) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('postal_code') border-red-500 @enderror">
                                        @error('postal_code')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Account Status -->
                            <div class="bg-gray-50 px-4 py-5 sm:px-6 rounded-lg">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Account Status</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Email Verification</p>
                                        <p class="text-sm text-gray-900">
                                            @if($customer->email_verified_at)
                                                <span class="text-green-600">✓ Verified</span>
                                            @else
                                                <span class="text-red-600">✗ Not Verified</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Phone Verification</p>
                                        <p class="text-sm text-gray-900">
                                            @if($customer->phone_verified_at)
                                                <span class="text-green-600">✓ Verified</span>
                                            @else
                                                <span class="text-red-600">✗ Not Verified</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="btn-primary text-white py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
