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


$data = json_decode(file_get_contents("php://input"), true);

$noteId = $data['id'] ?? '';

if (!$noteId) {
    http_response_code(400);
    echo json_encode(["message" => "Missing id"]);
    exit;
}

$userId = $_SESSION['userID'];

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
$stmt->execute([$noteId, $userId]);

if ($stmt->rowCount() === 0) {
    http_response_code(404);
    echo json_encode(["message" => "Note not found"]);
    exit;
} else {
    http_response_code(200);
    echo json_encode(["message" => "Note deleted"]);
    exit;
}
