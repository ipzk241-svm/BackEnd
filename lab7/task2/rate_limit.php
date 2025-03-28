<?php
$logFile = 'requests.log';

$requestLimit = 5;
$timeWindow = 60;

$ip = $_SERVER['REMOTE_ADDR'];

function checkRateLimit($ip, $logFile, $requestLimit, $timeWindow)
{
    $currentTime = time();
    $requests = [];

    if (file_exists($logFile)) {
        $requests = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    $validRequests = [];
    $ipRequestsCount = 0;

    foreach ($requests as $request) {
        list($loggedIp, $timestamp) = explode(' ', $request);
        if ($currentTime - $timestamp <= $timeWindow) {
            $validRequests[] = $request;
            if ($loggedIp === $ip) {
                $ipRequestsCount++;
            }
        }
    }

    $validRequests[] = "$ip $currentTime";

    file_put_contents($logFile, implode("\n", $validRequests) . "\n");

    return $ipRequestsCount >= $requestLimit;
}

ob_start();

if (checkRateLimit($ip, $logFile, $requestLimit, $timeWindow)) {
    http_response_code(429);
    echo "429 Too Many Requests\n";
    echo "Ви перевищили ліміт запитів. Спробуйте знову через хвилину.";
} else {
    http_response_code(200);
    echo "200 OK\n";
    echo "Вітаємо!";
}

$output = ob_get_contents();
ob_end_clean();

echo $output;
