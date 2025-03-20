<?php
session_start();
if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged'] === true) {
        echo json_encode(["logged" => true]);
        exit;
    }
} else {
    echo json_encode(["logged" => false]);
    exit;
}
