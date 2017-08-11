<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

$publicFolder = $_SERVER["DOCUMENT_ROOT"] . '/public';

require __DIR__ . '/vendor/autoload.php';



// require __DIR__ . '/server/router/config.php';
