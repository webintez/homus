# File Upload Guide for Hostinger

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
```