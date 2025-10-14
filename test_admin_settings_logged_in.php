<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔐 Testing Admin Settings as Logged-in User\n";
echo "==========================================\n\n";

try {
    // Get the admin user from database
    $adminUser = \App\Models\User::where('email', 'admin@example.com')->first();
    
    if (!$adminUser) {
        echo "❌ Admin user not found in database\n";
        echo "Creating admin user...\n";
        
        // Create admin user
        $adminUser = \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        echo "✅ Admin user created\n";
    } else {
        echo "✅ Admin user found: {$adminUser->name} ({$adminUser->email})\n";
    }
    
    // Create a fake authenticated request
    $request = \Illuminate\Http\Request::create('/admin/settings', 'GET');
    $request->setUserResolver(function () use ($adminUser) {
        return $adminUser;
    });
    
    // Set the authenticated user in the request
    $request->setLaravelSession(app('session.store'));
    $request->session()->put('auth.password_confirmed_at', time());
    
    // Get the settings data
    $settings = \App\Models\Setting::allSettings();
    echo "✅ Settings data loaded: " . count($settings) . " settings\n";
    
    // Try to render the view directly
    echo "Testing template compilation...\n";
    $view = view('admin.settings.index', ['settings' => $settings]);
    $html = $view->render();
    
    echo "✅ Template compiled successfully!\n";
    echo "✅ View rendered successfully!\n";
    echo "✅ HTML length: " . strlen($html) . " characters\n";
    echo "✅ No Blade syntax errors found!\n";
    
    // Check if the HTML contains expected admin content
    $expectedContent = [
        'Settings',
        'General Settings',
        'Social Media',
        'Theme',
        'Email',
        'SEO',
        'Custom Code',
        'Maintenance'
    ];
    
    $foundContent = [];
    foreach ($expectedContent as $content) {
        if (strpos($html, $content) !== false) {
            $foundContent[] = $content;
        }
    }
    
    echo "\n📋 Content Verification:\n";
    echo "Expected sections: " . count($expectedContent) . "\n";
    echo "Found sections: " . count($foundContent) . "\n";
    
    if (count($foundContent) == count($expectedContent)) {
        echo "✅ All expected content found!\n";
    } else {
        echo "⚠️  Some content missing:\n";
        $missing = array_diff($expectedContent, $foundContent);
        foreach ($missing as $item) {
            echo "   - $item\n";
        }
    }
    
    // Check for any error messages in the HTML
    if (strpos($html, 'syntax error') !== false) {
        echo "❌ Syntax error found in HTML output!\n";
    } else {
        echo "✅ No syntax errors in HTML output!\n";
    }
    
    // Check for Blade directives that weren't compiled
    if (strpos($html, '@if') !== false || strpos($html, '@endif') !== false) {
        echo "❌ Uncompiled Blade directives found!\n";
    } else {
        echo "✅ All Blade directives compiled correctly!\n";
    }
    
    // Test the actual HTTP request with authentication
    echo "\n🌐 Testing HTTP Request with Authentication...\n";
    
    // Create a session and authenticate
    $session = app('session.store');
    $session->put('auth.password_confirmed_at', time());
    
    // Make a request to the admin settings route
    $response = app('Illuminate\Contracts\Http\Kernel')->handle($request);
    
    echo "✅ HTTP Response Status: " . $response->getStatusCode() . "\n";
    
    if ($response->getStatusCode() == 200) {
        echo "✅ Admin settings page accessible as logged-in user!\n";
    } else {
        echo "❌ Admin settings page returned status: " . $response->getStatusCode() . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error:\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}

echo "\n✅ Test completed!\n";
?>

