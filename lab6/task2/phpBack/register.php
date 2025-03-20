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
$password = trim($data['password']);

if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(["message" => "Fill all fields!"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Invalid email format!"]);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(["message" => "Password must be at least 6 characters!"]);
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    echo json_encode(["message" => "User with this email already exists!"]);
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

if ($stmt->execute([$name, $email, $hashedPassword])) {
    http_response_code(201);
    echo json_encode(["message" => "Registration successful"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Registration failed"]);
}
