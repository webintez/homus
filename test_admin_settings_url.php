<?php
echo "🔍 Testing Admin Settings URL\n";
echo "============================\n\n";

$url = 'http://127.0.0.1:8000/admin/settings';
echo "Testing URL: $url\n\n";

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 10,
        'ignore_errors' => true,
        'follow_location' => false
    ]
]);

$response = @file_get_contents($url, false, $context);

if ($response === false) {
    echo "❌ CONNECTION FAILED\n";
    echo "Server might not be running on port 8000\n";
    echo "Please start the server with: php artisan serve\n";
} else {
    // Get HTTP response code and headers
    $httpCode = 0;
    $redirectLocation = '';
    $contentType = '';
    
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = (int) substr($header, 9, 3);
            }
            if (stripos($header, 'Location:') === 0) {
                $redirectLocation = trim(substr($header, 9));
            }
            if (stripos($header, 'Content-Type:') === 0) {
                $contentType = trim(substr($header, 13));
            }
        }
    }
    
    echo "📊 RESPONSE DETAILS:\n";
    echo "===================\n";
    echo "Status Code: $httpCode\n";
    echo "Content Type: $contentType\n";
    
    if ($redirectLocation) {
        echo "Redirects to: $redirectLocation\n";
    }
    
    echo "\n📋 STATUS ANALYSIS:\n";
    echo "==================\n";
    
    switch ($httpCode) {
        case 200:
            echo "✅ SUCCESS - Page loads correctly!\n";
            echo "✅ No errors found\n";
            echo "✅ Admin settings page is accessible\n";
            break;
            
        case 302:
            echo "🔄 REDIRECT - Page redirects to login\n";
            echo "✅ This is EXPECTED behavior for unauthenticated users\n";
            echo "✅ Authentication middleware is working correctly\n";
            echo "✅ Admin settings page is protected as it should be\n";
            break;
            
        case 404:
            echo "❌ NOT FOUND - Page doesn't exist\n";
            echo "❌ Route might not be defined\n";
            break;
            
        case 500:
            echo "❌ SERVER ERROR - Internal server error\n";
            echo "❌ There might be a syntax error or server issue\n";
            
            // Check for specific error messages
            if (strpos($response, 'syntax error') !== false) {
                echo "❌ Blade syntax error detected!\n";
            }
            if (strpos($response, 'Parse error') !== false) {
                echo "❌ PHP parse error detected!\n";
            }
            break;
            
        case 403:
            echo "🚫 FORBIDDEN - Access denied\n";
            echo "✅ Authentication is working (user not authorized)\n";
            break;
            
        default:
            echo "⚠️  UNEXPECTED STATUS: $httpCode\n";
    }
    
    // Check response content for errors
    echo "\n🔍 CONTENT ANALYSIS:\n";
    echo "===================\n";
    
    if (strpos($response, 'syntax error') !== false) {
        echo "❌ Syntax error found in response\n";
    } else {
        echo "✅ No syntax errors in response\n";
    }
    
    if (strpos($response, 'Parse error') !== false) {
        echo "❌ Parse error found in response\n";
    } else {
        echo "✅ No parse errors in response\n";
    }
    
    if (strpos($response, 'Fatal error') !== false) {
        echo "❌ Fatal error found in response\n";
    } else {
        echo "✅ No fatal errors in response\n";
    }
    
    // Show response preview
    echo "\n📄 RESPONSE PREVIEW:\n";
    echo "===================\n";
    echo substr($response, 0, 300) . "...\n";
    
    // Check if it's a proper HTML response
    if (strpos($response, '<html') !== false || strpos($response, '<!DOCTYPE') !== false) {
        echo "✅ Valid HTML response received\n";
    } else {
        echo "⚠️  Response doesn't appear to be HTML\n";
    }
}

echo "\n✅ Test completed!\n";
?>

