<?php
echo "Testing http://localhost:8000/admin/settings\n";
echo "==========================================\n\n";

// Test using file_get_contents
$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 10,
        'ignore_errors' => true
    ]
]);

$url = 'http://127.0.0.1:8000/admin/settings';
$response = @file_get_contents($url, false, $context);

if ($response === false) {
    echo "❌ Failed to connect to the server\n";
    echo "Make sure the Laravel server is running on port 8000\n";
} else {
    // Get HTTP response code
    $httpCode = 0;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = (int) substr($header, 9, 3);
                break;
            }
        }
    }
    
    echo "✅ HTTP Status Code: $httpCode\n";
    
    if ($httpCode == 200) {
        echo "✅ Page loads successfully!\n";
        echo "✅ No syntax errors found!\n";
        
        // Check if the response contains expected content
        if (strpos($response, 'Settings') !== false) {
            echo "✅ Page contains expected content!\n";
        }
        
        if (strpos($response, 'syntax error') !== false) {
            echo "❌ Syntax error found in response!\n";
        } else {
            echo "✅ No syntax errors in response!\n";
        }
        
    } elseif ($httpCode == 302) {
        echo "⚠️  Redirected (likely to login page)\n";
        echo "This is expected behavior for unauthenticated users\n";
        
    } elseif ($httpCode == 500) {
        echo "❌ Server Error (500)\n";
        echo "This indicates a syntax error or server issue\n";
        
        // Try to extract error details
        if (strpos($response, 'syntax error') !== false) {
            echo "❌ Blade syntax error detected!\n";
        }
        
    } else {
        echo "⚠️  Unexpected status code: $httpCode\n";
    }
    
    // Show first 500 characters of response for debugging
    echo "\nResponse preview:\n";
    echo substr($response, 0, 500) . "...\n";
}

echo "\nDone.\n";
?>

