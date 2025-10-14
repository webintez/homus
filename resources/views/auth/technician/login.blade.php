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
    <title>Technician Login - Home Appliance Repair Service</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 gradient-bg rounded-full flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Technician Portal</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Sign in to your technician account
                </p>
            </div>

            <!-- Login Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('technician.login.post') }}">
                @csrf
                <div class="bg-white py-8 px-6 shadow-lg rounded-lg">
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Success Messages -->
                    @if (session('success'))
                        <div class="mb-4 bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input id="email" name="email" type="email" required 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                   value="{{ old('email') }}" placeholder="Enter your email">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" name="password" type="password" required 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                                   placeholder="Enter your password">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" 
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="{{ route('technician.forgot-password') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white btn-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Sign In
                        </button>
                    </div>
                </div>

                <!-- Registration Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('technician.register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Apply as technician
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
