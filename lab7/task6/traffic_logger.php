<?php
$dbHost = 'localhost';
$dbName = 'lab7';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}

$ipAddress = $_SERVER['REMOTE_ADDR'];
$requestTime = date('Y-m-d H:i:s');
$requestUrl = basename($_SERVER['REQUEST_URI']);

ob_start();

if (file_exists($requestUrl . '.php')) {
    include $requestUrl . '.php';
    $statusCode = http_response_code(200);
} else {
    http_response_code(404);
    echo "404 Not Found";
}

$httpStatus = http_response_code();

try {
    $stmt = $pdo->prepare("INSERT INTO traffic_logs (ip_address, request_time, request_url, http_status) VALUES (:ip, :time, :url, :status)");
    $stmt->execute([
        ':ip' => $ipAddress,
        ':time' => $requestTime,
        ':url' => $requestUrl,
        ':status' => $httpStatus
    ]);
} catch (PDOException $e) {
    echo "Помилка запису в базу даних: " . $e->getMessage();
}

ob_end_flush();
