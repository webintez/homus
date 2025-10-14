@extends('admin.layouts.app')

@section('title', 'Customers')

@section('content')
<div class="space-y-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">Customers</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Manage customer accounts and information</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gray-800 dark:to-blue-900/20 p-8 rounded-2xl shadow-xl border border-blue-200 dark:border-blue-800">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="search" class="block text-sm font-semibold text-blue-700 dark:text-blue-300 mb-2">Search Customers</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" placeholder="Search by name, email, or phone..." 
                                   class="block w-full pl-10 pr-3 py-3 border border-blue-300 dark:border-blue-600 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm transition-all duration-200">
                        </div>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-semibold text-blue-700 dark:text-blue-300 mb-2">Status</label>
                        <select name="status" id="status" class="block w-full px-3 py-3 border border-blue-300 dark:border-blue-600 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm transition-all duration-200">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div>
                        <label for="sort" class="block text-sm font-semibold text-blue-700 dark:text-blue-300 mb-2">Sort By</label>
                        <select name="sort" id="sort" class="block w-full px-3 py-3 border border-blue-300 dark:border-blue-600 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm transition-all duration-200">
                            <option value="name">Name A-Z</option>
                            <option value="email">Email</option>
                            <option value="created_at">Registration Date</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers Table -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if($customers && count($customers) > 0)
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($customers as $customer)
                        <li class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/10 dark:hover:to-cyan-900/10 transition-all duration-200">
                            <div class="px-6 py-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 flex items-center justify-center shadow-lg">
                                            @if($customer->profile_picture)
                                                <img src="{{ Storage::url($customer->profile_picture) }}" alt="Profile" class="h-12 w-12 rounded-xl object-cover">
                                            @else
                                                <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $customer->first_name }} {{ $customer->last_name }}
                                            </p>
                                            <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                @if($customer->is_active) bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ $customer->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-blue-600 dark:text-blue-400 font-medium">{{ $customer->email }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $customer->phone }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-6">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <p class="font-medium">Joined {{ $customer->created_at->diffForHumans() }}</p>
                                        <p class="text-blue-600 dark:text-blue-400 font-semibold">{{ $customer->bookings_count ?? 0 }} bookings</p>
                                    </div>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.repair-service.customers.show', $customer) }}" 
                                           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 dark:text-blue-400 dark:hover:bg-blue-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                            View Details
                                        </a>
                                        <form method="POST" action="{{ route('admin.repair-service.customers.status', $customer) }}" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 transform hover:scale-105 {{ $customer->is_active ? 'text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30' : 'text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30' }}">
                                                {{ $customer->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/10 dark:to-cyan-900/10 border-t border-blue-200 dark:border-blue-800">
                    {{ $customers->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No customers found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No customers have registered yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
