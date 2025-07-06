<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Barang berhasil dihapus'); window.location='barang.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus barang'); window.location='barang.php';</script>";
}
