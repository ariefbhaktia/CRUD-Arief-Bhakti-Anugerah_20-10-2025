<?php
$host     = "localhost";       // Ganti jika bukan localhost
$user     = "root";            // Username MySQL kamu
$password = "";                // Password MySQL kamu (kosong jika default XAMPP)
$database = "mecnesia";     // Ganti dengan nama database kamu

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
