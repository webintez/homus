<?php
/**
 * Database Conversion Script
 * Converts SQLite database to MySQL format for Hostinger deployment
 */

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Load Laravel application
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Starting database conversion from SQLite to MySQL...\n\n";

try {
    // Get all tables from SQLite
    $tables = DB::connection('sqlite')->select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
    
    echo "📋 Found " . count($tables) . " tables to convert:\n";
    foreach ($tables as $table) {
        echo "  - " . $table->name . "\n";
    }
    echo "\n";
    
    // Create SQL dump file
    $sqlFile = 'database_mysql_export.sql';
    $file = fopen($sqlFile, 'w');
    
    if (!$file) {
        throw new Exception("Cannot create SQL file");
    }
    
    // Write MySQL header
    fwrite($file, "-- MySQL Database Export for HomeUs\n");
    fwrite($file, "-- Generated on: " . date('Y-m-d H:i:s') . "\n\n");
    fwrite($file, "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n");
    fwrite($file, "SET AUTOCOMMIT = 0;\n");
    fwrite($file, "START TRANSACTION;\n");
    fwrite($file, "SET time_zone = \"+00:00\";\n\n");
    
    foreach ($tables as $table) {
        $tableName = $table->name;
        echo "🔄 Converting table: $tableName\n";
        
        // Get table structure
        $columns = DB::connection('sqlite')->select("PRAGMA table_info($tableName)");
        
        // Create CREATE TABLE statement
        fwrite($file, "DROP TABLE IF EXISTS `$tableName`;\n");
        fwrite($file, "CREATE TABLE `$tableName` (\n");
        
        $columnDefinitions = [];
        $primaryKeys = [];
        
        foreach ($columns as $column) {
            $name = $column->name;
            $type = $column->type;
            $notNull = $column->notnull ? 'NOT NULL' : 'NULL';
            $default = $column->dflt_value !== null ? "DEFAULT '" . addslashes($column->dflt_value) . "'" : '';
            $primaryKey = $column->pk ? 'AUTO_INCREMENT PRIMARY KEY' : '';
            
            // Convert SQLite types to MySQL types
            $mysqlType = convertSqliteTypeToMysql($type);
            
            $columnDef = "  `$name` $mysqlType $notNull $default $primaryKey";
            $columnDefinitions[] = trim($columnDef);
            
            if ($column->pk) {
                $primaryKeys[] = $name;
            }
        }
        
        fwrite($file, implode(",\n", $columnDefinitions));
        
        // Add primary key if not already defined
        if (empty($primaryKeys)) {
            fwrite($file, ",\n  PRIMARY KEY (`id`)");
        }
        
        fwrite($file, "\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n");
        
        // Get table data
        $rows = DB::connection('sqlite')->table($tableName)->get();
        
        if ($rows->count() > 0) {
            echo "  📊 Converting " . $rows->count() . " rows...\n";
            
            foreach ($rows as $row) {
                $values = [];
                foreach ($row as $key => $value) {
                    if ($value === null) {
                        $values[] = 'NULL';
                    } else {
                        $values[] = "'" . addslashes($value) . "'";
                    }
                }
                
                fwrite($file, "INSERT INTO `$tableName` VALUES (" . implode(', ', $values) . ");\n");
            }
            fwrite($file, "\n");
        }
    }
    
    fwrite($file, "COMMIT;\n");
    fclose($file);
    
    echo "\n✅ Database conversion completed!\n";
    echo "📁 SQL file created: $sqlFile\n";
    echo "📊 File size: " . formatBytes(filesize($sqlFile)) . "\n\n";
    
    echo "🚀 Next steps:\n";
    echo "1. Upload the $sqlFile to your Hostinger server\n";
    echo "2. Import it into your MySQL database via phpMyAdmin\n";
    echo "3. Update your .env file with MySQL credentials\n";
    echo "4. Run: php artisan migrate --force\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}

/**
 * Convert SQLite data types to MySQL data types
 */
function convertSqliteTypeToMysql($sqliteType) {
    $type = strtoupper($sqliteType);
    
    switch ($type) {
        case 'INTEGER':
        case 'INT':
            return 'INT(11)';
        case 'TEXT':
            return 'TEXT';
        case 'VARCHAR':
            return 'VARCHAR(255)';
        case 'REAL':
        case 'FLOAT':
        case 'DOUBLE':
            return 'DECIMAL(10,2)';
        case 'BLOB':
            return 'LONGBLOB';
        case 'BOOLEAN':
            return 'TINYINT(1)';
        case 'DATETIME':
            return 'DATETIME';
        case 'DATE':
            return 'DATE';
        case 'TIME':
            return 'TIME';
        case 'TIMESTAMP':
            return 'TIMESTAMP';
        default:
            return 'TEXT';
    }
}

/**
 * Format bytes to human readable format
 */
function formatBytes($size, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    
    for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
        $size /= 1024;
    }
    
    return round($size, $precision) . ' ' . $units[$i];
}
