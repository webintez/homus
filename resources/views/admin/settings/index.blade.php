@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-slate-600 to-gray-600 bg-clip-text text-transparent">Settings</h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">Manage your website settings and configuration</p>
        </div>

        <!-- Settings Tabs -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-gray-50 dark:from-slate-900/20 dark:to-gray-900/20 border-b border-slate-200 dark:border-slate-800">
                    <nav class="flex space-x-2 overflow-x-auto">
                        <button onclick="showTab('general')" id="general-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            General
                        </button>
                        <button onclick="showTab('social')" id="social-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 text-blue-700 dark:text-blue-300 hover:from-blue-100 hover:to-cyan-100 dark:hover:from-blue-900/30 dark:hover:to-cyan-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4zM9 6v10h6V6H9z"></path>
                            </svg>
                            Social Media
                        </button>
                        <button onclick="showTab('theme')" id="theme-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 text-purple-700 dark:text-purple-300 hover:from-purple-100 hover:to-pink-100 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                            Theme
                        </button>
                        <button onclick="showTab('email')" id="email-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 text-green-700 dark:text-green-300 hover:from-green-100 hover:to-emerald-100 dark:hover:from-green-900/30 dark:hover:to-emerald-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email
                        </button>
                        <button onclick="showTab('seo')" id="seo-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 text-orange-700 dark:text-orange-300 hover:from-orange-100 hover:to-yellow-100 dark:hover:from-orange-900/30 dark:hover:to-yellow-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            SEO
                        </button>
                        <button onclick="showTab('custom')" id="custom-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-violet-50 to-purple-50 dark:from-violet-900/20 dark:to-purple-900/20 text-violet-700 dark:text-violet-300 hover:from-violet-100 hover:to-purple-100 dark:hover:from-violet-900/30 dark:hover:to-purple-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                            Custom Code
                        </button>
                        <button onclick="showTab('maintenance')" id="maintenance-tab" class="whitespace-nowrap py-3 px-6 rounded-xl font-semibold text-sm bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 text-red-700 dark:text-red-300 hover:from-red-100 hover:to-pink-100 dark:hover:from-red-900/30 dark:hover:to-pink-900/30 transition-all duration-200">
                            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Maintenance
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- General Settings -->
        <div id="general-content" class="tab-content">
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border-b border-indigo-200 dark:border-indigo-800">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">General Settings</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Configure your website's basic information</p>
                </div>
                <div class="p-6">
                    <form id="general-form">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="website_title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Website Title</label>
                                <input type="text" name="website_title" id="website_title" value="{{ $settings['website_title'] ?? '' }}" 
                                       class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Contact Email</label>
                                <input type="email" name="email" id="email" value="{{ $settings['email'] ?? '' }}" 
                                       class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ $settings['phone'] ?? '' }}" 
                                       class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                            </div>

                            <div>
                                <label for="timezone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Timezone</label>
                                <input type="text" name="timezone" id="timezone" value="{{ $settings['timezone'] ?? 'UTC' }}" 
                                       class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="e.g., UTC, America/New_York, Europe/London">
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Enter timezone identifier (e.g., UTC, America/New_York, Europe/London)
                                </p>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Address</label>
                                <textarea name="address" id="address" rows="3" 
                                          class="w-full px-4 py-3 border border-indigo-300 dark:border-indigo-600 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition-all duration-200">{{ $settings['address'] ?? '' }}</textarea>
                            </div>

                            <div>
                                <label for="logo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Website Logo</label>
                                <div class="mt-1 flex items-center space-x-4">
                                    <input type="file" id="logo" name="logo" accept="image/*" 
                                           class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-indigo-50 file:to-purple-50 file:text-indigo-700 hover:file:from-indigo-100 hover:file:to-purple-100 dark:file:bg-gray-700 dark:file:text-gray-300 transition-all duration-200">
                                    @if($settings['website_logo'])
                                        <img src="{{ Storage::url($settings['website_logo']) }}" alt="Current Logo" class="h-12 w-auto rounded-lg shadow-lg">
                                    @endif
                                </div>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Upload a logo for your website (max 2MB)</p>
                            </div>

                            <div>
                                <label for="favicon" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Website Favicon</label>
                                <div class="mt-1 flex items-center space-x-4">
                                    <input type="file" id="favicon" name="favicon" accept="image/*" 
                                           class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-indigo-50 file:to-purple-50 file:text-indigo-700 hover:file:from-indigo-100 hover:file:to-purple-100 dark:file:bg-gray-700 dark:file:text-gray-300 transition-all duration-200">
                                    @if($settings['website_favicon'])
                                        <img src="{{ Storage::url($settings['website_favicon']) }}" alt="Current Favicon" class="h-10 w-10 rounded-lg shadow-lg">
                                    @endif
                                </div>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Upload a favicon for your website (max 1MB)</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Save General Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Social Media Settings -->
    <div id="social-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Social Media Links</h3>
                <form id="social-form">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook URL</label>
                            <input type="url" name="facebook" id="facebook" value="{{ $settings['facebook'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter URL</label>
                            <input type="url" name="twitter" id="twitter" value="{{ $settings['twitter'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram URL</label>
                            <input type="url" name="instagram" id="instagram" value="{{ $settings['instagram'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">LinkedIn URL</label>
                            <input type="url" name="linkedin" id="linkedin" value="{{ $settings['linkedin'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="youtube" class="block text-sm font-medium text-gray-700 dark:text-gray-300">YouTube URL</label>
                            <input type="url" name="youtube" id="youtube" value="{{ $settings['youtube'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="pinterest" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pinterest URL</label>
                            <input type="url" name="pinterest" id="pinterest" value="{{ $settings['pinterest'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Social Media Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Theme Settings -->
    <div id="theme-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Theme Settings</h3>
                <form id="theme-form">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="primary_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Primary Color</label>
                            <input type="color" name="primary_color" id="primary_color" value="{{ $settings['primary_color'] ?? '#3B82F6' }}" 
                                   class="mt-1 block w-full h-10 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label for="secondary_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secondary Color</label>
                            <input type="color" name="secondary_color" id="secondary_color" value="{{ $settings['secondary_color'] ?? '#6B7280' }}" 
                                   class="mt-1 block w-full h-10 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label for="primary_font" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Primary Font</label>
                            <select name="primary_font" id="primary_font" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                <option value="Inter" {{ ($settings['primary_font'] ?? '') == 'Inter' ? 'selected' : '' }}>Inter</option>
                                <option value="Roboto" {{ ($settings['primary_font'] ?? '') == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                                <option value="Open Sans" {{ ($settings['primary_font'] ?? '') == 'Open Sans' ? 'selected' : '' }}>Open Sans</option>
                                <option value="Lato" {{ ($settings['primary_font'] ?? '') == 'Lato' ? 'selected' : '' }}>Lato</option>
                            </select>
                        </div>

                        <div>
                            <label for="secondary_font" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secondary Font</label>
                            <select name="secondary_font" id="secondary_font" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                <option value="Inter" {{ ($settings['secondary_font'] ?? '') == 'Inter' ? 'selected' : '' }}>Inter</option>
                                <option value="Roboto" {{ ($settings['secondary_font'] ?? '') == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                                <option value="Open Sans" {{ ($settings['secondary_font'] ?? '') == 'Open Sans' ? 'selected' : '' }}>Open Sans</option>
                                <option value="Lato" {{ ($settings['secondary_font'] ?? '') == 'Lato' ? 'selected' : '' }}>Lato</option>
                            </select>
                        </div>

                        <div>
                            <label for="background_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Background Color</label>
                            <input type="color" name="background_color" id="background_color" value="{{ $settings['background_color'] ?? '#FFFFFF' }}" 
                                   class="mt-1 block w-full h-10 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label for="header_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Header Color</label>
                            <input type="color" name="header_color" id="header_color" value="{{ $settings['header_color'] ?? '#F9FAFB' }}" 
                                   class="mt-1 block w-full h-10 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label for="footer_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Footer Color</label>
                            <input type="color" name="footer_color" id="footer_color" value="{{ $settings['footer_color'] ?? '#1F2937' }}" 
                                   class="mt-1 block w-full h-10 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Theme Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Email Settings -->
    <div id="email-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Email Settings</h3>
                <form id="email-form">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="smtp_host" class="block text-sm font-medium text-gray-700 dark:text-gray-300">SMTP Host</label>
                            <input type="text" name="smtp_host" id="smtp_host" value="{{ $settings['smtp_host'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="smtp_port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">SMTP Port</label>
                            <input type="number" name="smtp_port" id="smtp_port" value="{{ $settings['smtp_port'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="smtp_username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">SMTP Username</label>
                            <input type="text" name="smtp_username" id="smtp_username" value="{{ $settings['smtp_username'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="smtp_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">SMTP Password</label>
                            <input type="password" name="smtp_password" id="smtp_password" value="{{ $settings['smtp_password'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div>
                            <label for="smtp_encryption" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Encryption</label>
                            <select name="smtp_encryption" id="smtp_encryption" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                <option value="">None</option>
                                <option value="tls" {{ ($settings['smtp_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ ($settings['smtp_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                            </select>
                        </div>

                        <div>
                            <label for="smtp_from_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">From Address</label>
                            <input type="email" name="smtp_from_address" id="smtp_from_address" value="{{ $settings['smtp_from_address'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="smtp_from_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">From Name</label>
                            <input type="text" name="smtp_from_name" id="smtp_from_name" value="{{ $settings['smtp_from_name'] ?? '' }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Email Settings
                        </button>
                        
        <!-- SMTP Test Button -->
        <button type="button" onclick="testSmtp()" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Test SMTP
        </button>
        
        <!-- Clear Cache Button -->
        <button type="button" onclick="clearAllCaches()" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Clear Cache
        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Code Settings -->
    <div id="custom-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Custom Code</h3>
                <form id="custom-form">
                    <div class="space-y-6">
                        <div>
                            <label for="custom_css" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custom CSS</label>
                            <textarea name="custom_css" id="custom_css" rows="10" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm font-mono">{{ $settings['custom_css'] ?? '' }}</textarea>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Add custom CSS styles that will be included in the head section</p>
                        </div>

                        <div>
                            <label for="custom_js" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custom JavaScript</label>
                            <textarea name="custom_js" id="custom_js" rows="10" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm font-mono">{{ $settings['custom_js'] ?? '' }}</textarea>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Add custom JavaScript code that will be included before the closing body tag</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Custom Code
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SEO Settings -->
    <div id="seo-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">SEO Settings</h3>
                <form id="seo-form">
                    <!-- Meta Tags Section -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Meta Tags</h4>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $settings['meta_title'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="Enter meta title (max 60 characters)" maxlength="60">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">The title that appears in search engine results (max 60 characters)</p>
                            </div>
                            
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3" 
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                          placeholder="Enter meta description (max 160 characters)" maxlength="160">{{ $settings['meta_description'] ?? '' }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">The description that appears in search engine results (max 160 characters)</p>
                            </div>
                            
                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="keyword1, keyword2, keyword3">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comma-separated keywords relevant to your website</p>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="meta_author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Author</label>
                                    <input type="text" name="meta_author" id="meta_author" value="{{ $settings['meta_author'] ?? '' }}" 
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                           placeholder="Author name">
                                </div>
                                
                                <div>
                                    <label for="meta_robots" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Robots</label>
                                    <select name="meta_robots" id="meta_robots" 
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                        <option value="index, follow" {{ ($settings['meta_robots'] ?? 'index, follow') == 'index, follow' ? 'selected' : '' }}>Index, Follow</option>
                                        <option value="index, nofollow" {{ ($settings['meta_robots'] ?? '') == 'index, nofollow' ? 'selected' : '' }}>Index, No Follow</option>
                                        <option value="noindex, follow" {{ ($settings['meta_robots'] ?? '') == 'noindex, follow' ? 'selected' : '' }}>No Index, Follow</option>
                                        <option value="noindex, nofollow" {{ ($settings['meta_robots'] ?? '') == 'noindex, nofollow' ? 'selected' : '' }}>No Index, No Follow</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Open Graph Section -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Open Graph (Facebook)</h4>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="og_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Title</label>
                                <input type="text" name="og_title" id="og_title" value="{{ $settings['og_title'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="Enter Open Graph title" maxlength="60">
                            </div>
                            
                            <div>
                                <label for="og_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Description</label>
                                <textarea name="og_description" id="og_description" rows="3" 
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                          placeholder="Enter Open Graph description" maxlength="160">{{ $settings['og_description'] ?? '' }}</textarea>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="og_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Image URL</label>
                                    <input type="url" name="og_image" id="og_image" value="{{ $settings['og_image'] ?? '' }}" 
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                           placeholder="https://example.com/image.jpg">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Recommended size: 1200x630px</p>
                                </div>
                                
                                <div>
                                    <label for="og_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Type</label>
                                    <select name="og_type" id="og_type" 
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                        <option value="website" {{ ($settings['og_type'] ?? 'website') == 'website' ? 'selected' : '' }}>Website</option>
                                        <option value="article" {{ ($settings['og_type'] ?? '') == 'article' ? 'selected' : '' }}>Article</option>
                                        <option value="business.business" {{ ($settings['og_type'] ?? '') == 'business.business' ? 'selected' : '' }}>Business</option>
                                        <option value="product" {{ ($settings['og_type'] ?? '') == 'product' ? 'selected' : '' }}>Product</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <label for="og_site_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Site Name</label>
                                <input type="text" name="og_site_name" id="og_site_name" value="{{ $settings['og_site_name'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="Your site name">
                            </div>
                        </div>
                    </div>

                    <!-- Twitter Card Section -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Twitter Card</h4>
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="twitter_card" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Card Type</label>
                                    <select name="twitter_card" id="twitter_card" 
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
                                        <option value="summary" {{ ($settings['twitter_card'] ?? 'summary_large_image') == 'summary' ? 'selected' : '' }}>Summary</option>
                                        <option value="summary_large_image" {{ ($settings['twitter_card'] ?? 'summary_large_image') == 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                                        <option value="app" {{ ($settings['twitter_card'] ?? '') == 'app' ? 'selected' : '' }}>App</option>
                                        <option value="player" {{ ($settings['twitter_card'] ?? '') == 'player' ? 'selected' : '' }}>Player</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="twitter_site" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Site</label>
                                    <input type="text" name="twitter_site" id="twitter_site" value="{{ $settings['twitter_site'] ?? '' }}" 
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                           placeholder="">
                                </div>
                            </div>
                            
                            <div>
                                <label for="twitter_creator" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Creator</label>
                                <input type="text" name="twitter_creator" id="twitter_creator" value="{{ $settings['twitter_creator'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="@creatorusername">
                            </div>
                            
                            <div>
                                <label for="twitter_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Title</label>
                                <input type="text" name="twitter_title" id="twitter_title" value="{{ $settings['twitter_title'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="Enter Twitter title" maxlength="60">
                            </div>
                            
                            <div>
                                <label for="twitter_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Description</label>
                                <textarea name="twitter_description" id="twitter_description" rows="3" 
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                          placeholder="Enter Twitter description" maxlength="160">{{ $settings['twitter_description'] ?? '' }}</textarea>
                            </div>
                            
                            <div>
                                <label for="twitter_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter Image URL</label>
                                <input type="url" name="twitter_image" id="twitter_image" value="{{ $settings['twitter_image'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="https://example.com/twitter-image.jpg">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Recommended size: 1200x675px</p>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics Section -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Analytics & Tracking</h4>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="google_analytics_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google Analytics ID</label>
                                <input type="text" name="google_analytics_id" id="google_analytics_id" value="{{ $settings['google_analytics_id'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="G-XXXXXXXXXX">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Your Google Analytics 4 measurement ID</p>
                            </div>
                            
                            <div>
                                <label for="google_tag_manager_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google Tag Manager ID</label>
                                <input type="text" name="google_tag_manager_id" id="google_tag_manager_id" value="{{ $settings['google_tag_manager_id'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="GTM-XXXXXXX">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Your Google Tag Manager container ID</p>
                            </div>
                            
                            <div>
                                <label for="facebook_pixel_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook Pixel ID</label>
                                <input type="text" name="facebook_pixel_id" id="facebook_pixel_id" value="{{ $settings['facebook_pixel_id'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="123456789012345">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Your Facebook Pixel ID</p>
                            </div>
                            
                            <div>
                                <label for="canonical_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Canonical URL</label>
                                <input type="url" name="canonical_url" id="canonical_url" value="{{ $settings['canonical_url'] ?? '' }}" 
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                                       placeholder="https://yourwebsite.com">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">The canonical URL for your homepage</p>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced SEO Section -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Advanced SEO</h4>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="structured_data" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Structured Data (JSON-LD)</label>
                                <textarea name="structured_data" id="structured_data" rows="6" 
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm font-mono text-sm"
                                          placeholder='{"@@context": "https://schema.org", "@@type": "Organization", "name": "Your Company", "url": "https://yourwebsite.com"}'>{{ $settings['structured_data'] ?? '' }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">JSON-LD structured data for rich snippets (optional)</p>
                            </div>
                            
                            <div>
                                <label for="custom_meta_tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custom Meta Tags</label>
                                <textarea name="custom_meta_tags" id="custom_meta_tags" rows="4" 
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm font-mono text-sm"
                                          placeholder='<meta name="custom-tag" content="custom-value">
<meta property="custom:property" content="custom-value">'>{{ $settings['custom_meta_tags'] ?? '' }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Additional custom meta tags (HTML format)</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save SEO Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Maintenance Mode Settings -->
    <div id="maintenance-content" class="tab-content hidden">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Maintenance Mode</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">Website Status</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                @if(\App\Models\Setting::get('maintenance_mode', false))
                                    Your website is currently in maintenance mode and not accessible to visitors.
                                @else
                                    Your website is currently online and accessible to visitors.
                                @endif
                            </p>
                        </div>
                        <button type="button" onclick="toggleMaintenance()" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white {{ \App\Models\Setting::get('maintenance_mode', false) ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            @if(\App\Models\Setting::get('maintenance_mode', false))
                                Take Website Online
                            @else
                                Enable Maintenance Mode
                            @endif
                        </button>
                    </div>

                    <div class="bg-yellow-50 dark:bg-yellow-900 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.726-1.36 3.491 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Important Notice</h3>
                                <div class="mt-2 text-sm text-yellow-700 dark:text-yellow-300">
                                    <p>When maintenance mode is enabled:</p>
                                    <ul class="list-disc list-inside mt-1">
                                        <li>Visitors will see a maintenance page instead of your website</li>
                                        <li>Admin users can still access the admin panel</li>
                                        <li>All public routes will be redirected to the maintenance page</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SMTP Test Modal -->
<div id="smtp-test-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Test SMTP Configuration</h3>
                <button onclick="closeSmtpTestModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="mb-4">
                <label for="test-email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Test Email Address
                </label>
                <input type="email" id="test-email" name="test-email" 
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                       placeholder="Enter email address to test">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    A test email will be sent to this address to verify your SMTP configuration.
                </p>
            </div>
            
            <div class="flex justify-end space-x-3">
                <button onclick="closeSmtpTestModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Cancel
                </button>
                <button onclick="sendSmtpTest()" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <span id="test-button-text">Send Test Email</span>
                    <span id="test-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sending...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab functionality
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Remove active class from all tabs
        document.querySelectorAll('[id$="-tab"]').forEach(tab => {
            tab.classList.remove('border-indigo-500', 'text-indigo-600', 'dark:text-indigo-400');
            tab.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
        });

        // Show selected tab content
        document.getElementById(tabName + '-content').classList.remove('hidden');

        // Add active class to selected tab
        const activeTab = document.getElementById(tabName + '-tab');
        activeTab.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
        activeTab.classList.add('border-indigo-500', 'text-indigo-600', 'dark:text-indigo-400');
    }

    // Form submissions
    document.getElementById('general-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        // Handle file uploads separately
        const logoFile = document.getElementById('logo').files[0];
        const faviconFile = document.getElementById('favicon').files[0];
        
        if (logoFile) {
            await uploadFile('logo', logoFile, '{{ route("admin.settings.upload-logo") }}');
        }
        
        if (faviconFile) {
            await uploadFile('favicon', faviconFile, '{{ route("admin.settings.upload-favicon") }}');
        }
        
        // Submit other form data
        await submitForm('general', formData);
    });

    document.getElementById('social-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm('social', new FormData(this));
    });

    document.getElementById('theme-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm('theme', new FormData(this));
    });

    document.getElementById('email-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm('email', new FormData(this));
    });

    document.getElementById('custom-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm('custom', new FormData(this));
    });

    document.getElementById('seo-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm('seo', new FormData(this));
    });

    // Maintenance mode toggle
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
                showMessage(data.message, 'success');
                // Reload the page to update the maintenance mode status
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showMessage(data.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred. Please try again.', 'error');
        }
    }

    // SMTP Test functions
    function testSmtp() {
        document.getElementById('smtp-test-modal').classList.remove('hidden');
        document.getElementById('test-email').value = '';
    }

    function closeSmtpTestModal() {
        document.getElementById('smtp-test-modal').classList.add('hidden');
        document.getElementById('test-button-text').classList.remove('hidden');
        document.getElementById('test-loading').classList.add('hidden');
    }

    async function sendSmtpTest() {
        const testEmail = document.getElementById('test-email').value;
        
        if (!testEmail) {
            showMessage('Please enter a valid email address.', 'error');
            return;
        }

        // Show loading state
        document.getElementById('test-button-text').classList.add('hidden');
        document.getElementById('test-loading').classList.remove('hidden');

        try {
            const response = await fetch('{{ route("admin.settings.test-smtp") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    test_email: testEmail
                })
            });

            const data = await response.json();
            
            if (data.success) {
                showMessage(data.message, 'success');
                closeSmtpTestModal();
            } else {
                showMessage(data.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred while testing SMTP. Please try again.', 'error');
        } finally {
            // Hide loading state
            document.getElementById('test-button-text').classList.remove('hidden');
            document.getElementById('test-loading').classList.add('hidden');
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
                showMessage(data.message, 'success');
                // Reload the page to reflect any changes
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                showMessage(data.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred while clearing caches. Please try again.', 'error');
        }
    }

    async function uploadFile(fieldName, file, url) {
        const formData = new FormData();
        formData.append(fieldName, file);
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const result = await response.json();
            
            if (result.success) {
                showMessage(result.message, 'success');
                // Reload the page to show the uploaded image
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showMessage(result.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred while uploading the file.', 'error');
        }
    }

    async function submitForm(type, formData) {
        const data = Object.fromEntries(formData);
        
        try {
            const response = await fetch(`{{ route('admin.settings') }}/${type}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            
            if (result.success) {
                showMessage(result.message, 'success');
            } else {
                showMessage(result.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred. Please try again.', 'error');
        }
    }

    function showMessage(text, type) {
        // Create or update message element
        let messageDiv = document.getElementById('message');
        if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.id = 'message';
            messageDiv.className = 'fixed top-4 right-4 z-50 max-w-sm';
            document.body.appendChild(messageDiv);
        }

        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const textColor = 'text-white';
        
        messageDiv.innerHTML = `
            <div class="${bgColor} ${textColor} px-4 py-3 rounded-lg shadow-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">${text}</p>
                    </div>
                </div>
            </div>
        `;

        // Auto-hide after 5 seconds
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
</script>
@endsection
