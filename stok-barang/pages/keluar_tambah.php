<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

if (isset($_POST['simpan'])) {
    $id_barang = $_POST['barang'];
    $jumlah    = $_POST['jumlah'];
    $tanggal   = $_POST['tanggal'];

    // Cek stok barang dulu
    $cek = mysqli_query($koneksi, "SELECT stok FROM barang WHERE id='$id_barang'");
    $barang = mysqli_fetch_assoc($cek);

    if ($barang['stok'] < $jumlah) {
        echo "<script>alert('Stok tidak mencukupi!');</script>";
    } else {
        // Simpan ke tabel stok_keluar
        $insert = mysqli_query($koneksi, "INSERT INTO stok_keluar (id_barang, jumlah, tanggal) 
                                          VALUES ('$id_barang', '$jumlah', '$tanggal')");

        // Kurangi stok barang
        $update = mysqli_query($koneksi, "UPDATE barang SET stok = stok - $jumlah WHERE id = '$id_barang'");

        if ($insert && $update) {
            echo "<script>alert('Stok keluar berhasil ditambahkan'); window.location='keluar.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan stok keluar');</script>";
        }
    }
}

$barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Stok Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Stok Keluar</h3>

    <form method="post">
        <div class="mb-3">
            <label>Pilih Barang</label>
            <select name="barang" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                <?php while ($b = mysqli_fetch_array($barang)) : ?>
                    <option value="<?= $b['id']; ?>"><?= $b['nama_barang']; ?> (Stok: <?= $b['stok']; ?>)</option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Keluar</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
        <a href="keluar.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
