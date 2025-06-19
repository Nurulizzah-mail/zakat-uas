<index class="html"></index>
<?php
include 'connect.php'; // koneksi ke database
$query = "SELECT * FROM hargaberas ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Harga Beras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-sm" style="width: 600px;">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4">Data Harga Beras</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= number_format($row['harga'], 2, '.', ',') ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end gap-2">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <a href="tambah_beras.php" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
