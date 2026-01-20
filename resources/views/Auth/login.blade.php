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
            background-color: #5e2ca5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .login-box {
            width: 400px;
            background: #fff;
            border-radius: 8px;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo img {
            width: 110px;
        }
        .login-title {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: #444;
        }
        .form-control {
            height: 45px;
        }
        .btn-login {
            background-color: #f39c12;
            border: none;
            color: #fff;
            font-weight: bold;
            width: 100%;
            height: 45px;
        }
        .btn-login:hover {
            background-color: #d68910;
        }
    </style>
</head>

<body>

<div class="login-box">
    <div class="login-logo text-center mb-3">
    <img src="{{ asset('assets/images/logo-amikom.png') }}"
     alt="Logo Universitas Amikom Yogyakarta"
     style="max-width:200px">

</div>


    <div class="login-title">
        Silahkan Login dengan NIM/NIK dan Password Anda
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label>NIM / NIK</label>
            <input type="text" name="nim_nik" class="form-control" placeholder="Masukkan NIM/NIK" required>
            @error('nim_nik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-login">
            Login
        </button>
    </form>
</div>

</body>
</html>
