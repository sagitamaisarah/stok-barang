<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Proses simpan stok masuk
if (isset($_POST['simpan'])) {
    $id_barang = $_POST['barang'];
    $jumlah    = $_POST['jumlah'];
    $tanggal   = $_POST['tanggal'];

    // Simpan ke tabel stok_masuk
    $insert = mysqli_query($koneksi, "INSERT INTO stok_masuk (id_barang, jumlah, tanggal) 
                                      VALUES ('$id_barang', '$jumlah', '$tanggal')");

    // Update stok barang
    $update = mysqli_query($koneksi, "UPDATE barang SET stok = stok + $jumlah WHERE id = '$id_barang'");

    if ($insert && $update) {
        echo "<script>alert('Stok masuk berhasil ditambahkan'); window.location='masuk.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan stok masuk');</script>";
    }
}

// Ambil data barang
$barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Stok Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Stok Masuk</h3>

    <form method="post">
        <div class="mb-3">
            <label for="barang">Pilih Barang</label>
            <select name="barang" class="form-select" required>
                <option value="">-- Pilih --</option>
                <?php while ($b = mysqli_fetch_array($barang)) : ?>
                    <option value="<?= $b['id']; ?>"><?= $b['nama_barang']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah">Jumlah Masuk</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal">Tanggal Masuk</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="masuk.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
