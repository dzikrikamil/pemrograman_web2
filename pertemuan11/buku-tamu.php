<?php
require __DIR__ . '/db.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $pesan = trim((string) ($_POST['pesan'] ?? ''));

    if ($nama === '' || mb_strlen($nama) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255 || $pesan === '') {
        $error = 'Isi nama, email yang valid, dan pesan. Nama maksimal 100 karakter.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO buku_tamu (nama, email, pesan) VALUES (?, ?, ?)');
        $stmt->execute([$nama, $email, $pesan]);
        header('Location: buku-tamu.php?tersimpan=1');
        exit;
    }
}

$total = (int) $pdo->query('SELECT COUNT(*) FROM buku_tamu')->fetchColumn();
$perHalaman = 5;
$jumlahHalaman = max(1, (int) ceil($total / $perHalaman));
$halamanInput = filter_input(INPUT_GET, 'halaman', FILTER_VALIDATE_INT);
$halaman = max(1, min($jumlahHalaman, $halamanInput ?: 1));
$offset = ($halaman - 1) * $perHalaman;

$stmt = $pdo->prepare('SELECT id, nama, email, pesan, dibuat_pada FROM buku_tamu ORDER BY id DESC LIMIT :batas OFFSET :offset');
$stmt->bindValue(':batas', $perHalaman, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$entri = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Buku Tamu</title></head>
<body>
<h1>Buku Tamu</h1>
<?php if ($error !== ''): ?><p><?= e($error) ?></p><?php endif; ?>
<?php if (isset($_GET['tersimpan'])): ?><p>Pesan berhasil disimpan.</p><?php endif; ?>
<form method="post">
    <label>Nama: <input name="nama" maxlength="100" required></label><br>
    <label>Email: <input type="email" name="email" maxlength="255" required></label><br>
    <label>Pesan: <textarea name="pesan" required></textarea></label><br>
    <button type="submit">Kirim</button>
</form>
<h2>Daftar pesan</h2>
<?php foreach ($entri as $baris): ?>
    <article>
        <h3><?= e($baris['nama']) ?></h3>
        <p>Email: <?= e($baris['email']) ?> | <?= e($baris['dibuat_pada']) ?></p>
        <p><?= nl2br(e($baris['pesan'])) ?></p>
    </article>
<?php endforeach; ?>
<?php if ($entri === []): ?><p>Belum ada pesan.</p><?php endif; ?>
<nav aria-label="Halaman buku tamu">
<?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
    <a href="?halaman=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>
</nav>
</body>
</html>