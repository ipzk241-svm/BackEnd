<?php

class FileWorker {
    public static $dir = "text";

    public static function writeFile($filename, $content) {
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filePath, $content, FILE_APPEND);
    }

    public static function readFile($filename) {
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        return file_get_contents($filePath);
    }

    public static function clearFile($filename) {
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filePath, '');
    }
}

