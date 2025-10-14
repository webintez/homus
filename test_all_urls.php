<?php
echo "🔍 Testing All GET URLs and Status Codes\n";
echo "=======================================\n\n";

// Test URLs
$urls = [
    // Public URLs
    'http://127.0.0.1:8000/' => 'Home Page',
    'http://127.0.0.1:8000/maintenance' => 'Maintenance Page',
    
    // Admin URLs (should redirect to login)
    'http://127.0.0.1:8000/admin' => 'Admin Dashboard',
    'http://127.0.0.1:8000/admin/login' => 'Admin Login',
    'http://127.0.0.1:8000/admin/settings' => 'Admin Settings',
    'http://127.0.0.1:8000/admin/dashboard' => 'Admin Dashboard',
    
    // API/Route URLs
    'http://127.0.0.1:8000/api' => 'API Endpoint',
];

$results = [];
$totalUrls = count($urls);
$successCount = 0;
$errorCount = 0;

echo "Testing $totalUrls URLs...\n\n";

foreach ($urls as $url => $description) {
    echo "Testing: $description\n";
    echo "URL: $url\n";
    
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 10,
            'ignore_errors' => true,
            'follow_location' => false  // Don't follow redirects automatically
        ]
    ]);
    
    $response = @file_get_contents($url, false, $context);
    $httpCode = 0;
    $finalUrl = $url;
    $redirectLocation = '';
    
    // Get HTTP response code and headers
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = (int) substr($header, 9, 3);
            }
            if (stripos($header, 'Location:') === 0) {
                $redirectLocation = trim(substr($header, 9));
                $finalUrl = $redirectLocation;
            }
        }
    }
    
    $status = '';
    $statusIcon = '';
    
    if ($response === false) {
        $status = 'CONNECTION FAILED';
        $statusIcon = '❌';
        $errorCount++;
    } else {
        switch ($httpCode) {
            case 200:
                $status = 'OK';
                $statusIcon = '✅';
                $successCount++;
                break;
            case 302:
                $status = 'REDIRECT';
                $statusIcon = '🔄';
                $successCount++;
                break;
            case 404:
                $status = 'NOT FOUND';
                $statusIcon = '❌';
                $errorCount++;
                break;
            case 500:
                $status = 'SERVER ERROR';
                $statusIcon = '❌';
                $errorCount++;
                break;
            case 403:
                $status = 'FORBIDDEN';
                $statusIcon = '🚫';
                $successCount++;
                break;
            default:
                $status = "HTTP $httpCode";
                $statusIcon = '⚠️';
                $successCount++;
        }
    }
    
    $results[] = [
        'url' => $url,
        'description' => $description,
        'status_code' => $httpCode,
        'status' => $status,
        'icon' => $statusIcon,
        'redirect' => $redirectLocation,
        'final_url' => $finalUrl
    ];
    
    echo "Status: $statusIcon $status ($httpCode)\n";
    if ($redirectLocation) {
        echo "Redirects to: $redirectLocation\n";
    }
    echo "---\n\n";
}

// Summary
echo "📊 SUMMARY\n";
echo "==========\n";
echo "Total URLs tested: $totalUrls\n";
echo "Successful responses: $successCount\n";
echo "Errors: $errorCount\n\n";

// Detailed results table
echo "📋 DETAILED RESULTS\n";
echo "===================\n";
echo sprintf("%-50s %-20s %-10s %-15s %s\n", "URL", "Description", "Status", "Code", "Notes");
echo str_repeat("-", 100) . "\n";

foreach ($results as $result) {
    $notes = '';
    if ($result['redirect']) {
        $notes = 'Redirects to: ' . $result['redirect'];
    } elseif ($result['status_code'] == 0) {
        $notes = 'Connection failed';
    }
    
    echo sprintf("%-50s %-20s %-10s %-15s %s\n", 
        substr($result['url'], 0, 49),
        substr($result['description'], 0, 19),
        $result['status'],
        $result['status_code'],
        $notes
    );
}

echo "\n✅ Test completed!\n";
?>

