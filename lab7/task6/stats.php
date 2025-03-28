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

$last24Hours = date('Y-m-d H:i:s', strtotime('-24 hours'));

$stmtTotal = $pdo->prepare("SELECT COUNT(*) as total FROM traffic_logs WHERE request_time >= :time");
$stmtTotal->execute([':time' => $last24Hours]);
$totalRequests = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

$stmt404 = $pdo->prepare("SELECT COUNT(*) as errors FROM traffic_logs WHERE request_time >= :time AND http_status = 404");
$stmt404->execute([':time' => $last24Hours]);
$error404Count = $stmt404->fetch(PDO::FETCH_ASSOC)['errors'];

echo "<h1>Статистика за останні 24 години</h1>";
echo "Загальна кількість запитів: $totalRequests<br>";
echo "Кількість 404 помилок: $error404Count<br>";

$errorPercentage = $totalRequests > 0 ? ($error404Count / $totalRequests) * 100 : 0;
echo "Відсоток 404 помилок: " . number_format($errorPercentage, 2) . "%<br>";

if ($errorPercentage > 10) {
    $subject = "Попередження: Високий відсоток 404 помилок";
    $message = "За останні 24 години відсоток 404 помилок склав $errorPercentage%.\n";
    $message .= "Загальна кількість запитів: $totalRequests\n";
    $message .= "Кількість 404 помилок: $error404Count\n";

    $logMessage = date('Y-m-d H:i:s') . " - $subject\n$message\n";
    file_put_contents('error_log.txt', $logMessage, FILE_APPEND);
    echo "Сповіщення записано в лог-файл!<br>";
}
