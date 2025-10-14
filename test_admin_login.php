<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Testing Admin Settings Page Access\n";
echo "=====================================\n\n";

try {
    // Create a fake request and response to simulate admin access
    $request = \Illuminate\Http\Request::create('/admin/settings', 'GET');
    
    // Get settings data
    $settings = \App\Models\Setting::allSettings();
    
    // Try to render the view directly (this will catch syntax errors)
    $view = view('admin.settings.index', ['settings' => $settings]);
    $html = $view->render();
    
    echo "✅ Template compiled successfully!\n";
    echo "✅ View rendered successfully!\n";
    echo "✅ HTML length: " . strlen($html) . " characters\n";
    echo "✅ No Blade syntax errors found!\n";
    
    // Check if the HTML contains expected content
    if (strpos($html, 'Settings') !== false) {
        echo "✅ Page contains expected content!\n";
    }
    
    if (strpos($html, '@if') !== false || strpos($html, '@endif') !== false) {
        echo "❌ Uncompiled Blade directives found in output!\n";
    } else {
        echo "✅ All Blade directives compiled correctly!\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error:\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

echo "\nDone.\n";
?>
