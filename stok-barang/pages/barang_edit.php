<?php
include '../koneksi.php'; // atau sesuaikan dengan path koneksi Anda

// Ambil ID barang dari URL
$id = $_GET['id'];

// Proses saat tombol simpan diklik
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Update data ke database
    $query = mysqli_query($koneksi, "UPDATE barang SET 
        nama='$nama', 
        kategori='$kategori', 
        stok='$stok', 
        harga='$harga' 
        WHERE id_barang='$id'");

    if ($query) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}

// Ambil data lama untuk ditampilkan di form
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>
    <h2>Edit Barang</h2>
    <form method="post">
        <label>Nama Barang</label><br>
        <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required><br><br>

        <label>Kategori</label><br>
        <input type="text" name="kategori" value="<?php echo $d['kategori']; ?>" required><br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" value="<?php echo $d['stok']; ?>" required><br><br>

        <label>Harga</label><br>
        <input type="number" name="harga" value="<?php echo $d['harga']; ?>" required><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
