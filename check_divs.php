<?php
$content = file_get_contents('resources/views/admin/settings/index.blade.php');
$openDivs = substr_count($content, '<div');
$closeDivs = substr_count($content, '</div>');
echo "Open divs: $openDivs\n";
echo "Close divs: $closeDivs\n";
echo "Difference: " . ($openDivs - $closeDivs) . "\n";
?>
