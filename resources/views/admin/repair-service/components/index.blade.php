@extends('admin.layouts.app')

@section('title', 'Components')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Components</h3>
                    <a href="{{ route('admin.repair-service.components.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Component
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

                    @if($components->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Part Number</th>
                                        <th>Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($components as $component)
                                        <tr>
                                            <td>{{ $component->id }}</td>
                                            <td>{{ $component->name }}</td>
                                            <td>
                                                @if($component->part_number)
                                                    <code>{{ $component->part_number }}</code>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>${{ number_format($component->price, 2) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $component->stock_quantity > 0 ? 'success' : 'danger' }}">
                                                    {{ $component->stock_quantity }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $component->is_active ? 'success' : 'danger' }}">
                                                    {{ $component->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $component->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.repair-service.components.edit', $component) }}" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.repair-service.components.destroy', $component) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this component?')">
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
                            <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No components found</h5>
                            <p class="text-muted">Start by adding your first component.</p>
                            <a href="{{ route('admin.repair-service.components.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Component
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
