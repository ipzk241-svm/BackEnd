<?php
session_start();

include 'functions.php';

$isLogged = $_COOKIE['isLogged'] ?? false;

if (!$isLogged) {
    header('Location: login.php');
    exit;
} else {
    header('Location: userProfile.php');
}
