<?php
// CONTOH ERROR: ada output sebelum header()
// Hasil: Warning: Cannot modify header information - headers already sent by ...
echo "<p>Hallo Apa kabar?</p>";
header("Location: test.php");
?>