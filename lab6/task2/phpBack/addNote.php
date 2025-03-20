<?php
session_start();
header('Content-Type: application/json');

$dsn = "mysql:host=localhost;dbname=users_db;charset=utf8mb4";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "DB connection failed"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$title = trim($data['title'] ?? '');
$content = trim($data['content'] ?? '');

if (empty($title) || empty($content)) {
    http_response_code(400);
    echo json_encode(["message" => "Title and content are required"]);
    exit;
}

$userId = $_SESSION['userID'];

$stmt = $pdo->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
$stmt->execute([$userId, $title, $content]);

http_response_code(201);
echo json_encode(["message" => "Note added successfully"]);
