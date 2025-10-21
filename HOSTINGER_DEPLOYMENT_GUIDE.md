# 🚀 Hostinger Deployment Guide for HomeUs

## 📋 Prerequisites

1. **Hostinger Account** with:
   - Shared Hosting or VPS plan
   - PHP 8.2+ support
   - MySQL database
   - cPanel access

2. **Local Development Environment**:
   - Your current Laravel application
   - Database backup
   - File manager access

## 🎯 Quick Deployment Steps

### Step 1: Prepare Your Application

#### 1.1 Create Production Environment File
```bash
# Copy your current .env file
cp .env .env.production

# Edit .env.production with production settings
```

#### 1.2 Update .env.production
```env
APP_NAME="HomeUs - Professional Appliance Repair"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Step 2: Database Migration

#### 2.1 Export Current Database
```bash
# Export SQLite database to SQL
php artisan db:export --database=sqlite --file=database_backup.sql
```

#### 2.2 Create MySQL Migration Script
```sql
-- Run this in your Hostinger MySQL database
-- Convert SQLite to MySQL format
```

### Step 3: File Upload

#### 3.1 Upload Files via cPanel File Manager
```
Upload these directories to public_html:
- app/
- bootstrap/
- config/
- database/
- resources/
- routes/
- storage/
- vendor/
- artisan
- composer.json
- composer.lock
- .env.production (rename to .env)
```

#### 3.2 Set Permissions
```bash
# Set proper permissions
chmod 755 storage/
chmod 755 bootstrap/cache/
chmod 644 .env
```

### Step 4: Database Setup

#### 4.1 Create MySQL Database
1. Go to cPanel → MySQL Databases
2. Create new database: `your_database_name`
3. Create user: `your_database_username`
4. Assign user to database with full privileges

#### 4.2 Import Database
1. Go to phpMyAdmin
2. Select your database
3. Import the converted SQL file

### Step 5: Application Configuration

#### 5.1 Generate Application Key
```bash
# In cPanel Terminal or SSH
php artisan key:generate
```

#### 5.2 Run Migrations
```bash
php artisan migrate --force
```

#### 5.3 Create Storage Link
```bash
php artisan storage:link
```

#### 5.4 Clear Caches
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔧 Detailed Configuration

### File Structure on Hostinger
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
└── public/
    ├── index.php
    ├── storage/ (symlink)
    └── assets/
```

### .htaccess Configuration
Create `.htaccess` in public_html root:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### Database Conversion Script
```php
// Convert SQLite to MySQL
// Run this locally before uploading
```

## 🚨 Important Notes

1. **File Permissions**: Ensure storage and cache directories are writable
2. **Database**: Convert SQLite to MySQL format
3. **Environment**: Use production environment settings
4. **Security**: Disable debug mode in production
5. **Storage**: Create symbolic link for file uploads

## 🔍 Troubleshooting

### Common Issues:
1. **500 Error**: Check file permissions and .env configuration
2. **Database Error**: Verify MySQL credentials and connection
3. **Storage Error**: Ensure storage link is created
4. **Cache Error**: Clear all caches

### Debug Steps:
1. Check error logs in cPanel
2. Verify file permissions
3. Test database connection
4. Clear application caches

## 📞 Support

If you encounter issues:
1. Check Hostinger documentation
2. Verify PHP version compatibility
3. Ensure all requirements are met
4. Contact Hostinger support if needed

## ✅ Post-Deployment Checklist

- [ ] Application loads without errors
- [ ] Database connection works
- [ ] File uploads work
- [ ] All pages load correctly
- [ ] Admin panel accessible
- [ ] Customer portal works
- [ ] Image uploads functional
- [ ] Email functionality works
- [ ] SSL certificate active
- [ ] Performance optimized
