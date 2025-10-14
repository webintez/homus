<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RepairServiceController;
use Illuminate\Support\Facades\Route;

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send-otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware(['admin.auth'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings/general', [SettingsController::class, 'updateGeneral'])->name('settings.general');
        Route::post('/settings/social', [SettingsController::class, 'updateSocial'])->name('settings.social');
        Route::post('/settings/theme', [SettingsController::class, 'updateTheme'])->name('settings.theme');
        Route::post('/settings/email', [SettingsController::class, 'updateEmail'])->name('settings.email');
        Route::post('/settings/custom', [SettingsController::class, 'updateCustom'])->name('settings.custom');
        Route::post('/settings/maintenance', [SettingsController::class, 'toggleMaintenance'])->name('settings.maintenance');
        Route::post('/settings/upload-logo', [SettingsController::class, 'uploadLogo'])->name('settings.upload-logo');
        Route::post('/settings/upload-favicon', [SettingsController::class, 'uploadFavicon'])->name('settings.upload-favicon');
        Route::post('/settings/test-smtp', [SettingsController::class, 'testSmtp'])->name('settings.test-smtp');
        Route::post('/settings/clear-cache', [SettingsController::class, 'clearCache'])->name('settings.clear-cache');
        Route::post('/settings/seo', [SettingsController::class, 'updateSeo'])->name('settings.seo');

        // Repair Service Management
        Route::prefix('repair-service')->name('repair-service.')->group(function () {
            
            // Customer Management
            Route::get('/customers', [RepairServiceController::class, 'customers'])->name('customers');
            Route::get('/customers/{customer}', [RepairServiceController::class, 'showCustomer'])->name('customers.show');
            Route::post('/customers/{customer}/status', [RepairServiceController::class, 'updateCustomerStatus'])->name('customers.status');
            
            // Technician Management
            Route::get('/technicians', [RepairServiceController::class, 'technicians'])->name('technicians');
            Route::get('/technicians/{technician}', [RepairServiceController::class, 'showTechnician'])->name('technicians.show');
            Route::post('/technicians/{technician}/approve', [RepairServiceController::class, 'approveTechnician'])->name('technicians.approve');
            Route::post('/technicians/{technician}/status', [RepairServiceController::class, 'updateTechnicianStatus'])->name('technicians.status');
            
            // Service Category Management
            Route::get('/service-categories', [RepairServiceController::class, 'serviceCategories'])->name('service-categories');
            Route::get('/service-categories/create', [RepairServiceController::class, 'createServiceCategory'])->name('service-categories.create');
            Route::post('/service-categories', [RepairServiceController::class, 'storeServiceCategory'])->name('service-categories.store');
            Route::get('/service-categories/{category}/edit', [RepairServiceController::class, 'editServiceCategory'])->name('service-categories.edit');
            Route::put('/service-categories/{category}', [RepairServiceController::class, 'updateServiceCategory'])->name('service-categories.update');
            Route::delete('/service-categories/{category}', [RepairServiceController::class, 'destroyServiceCategory'])->name('service-categories.destroy');
            
            // Service Management
            Route::get('/services', [RepairServiceController::class, 'services'])->name('services');
            Route::get('/services/create', [RepairServiceController::class, 'createService'])->name('services.create');
            Route::post('/services', [RepairServiceController::class, 'storeService'])->name('services.store');
            Route::get('/services/{service}/edit', [RepairServiceController::class, 'editService'])->name('services.edit');
            Route::put('/services/{service}', [RepairServiceController::class, 'updateService'])->name('services.update');
            Route::delete('/services/{service}', [RepairServiceController::class, 'destroyService'])->name('services.destroy');
            
            // Booking Management
            Route::get('/bookings', [RepairServiceController::class, 'bookings'])->name('bookings');
            Route::get('/bookings/{booking}', [RepairServiceController::class, 'showBooking'])->name('bookings.show');
            Route::post('/bookings/{booking}/assign-technician', [RepairServiceController::class, 'assignTechnician'])->name('bookings.assign-technician');
            Route::post('/bookings/{booking}/status', [RepairServiceController::class, 'updateBookingStatus'])->name('bookings.status');
            
            // Component Management
            Route::get('/components', [RepairServiceController::class, 'components'])->name('components');
            Route::get('/components/create', [RepairServiceController::class, 'createComponent'])->name('components.create');
            Route::post('/components', [RepairServiceController::class, 'storeComponent'])->name('components.store');
            Route::get('/components/{component}/edit', [RepairServiceController::class, 'editComponent'])->name('components.edit');
            Route::put('/components/{component}', [RepairServiceController::class, 'updateComponent'])->name('components.update');
            Route::delete('/components/{component}', [RepairServiceController::class, 'destroyComponent'])->name('components.destroy');
            
            // Reports
            Route::get('/reports', [RepairServiceController::class, 'reports'])->name('reports');
        });
    });
});
