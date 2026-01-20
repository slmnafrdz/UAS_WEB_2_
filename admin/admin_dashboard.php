<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Rexindonet</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f7f6;
            color: #333;
        }

        .sidebar {
            height: 100vh;
            background: #00249c;
            color: white;
            padding: 20px;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            z-index: 1050;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        .mobile-header {
            display: none;
            background: #00249c;
            color: #fff;
            padding: 10px 15px;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1100;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                left: -260px;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .mobile-header {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <div class="mobile-header">
        <button class="btn btn-light btn-sm" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <strong>Admin Rexindonet</strong>
    </div>

    <div class="sidebar">
        <h4>Admin Rexindonet</h4>
        <hr>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
            <a class="nav-link" href="#section-pendaftaran" onclick="toggleSidebar()"><i class="fas fa-users me-2"></i> Data Pendaftaran</a>
            <a class="nav-link" href="#section-paket" onclick="toggleSidebar()"><i class="fas fa-wifi me-2"></i> Kelola Paket</a>
            <a class="nav-link" href="#section-promo" onclick="toggleSidebar()"><i class="fas fa-percentage me-2"></i> Kelola Promo</a>
            <a class="nav-link" href="#section-testimoni" onclick="toggleSidebar()"><i class="fas fa-comment me-2"></i> Kelola Testimoni</a>
            <a class="nav-link" href="#section-faq" onclick="toggleSidebar()"><i class="fas fa-question-circle me-2"></i> Kelola FAQ</a>
            <a class="nav-link" href="../Rexidonet.php"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
        </nav>
    </div>

    <div class="main-content">
        <h2> ADMINISTRATOR KELOLA DATA </h2>

        <div class="card" id="section-pendaftaran">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Pendaftaran Masuk</h5>
                <span class="badge bg-primary">
                    <?php
                    $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM pendaftaran");
                    $count = mysqli_fetch_assoc($res);
                    echo $count['total'] . " Pendaftar";
                    ?>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama & Email</th>
                                <th>WhatsApp</th>
                                <th>Alamat & Lokasi</th>
                                <th>Paket & Bangunan</th>
                                <th>Waktu Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_daftar = mysqli_query($conn, "SELECT id, nama, email, whatsapp, alamat, kecamatan, kelurahan, paket, tipe_bangunan, tanggal_daftar FROM pendaftaran ORDER BY id DESC");

                            if (mysqli_num_rows($query_daftar) == 0) {
                                echo "<tr><td colspan='7' class='text-center'>Belum ada pendaftaran masuk.</td></tr>";
                            }

                            while ($row = mysqli_fetch_array($query_daftar)) {
                                $no_wa = $row['whatsapp'];
                                if (substr($no_wa, 0, 1) == '0') $no_wa = '62' . substr($no_wa, 1);
                                $tanggal = date('d M Y, H:i', strtotime($row['tanggal_daftar']));

                                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>
                                <strong>{$row['nama']}</strong><br>
                                <small class='text-muted'>{$row['email']}</small>
                            </td>
                            <td>
                                <a href='https://wa.me/{$no_wa}' target='_blank' class='btn btn-sm btn-success'>
                                    <i class='fab fa-whatsapp'></i> {$row['whatsapp']}
                                </a>
                            </td>
                            <td>
                                <small>
                                    {$row['alamat']}<br>
                                    <strong>Kel:</strong> {$row['kelurahan']}, <strong>Kec:</strong> {$row['kecamatan']}
                                </small>
                            </td>
                            <td>
                                <span class='badge bg-info text-dark'>" . strtoupper($row['paket']) . "</span><br>
                                <small class='text-muted'>{$row['tipe_bangunan']}</small>
                            </td>
                            <td>
                                <small class='text-muted'>{$tanggal}</small>
                            </td>
                            <td>
                                <a href='../pendaftaran/proses_pendaftaran.php?act=del_daftar&id={$row['id']}' 
                                   class='btn btn-sm btn-danger' 
                                   onclick='return confirm(\"Hapus data pendaftaran ID {$row['id']}?\")'>
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card" id="section-paket">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Paket WiFi</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPaket">
                    <i class="fas fa-plus"></i> Tambah Paket
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Kecepatan</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_paket = mysqli_query($conn, "SELECT * FROM paket");
                        while ($row = mysqli_fetch_array($query_paket)) {
                            echo "<tr>
                        <td><strong>{$row['nama_paket']}</strong></td>
                        <td><span class='badge bg-info'>{$row['kecepatan']} Mbps</span></td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>{$row['deskripsi']}</td>
                        <td>
                            <a href='proses_paket.php?act=del_paket&id={$row['id']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Hapus paket ini?\")'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modalPaket" tabindex="-1">
            <div class="modal-dialog">
                <form action="proses_paket.php?act=add_paket" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Paket WiFi Baru</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control" placeholder="Contoh: Paket Home" required>
                        </div>
                        <div class="mb-3">
                            <label>Kecepatan (Mbps)</label>
                            <input type="number" name="kecepatan" class="form-control" placeholder="Contoh: 20" required>
                        </div>
                        <div class="mb-3">
                            <label>Harga (Hanya Angka)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 150000" required>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control" rows="2" placeholder="Contoh: Unlimited, 1-3 perangkat"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Paket</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" id="section-promo">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Promo Aktif</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPromo">
                    <i class="fas fa-plus"></i> Tambah Promo
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Judul Promo</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM promo");
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<tr>
                            <td><span class='badge bg-danger'>{$row['label']}</span></td>
                            <td><strong>{$row['judul']}</strong></td>
                            <td>" . substr($row['deskripsi'], 0, 50) . "...</td>
                            <td>
                                <a href='proses_promo.php?act=del_promo&id={$row['id']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Hapus promo ini?\")'>
                                <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="modalPromo" tabindex="-1">
            <div class="modal-dialog">
                <form action="proses_promo.php?act=add_promo" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Promo Baru</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><label>Label (Contoh: HOT/NEW)</label><input type="text" name="label" class="form-control" required></div>
                        <div class="mb-3"><label>Judul Promo</label><input type="text" name="judul" class="form-control" required></div>
                        <div class="mb-3"><label>Deskripsi Singkat</label><textarea name="deskripsi" class="form-control" rows="3" required></textarea></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Promo</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" id="section-testimoni">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Testimoni Pelanggan</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTesti">
                    <i class="fas fa-plus"></i> Tambah Testimoni
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Bintang</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC");
                        while ($row = mysqli_fetch_array($query)) {
                            $stars = str_repeat('⭐', $row['bintang']);
                            echo "<tr>
                        <td><strong>{$row['nama']}</strong></td>
                        <td><small class='text-muted'>{$row['pekerjaan']}</small></td>
                        <td>{$stars}</td>
                        <td>" . substr($row['pesan'], 0, 50) . "...</td>
                        <td>
                            <a href='proses_testimoni.php?act=del_testi&id={$row['id']}' 
                               class='btn btn-sm btn-outline-danger' 
                               onclick='return confirm(\"Hapus testimoni ini?\")'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="modalTesti" tabindex="-1">
            <div class="modal-dialog">
                <form action="proses_testimoni.php?act=add_testimoni" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Testimoni</h5>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Pelanggan" required>
                        <input type="text" name="pekerjaan" class="form-control mb-2" placeholder="Pekerjaan" required>
                        <textarea name="pesan" class="form-control" placeholder="Pesan"></textarea>
                        <select name="bintang" class="form-select mb-2">
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                    </div>
                    <div class="modal-footer"><button type="submit" class="btn btn-success">Simpan</button></div>
                </form>
            </div>
        </div>

        <div class="card" id="section-faq">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar FAQ (Tanya Jawab)</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFAQ">
                    <i class="fas fa-plus"></i> Tambah FAQ
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_faq = mysqli_query($conn, "SELECT * FROM faq");
                        while ($row = mysqli_fetch_array($query_faq)) {
                            echo "<tr>
                        <td><strong>{$row['pertanyaan']}</strong></td>
                        <td>" . substr($row['jawaban'], 0, 100) . "...</td>
                        <td>
                            <a href='proses_faq.php?act=del_faq&id={$row['id']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Hapus FAQ ini?\")'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modalFAQ" tabindex="-1">
            <div class="modal-dialog">
                <form action="proses_faq.php?act=add_faq" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah FAQ Baru</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control" placeholder="Contoh: Bagaimana cara mendaftar?" required>
                        </div>
                        <div class="mb-3">
                            <label>Jawaban</label>
                            <textarea name="jawaban" class="form-control" rows="4" placeholder="Tuliskan jawaban lengkap di sini..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan FAQ</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function toggleSidebar() {
                document.querySelector('.sidebar').classList.toggle('show');
            }
        </script>
</body>

</html>