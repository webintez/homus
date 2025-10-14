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
    <title>Technician Registration - Home Appliance Repair Service</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 gradient-bg rounded-full flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Join as Technician</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Register to provide professional repair services
                </p>
            </div>

            <!-- Registration Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('technician.register.post') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white py-8 px-6 shadow-lg rounded-lg">
                    <!-- Personal Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input id="first_name" name="first_name" type="text" required 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('first_name') border-red-500 @enderror"
                                           value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input id="last_name" name="last_name" type="text" required 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('last_name') border-red-500 @enderror"
                                           value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input id="email" name="email" type="email" required 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input id="phone" name="phone" type="tel" required 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input id="password" name="password" type="password" required 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Address Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Street Address</label>
                                <textarea id="address" name="address" rows="2" 
                                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input id="city" name="city" type="text" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('city') border-red-500 @enderror"
                                           value="{{ old('city') }}">
                                    @error('city')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                    <input id="state" name="state" type="text" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('state') border-red-500 @enderror"
                                           value="{{ old('state') }}">
                                    @error('state')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <input id="postal_code" name="postal_code" type="text" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('postal_code') border-red-500 @enderror"
                                           value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Professional Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="skills" class="block text-sm font-medium text-gray-700">Skills & Specializations</label>
                                <div class="mt-2 space-y-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Air Conditioning" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Air Conditioning</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Refrigerator" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Refrigerator</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Washing Machine" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Washing Machine</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Dishwasher" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Dishwasher</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Microwave" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Microwave</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="skills[]" value="Oven" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Oven</span>
                                        </label>
                                    </div>
                                </div>
                                @error('skills')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="service_areas" class="block text-sm font-medium text-gray-700">Service Areas</label>
                                <div class="mt-2 space-y-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="Downtown" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Downtown</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="North Side" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">North Side</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="South Side" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">South Side</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="East Side" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">East Side</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="West Side" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">West Side</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="service_areas[]" value="Suburbs" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-sm text-gray-700">Suburbs</span>
                                        </label>
                                    </div>
                                </div>
                                @error('service_areas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Document Upload -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Required Documents</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="id_proof" class="block text-sm font-medium text-gray-700">ID Proof (PDF, JPG, PNG - Max 2MB)</label>
                                <input id="id_proof" name="id_proof" type="file" accept=".pdf,.jpg,.jpeg,.png" required 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('id_proof') border-red-500 @enderror">
                                @error('id_proof')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="certificate" class="block text-sm font-medium text-gray-700">Professional Certificate (PDF, JPG, PNG - Max 2MB)</label>
                                <input id="certificate" name="certificate" type="file" accept=".pdf,.jpg,.jpeg,.png" required 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('certificate') border-red-500 @enderror">
                                @error('certificate')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required 
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-700">
                                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms of Service</a>, 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>, and 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-500">Technician Agreement</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white btn-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Submit Application
                        </button>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('technician.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Sign in here
                        </a>
                    </p>
                </div>

                <!-- Back to Home -->
                <div class="text-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-700">
                        ← Back to Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
