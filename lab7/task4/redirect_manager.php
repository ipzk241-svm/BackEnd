<?php
ob_start();

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = rtrim($requestUri, '/');
$requestUri = preg_replace('/\.php$/', '', $requestUri); // Видаляємо .php для уніфікації

$configFile = 'redirects.json';

if (!file_exists($configFile)) {
    http_response_code(500);
    echo "Помилка: файл конфігурації redirects.json не знайдено.";
    ob_end_flush();
    exit;
}

$redirects = json_decode(file_get_contents($configFile), true);

if ($redirects === null) {
    http_response_code(500);
    echo "Помилка: не вдалося розпарсити redirects.json.";
    ob_end_flush();
    exit;
}

if (isset($redirects[$requestUri]) || isset($redirects[$requestUri . '/'])) {
    $target = $redirects[$requestUri] ?? $redirects[$requestUri . '/'];

    if ($target === '/404' || $target === null) {
        header("Location: /404.php", true, 404);
    } else {
        // Перевіряємо, чи ціль уже має .php, щоб не додавати його двічі
        if (strpos($target, '.php') === false) {
            $target .= '.php';
        }
        header("Location: $target", true, 301);
    }
    ob_end_flush();
    exit;
}

http_response_code(200);
ob_end_flush();
