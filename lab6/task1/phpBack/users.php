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

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];

    if (empty($id)) {
        echo json_encode(["message" => "Id is required"]);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode(["message" => "User not found"]);
        exit;
    } else {
        http_response_code(200);
        if (isset($_SESSION['userID']) && $_SESSION['userID'] == $id) {
            session_unset();
            session_destroy();
            echo json_encode(["message" => "User deleted", "isCurrentUser" => true]);
        } else echo json_encode(["message" => "User deleted", "isCurrentUser" => false]);
    }
}
