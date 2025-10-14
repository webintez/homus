<?php
echo "🔧 Troubleshooting Admin Settings Access\n";
echo "=======================================\n\n";

// Test 1: Check if server is running
echo "1. Checking if Laravel server is running...\n";
$url = 'http://127.0.0.1:8000/';
$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 5,
        'ignore_errors' => true
    ]
]);

$response = @file_get_contents($url, false, $context);
if ($response === false) {
    echo "❌ Server is NOT running on port 8000\n";
    echo "Please start the server with: php artisan serve\n";
    exit;
} else {
    echo "✅ Server is running on port 8000\n";
}

// Test 2: Check admin settings URL specifically
echo "\n2. Testing admin settings URL...\n";
$adminUrl = 'http://127.0.0.1:8000/admin/settings';
$response = @file_get_contents($adminUrl, false, $context);

if ($response === false) {
    echo "❌ Cannot access admin settings URL\n";
    echo "Possible issues:\n";
    echo "- Route not defined\n";
    echo "- Server error\n";
    echo "- Network issue\n";
} else {
    $httpCode = 0;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = (int) substr($header, 9, 3);
                break;
            }
        }
    }
    
    echo "✅ Admin settings URL is accessible\n";
    echo "Status Code: $httpCode\n";
    
    if ($httpCode == 302) {
        echo "✅ Redirecting to login (expected behavior)\n";
    } elseif ($httpCode == 200) {
        echo "✅ Page loads successfully\n";
    } elseif ($httpCode == 404) {
        echo "❌ Route not found - check routes\n";
    } elseif ($httpCode == 500) {
        echo "❌ Server error - check logs\n";
    }
}

// Test 3: Check routes
echo "\n3. Checking available routes...\n";
$routes = [
    'http://127.0.0.1:8000/' => 'Home',
    'http://127.0.0.1:8000/admin' => 'Admin Root',
    'http://127.0.0.1:8000/admin/login' => 'Admin Login',
    'http://127.0.0.1:8000/admin/dashboard' => 'Admin Dashboard',
    'http://127.0.0.1:8000/admin/settings' => 'Admin Settings'
];

foreach ($routes as $url => $name) {
    $response = @file_get_contents($url, false, $context);
    if ($response === false) {
        echo "❌ $name ($url) - Not accessible\n";
    } else {
        $httpCode = 0;
        if (isset($http_response_header)) {
            foreach ($http_response_header as $header) {
                if (strpos($header, 'HTTP/') === 0) {
                    $httpCode = (int) substr($header, 9, 3);
                    break;
                }
            }
        }
        echo "✅ $name ($url) - Status: $httpCode\n";
    }
}

// Test 4: Check if there are any server errors
echo "\n4. Checking for server errors...\n";
$errorUrl = 'http://127.0.0.1:8000/admin/settings';
$response = @file_get_contents($errorUrl, false, $context);

if ($response && strpos($response, 'error') !== false) {
    echo "❌ Error found in response:\n";
    echo substr($response, 0, 500) . "\n";
} else {
    echo "✅ No obvious errors in response\n";
}

echo "\n🔍 DIAGNOSIS:\n";
echo "=============\n";

if ($response === false) {
    echo "❌ CANNOT ACCESS - Server might not be running\n";
    echo "Solution: Run 'php artisan serve' in terminal\n";
} else {
    $httpCode = 0;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = (int) substr($header, 9, 3);
                break;
            }
        }
    }
    
    if ($httpCode == 302) {
        echo "✅ WORKING - Redirects to login (normal behavior)\n";
        echo "To access: Login first at http://localhost:8000/admin/login\n";
    } elseif ($httpCode == 200) {
        echo "✅ WORKING - Page loads successfully\n";
    } elseif ($httpCode == 404) {
        echo "❌ ROUTE NOT FOUND - Check if route is defined\n";
    } elseif ($httpCode == 500) {
        echo "❌ SERVER ERROR - Check Laravel logs\n";
    }
}

echo "\n✅ Troubleshooting completed!\n";
?>

