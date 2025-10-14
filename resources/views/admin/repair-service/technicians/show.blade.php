@extends('admin.layouts.app')

@section('title', 'Technician Details')

@section('content')
<div class="space-y-6">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('admin.repair-service.technicians') }}" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                        ← Back to Technicians
                    </a>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Technician Details</h2>
                    <p class="mt-2 text-gray-600">{{ $technician->first_name }} {{ $technician->last_name }}</p>
                </div>
                @if($technician->status === 'pending')
                    <div class="flex space-x-2">
                        <form method="POST" action="{{ route('admin.repair-service.technicians.approve', $technician) }}" class="inline">
                            @csrf
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700">
                                Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.repair-service.technicians.approve', $technician) }}" class="inline">
                            @csrf
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">First Name</p>
                                <p class="text-sm text-gray-900">{{ $technician->first_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Last Name</p>
                                <p class="text-sm text-gray-900">{{ $technician->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-sm text-gray-900">{{ $technician->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone</p>
                                <p class="text-sm text-gray-900">{{ $technician->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Professional Information</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Skills</p>
                                <div class="mt-1 flex flex-wrap gap-2">
                                    @if($technician->skills)
                                        @foreach(is_array($technician->skills) ? $technician->skills : json_decode($technician->skills, true) as $skill)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $skill }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Service Areas</p>
                                <div class="mt-1 flex flex-wrap gap-2">
                                    @if($technician->service_areas)
                                        @foreach(is_array($technician->service_areas) ? $technician->service_areas : json_decode($technician->service_areas, true) as $area)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $area }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Documents</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($technician->id_proof)
                                <div>
                                    <p class="text-sm font-medium text-gray-500">ID Proof</p>
                                    <a href="{{ Storage::url($technician->id_proof) }}" target="_blank" class="text-indigo-600 hover:text-indigo-500 text-sm">
                                        View Document
                                    </a>
                                </div>
                            @endif
                            @if($technician->certificate)
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Certificate</p>
                                    <a href="{{ Storage::url($technician->certificate) }}" target="_blank" class="text-indigo-600 hover:text-indigo-500 text-sm">
                                        View Document
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Profile Picture -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Picture</h3>
                        <div class="text-center">
                            @if($technician->profile_picture)
                                <img src="{{ Storage::url($technician->profile_picture) }}" alt="Profile" class="h-24 w-24 rounded-full object-cover mx-auto">
                            @else
                                <div class="h-24 w-24 rounded-full bg-gray-100 flex items-center justify-center mx-auto">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Application Status -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Application Status</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Status</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($technician->status === 'approved') bg-green-100 text-green-800
                                    @elseif($technician->status === 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($technician->status) }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Rating</span>
                                <span class="text-sm text-gray-900">{{ number_format($technician->rating ?? 0, 1) }}/5</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Total Jobs</span>
                                <span class="text-sm text-gray-900">{{ $technician->total_jobs ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Completed Jobs</span>
                                <span class="text-sm text-gray-900">{{ $technician->completed_jobs ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
