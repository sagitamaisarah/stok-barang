<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn-rounded {
            border-radius: 10px;
        }
        .table thead {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3"><i class="fas fa-file-alt"></i> Laporan Stok Barang</h3>

    <!-- FORM SEARCH -->
    <form class="row mb-3" method="get">
        <div class="col-md-4">
            <input type="text" name="cari" class="form-control" placeholder="Cari barang / kategori..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                $query = "SELECT b.nama_barang, b.stok, k.nama_kategori 
                          FROM barang b 
                          LEFT JOIN kategori k ON b.kategori_id = k.id";

                if (!empty($cari)) {
                    $query .= " WHERE b.nama_barang LIKE '%$cari%' OR k.nama_kategori LIKE '%$cari%'";
                }

                $query .= " ORDER BY b.nama_barang ASC";

                $data = mysqli_query($koneksi, $query);
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td><?= $d['stok']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="../dashboard.php" class="btn btn-secondary btn-sm mt-2">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

</body>
</html>
