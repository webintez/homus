<?php
echo "Testing admin settings URL...\n";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/admin/settings');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "❌ cURL Error: $error\n";
} else {
    echo "✅ HTTP Status Code: $httpCode\n";
    if ($httpCode == 200) {
        echo "✅ Page loads successfully!\n";
    } else {
        echo "❌ Page returned status code: $httpCode\n";
    }
}

echo "\nResponse headers:\n";
echo $response;
?>
