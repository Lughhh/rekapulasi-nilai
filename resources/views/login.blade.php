<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #622398;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: #fff;
      border-radius: 8px;
      padding: 40px;
      max-width: 450px;
      width: 100%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-align: center;
    }
    /* Judul */
    .login-title {
      font-size: 26px;  
      font-weight: bold;
      margin-bottom: 5px;
    }
    .login-subtitle {
      font-size: 16px;   
      font-weight: bold;
      margin-bottom: 15px;
      color: #333;
    }
    /* Info login */
    .login-info {
      font-size: 14px; 
      color: #555;     
      margin-bottom: 10px;
    }
    /* Tombol */
    .btn-login {
      background-color: #ff9800;
      color: white;
      font-weight: bold;
      width: 30%;
    }
    .btn-login:hover {
      background-color: #864d0bff;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h1 class="login-title">SISTEM INFORMASI DIPLOMA UNGGUL</h1>
    <p class="login-subtitle">Prodi D3 Teknik Informatika</p><br>
    <p class="login-info">Silahkan Login dengan NIM/NIK dan Password Anda</p>
    <hr style="border: 0; border-top: 1px solid black; margin: 10px 0;">

    <form action="proses_login.php" method="post">
      <div class="mb-3 text-start">
        <label for="username" class="form-label">NIM/NIK</label>
        <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan NIM/NIK">
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password">
      </div>

      <button type="submit" class="btn btn-login">Login</button>
    </form>
  </div>
</body>
</html>
