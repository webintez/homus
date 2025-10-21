# Hostinger Deployment Checklist

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
- [ ] Test page load speeds