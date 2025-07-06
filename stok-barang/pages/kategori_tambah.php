<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}
include "../config/koneksi.php";

// Proses simpan kategori
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);

    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori='$nama'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Kategori sudah ada!";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
        if ($simpan) {
            echo "<script>alert('Kategori berhasil ditambahkan'); window.location='kategori.php';</script>";
        } else {
            $error = "Gagal menambahkan kategori!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3">Tambah Kategori</h3>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="kategori.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
