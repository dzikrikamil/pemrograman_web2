<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Ganti sesuai konfigurasi MySQL lokal.
$dbname = 'lat_dbase';

$pdo = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
    $user,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);