<?php
require __DIR__ . '/db.php';

$stmt = $pdo->query('SELECT mhsID, FirstName, LastName, Age FROM tbl_mhs ORDER BY mhsID');
foreach ($stmt->fetchAll(PDO::FETCH_NUM) as $data) {
    echo htmlspecialchars((string) $data[0], ENT_QUOTES, 'UTF-8') . ' '
       . htmlspecialchars((string) $data[1], ENT_QUOTES, 'UTF-8') . ' '
       . htmlspecialchars((string) $data[2], ENT_QUOTES, 'UTF-8') . ' '
       . htmlspecialchars((string) $data[3], ENT_QUOTES, 'UTF-8') . '<br>';
}