<?php
session_start();

$directory = './templates/pages/';
$pages = glob($directory . '*.php');

$fontSize = $_COOKIE['fontSize'] ?? 'middle';
if (isset($_GET['fs'])) {
    $fontSize = $_GET['fs'];
    setcookie('fontSize', $fontSize);
}

include "templates/parts/header.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $path = 'templates/pages/' . $page . '.php';

    if (file_exists($path))
        include $path;
}

include "templates/parts/footer.php";
http_response_code(404);
