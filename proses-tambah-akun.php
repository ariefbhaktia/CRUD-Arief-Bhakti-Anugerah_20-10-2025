<?php
// Mulai sesi
session_start();

// Include koneksi database
include 'koneksi.php';

// Fungsi untuk membersihkan input
function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Cek jika data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = cleanInput($_POST['nama']);
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    // Validasi input
    if (empty($nama) || empty($username) || empty($password)) {
        $_SESSION['error'] = 'Semua field harus diisi.';
        header("Location: tambah_akun.php");
        exit;
    }

    // Cek apakah username sudah ada
    $check_stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ?");
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $_SESSION['error'] = 'Username sudah digunakan. Silakan pilih username lain.';
        $check_stmt->close();
        header("Location: tambah_akun.php");
        exit;
    }
    $check_stmt->close();

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke dalam tabel admin
    $stmt = $koneksi->prepare("INSERT INTO admin (nama, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $username, $hashed_password);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, set session sukses dan redirect
        $_SESSION['success'] = 'Akun admin berhasil ditambahkan!';
        $stmt->close();
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, set session error dan redirect
        $_SESSION['error'] = 'Gagal menambahkan akun admin: ' . $koneksi->error;
        $stmt->close();
        header("Location: tambah_akun.php");
        exit;
    }
} else {
    header("Location: tambah_akun.php");
    exit;
}
