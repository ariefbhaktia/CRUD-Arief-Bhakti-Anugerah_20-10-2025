<?php
session_start();
include 'koneksi.php';

// Check if the user is logged in
if (!isset($_SESSION['login_admin'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Akun - Mecnesia</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .navbar-custom {
      background-color: #6d0f10;
    }

    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #fff;
    }

    .navbar-custom .nav-link:hover {
      color: #d4c26a;
    }

    footer {
      background-color: #6d0f10;
      color: white;
      padding: 20px 0;
    }

    footer p {
      color: #d4c26a;
    }

    .social-icons i {
      color: #d4c26a;
    }

    .social-icons i:hover {
      color: #d4c26a;
    }

    .custom-shadow {
      box-shadow: 0 10px 30px rgba(123, 17, 19, 0.2);
      border-radius: 20px;
    }

    .step-btn {
      background-color: #6d0f10;
      color: white;
    }

    .step-btn:hover {
      background-color: #5c0d0f;
    }

    .form-footer-spacing {
      margin-bottom: 80px !important;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom shadow">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo1.png" alt="Logo Mecnesia" style="height: 60px; margin-right: 10px;">
        <span style="font-weight: bold; color: #d6c464;">MECNESIA</span>
      </a>
      <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
        <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarAdmin">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php" style="color: #d4c26a;">Akun</a></li>
          <li class="nav-item"><span class="nav-link" style="color: #d4c26a;">Halo, <?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Admin'); ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php" style="color: #d4c26a;">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="py-5" style="background-color: #f5f5f5;">
    <div class="container">
      <div class="card shadow p-5 custom-shadow">
        <h2 class="text-center mb-4" style="color: #6d0f10;">Tambah Akun</h2>

        <!-- Display Error or Success Message -->
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($_SESSION['error']); ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($_SESSION['success']); ?>
          </div>
          <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <form action="proses-tambah-akun.php" method="post" enctype="multipart/form-data" id="formTambahAkun">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control" required>
              <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                <i class="fas fa-eye" id="eyeIcon"></i>
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-3 mb-4 form-footer-spacing">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Kembali</button>
            <button type="submit" class="btn step-btn">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container text-center">
      <div class="social-icons mb-3">
        <a href="https://www.tiktok.com/@mecnesia?_t=ZS-8wKsskOzS11&_r=1" target="_blank" aria-label="TikTok">
          <i class="fab fa-tiktok fa-2x"></i>
        </a>
        <a href="https://www.instagram.com/mecnesia.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram">
          <i class="fab fa-instagram fa-2x"></i>
        </a>
        <a href="https://www.youtube.com/@mecnesiatv5894" target="_blank" aria-label="YouTube">
          <i class="fab fa-youtube fa-2x"></i>
        </a>
        <a href="mailto:info@mecnesia.com" aria-label="Email">
          <i class="fas fa-envelope fa-2x"></i>
        </a>
      </div>
      <p>&copy; <?= date('Y'); ?> Mecnesia. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Fungsi untuk toggle password visibility
    const togglePassword = document.querySelector("#togglePassword");
    const passwordField = document.querySelector("#password");
    const eyeIcon = document.querySelector("#eyeIcon");

    togglePassword.addEventListener("click", function() {
      const type = passwordField.type === "password" ? "text" : "password";
      passwordField.type = type;
      eyeIcon.classList.toggle("fa-eye-slash");
    });
  </script>
</body>

</html>