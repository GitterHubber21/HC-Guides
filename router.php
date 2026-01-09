<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists(__DIR__ . $uri) && !is_dir(__DIR__ . $uri)) {
    return false;
}

$path = trim($uri, '/');

if ($path === '' || $path === 'index') {
    include __DIR__ . '/index.html';
    return;
}

if (file_exists(__DIR__ . '/guides/' . $path . '.html')) {
    include __DIR__ . '/guides/' . $path . '.html';
    return;
}

http_response_code(404);
echo "404 Not Found";
