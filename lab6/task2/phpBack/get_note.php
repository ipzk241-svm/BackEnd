<?php
session_start();

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

$note_id = $_GET['id'] ?? '';

if (empty($note_id)) {
    http_response_code(400);
    echo json_encode(["message" => "Note ID is required"]);
    exit;
}

$user_id = $_SESSION['userID'];

$stmt = $pdo->prepare("SELECT id, title, content FROM notes WHERE id = ? AND user_id = ?");
$stmt->execute([$note_id, $user_id]);
$note = $stmt->fetch();

if (!$note) {
    http_response_code(404);
    echo json_encode(["message" => "Note not found"]);
    exit;
}

echo json_encode($note);
