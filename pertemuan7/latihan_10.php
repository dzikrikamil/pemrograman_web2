<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Penggunaan In Array dengan Tipe Data</title></head>
<body>
<?php
$tipe = ['1.10', 5.0, 1.13];

if (in_array('5.0', $tipe, true)) {
    echo 'String "5.0" ada di dalam array';
} else {
    echo 'String "5.0" tidak ada di dalam array';
}

echo '<br>';

if (in_array(1.13, $tipe, true)) {
    echo 'Bilangan 1.13 ada di dalam array';
} else {
    echo 'Bilangan 1.13 tidak ada di dalam array';
}
?>
</body>
</html>