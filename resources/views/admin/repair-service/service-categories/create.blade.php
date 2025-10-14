@extends('admin.layouts.app')

@section('title', 'Create Service Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Service Category</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.repair-service.service-categories') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Categories
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.repair-service.service-categories.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon">Icon Class</label>
                                    <input type="text" 
                                           class="form-control @error('icon') is-invalid @enderror" 
                                           id="icon" 
                                           name="icon" 
                                           value="{{ old('icon') }}" 
                                           placeholder="e.g., fas fa-tools">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Use Font Awesome icon classes (e.g., fas fa-tools, fas fa-wrench)
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Enter category description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               class="form-check-input" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                    <small class="form-text text-muted">
                                        Uncheck to make this category inactive
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Category
                            </button>
                            <a href="{{ route('admin.repair-service.service-categories') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
