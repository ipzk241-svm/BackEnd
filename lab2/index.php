<?php
session_start();


include "templates/parts/header.php";
if (isset($_GET['lang'])) {
    $cookieName = "lang";
    $cookieValue = $_GET['lang'];
    $cookieLifetime = time() + (180 * 24 * 60 * 60);

    setcookie($cookieName, $cookieValue, $cookieLifetime, "/");

    if (!isset($_COOKIE['lang']) || $_COOKIE['lang'] !== $_GET['lang']) {
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $_SESSION['login'] = $_POST['login'] ?? '';
    $_SESSION['password'] = $_POST['password'] ?? '';
    $_SESSION['passwordRepeat'] = $_POST['passwordRepeat'] ?? '';
    $_SESSION['gender'] = $_POST['gender'] ?? '';
    $_SESSION['favGames'] = $_POST['favGames'] ?? [];
    $_SESSION['about'] = $_POST['about'] ?? '';
    $_SESSION['city'] = $_POST['city'] ?? '';

    $uploadDir = 'images/';
    $fileName = basename($_FILES['userPhoto']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    move_uploaded_file($_FILES['userPhoto']['tmp_name'], $uploadFile);

    include "templates/pages/result.php";
}

if (isset($_POST['x']) && isset($_POST['y'])) {
    include "templates/pages/calculate.php";
} else if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $path = 'templates/pages/' . $page . '.php';

    if (file_exists($path))
        include $path;
}



include "templates/parts/footer.php";
http_response_code(404);
