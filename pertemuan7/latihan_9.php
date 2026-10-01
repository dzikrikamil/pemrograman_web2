<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Penggunaan In Array</title></head>
<body>
<?php
$program = ['HTML', 'PHP', 'CSS', 'JavaScript'];
echo '<pre>';
print_r($program);
echo '</pre>';

$cari = 'HTML';
if (in_array($cari, $program, true)) {
    echo "Program Basis Web $cari ada di dalam array";
} else {
    echo "Program Basis Web $cari tidak ada di dalam array";
}
?>
</body>
</html>