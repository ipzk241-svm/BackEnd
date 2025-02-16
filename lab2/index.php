<?php
session_start();


include "templates/parts/header.php";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $_SESSION['login'] = $_POST['login']??'';
    $_SESSION['password'] = $_POST['password']??'';
    $_SESSION['passwordRepeat'] = $_POST['passwordRepeat']??'';
    $_SESSION['gender'] = $_POST['gender']??'';
    $_SESSION['favGames'] = $_POST['favGames']??[];
    $_SESSION['about'] = $_POST['about']??'';

    $uploadDir = 'css/images/';
    $fileName = basename($_FILES['userPhoto']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    move_uploaded_file($_FILES['userPhoto']['tmp_name'], $uploadFile);

    include "templates/pages/result.php";
}
else if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $path = 'templates/pages/' . $page . '.php';

    if (file_exists($path))
        include $path;
}

include "templates/parts/footer.php";
http_response_code(404);
