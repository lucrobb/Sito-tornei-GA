<?php
$host = '127.0.0.1'; // <- important, use IP not 'localhost'
$db   = 'tornei';
$user = 'root';
$pass = 'TesT_901!$';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=3306"; // explicitly set port

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $pass, $options);