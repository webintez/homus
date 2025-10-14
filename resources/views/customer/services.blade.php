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
    <title>Browse Services - Customer Dashboard</title>
    
    
    <style>
        
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
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
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Browse Services</h2>
            <p class="mt-2 text-gray-600">Choose from our professional appliance repair services</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search Services</label>
                        <input type="text" name="search" id="search" placeholder="Search by service name..." 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="sort" class="block text-sm font-medium text-gray-700">Sort By</label>
                        <select name="sort" id="sort" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="name">Name A-Z</option>
                            <option value="price_low">Price Low to High</option>
                            <option value="price_high">Price High to Low</option>
                            <option value="duration">Duration</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Categories -->
        <div class="mb-8">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Service Categories</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    <div class="bg-white p-4 rounded-lg shadow text-center card-hover cursor-pointer">
                        <div class="text-2xl mb-2">
                            @if($category->icon)
                                {!! $category->icon !!}
                            @else
                                <svg class="h-8 w-8 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            @endif
                        </div>
                        <h4 class="text-sm font-medium text-gray-900">{{ $category->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
                <div class="bg-white rounded-lg shadow card-hover">
                    <div class="p-6">
                        <!-- Service Image -->
                        <div class="aspect-w-16 aspect-h-9 mb-4">
                            @if($service->image)
                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-48 object-cover rounded-lg">
                            @else
                                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Service Info -->
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service->name }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($service->description, 100) }}</p>
                            
                            <!-- Category -->
                            <div class="flex items-center mb-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $service->category->name }}
                                </span>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Starting from</p>
                                    <p class="text-2xl font-bold text-gray-900">${{ number_format($service->base_price, 2) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Hourly Rate</p>
                                    <p class="text-lg font-semibold text-gray-900">${{ number_format($service->hourly_rate, 2) }}/hr</p>
                                </div>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Estimated Duration: {{ $service->estimated_duration }} hours
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex space-x-2">
                            <a href="{{ route('customer.services.show', $service) }}" 
                               class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-md text-sm font-medium text-center hover:bg-gray-200 transition-colors">
                                View Details
                            </a>
                            <a href="{{ route('customer.services.book', $service) }}" 
                               class="flex-1 btn-primary text-white py-2 px-4 rounded-md text-sm font-medium text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
            <div class="mt-8">
                {{ $services->links() }}
            </div>
        @endif

        <!-- Empty State -->
        @if($services->count() === 0)
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No services found</h3>
                <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter criteria.</p>
            </div>
        @endif
    </div>
</body>
</html>
