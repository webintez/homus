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
    <title>Profile - Technician Dashboard</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .btn-primary { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold text-gray-900">Technician Portal</h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('technician.dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('technician.bookings') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        My Jobs
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
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <!-- Profile Overview -->
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Information</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your personal information and professional details.
                    </p>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('technician.profile.update') }}" enctype="multipart/form-data">
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
                                        @if($technician->profile_picture)
                                            <img src="{{ Storage::url($technician->profile_picture) }}" alt="Profile" class="h-20 w-20 rounded-full object-cover">
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
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $technician->first_name) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('first_name') border-red-500 @enderror">
                                    @error('first_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $technician->last_name) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('last_name') border-red-500 @enderror">
                                    @error('last_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $technician->email) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $technician->phone) }}" 
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
                                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('address') border-red-500 @enderror">{{ old('address', $technician->address) }}</textarea>
                                        @error('address')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="city" id="city" value="{{ old('city', $technician->city) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('city') border-red-500 @enderror">
                                        @error('city')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                        <input type="text" name="state" id="state" value="{{ old('state', $technician->state) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('state') border-red-500 @enderror">
                                        @error('state')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $technician->postal_code) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('postal_code') border-red-500 @enderror">
                                        @error('postal_code')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Information -->
                            <div>
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Professional Information</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="skills" class="block text-sm font-medium text-gray-700">Skills & Specializations</label>
                                        <div class="mt-1">
                                            @php
                                                $selectedSkills = old('skills', is_array($technician->skills) ? $technician->skills : json_decode($technician->skills ?? '[]', true));
                                            @endphp
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                @foreach(['Air Conditioning', 'Refrigerator', 'Washing Machine', 'Dishwasher', 'Oven', 'Microwave', 'Dryer', 'Water Heater', 'Garbage Disposal', 'Other'] as $skill)
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="skills[]" value="{{ $skill }}" 
                                                               {{ in_array($skill, $selectedSkills) ? 'checked' : '' }}
                                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                        <span class="ml-2 text-sm text-gray-700">{{ $skill }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="service_areas" class="block text-sm font-medium text-gray-700">Service Areas</label>
                                        <div class="mt-1">
                                            @php
                                                $selectedAreas = old('service_areas', is_array($technician->service_areas) ? $technician->service_areas : json_decode($technician->service_areas ?? '[]', true));
                                            @endphp
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                @foreach(['Downtown', 'North Side', 'South Side', 'East Side', 'West Side', 'Suburbs', 'Rural Areas', 'All Areas'] as $area)
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="service_areas[]" value="{{ $area }}" 
                                                               {{ in_array($area, $selectedAreas) ? 'checked' : '' }}
                                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                        <span class="ml-2 text-sm text-gray-700">{{ $area }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Availability Settings -->
                            <div>
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Availability Settings</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="available_from" class="block text-sm font-medium text-gray-700">Available From</label>
                                        <input type="time" name="available_from" id="available_from" value="{{ old('available_from', $technician->available_from) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="available_to" class="block text-sm font-medium text-gray-700">Available To</label>
                                        <input type="time" name="available_to" id="available_to" value="{{ old('available_to', $technician->available_to) }}" 
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">Available Days</label>
                                        <div class="mt-1">
                                            @php
                                                $selectedDays = old('available_days', is_array($technician->available_days) ? $technician->available_days : json_decode($technician->available_days ?? '[]', true));
                                            @endphp
                                            <div class="grid grid-cols-7 gap-2">
                                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="available_days[]" value="{{ $day }}" 
                                                               {{ in_array($day, $selectedDays) ? 'checked' : '' }}
                                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                        <span class="ml-2 text-sm text-gray-700">{{ substr($day, 0, 3) }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Status -->
                            <div class="bg-gray-50 px-4 py-5 sm:px-6 rounded-lg">
                                <h4 class="text-lg font-medium text-gray-900 mb-4">Account Status</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Application Status</p>
                                        <p class="text-sm text-gray-900">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($technician->status === 'approved') bg-green-100 text-green-800
                                                @elseif($technician->status === 'pending') bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($technician->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Availability</p>
                                        <p class="text-sm text-gray-900">
                                            @if($technician->is_available)
                                                <span class="text-green-600">✓ Available</span>
                                            @else
                                                <span class="text-red-600">✗ Not Available</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Email Verification</p>
                                        <p class="text-sm text-gray-900">
                                            @if($technician->email_verified_at)
                                                <span class="text-green-600">✓ Verified</span>
                                            @else
                                                <span class="text-red-600">✗ Not Verified</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Phone Verification</p>
                                        <p class="text-sm text-gray-900">
                                            @if($technician->phone_verified_at)
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
