<?php
include 'connect.php'; // ini menyambungkan ke database

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil total pembayaran
$total_result = $conn->query("SELECT SUM(REPLACE(REPLACE(totalbayar, '.', ''), ',', '')) AS total FROM tb_zakat");
$total = $total_result->fetch_assoc()['total'] ?? 0;

// Ambil jumlah transaksi
$transaksi_result = $conn->query("SELECT COUNT(*) AS total_transaksi FROM tb_zakat");
$total_transaksi = $transaksi_result->fetch_assoc()['total_transaksi'] ?? 0;

// Ambil tanggal terbaru
$tanggal_result = $conn->query("SELECT MAX(tanggalbayar) AS terbaru FROM tb_zakat");
$tanggal_terbaru = $tanggal_result->fetch_assoc()['terbaru'] ?? '-';

// Ambil daftar pembayaran terbaru
$data_result = $conn->query("SELECT * FROM tb_zakat ORDER BY tanggalbayar DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pembayaran Zakat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard Pembayaran Zakat</h1>
        <div class="cards">
            <div class="card yellow">
                <p>Total Pembayaran</p>
                <h2>Rp <?= number_format($total, 2, ',', '.') ?></h2>
            </div>
            <div class="card green">
                <p>Jumlah Transaksi</p>
                <h2><?= $total_transaksi ?></h2>
            </div>
            <div class="card blue">
                <p>Tanggal Terbaru</p>
                <h2><?= date("D, d M Y H:i:s T", strtotime($tanggal_terbaru)) ?></h2>
            </div>
        </div>

        <h2 class="section-title">Daftar Pembayaran Terbaru</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Zakat</th>
                    <th>Total Bayar (Rp)</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $data_result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['jeniszakat']) ?></td>
                    <td><?= htmlspecialchars($row['totalbayar']) ?></td>
                    <td><?= htmlspecialchars($row['tanggalbayar']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="buttons">
    <a href="tambah.php">
        <button class="btn green">Tambah Pembayaran</button>
    </a>
    <a href="history.php">
        <button class="btn blue">History Pembayaran</button>
    </a>
    <a href="beras.php">
        <button class="btn yellow">Data Beras</button>
    </a>
</div>
    </div>
</body>
</html>
