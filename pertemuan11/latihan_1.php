<?php
try {
    $pdo = new PDO('mysql:host=localhost;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo 'OK, koneksi berhasil';
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Tidak dapat terhubung ke server MySQL.';
}