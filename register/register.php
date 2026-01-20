<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan - REXINDONET</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --navy-blue: #00249c;
            --light-blue: #3dc3f3;
            --dark-bg: #1e1e1e;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* Background gradasi sesuai tema Rexidonet */
            background: linear-gradient(135deg, var(--navy-blue) 0%, #001253 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Dekorasi garis di atas box */
        .register-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--light-blue);
        }

        .register-container h2 {
            margin-bottom: 5px;
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 28px;
        }

        .register-container h2 span {
            color: var(--light-blue);
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .input-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-left: 5px;
        }

        .input-field {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-field i {
            position: absolute;
            left: 15px;
            color: #aaa;
            font-size: 16px;
        }

        .input-field input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            margin-top: 5px;
            border-radius: 12px;
            border: 1.5px solid #eee;
            font-size: 14px;
            background: #f9f9f9;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .input-field input:focus {
            border-color: var(--light-blue);
            background: white;
            outline: none;
            box-shadow: 0 0 8px rgba(61, 195, 243, 0.2);
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background: var(--navy-blue);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(0, 36, 156, 0.3);
        }

        .btn-register:hover {
            background: var(--light-blue);
            color: var(--navy-blue);
            transform: translateY(-2px);
        }

        .login-link {
            margin-top: 25px;
            font-size: 14px;
            color: #444;
        }

        .login-link a {
            color: var(--navy-blue);
            text-decoration: none;
            font-weight: 700;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-top: 20px;
            font-size: 13px;
            color: #999;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-home:hover {
            color: var(--light-blue);
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2>REXINDO<span>NET</span></h2>
        <p class="subtitle">Buat akun untuk mulai berlangganan internet</p>

        <form action="proses_register.php" method="post">

            <div class="input-group">
                <label>Nama Lengkap</label>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nama" placeholder="Masukkan nama sesuai KTP" required>
                </div>
            </div>

            <div class="input-group">
                <label>Username</label>
                <div class="input-field">
                    <i class="fas fa-at"></i>
                    <input type="text" name="username" placeholder="Buat username unik" required>
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Minimal 6 karakter" required>
                </div>
            </div>

            <button type="submit" class="btn-register">DAFTAR SEKARANG</button>

        </form>

        <div class="login-link">
            Sudah punya akun? <a href="../login/login.php">Masuk MyRexindonet</a>
        </div>

        <a href="../Rexidonet.php" class="back-home"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>

        <p style="margin-top: 25px; font-size: 11px; color: #bbb;">
            © 2025 REXINDONET — Solusi Internet Cepat & Stabil
        </p>
    </div>

</body>

</html>