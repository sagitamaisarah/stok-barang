<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Stok Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://source.unsplash.com/1600x900/?warehouse,inventory') no-repeat center center fixed;
      background-size: cover;
    }
    .login-box {
      background-color: rgba(255,255,255,0.95);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      max-width: 400px;
      margin: auto;
      margin-top: 10%;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="login-box">
    <h4 class="text-center mb-4"><i class="fas fa-user-lock"></i> Login Admin</h4>
    
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" placeholder="admin" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" placeholder="••••••••" required>
      </div>
      <div class="d-grid">
        <button type="button" class="btn btn-success" onclick="fakeLogin()">Login</button>
      </div>
    </form>
    
    <p class="text-muted text-center mt-3" style="font-size: 0.9em;">* Tampilan demo statis (tidak terhubung database)</p>
  </div>
</div>

<script>
function fakeLogin() {
  alert("Ini hanya tampilan statis. Fungsi login tidak aktif di GitHub Pages.");
}
</script>

</body>
</html>
