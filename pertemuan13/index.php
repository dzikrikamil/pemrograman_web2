
<?php
include 'koneksi.php';

$pesan = "";

// Proses simpan data
if (isset($_POST['simpan'])) {

    $tgl_input = $_POST['tgl_input'];
    $kode = strtoupper(trim($_POST['kode']));
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $mat = (int) $_POST['mat'];
    $bing = (int) $_POST['bing'];
    $umum = (int) $_POST['umum'];

    // Hitung rata-rata
    $rata = ($mat + $bing + $umum) / 3;

    // Menentukan keterangan
    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    // Menentukan tempat tes berdasarkan kode
    $kode_awal = substr($kode, 0, 1);

    if ($kode_awal == "A") {
        $tempat_tes = "Gedung A";
    } elseif ($kode_awal == "B") {
        $tempat_tes = "Gedung B";
    } elseif ($kode_awal == "V") {
        $tempat_tes = "Viktor";
    } else {
        $tempat_tes = "Tidak Diketahui";
    }

    // Simpan ke database
    $sql = "INSERT INTO pendaftar
    (tgl_input, kode, nama, jk, asal_sekolah,
    pekerjaan_ortu, tempat_lahir, tgl_lahir,
    mat, bing, umum, rata, keterangan, tempat_tes)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssiiidss",
        $tgl_input,
        $kode,
        $nama,
        $jk,
        $asal_sekolah,
        $pekerjaan_ortu,
        $tempat_lahir,
        $tgl_lahir,
        $mat,
        $bing,
        $umum,
        $rata,
        $keterangan,
        $tempat_tes
    );

    if (mysqli_stmt_execute($stmt)) {
        $pesan = "Data pendaftaran berhasil disimpan!";
    } else {
        $pesan = "Data gagal disimpan: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

// Mengambil seluruh data pendaftar
$result = mysqli_query($conn, "SELECT * FROM pendaftar ORDER BY id DESC");

// Menghitung rekap data
$rekap = mysqli_query($conn, "
    SELECT
        COUNT(*) AS jumlah_pendaftar,
        SUM(keterangan = 'Lulus') AS jumlah_lulus,
        SUM(keterangan = 'Cadangan') AS jumlah_cadangan,
        SUM(keterangan = 'Tidak Lulus') AS jumlah_tidak_lulus
    FROM pendaftar
");

$data_rekap = mysqli_fetch_assoc($rekap);

// Fungsi keamanan tampilan
function aman($data) {
    return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container {
            width: 900px;
            max-width: 100%;
            box-sizing: border-box;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 900px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover {
            background: darkblue;
        }

        .info {
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }

        .pesan {
            margin-top: 20px;
            padding: 12px;
            background: #dff0d8;
            color: #245724;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode"
               placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>

        <input type="radio" name="jk"
               value="Laki-Laki" required> Laki-Laki

        <input type="radio" name="jk"
               value="Perempuan"> Perempuan

        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat"
               min="0" max="100" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing"
               min="0" max="100" required>

        <label>Umum</label>
        <input type="number" name="umum"
               min="0" max="100" required>

        <button type="submit" name="simpan" class="btn">
            SIMPAN
        </button>

    </form>

    <?php if ($pesan != "") { ?>
        <div class="pesan">
            <b><?= aman($pesan) ?></b>
        </div>
    <?php } ?>

    <h3>DATA PENDAFTAR MAHASISWA</h3>

    <div class="table-responsive">
        <table>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tgl Lahir</th>
                <th>Asal Sekolah</th>
                <th>Pekerjaan Ortu</th>
                <th>Tempat Tes</th>
                <th>MAT</th>
                <th>B. Inggris</th>
                <th>Umum</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?= aman($row['kode']) ?></td>
                <td><?= aman($row['nama']) ?></td>
                <td><?= aman($row['jk']) ?></td>
                <td>
                    <?= aman($row['tempat_lahir']) ?>,
                    <?= aman($row['tgl_lahir']) ?>
                </td>
                <td><?= aman($row['asal_sekolah']) ?></td>
                <td><?= aman($row['pekerjaan_ortu']) ?></td>
                <td><?= aman($row['tempat_tes']) ?></td>
                <td><?= aman($row['mat']) ?></td>
                <td><?= aman($row['bing']) ?></td>
                <td><?= aman($row['umum']) ?></td>
                <td><?= number_format($row['rata'], 2) ?></td>
                <td><?= aman($row['keterangan']) ?></td>
            </tr>

            <?php } ?>

        </table>
    </div>

    <div class="info">

        <h3>Rekap Data:</h3>

        <p>Jumlah Pendaftar:
            <b><?= $data_rekap['jumlah_pendaftar'] ?></b>
        </p>

        <p>Jumlah Peserta Lulus:
            <b><?= $data_rekap['jumlah_lulus'] ?? 0 ?></b>
        </p>

        <p>Jumlah Peserta Cadangan:
            <b><?= $data_rekap['jumlah_cadangan'] ?? 0 ?></b>
        </p>

        <p>Jumlah Tidak Lulus:
            <b><?= $data_rekap['jumlah_tidak_lulus'] ?? 0 ?></b>
        </p>

    </div>

    <div class="info">

        <h3>Keterangan:</h3>

        <p><b>Kode Tempat Tes:</b></p>

        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>

        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>

    </div>

</div>

</body>
</html>
