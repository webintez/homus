<?php
/**
 * Database Setup Script for Hostinger
 * Run this after uploading files to set up the database
 */

echo "🗄️  HomeUs - Database Setup for Hostinger\n";
echo "========================================\n\n";

// Check if we can connect to database
try {
    $pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
    echo "✅ Database connection successful\n\n";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    echo "Please update the database credentials in this script\n";
    exit(1);
}

echo "📋 Step 1: Creating tables...\n";

// Read and execute SQL file
$sqlFile = "database_mysql_export.sql";
if (!file_exists($sqlFile)) {
    echo "❌ SQL file not found: $sqlFile\n";
    echo "Please run convert_database.php first\n";
    exit(1);
}

$sql = file_get_contents($sqlFile);
$statements = explode(";", $sql);

foreach ($statements as $statement) {
    $statement = trim($statement);
    if (!empty($statement)) {
        try {
            $pdo->exec($statement);
        } catch (PDOException $e) {
            // Ignore table already exists errors
            if (strpos($e->getMessage(), "already exists") === false) {
                echo "⚠️  Warning: " . $e->getMessage() . "\n";
            }
        }
    }
}

echo "✅ Database setup completed\n\n";

echo "📋 Step 2: Verifying tables...\n";

$tables = [
    "users",
    "customers", 
    "technicians",
    "service_categories",
    "services",
    "bookings",
    "booking_statuses",
    "components",
    "notifications",
    "technician_skills",
    "service_areas",
    "settings",
    "otps"
];

foreach ($tables as $table) {
    try {
        $result = $pdo->query("SELECT COUNT(*) FROM $table");
        $count = $result->fetchColumn();
        echo "✅ Table $table: $count records\n";
    } catch (PDOException $e) {
        echo "❌ Table $table: " . $e->getMessage() . "\n";
    }
}

echo "\n🎉 Database setup completed successfully!\n";
echo "Next steps:\n";
echo "1. Update .env file with correct database credentials\n";
echo "2. Run: php artisan key:generate\n";
echo "3. Run: php artisan migrate --force\n";
echo "4. Run: php artisan storage:link\n";
echo "5. Run: php artisan config:cache\n";
?>