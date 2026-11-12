<?php
session_start();

if (isset($_SESSION['login'])) {

    //hapus session login
    unset($_SESSION['login']);
    session_destroy();

    echo "<h1>Anda sudah berhasil LOGOUT</h1>";
    echo "<h2>Klik <a href='session1.php'>di sini</a> untuk LOGIN kembali</h2>";
    echo "<h2>Anda sekarang tidak bisa masuk ke halaman <a href='session2.php'>session2.php</a> lagi</h2>";

} else {
    echo "<h2>Anda belum login.</h2>";
    echo "<h2><a href='session1.php'>Login di sini</a></h2>";
}
?>
