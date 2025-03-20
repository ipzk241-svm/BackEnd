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

$userId = $_SESSION['userID'];

$stmt = $pdo->prepare("SELECT id, title, content FROM notes WHERE user_id = ?");
$stmt->execute([$userId]);

$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$notes) {
    echo json_encode(["message" => "No notes found"]);
    exit;
} else {
    http_response_code(200);
    echo json_encode(["notes" => $notes]);
}
