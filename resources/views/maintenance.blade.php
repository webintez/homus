<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode - {{ $settings['website_title'] ?? 'Laravel Admin Panel' }}</title>
    
    <!-- Favicon -->
    @if($settings['website_favicon'])
        <link rel="icon" type="image/x-icon" href="{{ Storage::url($settings['website_favicon']) }}">
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom CSS from settings -->
    @if($settings['custom_css'])
        <style>{!! $settings['custom_css'] !!}</style>
    @endif
    
    <!-- Dynamic CSS based on settings -->
    <style>
        :root {
            --primary-color: {{ $settings['primary_color'] ?? '#3B82F6' }};
            --secondary-color: {{ $settings['secondary_color'] ?? '#6B7280' }};
            --background-color: {{ $settings['background_color'] ?? '#FFFFFF' }};
        }
        
        body {
            background-color: var(--background-color);
            font-family: '{{ $settings['primary_font'] ?? 'Inter' }}', sans-serif;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
        }
        
        .text-primary {
            color: var(--primary-color);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full space-y-8 p-8">
        <div class="text-center">
            <!-- Logo -->
            @if($settings['website_logo'])
                <img src="{{ Storage::url($settings['website_logo']) }}" alt="{{ $settings['website_title'] ?? 'Logo' }}" class="mx-auto h-16 w-auto mb-6">
            @endif
            
            <!-- Maintenance Icon -->
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-yellow-100 mb-6">
                <svg class="h-10 w-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            
            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">
                {{ $settings['website_title'] ?? 'Website' }} is Under Maintenance
            </h1>
            
            <!-- Description -->
            <p class="text-lg text-gray-600 mb-8">
                We're currently performing scheduled maintenance to improve your experience. 
                We'll be back online shortly.
            </p>
            
            <!-- Contact Info -->
            @if($settings['email'] || $settings['phone'])
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Need Help?</h3>
                    <div class="space-y-2">
                        @if($settings['email'])
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Email:</span> 
                                <a href="mailto:{{ $settings['email'] }}" class="text-primary hover:underline">{{ $settings['email'] }}</a>
                            </p>
                        @endif
                        @if($settings['phone'])
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Phone:</span> 
                                <a href="tel:{{ $settings['phone'] }}" class="text-primary hover:underline">{{ $settings['phone'] }}</a>
                            </p>
                        @endif
                    </div>
                </div>
            @endif
            
            <!-- Admin Login -->
            <div class="space-y-4">
                <a href="{{ route('admin.login') }}" class="btn-primary text-white px-6 py-3 rounded-md hover:opacity-90 transition-opacity inline-block">
                    Admin Login
                </a>
                
                <!-- Refresh Button -->
                <button onclick="location.reload()" class="ml-4 bg-gray-200 text-gray-800 px-6 py-3 rounded-md hover:bg-gray-300 transition-colors inline-block">
                    Refresh Page
                </button>
            </div>
            
            <!-- Status Info -->
            <div class="mt-8 text-sm text-gray-500">
                <p>Maintenance mode enabled at: {{ now()->format('M d, Y \a\t g:i A') }}</p>
                <p>Last updated: {{ $settings['updated_at'] ? \Carbon\Carbon::parse($settings['updated_at'])->format('M d, Y \a\t g:i A') : 'Unknown' }}</p>
            </div>
        </div>
    </div>

    <!-- Auto-refresh every 30 seconds -->
    <script>
        setTimeout(function() {
            location.reload();
        }, 30000);
    </script>

    <!-- Custom JS from settings -->
    @if($settings['custom_js'])
        <script>{!! $settings['custom_js'] !!}</script>
    @endif
</body>
</html>
