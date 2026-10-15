<?php
require __DIR__ . '/db.php';

$jumlah = (int) $pdo->query('SELECT COUNT(*) FROM tbl_mhs')->fetchColumn();
echo "Jumlah record: $jumlah";