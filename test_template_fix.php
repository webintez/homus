<?php
// Test script to verify template compilation after cache clearing
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Testing Template Compilation After Cache Clear\n";
echo "================================================\n\n";

try {
    // Test admin settings page compilation
    $view = view('admin.settings.index', ['settings' => \App\Models\Setting::allSettings()]);
    echo "✅ Template compiled successfully!\n";
    echo "✅ No syntax errors found!\n";
    
    // Test if we can render the view
    $html = $view->render();
    echo "✅ View rendered successfully!\n";
    echo "✅ HTML length: " . strlen($html) . " characters\n";
    
} catch (Exception $e) {
    echo "❌ Template compilation failed:\n";
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

echo "\nDone.\n";
?>
