<!DOCTYPE html>
<html>
<head>
    <title>Contoh Penggunaan IF</title>
</head>
<body>

<form method="post">
    Besar Pembelian:
    <input type="number" name="total_beli" required>
    <br><br>
    <input type="submit" value="Tentukan Diskon">
</form>

<?php
if (isset($_POST["total_beli"])) {
    $total_beli = intval($_POST["total_beli"]);

    if ($total_beli >= 200000) {
        $diskon_persen = 10;
    } elseif ($total_beli >= 100000) {
        $diskon_persen = 5;
    } else {
        $diskon_persen = 1;
    }

    $diskon = ($diskon_persen / 100) * $total_beli;
    $pembayaran = $total_beli - $diskon;

    printf("Diskon = %s%% atau Rp %s<br>", $diskon_persen, $diskon);
    printf("Pembayaran = Rp %s", $pembayaran);
}
?>

</body>
</html>