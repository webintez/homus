<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Services - Professional Appliance Repair</title>
    
    <style>
        .hero-gradient { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); 
        }
        .card-gradient { 
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); 
        }
        .btn-primary { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            transition: all 0.3s ease;
        }
        .btn-primary:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4); 
        }
        .card-hover { 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .card-hover:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 25px 50px rgba(0,0,0,0.15); 
        }
        .category-card {
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        }
        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: linear-gradient(145deg, #667eea 0%, #764ba2 100%);
        }
        .category-card:hover .category-icon {
            color: white;
        }
        .category-card:hover .category-name {
            color: white;
        }
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .filter-select:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .service-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .price-tag {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        .category-badge {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .duration-badge {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }
        .pagination-btn {
            transition: all 0.3s ease;
        }
        .pagination-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .pagination-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-xl border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 hero-gradient rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">RepairPro</h1>
                        <p class="text-sm text-gray-500">Professional Appliance Repair</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-indigo-600 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('customer.bookings') }}" class="text-gray-600 hover:text-indigo-600 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        My Bookings
                    </a>
                    <a href="{{ route('customer.profile') }}" class="text-gray-600 hover:text-indigo-600 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                        <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-600 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-red-50">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-gradient py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold text-white mb-6">Find Your Perfect Repair Service</h1>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">Professional appliance repair services with certified technicians. Fast, reliable, and affordable solutions for all your home appliances.</p>
            
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto">
                <form method="GET" action="{{ route('services') }}" class="relative">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search for repair services..." 
                               class="w-full px-6 py-4 pr-16 text-lg rounded-2xl shadow-2xl border-0 focus:ring-4 focus:ring-white/20 search-input">
                        <button type="submit" 
                                class="absolute right-2 top-2 bottom-2 px-6 bg-white text-indigo-600 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Filters and Sort -->
        <div class="mb-12">
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Category Filter -->
                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Filter by Category
                        </label>
                        <form method="GET" action="{{ route('services') }}" id="categoryForm">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                            <select name="category" id="category" onchange="document.getElementById('categoryForm').submit()" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 filter-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label for="sort" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                            </svg>
                            Sort By
                        </label>
                        <form method="GET" action="{{ route('services') }}" id="sortForm">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <select name="sort" id="sort" onchange="document.getElementById('sortForm').submit()" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 filter-select">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="duration" {{ request('sort') == 'duration' ? 'selected' : '' }}>Duration: Shortest First</option>
                            </select>
                        </form>
                    </div>

                    <!-- Clear Filters -->
                    <div class="flex items-end">
                        <a href="{{ route('services') }}" 
                           class="w-full px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold text-center hover:bg-gray-200 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Clear Filters
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Categories -->
        <div class="mb-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Browse by Category</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach($categories as $category)
                    <div class="category-card p-6 rounded-2xl shadow-lg text-center cursor-pointer border border-gray-100" 
                         onclick="filterByCategory('{{ $category->id }}')">
                        <div class="text-4xl mb-4 category-icon text-indigo-600">
                            @if($category->icon)
                                {!! $category->icon !!}
                            @else
                                <svg class="h-10 w-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            @endif
                        </div>
                        <h4 class="text-sm font-semibold category-name text-gray-900">{{ $category->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Results Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Available Services</h2>
                <p class="text-gray-600 mt-2">Showing {{ $services->count() }} of {{ $services->total() }} services</p>
            </div>
            <div class="text-sm text-gray-500">
                @if(request('search'))
                    Search results for "{{ request('search') }}"
                @elseif(request('category'))
                    @php $selectedCategory = $categories->firstWhere('id', request('category')) @endphp
                    @if($selectedCategory)
                        Services in "{{ $selectedCategory->name }}" category
                    @endif
                @endif
            </div>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="service-card rounded-2xl shadow-xl overflow-hidden card-hover group">
                    <!-- Service Image -->
                    <div class="relative h-48 overflow-hidden">
                        @if($service->image)
                            <img src="{{ Storage::url($service->image) }}" 
                                 alt="{{ $service->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                                <svg class="h-16 w-16 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="category-badge text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $service->category->name }}
                            </span>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                            {{ $service->name }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($service->description, 120) }}</p>

                        <!-- Pricing Section -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <p class="text-sm text-gray-500">Starting from</p>
                                    <p class="text-3xl font-bold text-gray-900">${{ number_format($service->base_price, 2) }}</p>
                                </div>
                                @if($service->hourly_rate)
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Hourly Rate</p>
                                    <p class="text-lg font-semibold text-gray-900">${{ number_format($service->hourly_rate, 2) }}/hr</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Duration -->
                        @if($service->estimated_duration)
                        <div class="mb-6">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="h-4 w-4 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="duration-badge text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $service->estimated_duration }} hours estimated
                                </span>
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex space-x-3">
                            <a href="{{ route('customer.services.show', $service) }}" 
                               class="flex-1 bg-gray-100 text-gray-700 py-3 px-4 rounded-xl text-sm font-semibold text-center hover:bg-gray-200 transition-all duration-200 group">
                                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Details
                            </a>
                            <a href="{{ route('customer.services.book', $service) }}" 
                               class="flex-1 btn-primary text-white py-3 px-4 rounded-xl text-sm font-semibold text-center">
                                <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    @if ($services->onFirstPage())
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $services->previousPageUrl() }}" 
                           class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 pagination-btn">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                        @if ($page == $services->currentPage())
                            <span class="px-4 py-2 text-white pagination-btn active rounded-xl">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 pagination-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($services->hasMorePages())
                        <a href="{{ $services->nextPageUrl() }}" 
                           class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 pagination-btn">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @else
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <!-- Empty State -->
        @if($services->count() === 0)
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-24 w-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">No services found</h3>
                    <p class="text-gray-600 mb-8">We couldn't find any services matching your criteria. Try adjusting your search or filter options.</p>
                    <a href="{{ route('services') }}" 
                       class="btn-primary text-white px-8 py-3 rounded-xl font-semibold inline-flex items-center">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        View All Services
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script>
        function filterByCategory(categoryId) {
            const form = document.getElementById('categoryForm');
            form.querySelector('select[name="category"]').value = categoryId;
            form.submit();
        }
    </script>
</body>
</html>