# 🌐 UAS_WEB_2_
## Website Layanan Internet (WiFi) – Rexindonet

[![Live Demo](https://img.shields.io/badge/Live-Demo-blue)](https://rexindonet.page.gd)
[![PHP](https://img.shields.io/badge/PHP-Native-purple)](#)
[![MySQL](https://img.shields.io/badge/Database-MySQL-orange)](#)
[![License](https://img.shields.io/badge/License-Academic-green)](#)

Website **Layanan Internet (WiFi) Rexindonet** berbasis **PHP & MySQL**
yang menyediakan informasi paket internet, promo, testimoni pelanggan,
FAQ, serta fitur **pendaftaran pelanggan baru secara online**.

Project ini dibuat untuk memenuhi **Ujian Akhir Semester (UAS) Web 2**.

🌐 **Demo Website:**  
https://rexindonet.page.gd

📁 **Repository GitHub:**  
https://github.com/slmnafrdz/UAS_WEB_2_.git

---

## 📌 Deskripsi Proyek

Aplikasi ini merupakan website layanan internet/WiFi yang berfungsi
sebagai media informasi sekaligus sistem pendaftaran pelanggan baru.
Pengguna dapat melihat paket internet yang tersedia, promo, testimoni,
dan FAQ, kemudian melakukan pendaftaran secara online.

Admin dapat mengelola data paket, promo, testimoni, FAQ, serta data
pendaftaran pelanggan melalui sistem backend.

---

## 🎯 Tujuan Pembuatan
- Menyediakan sistem informasi layanan WiFi berbasis web
- Mempermudah proses pendaftaran pelanggan baru
- Menerapkan konsep CRUD pada aplikasi web
- Mengimplementasikan basis data relasional
- Memenuhi tugas UAS mata kuliah Web 2

---

## ✨ Fitur Aplikasi

### 👤 Pengunjung / User
- Melihat daftar paket internet
- Melihat promo
- Melihat testimoni pelanggan
- Melihat FAQ
- Melakukan pendaftaran layanan WiFi

### 🔐 Admin
- Login admin
- Kelola paket internet
- Kelola promo
- Kelola testimoni
- Kelola FAQ
- Kelola data pendaftaran pelanggan

---

## 🛠️ Teknologi yang Digunakan
- **PHP (Native)**
- **MySQL**
- **HTML5**
- **CSS3**
- **JavaScript**
- **Bootstrap**
- **Laragon (Local Server)**

---

## 🗄️ Struktur Database

Tabel yang digunakan:
- `paket` – Data paket internet
- `promo` – Data promo layanan
- `testimoni` – Testimoni pelanggan
- `faq` – Pertanyaan dan jawaban
- `tbl_user` – Data admin
- `pendaftaran` – Data pendaftaran pelanggan

Relasi utama:
- Satu paket internet dapat dipilih oleh banyak pendaftar

---

## 📁 Struktur Folder Project (Ringkas)

UAS_WEB_2_/
├── admin/
├── assets/
├── database/
│ └── schema.sql
├── koneksi.php
├── login.php
├── index.php
└── README.md


---

## ⚙️ Cara Instalasi & Menjalankan Project (Laragon)

### 1️⃣ Clone Repository
```bash
git clone https://github.com/slmnafrdz/UAS_WEB_2_.git

2️⃣ Pindahkan ke Folder Laragon
Letakkan folder project ke:
C:\laragon\www\UAS_WEB_2_

3️⃣ Import Database
Jalankan Laragon
Buka phpMyAdmin
Buat database baru (contoh: rexindonet_db)
Import file:
/database/schema.sql

4️⃣ Konfigurasi Database
Edit file:
koneksi.php

5️⃣ Jalankan Aplikasi
http://localhost/UAS_WEB_2_

👤 Akun Demo Admin
Username: admin
Password: admin

👤 Akun Demo pelanggan
Username: Akundemo@gmail.com
Password: demo123

📌 Catatan
Project ini dibuat untuk keperluan akademik dan sebagai arsip hasil
UAS Web 2.

👨‍💻 Developer
Nama: Salman Alfaridzi
Project: Website Layanan Internet (Rexindonet)
Mata Kuliah: Web 2
Jenis: UAS
Tahun: 2026

