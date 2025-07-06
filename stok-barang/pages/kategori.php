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
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn-rounded {
            border-radius: 10px;
        }
        .table thead {
            background-color: #198754;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3"><i class="fas fa-tags"></i> Data Kategori</h3>

    <a href="kategori_tambah.php" class="btn btn-success btn-sm mb-3 btn-rounded">
        <i class="fas fa-plus"></i> Tambah Kategori
    </a>

    <!-- FORM SEARCH -->
    <form class="row mb-3" method="get">
        <div class="col-md-4">
            <input type="text" name="cari" class="form-control" placeholder="Cari kategori..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-success">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                $sql = "SELECT * FROM kategori";

                if (!empty($cari)) {
                    $sql .= " WHERE nama_kategori LIKE '%$cari%'";
                }

                $sql .= " ORDER BY nama_kategori ASC";
                $data = mysqli_query($koneksi, $sql);

                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td>
                        <a href="kategori_edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="kategori_hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                            <i class="fas fa-trash-alt"></i>
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
