<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom CSS from settings -->
    @if(\App\Models\Setting::get('custom_css'))
        <style>{!! \App\Models\Setting::get('custom_css') !!}</style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl border-r border-gray-200 dark:border-gray-700 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0" id="sidebar">
            <div class="flex items-center justify-center h-20 px-6 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm8 0a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V8zm0 4a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1v-2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                </div>
            </div>
            
            <nav class="mt-8 px-4 space-y-2">
                <!-- Section Headers -->
                <div class="px-3 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Main
                    </h3>
                </div>
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700 dark:from-indigo-900/20 dark:to-purple-900/20 dark:text-indigo-300 shadow-sm border border-indigo-200 dark:border-indigo-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-100 text-indigo-600 dark:bg-indigo-800 dark:text-indigo-300' : 'bg-gray-100 text-gray-500 group-hover:bg-indigo-100 group-hover:text-indigo-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-indigo-800 dark:group-hover:text-indigo-300' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z" />
                        </svg>
                    </div>
                    Dashboard
                </a>

                <!-- Repair Service Management -->
                <div class="space-y-2 mt-6">
                    <div class="px-3 py-2">
                        <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Repair Service
                        </h3>
                    </div>
                    
                    <!-- Customers -->
                    <a href="{{ route('admin.repair-service.customers') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.customers*') ? 'bg-gradient-to-r from-blue-50 to-cyan-50 text-blue-700 dark:from-blue-900/20 dark:to-cyan-900/20 dark:text-blue-300 shadow-sm border border-blue-200 dark:border-blue-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.customers*') ? 'bg-blue-100 text-blue-600 dark:bg-blue-800 dark:text-blue-300' : 'bg-gray-100 text-gray-500 group-hover:bg-blue-100 group-hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-blue-800 dark:group-hover:text-blue-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                        Customers
                    </a>

                    <!-- Technicians -->
                    <a href="{{ route('admin.repair-service.technicians') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.technicians*') ? 'bg-gradient-to-r from-green-50 to-emerald-50 text-green-700 dark:from-green-900/20 dark:to-emerald-900/20 dark:text-green-300 shadow-sm border border-green-200 dark:border-green-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.technicians*') ? 'bg-green-100 text-green-600 dark:bg-green-800 dark:text-green-300' : 'bg-gray-100 text-gray-500 group-hover:bg-green-100 group-hover:text-green-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-green-800 dark:group-hover:text-green-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        Technicians
                    </a>

                    <!-- Bookings -->
                    <a href="{{ route('admin.repair-service.bookings') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.bookings*') ? 'bg-gradient-to-r from-purple-50 to-pink-50 text-purple-700 dark:from-purple-900/20 dark:to-pink-900/20 dark:text-purple-300 shadow-sm border border-purple-200 dark:border-purple-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.bookings*') ? 'bg-purple-100 text-purple-600 dark:bg-purple-800 dark:text-purple-300' : 'bg-gray-100 text-gray-500 group-hover:bg-purple-100 group-hover:text-purple-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-purple-800 dark:group-hover:text-purple-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        Bookings
                    </a>

                    <!-- Service Categories -->
                    <a href="{{ route('admin.repair-service.service-categories') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.service-categories*') ? 'bg-gradient-to-r from-orange-50 to-yellow-50 text-orange-700 dark:from-orange-900/20 dark:to-yellow-900/20 dark:text-orange-300 shadow-sm border border-orange-200 dark:border-orange-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.service-categories*') ? 'bg-orange-100 text-orange-600 dark:bg-orange-800 dark:text-orange-300' : 'bg-gray-100 text-gray-500 group-hover:bg-orange-100 group-hover:text-orange-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-orange-800 dark:group-hover:text-orange-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        Service Categories
                    </a>

                    <!-- Services -->
                    <a href="{{ route('admin.repair-service.services') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.services*') ? 'bg-gradient-to-r from-teal-50 to-cyan-50 text-teal-700 dark:from-teal-900/20 dark:to-cyan-900/20 dark:text-teal-300 shadow-sm border border-teal-200 dark:border-teal-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.services*') ? 'bg-teal-100 text-teal-600 dark:bg-teal-800 dark:text-teal-300' : 'bg-gray-100 text-gray-500 group-hover:bg-teal-100 group-hover:text-teal-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-teal-800 dark:group-hover:text-teal-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        Services
                    </a>

                    <!-- Components -->
                    <a href="{{ route('admin.repair-service.components') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.components*') ? 'bg-gradient-to-r from-red-50 to-rose-50 text-red-700 dark:from-red-900/20 dark:to-rose-900/20 dark:text-red-300 shadow-sm border border-red-200 dark:border-red-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.components*') ? 'bg-red-100 text-red-600 dark:bg-red-800 dark:text-red-300' : 'bg-gray-100 text-gray-500 group-hover:bg-red-100 group-hover:text-red-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-red-800 dark:group-hover:text-red-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        Components
                    </a>

                    <!-- Reports -->
                    <a href="{{ route('admin.repair-service.reports') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.repair-service.reports*') ? 'bg-gradient-to-r from-violet-50 to-purple-50 text-violet-700 dark:from-violet-900/20 dark:to-purple-900/20 dark:text-violet-300 shadow-sm border border-violet-200 dark:border-violet-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.repair-service.reports*') ? 'bg-violet-100 text-violet-600 dark:bg-violet-800 dark:text-violet-300' : 'bg-gray-100 text-gray-500 group-hover:bg-violet-100 group-hover:text-violet-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-violet-800 dark:group-hover:text-violet-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        Reports
                    </a>
                </div>

                <!-- System Management -->
                <div class="space-y-2 mt-8">
                    <div class="px-3 py-2">
                        <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            System
                        </h3>
                    </div>
                    
                    <!-- Settings -->
                    <a href="{{ route('admin.settings') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings*') ? 'bg-gradient-to-r from-slate-50 to-gray-50 text-slate-700 dark:from-slate-900/20 dark:to-gray-900/20 dark:text-slate-300 shadow-sm border border-slate-200 dark:border-slate-800' : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-gray-700 dark:hover:to-gray-600 hover:text-gray-900 dark:hover:text-gray-100' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200 {{ request()->routeIs('admin.settings*') ? 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300' : 'bg-gray-100 text-gray-500 group-hover:bg-slate-100 group-hover:text-slate-600 dark:bg-gray-700 dark:text-gray-400 dark:group-hover:bg-slate-800 dark:group-hover:text-slate-300' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        Settings
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main content -->
        <div class="lg:pl-72">
            <!-- Top navigation -->
            <div class="sticky top-0 z-40 lg:hidden">
                <div class="bg-gradient-to-r from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-lg border-b border-gray-200 dark:border-gray-700">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex items-center">
                                <button type="button" class="p-2 rounded-xl text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition-all duration-200" onclick="toggleSidebar()">
                                    <span class="sr-only">Open sidebar</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center">
                                <h1 class="text-lg font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Admin Panel</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Desktop Header -->
            <div class="hidden lg:sticky lg:top-0 lg:z-40 lg:flex lg:h-16 lg:shrink-0 lg:items-center lg:gap-x-4 lg:border-b lg:border-gray-200 dark:lg:border-gray-700 lg:bg-gradient-to-r lg:from-white lg:to-gray-50 dark:lg:from-gray-800 dark:lg:to-gray-900 lg:px-4 lg:shadow-lg lg:sm:gap-x-6 lg:sm:px-6 lg:lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-gray-700 dark:text-gray-300 lg:hidden" id="sidebar-toggle">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="flex flex-1"></div>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <!-- User menu -->
                        <div class="relative">
                            <button type="button" class="-m-1.5 flex items-center p-1.5 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center shadow-md">
                                    <span class="text-sm font-semibold text-white">
                                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                                    </span>
                                </div>
                            </button>
                            
                            <div class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-xl bg-white dark:bg-gray-700 py-2 shadow-xl ring-1 ring-gray-900/5 focus:outline-none hidden" id="user-menu">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-3 py-2 text-sm leading-6 text-gray-900 dark:text-white hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-200">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <main class="bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
                <div class="p-6 lg:p-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Custom JS from settings -->
    @if(\App\Models\Setting::get('custom_js'))
        <script>{!! \App\Models\Setting::get('custom_js') !!}</script>
    @endif

    <script>
        // Sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }

        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            toggleSidebar();
        });

        // User menu toggle
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-menu').classList.toggle('hidden');
        });

        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userMenuButton = document.getElementById('user-menu-button');
            
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
