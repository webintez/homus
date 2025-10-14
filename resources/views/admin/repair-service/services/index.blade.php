@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Services</h3>
                    <a href="{{ route('admin.repair-service.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Service
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Base Price</th>
                                        <th>Hourly Rate</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>
                                                @if($service->category)
                                                    <span class="badge badge-info">{{ $service->category->name }}</span>
                                                @else
                                                    <span class="text-muted">No Category</span>
                                                @endif
                                            </td>
                                            <td>${{ number_format($service->base_price, 2) }}</td>
                                            <td>${{ number_format($service->hourly_rate, 2) }}/hr</td>
                                            <td>
                                                <span class="badge badge-{{ $service->is_active ? 'success' : 'danger' }}">
                                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.repair-service.services.edit', $service) }}" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.repair-service.services.destroy', $service) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-tools fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No services found</h5>
                            <p class="text-muted">Start by creating your first service.</p>
                            <a href="{{ route('admin.repair-service.services.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Service
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
