<?php

require_once 'redirect_manager.php';

$requestUri = rtrim($_SERVER['REQUEST_URI'], '/');
$requestUri = basename(preg_replace('/\.php$/', '', $requestUri));

if(file_exists($requestUri . '.php')) {
    include $requestUri . '.php';
} else {
    http_response_code(404);
    include '404.php';
}

