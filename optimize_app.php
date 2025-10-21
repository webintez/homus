<?php
/**
 * Application Optimization Script for Hostinger
 * Run this after deployment to optimize the application
 */

echo "⚡ HomeUs - Application Optimization\n";
echo "===================================\n\n";

// Check if we're in the right directory
if (!file_exists('artisan')) {
    echo "❌ Error: This script must be run from the Laravel root directory\n";
    exit(1);
}

echo "📋 Step 1: Generating application key...\n";
exec('php artisan key:generate --force', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Application key generated\n";
} else {
    echo "❌ Failed to generate application key\n";
}

echo "\n📋 Step 2: Running migrations...\n";
exec('php artisan migrate --force', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Migrations completed\n";
} else {
    echo "❌ Migrations failed\n";
}

echo "\n📋 Step 3: Creating storage link...\n";
exec('php artisan storage:link', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Storage link created\n";
} else {
    echo "❌ Failed to create storage link\n";
}

echo "\n📋 Step 4: Caching configuration...\n";
exec('php artisan config:cache', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Configuration cached\n";
} else {
    echo "❌ Failed to cache configuration\n";
}

echo "\n📋 Step 5: Caching routes...\n";
exec('php artisan route:cache', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Routes cached\n";
} else {
    echo "❌ Failed to cache routes\n";
}

echo "\n📋 Step 6: Caching views...\n";
exec('php artisan view:cache', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Views cached\n";
} else {
    echo "❌ Failed to cache views\n";
}

echo "\n📋 Step 7: Setting file permissions...\n";
exec('chmod -R 755 storage bootstrap/cache', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ File permissions set\n";
} else {
    echo "❌ Failed to set file permissions\n";
}

echo "\n🎉 Application optimization completed!\n";
echo "Your application should now be running optimally on Hostinger.\n";
?>