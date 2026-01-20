<?php
include 'koneksi.php';
session_start(); ?>
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
            --dark-bg: #1e1e1e;
            --footer-bg: #2d2d2d;
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

        /* Styling untuk Logo Besar di Hero */
        .hero-logo-container {
            margin: 20px;
        }

        .hero-logo {
            max-width: 500px;
            height: auto;
            filter: drop-shadow(0px 0px 15px rgba(61, 195, 243, 0.3));
        }

        @media (max-width: 768px) {
            .hero-logo {
                max-width: 100%;
            }
        }

        /* Styling Promo */
        .promo-section {
            padding: 80px 0;
            background-color: #1a1a1a;
        }

        .promo-card {
            background: linear-gradient(145deg, #00249c, #001a70);
            border: none;
            border-radius: 20px;
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .promo-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(61, 195, 243, 0.3);
        }

        .promo-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: #ffeb3b;
            color: black;
            padding: 5px 40px;
            transform: rotate(45deg);
            font-weight: bold;
            font-size: 0.8rem;
        }

        /* Styling Testimoni */
        .testimonial-section {
            padding: 80px 0;
            background: var(--dark-bg);
        }

        .testimonial-card {
            background: #2d2d2d;
            border-radius: 15px;
            padding: 30px;
            border-left: 5px solid var(--light-blue);
            height: 100%;
        }

        .user-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 2px solid var(--light-blue);
        }

        .stars {
            color: #ffeb3b;
            margin-bottom: 10px;
        }

        .admin-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ffc107;
            color: #000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            text-decoration: none;
            transition: 0.3s;
        }

        .admin-float:hover {
            transform: scale(1.1);
            color: #000;
        }
    </style>
</head>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
    <a href="admin/admin_dashboard.php" class="admin-float" title="Buka Dashboard Admin">
        <i class="fas fa-tools fa-lg"></i>
    </a>
<?php endif; ?>

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
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle btn btn-outline-warning text-white px-3" href="#" id="adminDrop" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-shield me-1"></i> Admin Panel
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="admin/admin_dashboard.php">Dashboard Utama</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="login/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="produk/paket.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="area/area.php">Area Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq/faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="pendaftaran/pendaftaran.php">Pendaftaran</a></li>
                    <li class="nav-item ms-lg-3">
                        <?php if (isset($_SESSION['login_user'])): ?>
                            <a class="nav-link btn-auth" href="login/logout.php">Logout</a>
                        <?php else: ?>
                            <a class="nav-link btn-auth" href="login/login.php">MyRexindonet</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item ms-2"><a class="nav-link" href="#"><i class="fas fa-cog"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 hero-text">
                    <p class="hero-description">Nikmati layanan WiFi berkualitas untuk kerja, belajar, streaming, dan gaming tanpa gangguan.</p>

                    <ul class="feature-list">
                        <li><i class="fas fa-signal icon-signal"></i> Jaringan stabil</li>
                        <li><i class="fas fa-bolt icon-bolt"></i> Kecepatan optimal</li>
                        <li><i class="fas fa-tags icon-tag"></i> Harga terjangkau</li>
                    </ul>
                    <div class="hero-logo-container">
                        <img src="WhatsApp_Image_2025-12-10_at_21.57.16_741fe814-removebg-preview.png" alt="Rexindo Net Logo" class="hero-logo">
                    </div>
                    <div class="cta-box">
                        👉 <span style="color:var(--light-blue)">Pasang WiFi Rexindonet sekarang, rasakan koneksi tanpa batas!</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Promo <span style="color:var(--light-blue)">Spesial</span> Untuk Saat Ini</h2>
                <p class="text-secondary">Jangan lewatkan kesempatan terbatas untuk hemat lebih banyak!</p>
            </div>

            <div class="row g-4">
                <?php
                $ambil_promo = mysqli_query($conn, "SELECT * FROM promo ORDER BY id DESC");
                if (mysqli_num_rows($ambil_promo) > 0) {
                    while ($promo = mysqli_fetch_array($ambil_promo)) {
                ?>
                        <div class="col-md-4">
                            <div class="card promo-card h-100 p-4 position-relative">
                                <div class="promo-badge"><?php echo strtoupper($promo['label']); ?></div>

                                <h4 class="fw-bold"><?php echo $promo['judul']; ?></h4>
                                <p><?php echo $promo['deskripsi']; ?></p>

                                <hr>
                                <div class="mt-auto">
                                    <a href="pendaftaran/pendaftaran.php" class="btn btn-outline-light w-100">Klaim Promo</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-12 text-center'><p class='text-muted'>Belum ada promo aktif saat ini.</p></div>";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Apa Kata <span style="color:var(--light-blue)">Pelanggan Kami?</span></h2>
                <p class="text-secondary">Lebih dari 100 keluarga telah mempercayakan koneksinya kepada kami.</p>
            </div>
            <div class="row g-4">
                <?php
                $ambil_testi = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC LIMIT 3");
                while ($data = mysqli_fetch_array($ambil_testi)) {
                ?>
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <div class="stars">
                                <?php echo str_repeat('<i class="fas fa-star" style="color:#ffeb3b"></i>', $data['bintang']); ?>
                            </div>

                            <p class="font-italic">"<?php echo $data['pesan']; ?>"</p>

                            <div class="d-flex align-items-center mt-4">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($data['nama']); ?>&background=3dc3f3&color=fff" class="user-img" alt="User">
                                <div>
                                    <h6 class="mb-0 fw-bold"><?php echo $data['nama']; ?></h6>
                                    <small class="text-secondary"><?php echo $data['pekerjaan']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
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
            <p class="text-secondary" style="font-size: 0.7rem;">
                &copy; 2025 Rexindonet Home.
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="admin/admin_dashboard.php" class="text-secondary text-decoration-none">.</a>
                <?php endif; ?>
            </p>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>