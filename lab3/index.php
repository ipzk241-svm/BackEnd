<?php
session_start();

$directory = './templates/pages/';
$pages = glob($directory . '*.php');

include "templates/parts/header.php";


if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $path = 'templates/pages/' . $page . '.php';

    if (file_exists($path))
        include $path;
}

include "templates/parts/footer.php";
http_response_code(404);
