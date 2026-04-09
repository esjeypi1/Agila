<?php
// Minimal .env loader: parses simple KEY=VALUE lines and sets env vars for this PHP process.
// Usage: include __DIR__ . '/load_env.php';
$envFile = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . '.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) continue;
        if (strpos($line, '=') === false) continue;
        [$k, $v] = array_map('trim', explode('=', $line, 2));
        // strip optional surrounding quotes
        $v = preg_replace('/\A["\'](.*)["\']\z/', '$1', $v);
        putenv("{$k}={$v}");
        // also set in $_ENV and $_SERVER for convenience
        $_ENV[$k] = $v;
        $_SERVER[$k] = $v;
    }
}
?>
