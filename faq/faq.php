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

        .faq-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .faq-title {
            text-align: center;
            color: #003399;
            /* Senada dengan warna navbar */
            margin-bottom: 30px;
        }

        .faq-item {
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .faq-question {
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
        }

        .faq-question:hover {
            color: #003399;
        }

        .faq-answer {
            padding: 0 15px 15px 15px;
            display: none;
            color: #555;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-item.active .fa-chevron-down {
            transform: rotate(180px);
            transition: 0.3s;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-answer p {
            margin-bottom: 0;
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
    <a href="../admin/admin_dashboard.php" class="admin-float" title="Buka Dashboard Admin">
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
                                <li><a class="dropdown-item" href="../admin/admin_dashboard.php">Dashboard Utama</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="../login/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
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

    <div class="faq-container">
        <h2 class="faq-title">Pertanyaan yang Sering Diajukan (FAQ)</h2>

        <?php
        // Ambil data dari database tabel faq
        $query_faq = mysqli_query($conn, "SELECT * FROM faq ORDER BY id DESC");

        // Cek apakah ada data
        if (mysqli_num_rows($query_faq) > 0) {
            while ($row = mysqli_fetch_array($query_faq)) {
        ?>
                <div class="faq-item">
                    <button class="faq-question">
                        <?php echo htmlspecialchars($row['pertanyaan']); ?>
                        <i class="fas fa-chevron-down small"></i>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo nl2br(htmlspecialchars($row['jawaban'])); ?></p>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p class="text-center text-muted">Belum ada pertanyaan yang tersedia.</p>';
        }
        ?>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <h5>Tentang Kami</h5>
                    <p class="about-text">
                        <strong>Rexidonet</strong> merupakan penyedia layanan internet WiFi yang berkomitmen menghadirkan koneksi cepat, stabil, dan terpercaya untuk kebutuhan rumah tangga maupun usaha. Dengan dukungan jaringan yang andal dan layanan pelanggan yang responsif, Rexidonet hadir sebagai solusi internet yang mendukung aktivitas digital secara optimal.
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
<script>
    const questions = document.querySelectorAll(".faq-question");

    questions.forEach(question => {
        question.addEventListener("click", () => {
            const item = question.parentElement;
            item.classList.toggle("active");
        });
    });
</script>