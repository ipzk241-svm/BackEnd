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

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email']);
$password = trim($data['password']);

if (empty($email) || empty($password)) {
    echo json_encode(["message" => "Fill all fields!"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Invalid email format!"]);
    exit;
}

$stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->execute([$email]);

$user = $stmt->fetch();

if (!$user) {
    http_response_code(401);
    echo json_encode(["message" => "User not found"]);
    exit;
}
if (!password_verify($password, $user['password'])) {
    http_response_code(401);
    echo json_encode(["message" => "Incorrect password"]);
    exit;
} else {
    $_SESSION['logged'] = true;
    $_SESSION['userID'] = $user['id'];
    http_response_code(200);
    echo json_encode(["message" => "Login successful"]);
    exit;
}
