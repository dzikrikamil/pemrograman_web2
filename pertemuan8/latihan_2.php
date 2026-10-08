<?php
function jumlah(float $a, float $b): float
{
    return $a + $b;
}

function kurang(float $a, float $b): float
{
    return $a - $b;
}

function kali(float $a, float $b): float
{
    return $a * $b;
}

function bagi(float $a, float $b): float
{
    return $a / $b;
}

$hasil = null;
$pesan = '';
$inputA = (string) ($_POST['A'] ?? '');
$inputB = (string) ($_POST['B'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($inputA === '' || $inputB === '' || !is_numeric($inputA) || !is_numeric($inputB)) {
        $pesan = 'Masukkan dua bilangan yang valid.';
    } else {
        $a = (float) $inputA;
        $b = (float) $inputB;
        $hasil = [
            'a' => $a,
            'b' => $b,
            'jumlah' => jumlah($a, $b),
            'kurang' => kurang($a, $b),
            'kali' => kali($a, $b),
            'bagi' => $b == 0.0 ? null : bagi($a, $b),
        ];
    }
}

function tampil(float $angka): string
{
    return (string) $angka;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Contoh Penggunaan UDF</title></head>
<body>
<form method="post">
    <label for="A">Masukkan Bilangan Pertama:</label><br>
    <input id="A" type="number" step="any" name="A" value="<?= htmlspecialchars($inputA, ENT_QUOTES, 'UTF-8') ?>" required><br>
    <label for="B">Masukkan Bilangan Kedua:</label><br>
    <input id="B" type="number" step="any" name="B" value="<?= htmlspecialchars($inputB, ENT_QUOTES, 'UTF-8') ?>" required><br>
    <button type="submit">Hitung</button>
</form>

<?php if ($pesan !== ''): ?>
    <p><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>

<?php if ($hasil !== null): ?>
    <p>Bilangan Pertama: <?= tampil($hasil['a']) ?><br>
    Bilangan Kedua: <?= tampil($hasil['b']) ?></p>
    <p>Penjumlahan: <?= tampil($hasil['a']) ?> + <?= tampil($hasil['b']) ?> = <?= tampil($hasil['jumlah']) ?></p>
    <p>Pengurangan: <?= tampil($hasil['a']) ?> - <?= tampil($hasil['b']) ?> = <?= tampil($hasil['kurang']) ?></p>
    <p>Perkalian: <?= tampil($hasil['a']) ?> × <?= tampil($hasil['b']) ?> = <?= tampil($hasil['kali']) ?></p>
    <p>Pembagian: <?php if ($hasil['bagi'] === null): ?>tidak dapat dibagi dengan nol<?php else: ?><?= tampil($hasil['a']) ?> / <?= tampil($hasil['b']) ?> = <?= tampil($hasil['bagi']) ?><?php endif; ?></p>
<?php endif; ?>
</body>
</html>