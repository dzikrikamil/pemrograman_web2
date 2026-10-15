<?php
require __DIR__ . '/db.php';

$pdo->exec('CREATE TABLE IF NOT EXISTS tbl_mhs (
    mhsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(15),
    LastName VARCHAR(15),
    Age INT
)');

$stmt = $pdo->prepare('INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES (?, ?, ?)');
$stmt->execute(['Anjar', 'Prabowo', 25]);
echo 'Tabel tersedia dan satu data ditambahkan';