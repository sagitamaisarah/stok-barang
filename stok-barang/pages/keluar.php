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
    <title>Stok Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn-rounded {
            border-radius: 10px;
        }
        .table thead {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3"><i class="fas fa-arrow-up"></i> Data Stok Keluar</h3>

    <a href="keluar_tambah.php" class="btn btn-danger btn-sm mb-3 btn-rounded">
        <i class="fas fa-minus"></i> Tambah Keluar
    </a>

    <!-- FORM SEARCH -->
    <form class="row mb-3" method="get">
        <div class="col-md-4">
            <input type="text" name="cari" class="form-control" placeholder="Cari nama barang..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-danger">
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
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                $query = "SELECT k.id, b.nama_barang, k.jumlah, k.tanggal 
                          FROM stok_keluar k 
                          LEFT JOIN barang b ON k.id_barang = b.id";

                if (!empty($cari)) {
                    $query .= " WHERE b.nama_barang LIKE '%$cari%'";
                }

                $query .= " ORDER BY k.tanggal DESC";

                $data = mysqli_query($koneksi, $query);
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td><?= date('d-m-Y', strtotime($d['tanggal'])); ?></td>
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
