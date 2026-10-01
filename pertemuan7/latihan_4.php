<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penggunaan Is Array</title>
</head>
<body>

<?php
$var = [1, 2, 3, 4, 5, 6, 7];
$status = is_array($var) ? '' : 'bukan ';

echo '$var = array(1,2,3,4,5,6,7)';
echo '<br>';
echo "Variabel \$var {$status}merupakan array";
?>

</body>
</html>