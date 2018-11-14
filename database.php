<?php
$dsn = "mysql:host=localhost;dbname=udp1";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $db->exec("set names utf8");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOExceptionc $e) {
    $error_message = $e->getMessage();
    inclcude("database_error.php");
    exit();
}