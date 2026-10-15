<?php
try {
    $pdo = new PDO('mysql:host=localhost;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $pdo->exec('CREATE DATABASE IF NOT EXISTS lat_dbase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    echo 'Database lat_dbase tersedia';
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Gagal membuat database. Periksa koneksi dan izin CREATE DATABASE.';
}