<?php
// Keep local XAMPP defaults unchanged.
$isLocal = in_array($_SERVER['SERVER_NAME'] ?? '', ['localhost', '127.0.0.1'], true);

if ($isLocal) {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'portfolio_db';
} else {
    // Production values (Railway). Configure these in Railway Variables.
    $dbHost = getenv('DB_HOST') ?: 'localhost';
    $dbUser = getenv('DB_USER') ?: 'root';
    $dbPass = getenv('DB_PASS') ?: '';
    $dbName = getenv('DB_NAME') ?: 'portfolio_db';
}

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    // Show a friendly message instead of crashing the whole page
    http_response_code(503);
    echo '<!DOCTYPE html><html><body style="font-family:sans-serif;text-align:center;padding:4rem">'
       . '<h2>Database unavailable</h2>'
       . '<p>Please check the DB environment variables in Railway.</p>'
       . '</body></html>';
    exit;
}

$conn->set_charset("utf8mb4");
?>
