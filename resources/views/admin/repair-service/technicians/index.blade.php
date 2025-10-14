@extends('admin.layouts.app')

@section('title', 'Technicians')

@section('content')
<div class="space-y-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Technicians</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Manage technician applications and accounts</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-green-50 dark:from-gray-800 dark:to-green-900/20 p-2 rounded-2xl shadow-lg border border-green-200 dark:border-green-800">
                <nav class="flex space-x-2">
                    <a href="#" class="bg-gradient-to-r from-green-500 to-emerald-500 text-white whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm shadow-lg transform hover:scale-105 transition-all duration-200">
                        All Technicians
                    </a>
                    <a href="#" class="bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 text-orange-700 dark:text-orange-300 hover:from-orange-100 hover:to-yellow-100 dark:hover:from-orange-900/30 dark:hover:to-yellow-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        Pending Approval
                    </a>
                    <a href="#" class="bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20 text-emerald-700 dark:text-emerald-300 hover:from-emerald-100 hover:to-green-100 dark:hover:from-emerald-900/30 dark:hover:to-green-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        Approved
                    </a>
                    <a href="#" class="bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 text-red-700 dark:text-red-300 hover:from-red-100 hover:to-rose-100 dark:hover:from-red-900/30 dark:hover:to-rose-900/30 whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-200">
                        Rejected
                    </a>
                </nav>
            </div>
        </div>

        <!-- Technicians Table -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if($technicians && count($technicians) > 0)
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($technicians as $technician)
                        <li class="hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/10 dark:hover:to-emerald-900/10 transition-all duration-200">
                            <div class="px-6 py-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 flex items-center justify-center shadow-lg">
                                            @if($technician->profile_picture)
                                                <img src="{{ Storage::url($technician->profile_picture) }}" alt="Profile" class="h-12 w-12 rounded-xl object-cover">
                                            @else
                                                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $technician->first_name }} {{ $technician->last_name }}
                                            </p>
                                            <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                @if($technician->status === 'approved') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @elseif($technician->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                {{ ucfirst($technician->status) }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-green-600 dark:text-green-400 font-medium">{{ $technician->email }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $technician->phone }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-6">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <p class="font-medium">Rating: <span class="text-yellow-600 dark:text-yellow-400 font-semibold">{{ number_format($technician->rating ?? 0, 1) }}/5</span></p>
                                        <p class="text-green-600 dark:text-green-400 font-semibold">{{ $technician->completed_jobs ?? 0 }} completed jobs</p>
                                    </div>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.repair-service.technicians.show', $technician) }}" 
                                           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                            View Details
                                        </a>
                                        @if($technician->status === 'pending')
                                            <form method="POST" action="{{ route('admin.repair-service.technicians.approve', $technician) }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                                    Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.repair-service.technicians.approve', $technician) }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                                    Reject
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/10 dark:to-emerald-900/10 border-t border-green-200 dark:border-green-800">
                    {{ $technicians->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="mx-auto h-16 w-16 bg-gradient-to-r from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No technicians found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No technicians have registered yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
