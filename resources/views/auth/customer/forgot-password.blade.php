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
    <title>Forgot Password - Home Appliance Repair Service</title>
    
    
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Forgot Password?</h2>
                <p class="mt-2 text-sm text-gray-600">
                    No worries! Enter your email address and we'll send you a reset link.
                </p>
            </div>

            <!-- Forgot Password Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('customer.forgot-password.post') }}">
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
                                   value="{{ old('email') }}" placeholder="Enter your registered email address">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        We'll send you a password reset link via email. Please check your inbox and spam folder.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white btn-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Send Reset Link
                        </button>
                    </div>
                </div>

                <!-- Back to Login -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Remember your password? 
                        <a href="{{ route('customer.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
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
