@extends('admin.layouts.app')

@section('title', 'Service Categories')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Service Categories</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Manage service categories and their settings</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-2xl p-4 shadow-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800 dark:text-green-200">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Content Card -->
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="h-10 w-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Service Categories</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Organize your services into categories</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.repair-service.service-categories.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Category
                    </a>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6">

                @if($categories->count() > 0)
                    <div class="overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">ID</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Description</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Icon</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Created At</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($categories as $category)
                                        <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 dark:hover:from-indigo-900/10 dark:hover:to-purple-900/10 transition-all duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                #{{ $category->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $category->name }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                                    {{ Str::limit($category->description, 50) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="h-8 w-8 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-lg flex items-center justify-center">
                                                    @if($category->icon)
                                                        <i class="{{ $category->icon }} text-indigo-600 dark:text-indigo-400"></i>
                                                    @else
                                                        <svg class="h-4 w-4 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                    @if($category->is_active) bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                    @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                    @endif">
                                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                                {{ $category->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.repair-service.service-categories.edit', $category) }}" 
                                                       class="inline-flex items-center px-3 py-2 text-sm font-semibold text-yellow-600 bg-yellow-50 hover:bg-yellow-100 dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.repair-service.service-categories.destroy', $category) }}" 
                                                          method="POST" class="inline" 
                                                          onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30 rounded-lg transition-all duration-200 transform hover:scale-105">
                                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="mx-auto h-16 w-16 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No service categories found</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Start by creating your first service category.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.repair-service.service-categories.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Category
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
