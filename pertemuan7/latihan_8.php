<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Penggunaan Join</title></head>
<body>
<?php
$var = ['18', '11', '2010'];
$tanggal = join('/', $var);
echo $tanggal; // 18/11/2010
?>
</body>
</html>