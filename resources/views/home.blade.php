<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>{{ $settings['meta_title'] ?? $settings['website_title'] ?? 'Laravel Admin Panel' }}</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Professional Laravel Admin Panel with modern design and powerful features.' }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'laravel, admin, panel, cms, management' }}">
    <meta name="author" content="{{ $settings['meta_author'] ?? 'Laravel Admin Panel' }}">
    <meta name="robots" content="{{ $settings['meta_robots'] ?? 'index, follow' }}">
    
    <!-- Canonical URL -->
    @if($settings['canonical_url'])
        <link rel="canonical" href="{{ $settings['canonical_url'] }}">
    @endif
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $settings['og_title'] ?? $settings['meta_title'] ?? $settings['website_title'] ?? 'Laravel Admin Panel' }}">
    <meta property="og:description" content="{{ $settings['og_description'] ?? $settings['meta_description'] ?? 'Professional Laravel Admin Panel with modern design and powerful features.' }}">
    <meta property="og:type" content="{{ $settings['og_type'] ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($settings['og_site_name'])
        <meta property="og:site_name" content="{{ $settings['og_site_name'] }}">
    @endif
    @if($settings['og_image'])
        <meta property="og:image" content="{{ $settings['og_image'] }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="{{ $settings['twitter_card'] ?? 'summary_large_image' }}">
    @if($settings['twitter_site'])
        <meta name="twitter:site" content="{{ $settings['twitter_site'] }}">
    @endif
    @if($settings['twitter_creator'])
        <meta name="twitter:creator" content="{{ $settings['twitter_creator'] }}">
    @endif
    <meta name="twitter:title" content="{{ $settings['twitter_title'] ?? $settings['og_title'] ?? $settings['meta_title'] ?? $settings['website_title'] ?? 'Laravel Admin Panel' }}">
    <meta name="twitter:description" content="{{ $settings['twitter_description'] ?? $settings['og_description'] ?? $settings['meta_description'] ?? 'Professional Laravel Admin Panel with modern design and powerful features.' }}">
    @if($settings['twitter_image'])
        <meta name="twitter:image" content="{{ $settings['twitter_image'] }}">
    @endif
    
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
            --primary-dark: {{ $settings['primary_color'] ?? '#2563EB' }};
            --secondary-color: {{ $settings['secondary_color'] ?? '#6B7280' }};
            --background-color: {{ $settings['background_color'] ?? '#FFFFFF' }};
            --header-color: {{ $settings['header_color'] ?? '#F9FAFB' }};
            --footer-color: {{ $settings['footer_color'] ?? '#1F2937' }};
        }
        
        body {
            background-color: var(--background-color);
            font-family: '{{ $settings['primary_font'] ?? 'Inter' }}', sans-serif;
        }
        
        .header {
            background: linear-gradient(135deg, var(--header-color) 0%, rgba(255,255,255,0.95) 100%);
            backdrop-filter: blur(10px);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--footer-color) 0%, #111827 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #4B5563 100%);
        }
        
        .text-primary {
            color: var(--primary-color);
        }
        
        .text-secondary {
            color: var(--secondary-color);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, #8B5CF6 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        .animate-slide-up {
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
    
    <!-- Google Analytics -->
    @if($settings['google_analytics_id'])
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics_id'] }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $settings['google_analytics_id'] }}');
        </script>
    @endif
    
    <!-- Google Tag Manager -->
    @if($settings['google_tag_manager_id'])
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $settings['google_tag_manager_id'] }}');</script>
    @endif
    
    <!-- Facebook Pixel -->
    @if($settings['facebook_pixel_id'])
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $settings['facebook_pixel_id'] }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $settings['facebook_pixel_id'] }}&ev=PageView&noscript=1"
        /></noscript>
    @endif
    
    <!-- Structured Data (JSON-LD) -->
    @if($settings['structured_data'])
        <script type="application/ld+json">
            {!! $settings['structured_data'] !!}
        </script>
    @endif
    
    <!-- Custom Meta Tags -->
    @if($settings['custom_meta_tags'])
        {!! $settings['custom_meta_tags'] !!}
    @endif
