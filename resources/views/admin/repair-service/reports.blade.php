@extends('admin.layouts.app')

@section('title', 'Reports & Analytics')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent">Reports & Analytics</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Comprehensive insights into your repair service business</p>
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Bookings -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 p-6 rounded-2xl shadow-xl border border-blue-200 dark:border-blue-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total_bookings'] }}</h3>
                        <p class="text-blue-700 dark:text-blue-300 font-medium">Total Bookings</p>
                    </div>
                    <div class="h-12 w-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed Bookings -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-6 rounded-2xl shadow-xl border border-green-200 dark:border-green-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['completed_bookings'] }}</h3>
                        <p class="text-green-700 dark:text-green-300 font-medium">Completed</p>
                    </div>
                    <div class="h-12 w-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Bookings -->
            <div class="bg-gradient-to-br from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 p-6 rounded-2xl shadow-xl border border-orange-200 dark:border-orange-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['pending_bookings'] }}</h3>
                        <p class="text-orange-700 dark:text-orange-300 font-medium">Pending</p>
                    </div>
                    <div class="h-12 w-12 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-6 rounded-2xl shadow-xl border border-purple-200 dark:border-purple-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-purple-600 dark:text-purple-400">${{ number_format($stats['total_revenue'], 2) }}</h3>
                        <p class="text-purple-700 dark:text-purple-300 font-medium">Total Revenue</p>
                    </div>
                    <div class="h-12 w-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Monthly Bookings Chart -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
                        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Monthly Bookings Trend</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Track booking patterns over time</p>
                    </div>
                    <div class="p-6">
                        <canvas id="monthlyBookingsChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Category Statistics -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="px-6 py-6 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border-b border-green-200 dark:border-green-800">
                        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Bookings by Category</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Service category distribution</p>
                    </div>
                    <div class="p-6">
                        <canvas id="categoryChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Customer Statistics -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-6 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 border-b border-blue-200 dark:border-blue-800">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Customer Statistics</h5>
                    <p class="text-sm text-gray-600 dark:text-gray-400">User and technician overview</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total_customers'] }}</h3>
                            <p class="text-blue-700 dark:text-blue-300 font-medium">Total Customers</p>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['total_technicians'] }}</h3>
                            <p class="text-green-700 dark:text-green-300 font-medium">Total Technicians</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Technician Status -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-6 bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 border-b border-orange-200 dark:border-orange-800">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Technician Status</h5>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Approval status breakdown</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <h3 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['total_technicians'] - $stats['pending_technicians'] }}</h3>
                            <p class="text-green-700 dark:text-green-300 font-medium">Approved</p>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['pending_technicians'] }}</h3>
                            <p class="text-orange-700 dark:text-orange-300 font-medium">Pending Approval</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Monthly Bookings Chart
const monthlyBookingsCtx = document.getElementById('monthlyBookingsChart').getContext('2d');
const monthlyBookingsChart = new Chart(monthlyBookingsCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($monthlyBookings->pluck('month')) !!},
        datasets: [{
            label: 'Bookings',
            data: {!! json_encode($monthlyBookings->pluck('count')) !!},
            borderColor: '#6366F1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            borderWidth: 3,
            pointBackgroundColor: '#6366F1',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6,
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                    color: '#6B7280'
                }
            },
            x: {
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                    color: '#6B7280'
                }
            }
        }
    }
});

// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
const categoryChart = new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($categoryStats->pluck('name')) !!},
        datasets: [{
            data: {!! json_encode($categoryStats->pluck('count')) !!},
            backgroundColor: [
                '#6366F1',
                '#7C3AED',
                '#06B6D4',
                '#10B981',
                '#F59E0B',
                '#EF4444'
            ],
            borderWidth: 0,
            hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true,
                    font: {
                        size: 12
                    }
                }
            }
        }
    }
});
</script>
@endpush
@endsection
