<?php
session_start();
include 'koneksi.php';

// Cek jika ID akun yang ingin dihapus ada di URL
if (isset($_GET['id'])) {
  $id_admin = $_GET['id'];

  // Query untuk menghapus data admin berdasarkan ID
  $delete_query = "DELETE FROM admin WHERE id = '$id_admin'";

  if (mysqli_query($koneksi, $delete_query)) {
    $_SESSION['message'] = 'Akun berhasil dihapus!';
    header("Location: index.php");
    exit();
  } else {
    // Jika gagal menghapus, tampilkan pesan error
    $_SESSION['error'] = 'Terjadi kesalahan saat menghapus akun.';
    header("Location: index.php");
    exit();
  }
} else {
  // Jika ID tidak ada di URL, redirect ke halaman akun
  $_SESSION['error'] = 'ID akun tidak ditemukan.';
  header("Location: index.php");
  exit();
}
?>
