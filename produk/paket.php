<?php
include '../koneksi.php';
session_start();
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

        /* Navbar */
        .navbar-custom {
            background-color: var(--navy-blue) !important;
            padding: 12px 0;
        }

        .nav-link {
            color: white !important;
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0 5px;
        }

        /* Tombol Biru di bawah Navbar */
        .btn-paket-wifi {
            background-color: var(--navy-blue);
            color: white;
            border: none;
            padding: 10px 30px;
            font-weight: bold;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: -2px;
        }

        /* Headline Section */
        .headline-section {
            padding-top: 60px;
            text-align: center;
        }

        .hero-title {
            color: #48cae4;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .sub-title {
            color: var(--navy-blue);
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 50px;
        }

        /* Price Container (Kotak Putih Besar) */
        .price-container {
            background: white;
            border-radius: 40px;
            border: 3px solid #bde0fe;
            padding: 60px 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 0 auto 100px auto;
        }

        .price-item {
            border-right: 3px solid #bde0fe;
            text-align: center;
        }

        .price-item:last-child {
            border-right: none;
        }

        .speed-label {
            font-weight: 800;
            font-size: 1rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .speed-value {
            font-size: 6rem;
            font-weight: 900;
            line-height: 0.8;
            color: #000;
        }

        .speed-unit {
            font-weight: 800;
            font-size: 1.2rem;
            display: block;
            margin-top: 10px;
        }

        .price-tag {
            font-size: 2.8rem;
            font-weight: 900;
            margin-top: 15px;
            color: #000;
        }

        .currency {
            font-size: 1.1rem;
            vertical-align: middle;
            font-weight: 800;
            margin-right: -5px;
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            color: white;
            padding: 60px 0;
        }

        .footer-title {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 25px;
        }

        .about-text {
            font-size: 0.85rem;
            line-height: 1.6;
            color: #dfdfdf;
        }

        .contact-icon {
            font-size: 1.8rem;
            margin-right: 15px;
        }

        .social-link {
            color: white;
            font-size: 2rem;
            margin-right: 15px;
            text-decoration: none;
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
    <div class="container text-center py-5">
        <h2 class="hero-title">Paket Internet, Smartphon, TV , Laptop</h2>
        <h1 class="sub-title">Paket Internet Only</h1>
        <div class="price-container">
            <div class="row align-items-center justify-content-center">
                <?php
                $query_paket = mysqli_query($conn, "SELECT * FROM paket ORDER BY kecepatan ASC");
                if (mysqli_num_rows($query_paket) > 0) {
                    while ($p = mysqli_fetch_array($query_paket)) {
                        echo '
                <div class="col-md-4 price-item mb-4">
                    <p class="speed-label">UP TO</p>
                    <div class="speed-value">' . htmlspecialchars($p['kecepatan']) . '</div>
                    <span class="speed-unit">Mbps</span>
                    <div class="price-tag">
                        <span class="currency">Rp.</span> ' . number_format($p['harga'], 0, ',', '.') . '
                    </div>
                    <p class="text-muted small">' . htmlspecialchars($p['deskripsi']) . '</p>
                    <a href="../pendaftaran/pendaftaran.php" class="btn btn-primary btn-sm mt-3 rounded-pill">Pilih Paket</a>
                </div>';
                    }
                } else {
                    echo '<div class="col-12 text-center text-dark"><p>Belum ada paket yang tersedia.</p></div>';
                }
                ?>
            </div>
        </div>
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
                    <h5>Media Sosial</h5>
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