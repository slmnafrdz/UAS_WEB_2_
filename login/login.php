<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MyRexidonet</title>

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
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login-box {
            background: white;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
        }

        /* Garis dekorasi atas */
        .login-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--light-blue);
            border-radius: 25px 25px 0 0;
        }

        .login-box h2 {
            margin-bottom: 10px;
            color: var(--navy-blue);
            font-weight: 800;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .login-box h2 span {
            color: var(--light-blue);
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-left: 5px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            color: #aaa;
            font-size: 16px;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            margin-top: 5px;
            border-radius: 12px;
            border: 1.5px solid #eee;
            font-size: 14px;
            background: #fdfdfd;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .input-wrapper input:focus {
            border-color: var(--light-blue);
            background: white;
            outline: none;
            box-shadow: 0 0 10px rgba(61, 195, 243, 0.2);
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--navy-blue);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 5px 15px rgba(0, 36, 156, 0.3);
        }

        .btn-login:hover {
            background: var(--light-blue);
            color: var(--navy-blue);
            transform: translateY(-2px);
        }

        .register-link {
            margin-top: 25px;
            font-size: 14px;
            color: #444;
        }

        .register-link a {
            color: var(--navy-blue);
            text-decoration: none;
            font-weight: 700;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 30px;
            font-size: 11px;
            color: #bbb;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>MY REXINDO<span>NET</span></h2>
        <p class="subtitle">Masuk untuk mengelola layanan WiFi Anda</p>

        <form action="proses_login.php" method="post">

            <div class="input-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <i class="fas fa-user-circle"></i>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-shield-alt"></i>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn-login">MASUK SEKARANG</button>

        </form>

        <div class="register-link">
            Belum punya layanan? <a href="../register/register.php">Daftar Sekarang</a>
        </div>

        <p class="footer-text">© 2026 REXINDONET — Solusi Internet Cepat</p>
    </div>

</body>

</html>