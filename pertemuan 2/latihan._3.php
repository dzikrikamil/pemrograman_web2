<!DOCTYPE html>
<html>
<head>
    <title>Latihan 3</title>
</head>

<body>

<form method="post">

    <label>Nilai I</label>
    <input type="number" name="nilai1" required>

    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <label>Nilai II</label>
    <input type="number" name="nilai2" required>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if (isset($_POST['submit'])) {

    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $operator = $_POST['operator'];

    if ($operator == "+") {
        $hasil = $nilai1 + $nilai2;
    } elseif ($operator == "-") {
        $hasil = $nilai1 - $nilai2;
    } elseif ($operator == "*") {
        $hasil = $nilai1 * $nilai2;
    } elseif ($operator == "/") {
        $hasil = $nilai1 / $nilai2;
    }

    echo "<h3>Hasil Perhitungan</h3>";
    echo "$nilai1 $operator $nilai2 = $hasil";
}

?>

</body>
</html>