<?php
// Konfigurasi database
$host = 'localhost'; // Host database (biasanya localhost)
$user = 'root'; // Username database
$password = ''; // Password database (kosong jika default)
$dbname = 'crud_produk_db'; // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menampilkan pesan sukses jika koneksi berhasil
// echo "Koneksi berhasil!";
?>
