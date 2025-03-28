<?php
ob_start();

$page = basename($_SERVER['REQUEST_URI'], ".php");
$page .= ".php";

$pages_blacklist = ['index.php', 'cache_page.php'];

if (!preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) || in_array($page, $pages_blacklist)) {
    die("Недопустима назва сторінки.");
}

$cacheFile = "cache/cache_" . basename($page, ".php") . ".html";

if (!is_dir('cache')) {
    mkdir('cache', 0755, true);
}

if (file_exists($cacheFile) && file_exists($page)) {
    echo file_get_contents($cacheFile);
    http_response_code(200);
    exit;
}

if (file_exists($page)) {
    http_response_code(200);
    include $page;
} else {
    http_response_code(404);
    include '404.php';
}

if (http_response_code() === 200) {
    file_put_contents($cacheFile, ob_get_contents());
} else if (http_response_code() === 404 && file_exists($cacheFile)) {
    unlink($cacheFile);
}

ob_end_flush();
