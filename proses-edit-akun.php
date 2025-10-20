<?php
session_start();
include 'koneksi.php';

// Cek jika belum login
if (!isset($_SESSION['login_admin'])) {
  header("Location: adminpanel.php");
  exit();
}

// Cek jika ID akun yang ingin diedit ada di URL
if (isset($_POST['id'])) {
  $id_admin = $_POST['id'];
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = $_POST['password'];

  // Query untuk mengambil data admin berdasarkan ID
  $query = "SELECT * FROM admin WHERE id = '$id_admin'";
  $result = mysqli_query($koneksi, $query);
  
  if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);

    // Cek jika password baru diubah
    if (!empty($password)) {
      // Jika password diubah, hash password baru
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $update_query = "UPDATE admin SET nama = ?, username = ?, password = ? WHERE id = ?";
      $stmt = mysqli_prepare($koneksi, $update_query);
      mysqli_stmt_bind_param($stmt, "sssi", $nama, $username, $password_hash, $id_admin);
    } else {
      // Jika password tidak diubah, hanya update nama dan username
      $update_query = "UPDATE admin SET nama = ?, username = ? WHERE id = ?";
      $stmt = mysqli_prepare($koneksi, $update_query);
      mysqli_stmt_bind_param($stmt, "ssi", $nama, $username, $id_admin);
    }

    // Eksekusi query update
    if (mysqli_stmt_execute($stmt)) {
      $_SESSION['message'] = 'Akun berhasil diperbarui!';
      header("Location: index.php");
      exit();
    } else {
      // Jika gagal, tampilkan pesan error
      $_SESSION['error'] = 'Terjadi kesalahan saat memperbarui data.';
      header("Location: edit_akun.php?id=$id_admin");
      exit();
    }
  } else {
    // Jika ID tidak ditemukan
    $_SESSION['error'] = 'Akun tidak ditemukan.';
    header("Location: index.php");
    exit();
  }
} else {
  // Jika ID tidak ada di POST, redirect ke halaman akun
  header("Location: index.php");
  exit();
}
?>
