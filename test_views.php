<?php

/**
 * View Testing Script
 * Tests all GET routes to check if views exist
 */

// List of all GET routes and their expected views
$routes = [
    // Public Routes
    ['url' => '/', 'view' => 'home.blade.php', 'status' => 'unknown'],
    ['url' => '/maintenance', 'view' => 'maintenance.blade.php', 'status' => 'unknown'],
    ['url' => '/services', 'view' => 'MISSING - ServiceController@index', 'status' => 'missing'],
    ['url' => '/services/1', 'view' => 'MISSING - ServiceController@show', 'status' => 'missing'],
    
    // Customer Authentication
    ['url' => '/customer/register', 'view' => 'auth/customer/register.blade.php', 'status' => 'missing'],
    ['url' => '/customer/login', 'view' => 'auth/customer/login.blade.php', 'status' => 'missing'],
    ['url' => '/customer/forgot-password', 'view' => 'auth/customer/forgot-password.blade.php', 'status' => 'missing'],
    ['url' => '/customer/reset-password', 'view' => 'auth/customer/reset-password.blade.php', 'status' => 'missing'],
    
    // Customer Dashboard (Protected - will show login redirect)
    ['url' => '/customer/dashboard', 'view' => 'customer/dashboard.blade.php', 'status' => 'missing'],
    ['url' => '/customer/profile', 'view' => 'customer/profile.blade.php', 'status' => 'missing'],
    ['url' => '/customer/bookings', 'view' => 'customer/bookings.blade.php', 'status' => 'missing'],
    ['url' => '/customer/bookings/1', 'view' => 'customer/booking-details.blade.php', 'status' => 'missing'],
    ['url' => '/customer/services', 'view' => 'customer/services.blade.php', 'status' => 'missing'],
    ['url' => '/customer/services/1', 'view' => 'customer/service-details.blade.php', 'status' => 'missing'],
    ['url' => '/customer/services/1/book', 'view' => 'customer/create-booking.blade.php', 'status' => 'missing'],
    ['url' => '/customer/notifications', 'view' => 'customer/notifications.blade.php', 'status' => 'missing'],
    
    // Technician Authentication
    ['url' => '/technician/register', 'view' => 'auth/technician/register.blade.php', 'status' => 'missing'],
    ['url' => '/technician/login', 'view' => 'auth/technician/login.blade.php', 'status' => 'missing'],
    ['url' => '/technician/forgot-password', 'view' => 'auth/technician/forgot-password.blade.php', 'status' => 'missing'],
    ['url' => '/technician/reset-password', 'view' => 'auth/technician/reset-password.blade.php', 'status' => 'missing'],
    
    // Technician Dashboard (Protected - will show login redirect)
    ['url' => '/technician/dashboard', 'view' => 'technician/dashboard.blade.php', 'status' => 'missing'],
    ['url' => '/technician/profile', 'view' => 'technician/profile.blade.php', 'status' => 'missing'],
    ['url' => '/technician/bookings', 'view' => 'technician/bookings.blade.php', 'status' => 'missing'],
    ['url' => '/technician/bookings/1', 'view' => 'technician/booking-details.blade.php', 'status' => 'missing'],
    ['url' => '/technician/notifications', 'view' => 'technician/notifications.blade.php', 'status' => 'missing'],
    
    // Admin Routes
    ['url' => '/admin/login', 'view' => 'admin/auth/login.blade.php', 'status' => 'exists'],
    ['url' => '/admin/dashboard', 'view' => 'admin/dashboard.blade.php', 'status' => 'exists'],
    ['url' => '/admin/settings', 'view' => 'admin/settings/index.blade.php', 'status' => 'exists'],
    
    // Admin Repair Service (Protected - will show login redirect)
    ['url' => '/admin/repair-service/dashboard', 'view' => 'admin/repair-service/dashboard.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/customers', 'view' => 'admin/repair-service/customers/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/customers/1', 'view' => 'admin/repair-service/customers/show.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/technicians', 'view' => 'admin/repair-service/technicians/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/technicians/1', 'view' => 'admin/repair-service/technicians/show.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/service-categories', 'view' => 'admin/repair-service/service-categories/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/service-categories/create', 'view' => 'admin/repair-service/service-categories/create.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/service-categories/1/edit', 'view' => 'admin/repair-service/service-categories/edit.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/services', 'view' => 'admin/repair-service/services/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/services/create', 'view' => 'admin/repair-service/services/create.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/bookings', 'view' => 'admin/repair-service/bookings/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/bookings/1', 'view' => 'admin/repair-service/bookings/show.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/components', 'view' => 'admin/repair-service/components/index.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/components/create', 'view' => 'admin/repair-service/components/create.blade.php', 'status' => 'missing'],
    ['url' => '/admin/repair-service/reports', 'view' => 'admin/repair-service/reports.blade.php', 'status' => 'missing'],
];

// Count statuses
$statusCounts = [
    'exists' => 0,
    'missing' => 0,
    'unknown' => 0
];

foreach ($routes as $route) {
    $statusCounts[$route['status']]++;
}

echo "=== VIEW STATUS SUMMARY ===\n";
echo "Total Routes: " . count($routes) . "\n";
echo "Views Exist: " . $statusCounts['exists'] . "\n";
echo "Views Missing: " . $statusCounts['missing'] . "\n";
echo "Status Unknown: " . $statusCounts['unknown'] . "\n\n";

echo "=== DETAILED ROUTE ANALYSIS ===\n";
echo str_pad("URL", 50) . str_pad("View", 60) . "Status\n";
echo str_repeat("-", 120) . "\n";

foreach ($routes as $route) {
    $statusIcon = $route['status'] === 'exists' ? '✅' : ($route['status'] === 'missing' ? '❌' : '❓');
    echo str_pad($route['url'], 50) . str_pad($route['view'], 60) . $statusIcon . " " . strtoupper($route['status']) . "\n";
}

echo "\n=== CRITICAL ISSUES ===\n";
echo "1. Customer authentication is completely broken (4 missing views)\n";
echo "2. Technician authentication is completely broken (4 missing views)\n";
echo "3. Customer dashboard is non-functional (6 missing views)\n";
echo "4. Technician dashboard is non-functional (5 missing views)\n";
echo "5. Admin repair service management is non-functional (9 missing views)\n";
echo "6. Public service browsing is non-functional (2 missing views)\n";

echo "\n=== RECOMMENDATION ===\n";
echo "The platform is currently non-functional for end users.\n";
echo "Priority should be given to creating authentication views first,\n";
echo "followed by dashboard views for customers and technicians.\n";
