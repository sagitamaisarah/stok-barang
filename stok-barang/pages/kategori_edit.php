<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$id'");
$kategori = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama' WHERE id='$id'");

    if ($update) {
        echo "<script>alert('Kategori berhasil diupdate'); window.location='kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal update kategori');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Kategori</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama" value="<?= $kategori['nama_kategori']; ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="kategori.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
