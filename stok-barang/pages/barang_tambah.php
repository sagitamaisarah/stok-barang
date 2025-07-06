<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Proses simpan
if (isset($_POST['simpan'])) {
    $nama     = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok     = $_POST['stok'];

    $query = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, stok) VALUES ('$nama', '$kategori', '$stok')");

    if ($query) {
        echo "<script>alert('Barang berhasil ditambahkan'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan barang');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Barang</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php
                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                while ($k = mysqli_fetch_array($kategori)) {
                    echo "<option value='$k[id]'>$k[nama_kategori]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="barang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
