<?php
// Sesuaikan bila server menggunakan zona waktu lain.
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Tanggal</title></head>
<body>
<p style="font-size: 2rem">
    Sekarang tanggal <?= date('d-F-Y') ?><br>
    dan jam <?= date('h:i:s A') ?>
</p>
</body>
</html>