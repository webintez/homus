<?php
/**
 * Hostinger Deployment Script
 * Prepares the application for deployment to Hostinger
 */

echo "🚀 HomeUs - Hostinger Deployment Preparation\n";
echo "==========================================\n\n";

// Check if we're in the right directory
if (!file_exists('artisan')) {
    echo "❌ Error: This script must be run from the Laravel root directory\n";
    exit(1);
}

echo "📋 Step 1: Creating production environment file...\n";

// Create production .env file
$envContent = 'APP_NAME="HomeUs - Professional Appliance Repair"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=https://yourdomain.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
SESSION_SECURE_COOKIE=false
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=lax

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=587
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"';

file_put_contents('.env.production', $envContent);
echo "✅ Created .env.production file\n\n";

echo "📋 Step 2: Creating .htaccess for Hostinger...\n";

// Create .htaccess for Hostinger
$htaccessContent = '<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Handle Angular and other client-side routing
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

# Security headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Cache static assets
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType image/gif "access plus 1 month"
    ExpiresByType image/svg+xml "access plus 1 month"
</IfModule>

# Compress files
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>';

file_put_contents('.htaccess', $htaccessContent);
echo "✅ Created .htaccess file\n\n";

echo "📋 Step 3: Creating deployment checklist...\n";

$checklistContent = '# Hostinger Deployment Checklist

## Pre-Deployment
- [ ] Test application locally
- [ ] Backup current database
- [ ] Update .env.production with correct values
- [ ] Run: php convert_database.php

## File Upload
- [ ] Upload all files to public_html
- [ ] Set correct file permissions (755 for directories, 644 for files)
- [ ] Rename .env.production to .env
- [ ] Create storage/app/public directory
- [ ] Set storage directory permissions to 755

## Database Setup
- [ ] Create MySQL database in cPanel
- [ ] Create database user
- [ ] Import database_mysql_export.sql
- [ ] Test database connection

## Application Setup
- [ ] Run: php artisan key:generate
- [ ] Run: php artisan migrate --force
- [ ] Run: php artisan storage:link
- [ ] Run: php artisan config:cache
- [ ] Run: php artisan route:cache
- [ ] Run: php artisan view:cache

## Testing
- [ ] Test homepage loads
- [ ] Test admin login
- [ ] Test customer login
- [ ] Test service creation
- [ ] Test image uploads
- [ ] Test booking functionality
- [ ] Test all pages load correctly

## Security
- [ ] Enable SSL certificate
- [ ] Set APP_DEBUG=false
- [ ] Verify file permissions
- [ ] Test error pages

## Performance
- [ ] Enable Gzip compression
- [ ] Set up caching
- [ ] Optimize images
- [ ] Test page load speeds';

file_put_contents('DEPLOYMENT_CHECKLIST.md', $checklistContent);
echo "✅ Created deployment checklist\n\n";

echo "📋 Step 4: Creating file upload guide...\n";

$uploadGuideContent = '# File Upload Guide for Hostinger

## Files to Upload

### Required Directories
```
app/
bootstrap/
config/
database/
resources/
routes/
storage/
vendor/
```

### Required Files
```
artisan
composer.json
composer.lock
.env.production (rename to .env)
.htaccess
database_mysql_export.sql
```

### Public Directory
```
public/
├── index.php
├── .htaccess
├── storage/ (symlink to ../storage/app/public)
└── assets/
```

## Upload Instructions

1. **Via cPanel File Manager:**
   - Login to cPanel
   - Go to File Manager
   - Navigate to public_html
   - Upload all files and directories

2. **Via FTP:**
   - Use FileZilla or similar FTP client
   - Connect to your Hostinger FTP
   - Upload to public_html directory

3. **Via SSH (if available):**
   - Use rsync or scp to upload files
   - Faster for large uploads

## File Permissions

After upload, set these permissions:
- Directories: 755
- Files: 644
- storage/: 755 (writable)
- bootstrap/cache/: 755 (writable)

## Directory Structure on Hostinger

```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── artisan
├── composer.json
├── composer.lock
├── .env
├── .htaccess
└── public/
    ├── index.php
    ├── .htaccess
    └── storage/ (symlink)
```';

file_put_contents('FILE_UPLOAD_GUIDE.md', $uploadGuideContent);
echo "✅ Created file upload guide\n\n";

echo "📋 Step 5: Creating database setup script...\n";

$dbScriptContent = '<?php
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
?>';

file_put_contents('setup_database.php', $dbScriptContent);
echo "✅ Created database setup script\n\n";

echo "📋 Step 6: Creating optimization script...\n";

$optimizeContent = '<?php
/**
 * Application Optimization Script for Hostinger
 * Run this after deployment to optimize the application
 */

echo "⚡ HomeUs - Application Optimization\n";
echo "===================================\n\n";

// Check if we\'re in the right directory
if (!file_exists(\'artisan\')) {
    echo "❌ Error: This script must be run from the Laravel root directory\n";
    exit(1);
}

echo "📋 Step 1: Generating application key...\n";
exec(\'php artisan key:generate --force\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Application key generated\n";
} else {
    echo "❌ Failed to generate application key\n";
}

echo "\n📋 Step 2: Running migrations...\n";
exec(\'php artisan migrate --force\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Migrations completed\n";
} else {
    echo "❌ Migrations failed\n";
}

echo "\n📋 Step 3: Creating storage link...\n";
exec(\'php artisan storage:link\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Storage link created\n";
} else {
    echo "❌ Failed to create storage link\n";
}

echo "\n📋 Step 4: Caching configuration...\n";
exec(\'php artisan config:cache\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Configuration cached\n";
} else {
    echo "❌ Failed to cache configuration\n";
}

echo "\n📋 Step 5: Caching routes...\n";
exec(\'php artisan route:cache\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Routes cached\n";
} else {
    echo "❌ Failed to cache routes\n";
}

echo "\n📋 Step 6: Caching views...\n";
exec(\'php artisan view:cache\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ Views cached\n";
} else {
    echo "❌ Failed to cache views\n";
}

echo "\n📋 Step 7: Setting file permissions...\n";
exec(\'chmod -R 755 storage bootstrap/cache\', $output, $returnCode);
if ($returnCode === 0) {
    echo "✅ File permissions set\n";
} else {
    echo "❌ Failed to set file permissions\n";
}

echo "\n🎉 Application optimization completed!\n";
echo "Your application should now be running optimally on Hostinger.\n";
?>';

file_put_contents('optimize_app.php', $optimizeContent);
echo "✅ Created optimization script\n\n";

echo "🎉 Deployment preparation completed!\n\n";

echo "📋 Next Steps:\n";
echo "1. Run: php convert_database.php\n";
echo "2. Update .env.production with your Hostinger details\n";
echo "3. Upload all files to Hostinger\n";
echo "4. Import database_mysql_export.sql\n";
echo "5. Run: php optimize_app.php\n\n";

echo "📚 Documentation created:\n";
echo "- HOSTINGER_DEPLOYMENT_GUIDE.md\n";
echo "- DEPLOYMENT_CHECKLIST.md\n";
echo "- FILE_UPLOAD_GUIDE.md\n";
echo "- convert_database.php\n";
echo "- setup_database.php\n";
echo "- optimize_app.php\n\n";

echo "🚀 Ready for deployment to Hostinger!\n";
?>
