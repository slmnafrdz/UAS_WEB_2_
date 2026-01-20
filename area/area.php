<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rexidonet - Layanan WiFi Berkualitas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --navy-blue: #00249c;
            --light-blue: #3dc3f3;
            --dark-bg: #1e1e1e;
            --footer-bg: #2d2d2d;
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
        }

        /* Area Lokasi (Dark Section) */
        .location-section {
            background-color: var(--dark-section);
            padding: 80px 0;
            min-height: 70vh;
            color: white;
        }

        .location-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 40px;
            letter-spacing: 2px;
        }

        /* Map Container */
        .map-container {
            background-color: #e8f5e9;
            /* Hijau muda pucat seperti di gambar */
            border-radius: 20px;
            padding: 30px;
            min-height: 450px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        /* Input Lokasi Anda */
        .location-input-box {
            background: white;
            border-radius: 10px;
            padding: 10px 20px;
            width: 100%;
            max-width: 350px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 20px;
            cursor: pointer;
        }

        /* Footer */
        .footer-custom {
            background-color: #222222;
            color: white;
            padding: 60px 0;
        }

        .footer-title {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .about-text {
            font-size: 0.85rem;
            color: #bbb;
            text-align: justify;
        }

        .contact-icon {
            font-size: 1.5rem;
            margin-right: 15px;
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

    <section class="location-section">
        <div class="container">
            <h1 class="location-title">LOKASI</h1>

            <div class="map-container">
                <div class="location-input-box">
                    <span>Purwakarta, Jawa Barat</span>
                    <i class="fas fa-chevron-right"></i>
                </div>

                <div class="ratio ratio-21x9 shadow-sm" style="border-radius: 15px; overflow: hidden; height: 400px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.5323205731!2d107.35922439564177!3d-6.515647796985011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e668a867b9d%3A0x301576d141405e0!2sPurwakarta%2C%20Kabupaten%20Purwakarta%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

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