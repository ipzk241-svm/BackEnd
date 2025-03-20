<?php
session_start();

$dsn = "mysql:host=localhost;dbname=users_db;charset=utf8mb4";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["message" => "DB connection failed " . $e->getMessage()]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->prepare("SELECT id, name, email FROM users");
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$users) {
        echo json_encode(["message" => "No users found"]);
        exit;
    } else {
        http_response_code(200);
        echo json_encode($users);
    }
}

