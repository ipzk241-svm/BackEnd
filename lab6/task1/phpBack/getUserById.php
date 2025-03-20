<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->execute([$id]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["message" => "User not found"]);
        exit;
    } else {
        http_response_code(200);
        echo json_encode($user);
    }
}
