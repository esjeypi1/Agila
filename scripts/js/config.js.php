<?php
// Emits a small JS snippet that sets window.GOOGLE_MAPS_API_KEY using env vars or .env file.
include __DIR__ . '/../load_env.php';
header('Content-Type: application/javascript; charset=utf-8');
$key = getenv('GOOGLE_MAPS_API_KEY') ?: '';
// Escape for JS
$key_js = str_replace("'", "\\'", $key);
echo "window.GOOGLE_MAPS_API_KEY = '{$key_js}';\n";
?>
