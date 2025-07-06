<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfigurasi Koneksi Database</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      padding: 30px;
    }
    .card {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    pre {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 5px;
      font-size: 0.9em;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <h4>Contoh Koneksi ke Database (PHP)</h4>
    <p>Berikut ini adalah contoh kode untuk menghubungkan PHP dengan database MySQL:</p>

    <pre><code>&lt;?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_stokbarang";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?&gt;</code></pre>

    <p><strong>Catatan:</strong> File ini hanya untuk tampilan. Kode PHP tidak berjalan di GitHub Pages.</p>
  </div>
</div>

</body>
</html>
