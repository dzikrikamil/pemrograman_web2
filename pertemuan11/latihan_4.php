<?php
require __DIR__ . '/db.php';

$stmt = $pdo->prepare('INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES (?, ?, ?)');
$stmt->execute(['Karina', 'Suwandi', 29]);
$stmt->execute(['Glenn', 'Gandari', 32]);
echo 'Dua data ditambahkan';