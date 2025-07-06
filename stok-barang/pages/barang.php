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
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn-rounded {
            border-radius: 10px;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3"><i class="fas fa-boxes"></i> Data Barang</h3>

    <a href="barang_tambah.php" class="btn btn-success btn-sm mb-3 btn-rounded">
        <i class="fas fa-plus"></i> Tambah Barang
    </a>

    <!-- Form Search -->
    <form class="row mb-3" method="get">
        <div class="col-md-4">
            <input type="text" name="cari" class="form-control" placeholder="Cari nama barang / kategori..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary">
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                $query = "SELECT b.id, b.nama_barang, b.stok, k.nama_kategori 
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
                    <td>
                        <a href="barang_edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="barang_hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
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