</head>
<body class="min-h-screen flex flex-col bg-gray-50 dark:bg-gray-900">
    <!-- Google Tag Manager (noscript) -->
    @if($settings['google_tag_manager_id'])
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $settings['google_tag_manager_id'] }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    
    <!-- Header -->
    <header class="header shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    @if($settings['website_logo'])
                        <img src="{{ Storage::url($settings['website_logo']) }}" alt="{{ $settings['website_title'] ?? 'Logo' }}" class="h-12 w-auto floating">
                    @else
                        <div class="h-12 w-12 gradient-bg rounded-xl flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $settings['website_title'] ?? 'Laravel Admin Panel' }}
                        </h1>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Professional Admin Dashboard</p>
                    </div>
                </div>
                
                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    
                    <a href="/user-manual.html" target="_blank" class="text-gray-600 dark:text-gray-300 hover:text-primary transition-colors font-medium">
                        <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        User Manual
                    </a>
                    <a href="{{ route('admin.login') }}" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Admin Login
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Hero Section -->
        <section class="relative py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50"></div>
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
            
            <div class="relative max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                        Welcome to <span class="text-primary">{{ $settings['website_title'] ?? 'Our Platform' }}</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Experience the power of our advanced admin dashboard with real-time settings management, 
                        beautiful themes, and seamless user experience.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="{{ route('admin.login') }}" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-xl">
                            <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Get Started
                        </a>
                        <button onclick="scrollToFeatures()" class="bg-white text-gray-700 px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-200 hover:border-primary">
                            <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Learn More
                        </button>
                        <a href="/user-manual.html" target="_blank" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:from-green-600 hover:to-emerald-700">
                            <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            User Manual
                        </a>
                    </div>
                </div>
                
                <!-- Features Grid -->
                <div id="features" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-slide-up">
                    <!-- Feature 1: Settings Management -->
                    <div class="bg-white rounded-2xl p-8 shadow-xl card-hover border border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Settings Management</h3>
                        <p class="text-gray-600 mb-4">Comprehensive control over your website's appearance, functionality, and behavior with real-time updates.</p>
                        <div class="flex items-center text-sm text-primary font-semibold">
                            <span>30+ Settings Available</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Feature 2: Theme Customization -->
                    <div class="bg-white rounded-2xl p-8 shadow-xl card-hover border border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Theme Customization</h3>
                        <p class="text-gray-600 mb-4">Create stunning visual experiences with custom colors, fonts, and layouts that match your brand identity.</p>
                        <div class="flex items-center text-sm text-primary font-semibold">
                            <span>Unlimited Customization</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Feature 3: Email Integration -->
                    <div class="bg-white rounded-2xl p-8 shadow-xl card-hover border border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Email Integration</h3>
                        <p class="text-gray-600 mb-4">Seamless SMTP configuration with OTP authentication and comprehensive email management capabilities.</p>
                        <div class="flex items-center text-sm text-primary font-semibold">
                            <span>SMTP & OTP Ready</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Settings Display Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h3 class="text-4xl font-bold text-gray-900 mb-4">Current Configuration</h3>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Here's a live preview of your current site settings. All changes made in the admin panel are reflected here in real-time.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Basic Information Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 card-hover">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">Basic Information</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-blue-200">
                                <span class="font-semibold text-gray-700">Website Title</span>
                                <span class="text-primary font-medium">{{ $settings['website_title'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-blue-200">
                                <span class="font-semibold text-gray-700">Email</span>
                                <span class="text-primary font-medium">{{ $settings['email'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-blue-200">
                                <span class="font-semibold text-gray-700">Phone</span>
                                <span class="text-primary font-medium">{{ $settings['phone'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-semibold text-gray-700">Timezone</span>
                                <span class="text-primary font-medium">{{ $settings['timezone'] ?? 'Not set' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Theme Settings Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-100 rounded-2xl p-8 card-hover">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">Theme Settings</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-purple-200">
                                <span class="font-semibold text-gray-700">Primary Color</span>
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 rounded-full border-2 border-white shadow-lg" style="background-color: {{ $settings['primary_color'] ?? '#3B82F6' }}"></div>
                                    <span class="text-primary font-medium">{{ $settings['primary_color'] ?? '#3B82F6' }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-purple-200">
                                <span class="font-semibold text-gray-700">Secondary Color</span>
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 rounded-full border-2 border-white shadow-lg" style="background-color: {{ $settings['secondary_color'] ?? '#6B7280' }}"></div>
                                    <span class="text-primary font-medium">{{ $settings['secondary_color'] ?? '#6B7280' }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-purple-200">
                                <span class="font-semibold text-gray-700">Primary Font</span>
                                <span class="text-primary font-medium">{{ $settings['primary_font'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-semibold text-gray-700">Secondary Font</span>
                                <span class="text-primary font-medium">{{ $settings['secondary_font'] ?? 'Not set' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email Configuration Card -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 card-hover">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">Email Configuration</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-green-200">
                                <span class="font-semibold text-gray-700">SMTP Host</span>
                                <span class="text-primary font-medium">{{ $settings['smtp_host'] ?? 'Not configured' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-green-200">
                                <span class="font-semibold text-gray-700">SMTP Port</span>
                                <span class="text-primary font-medium">{{ $settings['smtp_port'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-green-200">
                                <span class="font-semibold text-gray-700">From Address</span>
                                <span class="text-primary font-medium">{{ $settings['smtp_from_address'] ?? 'Not set' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-semibold text-gray-700">Encryption</span>
                                <span class="text-primary font-medium">{{ $settings['smtp_encryption'] ?? 'Not set' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- System Status Card -->
                    <div class="bg-gradient-to-br from-orange-50 to-red-100 rounded-2xl p-8 card-hover">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">System Status</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-orange-200">
                                <span class="font-semibold text-gray-700">Maintenance Mode</span>
                                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $settings['maintenance_mode'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $settings['maintenance_mode'] ? 'Enabled' : 'Disabled' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-orange-200">
                                <span class="font-semibold text-gray-700">Last Updated</span>
                                <span class="text-primary font-medium">{{ $settings['updated_at'] ? \Carbon\Carbon::parse($settings['updated_at'])->format('M d, Y') : 'Never' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-semibold text-gray-700">Settings Count</span>
                                <span class="text-primary font-medium">30+ Available</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Address Section -->
                @if($settings['address'])
                    <div class="mt-12 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-8">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <h4 class="text-xl font-bold text-gray-900">Address</h4>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $settings['address'] }}</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Social Media Links -->
        @if($settings['facebook'] || $settings['twitter'] || $settings['instagram'] || $settings['linkedin'] || $settings['youtube'] || $settings['pinterest'])
            <section class="py-12 bg-gray-50 dark:bg-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Follow Us</h3>
                    <div class="flex justify-center space-x-6">
                        @if($settings['facebook'])
                            <a href="{{ $settings['facebook'] }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        @endif
                        @if($settings['twitter'])
                            <a href="{{ $settings['twitter'] }}" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                        @endif
                        @if($settings['instagram'])
                            <a href="{{ $settings['instagram'] }}" target="_blank" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.014 5.367 18.647.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244c-.875.807-2.026 1.297-3.323 1.297zm7.718-1.297c-.875.807-2.026 1.297-3.323 1.297s-2.448-.49-3.323-1.297c-.928-.875-1.418-2.026-1.418-3.323s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244z"/>
                                </svg>
                            </a>
                        @endif
                        @if($settings['linkedin'])
                            <a href="{{ $settings['linkedin'] }}" target="_blank" class="text-gray-400 hover:text-blue-700 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        @endif
                        @if($settings['youtube'])
                            <a href="{{ $settings['youtube'] }}" target="_blank" class="text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        @endif
                        @if($settings['pinterest'])
                            <a href="{{ $settings['pinterest'] }}" target="_blank" class="text-gray-400 hover:text-red-500 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="footer text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('admin.login') }}" class="text-gray-300 hover:text-white transition-colors">Admin Login</a></li>
                        <li><a href="/user-manual.html" target="_blank" class="text-gray-300 hover:text-white transition-colors">User Manual</a></li>
                        <li><a href="#features" onclick="scrollToFeatures()" class="text-gray-300 hover:text-white transition-colors">Features</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="/user-manual.html#troubleshooting" target="_blank" class="text-gray-300 hover:text-white transition-colors">Troubleshooting</a></li>
                        <li><a href="/user-manual.html#support" target="_blank" class="text-gray-300 hover:text-white transition-colors">Contact Support</a></li>
                        <li><a href="/user-manual.html#api-documentation" target="_blank" class="text-gray-300 hover:text-white transition-colors">API Documentation</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
                    <div class="space-y-2">
                        @if($settings['email'])
                            <p class="text-gray-300">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <a href="mailto:{{ $settings['email'] }}" class="hover:underline">{{ $settings['email'] }}</a>
                            </p>
                        @endif
                        @if($settings['phone'])
                            <p class="text-gray-300">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ $settings['phone'] }}
                            </p>
                        @endif
                        @if($settings['address'])
                            <p class="text-gray-300">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $settings['address'] }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-600 pt-6 text-center">
                <p>&copy; {{ date('Y') }} {{ $settings['website_title'] ?? 'Home Appliance Repair Service Platform' }}. All rights reserved.</p>
                <p class="mt-2 text-sm text-gray-400">
                    Need help? Check out our <a href="/user-manual.html" target="_blank" class="text-green-400 hover:text-green-300 underline">comprehensive user manual</a> for detailed instructions.
                </p>
            </div>
        </div>
    </footer>

    <!-- Custom JS from settings -->
    @if($settings['custom_js'])
        <script>{!! $settings['custom_js'] !!}</script>
    @endif

    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        }

        // Initialize dark mode from localStorage
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }

        // Smooth scroll to features section
        function scrollToFeatures() {
            document.getElementById('features').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Add scroll animations
        window.addEventListener('scroll', function() {
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                
                if (isVisible) {
                    card.classList.add('animate-slide-up');
                }
            });
        });

        // Add loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('animate-fade-in');
        });
    </script>
</body>
</html>
