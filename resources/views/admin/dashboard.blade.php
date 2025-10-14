@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Page header -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent sm:truncate sm:text-4xl sm:tracking-tight">
                Dashboard
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Overview of your repair service platform</p>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <button type="button" class="inline-flex items-center rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-indigo-500 hover:to-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:scale-105">
                <svg class="-ml-0.5 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Quick Action
            </button>
        </div>
    </div>

    <!-- Main Stats -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Customers -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 overflow-hidden shadow-xl rounded-2xl border border-blue-200 dark:border-blue-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-blue-600 dark:text-blue-400 truncate">Total Customers</dt>
                            <dd class="text-2xl font-bold text-blue-900 dark:text-blue-100">{{ $stats['total_customers'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Technicians -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 overflow-hidden shadow-xl rounded-2xl border border-green-200 dark:border-green-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-green-600 dark:text-green-400 truncate">Total Technicians</dt>
                            <dd class="text-2xl font-bold text-green-900 dark:text-green-100">{{ $stats['total_technicians'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Bookings -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 overflow-hidden shadow-xl rounded-2xl border border-purple-200 dark:border-purple-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-purple-600 dark:text-purple-400 truncate">Total Bookings</dt>
                            <dd class="text-2xl font-bold text-purple-900 dark:text-purple-100">{{ $stats['total_bookings'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 overflow-hidden shadow-xl rounded-2xl border border-yellow-200 dark:border-yellow-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-yellow-600 dark:text-yellow-400 truncate">Total Revenue</dt>
                            <dd class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">${{ number_format($stats['total_revenue'], 2) }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Stats -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Pending Bookings -->
        <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 overflow-hidden shadow-xl rounded-2xl border border-orange-200 dark:border-orange-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-orange-600 dark:text-orange-400 truncate">Pending Bookings</dt>
                            <dd class="text-2xl font-bold text-orange-900 dark:text-orange-100">{{ $stats['pending_bookings'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Bookings -->
        <div class="bg-gradient-to-br from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20 overflow-hidden shadow-xl rounded-2xl border border-emerald-200 dark:border-emerald-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-green-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-emerald-600 dark:text-emerald-400 truncate">Completed Bookings</dt>
                            <dd class="text-2xl font-bold text-emerald-900 dark:text-emerald-100">{{ $stats['completed_bookings'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Technicians -->
        <div class="bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-amber-900/20 dark:to-yellow-900/20 overflow-hidden shadow-xl rounded-2xl border border-amber-200 dark:border-amber-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-amber-600 dark:text-amber-400 truncate">Pending Technicians</dt>
                            <dd class="text-2xl font-bold text-amber-900 dark:text-amber-100">{{ $stats['pending_technicians'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Website Status -->
        <div class="bg-gradient-to-br from-slate-50 to-gray-50 dark:from-slate-900/20 dark:to-gray-900/20 overflow-hidden shadow-xl rounded-2xl border border-slate-200 dark:border-slate-800 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r {{ \App\Models\Setting::get('maintenance_mode', false) ? 'from-red-500 to-rose-500' : 'from-green-500 to-emerald-500' }} rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-slate-600 dark:text-slate-400 truncate">Website Status</dt>
                            <dd class="text-2xl font-bold {{ \App\Models\Setting::get('maintenance_mode', false) ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                                {{ \App\Models\Setting::get('maintenance_mode', false) ? 'Maintenance Mode' : 'Online' }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity and Data -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Bookings -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-6 sm:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Recent Bookings</h3>
                    <a href="{{ route('admin.repair-service.bookings') }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium text-purple-600 bg-purple-50 hover:bg-purple-100 dark:bg-purple-900/20 dark:text-purple-400 dark:hover:bg-purple-900/30 transition-colors duration-200">
                        View all
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="mt-5">
                    @if($recentBookings->count() > 0)
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @foreach($recentBookings->take(5) as $booking)
                                    <li>
                                        <div class="relative pb-6">
                                            <div class="relative flex space-x-4">
                                                <div>
                                                    <div class="h-10 w-10 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center shadow-lg">
                                                        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                    <div>
                                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                                            <span class="font-semibold text-gray-900 dark:text-white">{{ $booking->customer->name ?? 'Unknown' }}</span>
                                                            booked <span class="font-medium text-purple-600 dark:text-purple-400">{{ $booking->service->name ?? 'Service' }}</span>
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                            Status: <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $booking->status === 'pending' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-300' : ($booking->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300' : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300') }}">{{ ucfirst($booking->status) }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                                        <time class="text-xs">{{ $booking->created_at->diffForHumans() }}</time>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">No recent bookings</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Technicians -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-6 sm:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Recent Technicians</h3>
                    <a href="{{ route('admin.repair-service.technicians') }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30 transition-colors duration-200">
                        View all
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="mt-5">
                    @if($recentTechnicians->count() > 0)
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @foreach($recentTechnicians->take(5) as $technician)
                                    <li>
                                        <div class="relative pb-6">
                                            <div class="relative flex space-x-4">
                                                <div>
                                                    <div class="h-10 w-10 rounded-xl bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center shadow-lg">
                                                        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                    <div>
                                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                                            <span class="font-semibold text-gray-900 dark:text-white">{{ $technician->name }}</span>
                                                            joined the platform
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                            Status: <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $technician->status === 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300' : ($technician->status === 'pending' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-300' : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300') }}">{{ ucfirst($technician->status) }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                                        <time class="text-xs">{{ $technician->created_at->diffForHumans() }}</time>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">No recent technicians</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-6 sm:p-8">
            <h3 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-6">Quick Actions</h3>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ route('admin.repair-service.customers') }}" class="group inline-flex items-center px-6 py-4 border border-blue-200 dark:border-blue-800 shadow-lg text-sm font-semibold rounded-xl text-blue-700 dark:text-blue-300 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 hover:from-blue-100 hover:to-cyan-100 dark:hover:from-blue-900/30 dark:hover:to-cyan-900/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    Manage Customers
                </a>

                <a href="{{ route('admin.repair-service.technicians') }}" class="group inline-flex items-center px-6 py-4 border border-green-200 dark:border-green-800 shadow-lg text-sm font-semibold rounded-xl text-green-700 dark:text-green-300 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 hover:from-green-100 hover:to-emerald-100 dark:hover:from-green-900/30 dark:hover:to-emerald-900/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    Manage Technicians
                </a>

                <a href="{{ route('admin.repair-service.bookings') }}" class="group inline-flex items-center px-6 py-4 border border-purple-200 dark:border-purple-800 shadow-lg text-sm font-semibold rounded-xl text-purple-700 dark:text-purple-300 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 hover:from-purple-100 hover:to-pink-100 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 transform hover:scale-105">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    Manage Bookings
                </a>

                <a href="{{ route('admin.settings') }}" class="group inline-flex items-center px-6 py-4 border border-slate-200 dark:border-slate-800 shadow-lg text-sm font-semibold rounded-xl text-slate-700 dark:text-slate-300 bg-gradient-to-r from-slate-50 to-gray-50 dark:from-slate-900/20 dark:to-gray-900/20 hover:from-slate-100 hover:to-gray-100 dark:hover:from-slate-900/30 dark:hover:to-gray-900/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-200 transform hover:scale-105">
                    <div class="w-8 h-8 bg-gradient-to-r from-slate-500 to-gray-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    Settings
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-6 sm:p-8">
            <h3 class="text-xl font-bold bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent mb-6">Recent Activity</h3>
            <div class="mt-5">
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-6">
                                <div class="relative flex space-x-4">
                                    <div>
                                        <div class="h-10 w-10 rounded-xl bg-gradient-to-r from-violet-500 to-purple-500 flex items-center justify-center shadow-lg">
                                            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">Admin panel initialized</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">System is ready for use</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                            <time class="text-xs">{{ now()->format('M j, Y') }}</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function toggleMaintenance() {
        try {
            const response = await fetch('{{ route("admin.settings.maintenance") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const data = await response.json();
            
            if (data.success) {
                // Reload the page to update the status
                location.reload();
            } else {
                alert('Failed to toggle maintenance mode');
            }
        } catch (error) {
            alert('An error occurred');
        }
    }

    // Clear Cache functions
    async function clearAllCaches() {
        if (!confirm('Are you sure you want to clear all caches? This will refresh all settings and may temporarily slow down the site.')) {
            return;
        }

        try {
            const response = await fetch('{{ route("admin.settings.clear-cache") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const data = await response.json();
            
            if (data.success) {
                alert('✅ ' + data.message);
                // Reload the page to reflect any changes
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                alert('❌ ' + data.message);
            }
        } catch (error) {
            alert('❌ An error occurred while clearing caches. Please try again.');
        }
    }
</script>
@endsection
