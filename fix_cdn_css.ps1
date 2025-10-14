# PowerShell script to fix CDN Tailwind CSS imports
# Replace CDN imports with proper Vite CSS loading

$files = @(
    "resources\views\auth\customer\forgot-password.blade.php",
    "resources\views\auth\customer\register.blade.php",
    "resources\views\auth\customer\reset-password.blade.php",
    "resources\views\auth\technician\forgot-password.blade.php",
    "resources\views\auth\technician\login.blade.php",
    "resources\views\auth\technician\register.blade.php",
    "resources\views\auth\technician\reset-password.blade.php",
    "resources\views\customer\booking-details.blade.php",
    "resources\views\customer\bookings.blade.php",
    "resources\views\customer\create-booking.blade.php",
    "resources\views\customer\dashboard.blade.php",
    "resources\views\customer\notifications.blade.php",
    "resources\views\customer\profile.blade.php",
    "resources\views\customer\service-details.blade.php",
    "resources\views\customer\services.blade.php",
    "resources\views\technician\booking-details.blade.php",
    "resources\views\technician\bookings.blade.php",
    "resources\views\technician\dashboard.blade.php",
    "resources\views\technician\notifications.blade.php",
    "resources\views\technician\profile.blade.php"
)

foreach ($file in $files) {
    if (Test-Path $file) {
        Write-Host "Processing: $file"
        
        # Read file content
        $content = Get-Content $file -Raw
        
        # Replace CDN Tailwind CSS with Vite CSS
        $content = $content -replace '<script src="https://cdn\.tailwindcss\.com"></script>', ''
        
        # Replace Google Fonts with Bunny Fonts
        $content = $content -replace '<link href="https://fonts\.googleapis\.com/css2\?family=Inter:wght@300;400;500;600;700[^"]*" rel="stylesheet">', ''
        
        # Add proper font and CSS loading if not already present
        if ($content -notmatch 'fonts\.bunny\.net') {
            $content = $content -replace '(<head>)', '$1
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @vite([''resources/css/app.css'', ''resources/js/app.js''])'
        }
        
        # Remove font-family declarations from style tags
        $content = $content -replace "body\s*\{\s*font-family:\s*['\`"]Inter['\`"],\s*sans-serif;\s*\}", ""
        
        # Write back to file
        Set-Content $file -Value $content -NoNewline
        
        Write-Host "Fixed: $file"
    } else {
        Write-Host "File not found: $file"
    }
}

Write-Host "CDN CSS fix completed!"
