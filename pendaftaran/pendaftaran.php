<?php
include '../koneksi.php';
include '../login/cek_login.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rexindonet - Layanan WiFi Berkualitas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --navy-blue: #00249c;
            --light-blue: #3dc3f3;
            --footer-bg: #333333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: white;
            overflow-x: hidden;
        }


        .navbar {
            background-color: var(--navy-blue) !important;
            padding: 15px 0;
            border-bottom: 2px solid var(--light-blue);
        }

        .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: white !important;
            font-size: 0.9rem;
            font-weight: 500;
            margin: 0 10px;
        }

        .nav-link:hover {
            color: var(--light-blue) !important;
        }

        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #16213e 0%, #0f3460 100%);
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 4.5rem;
            font-weight: 800;
            color: var(--light-blue);
            line-height: 1;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: white;
        }

        .hero-description {
            font-size: 1.2rem;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .feature-list i {
            margin-right: 15px;
        }

        .icon-signal {
            color: #ffffff;
        }

        .icon-bolt {
            color: #ffeb3b;
        }

        .icon-tag {
            color: #ffffff;
        }

        .cta-box {
            margin-top: 40px;
            font-size: 1.4rem;
            font-weight: 600;
        }

        footer {
            background-color: var(--footer-bg);
            padding: 60px 0 30px;
            border-top: 5px solid var(--light-blue);
        }

        .about-text {
            font-size: 0.85rem;
            color: #ccc;
            line-height: 1.8;
            text-align: justify;
        }

        .social-icons a {
            font-size: 2rem;
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: var(--light-blue);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: white;
            margin-right: 15px;
        }

        .contact-text {
            font-size: 0.85rem;
            color: #ccc;
        }

        .registration-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 40px;

            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .registration-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .registration-header h2 {
            color: #003399;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .registration-header p {
            color: #666;
            font-size: 14px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            font-size: 16px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #003399;
            outline: none;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background-color: #003399;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #002266;
        }

        @media (max-width: 768px) {
            .registration-container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h3 class="m-0 fw-bold text-white"><span style="color:var(--light-blue)">REXINDO</span>NET.</h3>
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="../Rexidonet.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../produk/paket.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="../area/area.php">Area Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="../faq/faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pendaftaran/pendaftaran.php">Pendaftaran</a></li>
                    <li class="nav-item ms-lg-3">
                        <?php if (isset($_SESSION['login_user'])): ?>
                            <a class="nav-link btn-auth" href="../login/logout.php">Logout</a>
                        <?php else: ?>
                            <a class="nav-link btn-auth" href="../login/login.php">MyRexindonet</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item ms-2"><a class="nav-link" href="#"><i class="fas fa-cog"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="registration-container">
        <div class="registration-header">
            <h2>Formulir Pendaftaran Pemasangan Baru</h2>
            <p>Silakan isi data di bawah ini dengan lengkap untuk proses aktivasi layanan Rexindonet.</p>
        </div>

        <form action="proses_pendaftaran.php" method="POST" class="registration-form">
            <div class="form-section">
                <h3><i class="fas fa-user"></i> Data Pribadi</h3>
                <div class="form-group">
                    <label for="nama">Nama Lengkap (Sesuai KTP)</label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Budi Santoso" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">Nomor WhatsApp Aktif</label>
                        <input type="tel" id="whatsapp" name="whatsapp" placeholder="081234567xxx" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3><i class="fas fa-map-marker-alt"></i> Alamat Pemasangan</h3>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3" placeholder="Nama Jalan, Blok, No. Rumah, RT/RW" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="Jatiluhur" required>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan/Desa</label>
                        <input type="text" id="kelurahan" name="kelurahan" placeholder="Contoh: Kembang Kuning" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3><i class="fas fa-wifi"></i> Pilih Paket Layanan</h3>
                <div class="form-group">
                    <label for="paket">Paket Internet</label>
                    <select id="paket" name="paket" required>
                        <option value="">-- Pilih Paket --</option>
                        <option value="basic">Rexindonet Basic - 10 Mbps</option>
                        <option value="medium">Rexindonet Medium - 20 Mbps</option>
                        <option value="pro">Rexindonet Pro - 50 Mbps</option>
                        <option value="business">Rexindonet Business - 100 Mbps</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipe Bangunan</label>
                    <div class="radio-group">
                        <select id="paket" name="paket" required>
                            <option value="">-- Pilih Bangunan --</option>
                            <option value="">Rumah Kos-kos</option>
                            <option value="">Rumah Perumahan</option>
                            <option value="">Ruko </option>
                            <option value="">Toko</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit">Kirim Pendaftaran</button>
        </form>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <h5>Tentang Kami</h5>
                    <p class="about-text">
                        <strong>Rexindonet</strong> merupakan penyedia layanan internet WiFi yang berkomitmen menghadirkan koneksi cepat, stabil, dan terpercaya untuk kebutuhan rumah tangga maupun usaha. Dengan dukungan jaringan yang andal dan layanan pelanggan yang responsif, Rexidonet hadir sebagai solusi internet yang mendukung aktivitas digital secara optimal.
                    </p>
                </div>

                <div class="col-lg-3 mb-4 text-lg-center">
                    <h5>media sosial</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/6282116104687"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <h5>Rexindonet Home</h5>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div class="contact-text">
                            <strong>Rexindonet@gmail.com</strong><br>Hubungi Kami
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="contact-text">
                            Kembang Kuning, Jatiluhur,<br>Purwakarta
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>