<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Penggunaan List</title></head>
<body>
<?php
$program = ['Bobo', 'Doraemon', 'Spiderman'];
list($majalah, $komik, $film) = $program;

echo 'Jenis Buku &amp; Hiburan:';
echo '<br>Cerpen: ' . $majalah;
echo '<br>Cerita Bergambar: ' . $komik;
echo '<br>Bioskop: ' . $film;
?>
</body>
</html>