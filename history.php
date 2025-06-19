<?php
include 'connect.php';
$query = "SELECT * FROM tb_zakat ORDER BY tanggalbayar DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Pembayaran Zakat</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f4f6;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      background: #fff;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }

    h2 {
      text-align: left;
      margin-bottom: 20px;
      font-size: 1.8rem;
      color: #1f2937;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.95rem;
    }

    th, td {
      padding: 14px 10px;
      text-align: left;
      border-bottom: 1px solid #e5e7eb;
    }

    th {
      background-color: #f1f5f9;
      font-weight: bold;
      color: #374151;
    }

    .btn {
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      font-size: 0.85rem;
      transition: background 0.2s;
    }

    .btn.edit {
      background-color: #3b82f6;
      color: white;
    }

    .btn.delete {
      background-color: #ef4444;
      color: white;
    }

    .btn-group {
      display: flex;
      gap: 6px;
    }

    .top-buttons {
      margin-bottom: 20px;
      display: flex;
      justify-content: end;
      gap: 10px;
    }

    .btn.export {
      background-color: #10b981;
      color: white;
    }

    .btn.back {
      background-color: #6b7280;
      color: white;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Pembayaran Zakat</h2>

  <div class="top-buttons">
    <a href="dashboard.php" class="btn back">Kembali</a>
    <a href="export_excel.php" class="btn export">Generate Excel</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Jumlah Jiwa</th>
        <th>Jenis Zakat</th>
        <th>Nama</th>
        <th>Metode Pembayaran</th>
        <th>Total Bayar</th>
        <th>Nominal Dibayar</th>
        <th>Kembalian</th>
        <!-- <th>Keterangan</th> -->
        <th>Tanggal Bayar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['jumlahjiwa'] ?></td>
        <td><?= $row['jeniszakat'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['metode'] ?></td>
        <td><?= number_format($row['totalbayar'], 2, ',', '.') ?></td>
        <td><?= number_format($row['dibayar'], 2, ',', '.') ?></td>
        <td><?= number_format($row['kembalian'], 2, ',', '.') ?></td>
        <!-- <td><?= $row['keterangan'] ?></td> -->
        <td><?= date("D, d M Y H:i:s", strtotime($row['tanggalbayar'])) ?></td>
        <td class="btn-group">
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
