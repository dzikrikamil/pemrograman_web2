<?php
require __DIR__ . '/db.php';

$stmt = $pdo->query('SELECT FirstName, LastName, Age FROM tbl_mhs ORDER BY mhsID');
foreach ($stmt as $data) {
    echo htmlspecialchars((string) $data['FirstName'], ENT_QUOTES, 'UTF-8') . ' '
       . htmlspecialchars((string) $data['LastName'], ENT_QUOTES, 'UTF-8') . ' '
       . htmlspecialchars((string) $data['Age'], ENT_QUOTES, 'UTF-8') . '<br>';
}