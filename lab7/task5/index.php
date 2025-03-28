<?php

include 'Response.php';

$response = new Response();
$response->setStatus(200)
    ->addHeader("Content-Type: text/html")
    ->send("<h1>Вітаємо!</h1><p>Це динамічна відповідь.</p>");