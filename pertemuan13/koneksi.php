
<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_pendaftaran"
);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
