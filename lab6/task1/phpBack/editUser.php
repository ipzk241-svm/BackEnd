<?php
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

$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data['name']);
$email = trim($data['email']);
$id = trim($data["userId"]);

if (empty($name) || empty($email)) {
    echo json_encode(["message" => "Fill all fields!"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Invalid email format!"]);
    exit;
}

$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$name, $email, $id]);

http_response_code(200);
echo json_encode(["message" => "User was updated"]);
