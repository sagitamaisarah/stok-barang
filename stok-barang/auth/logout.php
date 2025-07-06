<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout - Stok Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .logout-box {
      text-align: center;
      padding: 40px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="logout-box">
  <i class="fas fa-sign-out-alt fa-3x text-danger mb-3"></i>
  <h4>Anda telah logout</h4>
  <p class="text-muted">Terima kasih telah menggunakan sistem stok barang.</p>
  <a href="login.html" class="btn btn-success mt-3">
    <i class="fas fa-arrow-left"></i> Kembali ke Login
  </a>
</div>

</body>
</html>
