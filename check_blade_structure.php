<?php
$content = file_get_contents('resources/views/admin/settings/index.blade.php');
$ifCount = substr_count($content, '@if');
$endifCount = substr_count($content, '@endif');
$elseCount = substr_count($content, '@else');

echo "If statements: $ifCount\n";
echo "Endif statements: $endifCount\n";
echo "Else statements: $elseCount\n";
echo "Difference: " . ($ifCount - $endifCount) . "\n";

// Check for other Blade directives
$extendsCount = substr_count($content, '@extends');
$sectionCount = substr_count($content, '@section');
$endsectionCount = substr_count($content, '@endsection');

echo "Extends: $extendsCount\n";
echo "Section: $sectionCount\n";
echo "Endsection: $endsectionCount\n";
echo "Section difference: " . ($sectionCount - $endsectionCount) . "\n";
?>

