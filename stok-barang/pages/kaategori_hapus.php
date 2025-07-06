<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Kategori berhasil dihapus'); window.location='kategori.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus kategori'); window.location='kategori.php';</script>";
}
