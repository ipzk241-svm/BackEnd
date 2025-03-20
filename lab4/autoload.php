<?php
spl_autoload_register(function ($class_name) {
    $classPath = str_replace('\\', '/', $class_name);

    $file = __DIR__ . '/classes/' . $classPath . '.php';
    if (file_exists($file)) {

        require_once $file;
    }
});
