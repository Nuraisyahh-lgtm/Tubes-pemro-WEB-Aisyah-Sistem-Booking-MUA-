<?php
$koneksi = mysqli_connect("localhost", "root", "");
if (!$koneksi) { die("Koneksi Server Gagal"); }

// 1. Buat Database
mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS db_mua");
mysqli_select_db($koneksi, "db_mua");

// 2. Tabel Admin
mysqli_query($koneksi, "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50), password VARCHAR(255)
)");
// Seed Admin (User: admin, Pass: admin123)
$cek = mysqli_query($koneksi, "SELECT * FROM admin");
if(mysqli_num_rows($cek) == 0){
    mysqli_query($koneksi, "INSERT INTO admin VALUES ('', 'admin', 'admin123')");
}

// 3. Tabel Paket (Produk MUA)
mysqli_query($koneksi, "CREATE TABLE IF NOT EXISTS paket (
    id_paket INT AUTO_INCREMENT PRIMARY KEY,
    nama_paket VARCHAR(100),
    harga INT
)");
// Seed Paket
$cek_paket = mysqli_query($koneksi, "SELECT * FROM paket");
if(mysqli_num_rows($cek_paket) == 0){
    mysqli_query($koneksi, "INSERT INTO paket VALUES ('', 'Wisuda Natural', 350000)");
    mysqli_query($koneksi, "INSERT INTO paket VALUES ('', 'Lamaran/Engagement', 750000)");
    mysqli_query($koneksi, "INSERT INTO paket VALUES ('', 'Wedding Akad Only', 1500000)");
    mysqli_query($koneksi, "INSERT INTO paket VALUES ('', 'Wedding Resepsi (Intimate)', 2500000)");
}

// 4. Tabel Booking (Transaksi Utama)
mysqli_query($koneksi, "CREATE TABLE IF NOT EXISTS booking (
    id_booking INT AUTO_INCREMENT PRIMARY KEY,
    nama_client VARCHAR(100),
    no_hp VARCHAR(20),
    alamat TEXT,
    tanggal_booking DATE,
    id_paket INT,
    status VARCHAR(20) DEFAULT 'Pending'
)");

echo "<h3>✅ Database Siap! <a href='index.php'>Buka Website</a></h3>";
?>