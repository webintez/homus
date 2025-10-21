<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\TechnicianAuthController;
use Illuminate\Support\Facades\Route;

// Public frontend routes
Route::get('/', [ServiceController::class, 'index'])->name('home');
Route::get('/maintenance', [HomeController::class, 'maintenance'])->name('maintenance');

// Test route
Route::get('/test', function () {
    return 'Test route working!';
})->name('test');

// Public service routes
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Customer Authentication Routes
Route::prefix('customer')->name('customer.')->group(function () {
    // Public routes
    Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [CustomerAuthController::class, 'register'])->name('register.post');
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login'])->name('login.post');
    Route::get('/forgot-password', [CustomerAuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [CustomerAuthController::class, 'sendResetLink'])->name('forgot-password.post');
    Route::get('/reset-password', [CustomerAuthController::class, 'showResetPasswordForm'])->name('reset-password');
    Route::post('/reset-password', [CustomerAuthController::class, 'resetPassword'])->name('reset-password.post');
    Route::post('/send-otp', [CustomerAuthController::class, 'sendOtp'])->name('send-otp');
    Route::post('/verify-otp', [CustomerAuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
    

    // Protected routes
    Route::middleware(['auth:customer'])->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
        Route::post('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');
        Route::get('/bookings', [CustomerController::class, 'bookings'])->name('bookings');
        Route::get('/bookings/{booking}', [CustomerController::class, 'showBooking'])->name('bookings.show');
        Route::post('/bookings/{booking}/cancel', [CustomerController::class, 'cancelBooking'])->name('bookings.cancel');
        Route::get('/services', [CustomerController::class, 'services'])->name('services');
        Route::get('/services/{service}', [CustomerController::class, 'showService'])->name('services.show');
        Route::get('/services/{service}/book', [CustomerController::class, 'createBooking'])->name('services.book');
        Route::post('/services/{service}/book', [CustomerController::class, 'storeBooking'])->name('services.book.store');
        Route::get('/notifications', [CustomerController::class, 'notifications'])->name('notifications');
    });
});

// Technician Authentication Routes
Route::prefix('technician')->name('technician.')->group(function () {
    // Public routes
    Route::get('/register', [TechnicianAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [TechnicianAuthController::class, 'register'])->name('register.post');
    Route::get('/login', [TechnicianAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [TechnicianAuthController::class, 'login'])->name('login.post');
    Route::get('/forgot-password', [TechnicianAuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [TechnicianAuthController::class, 'sendResetLink'])->name('forgot-password.post');
    Route::get('/reset-password', [TechnicianAuthController::class, 'showResetPasswordForm'])->name('reset-password');
    Route::post('/reset-password', [TechnicianAuthController::class, 'resetPassword'])->name('reset-password.post');
    Route::post('/send-otp', [TechnicianAuthController::class, 'sendOtp'])->name('send-otp');
    Route::post('/verify-otp', [TechnicianAuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/logout', [TechnicianAuthController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware(['auth:technician'])->group(function () {
        Route::get('/dashboard', [TechnicianController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [TechnicianController::class, 'profile'])->name('profile');
        Route::post('/profile', [TechnicianController::class, 'updateProfile'])->name('profile.update');
        Route::get('/bookings', [TechnicianController::class, 'bookings'])->name('bookings');
        Route::get('/bookings/{booking}', [TechnicianController::class, 'showBooking'])->name('bookings.show');
        Route::post('/bookings/{booking}/accept', [TechnicianController::class, 'acceptBooking'])->name('bookings.accept');
        Route::post('/bookings/{booking}/reject', [TechnicianController::class, 'rejectBooking'])->name('bookings.reject');
        Route::post('/bookings/{booking}/start', [TechnicianController::class, 'startJob'])->name('bookings.start');
        Route::post('/bookings/{booking}/complete', [TechnicianController::class, 'completeJob'])->name('bookings.complete');
        Route::post('/bookings/{booking}/update-notes', [TechnicianController::class, 'updateNotes'])->name('bookings.update-notes');
        Route::post('/availability', [TechnicianController::class, 'updateAvailability'])->name('availability.update');
        Route::get('/notifications', [TechnicianController::class, 'notifications'])->name('notifications');
    });
});

// Include admin routes
require __DIR__.'/admin.php';
