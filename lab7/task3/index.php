<?php
$page = basename($_SERVER['REQUEST_URI']);

include 'error_handler.php';

$statusCode = http_response_code();
if (file_exists($page . '.php')) {
    include $page . '.php';
} else {
    http_response_code(404);
    include '404.php';
}
