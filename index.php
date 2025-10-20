<?php
session_start();
include 'koneksi.php';

// Ambil data admin
$result = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id DESC");
$total = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>adminpanel</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />

  <style>
    table, th, td {
      font-size: 13px;
    }

    table tr td, table tr th {
      vertical-align: middle;
      padding: 12px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #fef9f1;
    }

    .table-striped tbody tr:nth-of-type(even) {
      background-color: #fff7f7;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
      transition: all 0.2s ease-in-out;
    }

    #akunTable {
      border-radius: 10px;
    }

    .btn-sm {
      font-size: 12px;
      padding: 6px 10px;
    }

    /* CSS untuk memastikan footer selalu berada di bawah */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .container {
      flex: 1; /* Menjamin konten utama memanfaatkan ruang yang tersedia */
    }

    footer {
      margin-top: auto; /* Menggerakkan footer ke bawah */
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow">
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
        <li class="nav-item"><a class="nav-link" href="index.php" style="color: #d4c26a;">Kelola Akun</a></li>
          <span class="nav-link" style="color: #d4c26a;">Halo, <?= $_SESSION['admin_nama']; ?></span>
                  <li class="nav-item"><a class="nav-link" href="logout.php" style="color: #d4c26a;">Logout</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container my-5">
  <h3 class="mb-4 fw-bold" style="color: #6d0f10;">Kelola Akun</h3>

  <div class="alert alert-warning shadow-sm rounded-pill px-4 py-2" role="alert">
    <strong>Total Akun:</strong> <?= $total; ?>
  </div>

  <a href="tambah_akun.php" class="btn btn-success mb-3 rounded-pill px-4">+ Tambah Akun</a>

<div class="table-responsive shadow-sm rounded-4 overflow-hidden">
  <table class="table align-middle table-hover text-white" id="pendaftarTable" style="font-size: 14px; background-color: #6d0f10;">
    <thead style="background: linear-gradient(90deg, #6d0f10, #a6262a); color: #6d0f10;" class="text-center">
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Username</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td class="text-center"><?= $no++; ?></td>
        <td class="text-center"><?= htmlspecialchars($row['nama']); ?></td>
        <td class="text-center"><span class="badge bg-primary"><?= htmlspecialchars($row['username']); ?></span></td>
        <td class="text-center">
          <a href="edit_akun.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm rounded-pill">Edit</a>
          <a href="hapus_akun.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Hapus akun ini?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>


<!-- Footer -->
<footer>
  <div class="container text-center">
    <div class="social-icons mb-3">
    <a href="https://www.tiktok.com/@mecnesia?_t=ZS-8wKsskOzS11&_r=1" target="_blank" aria-label="TikTok">
    <i class="fab fa-tiktok fa-2x"></i></a>
      <a href="https://www.instagram.com/mecnesia.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="https://www.youtube.com/@mecnesiatv5894" target="_blank" aria-label="YouTube"><i class="fab fa-youtube fa-2x"></i></a>
      <a href="mailto:info@mecnesia.com" aria-label="Email"><i class="fas fa-envelope fa-2x"></i></a>
    </div>
    <p>&copy; <?= date('Y'); ?> Mecnesia. All Rights Reserved.</p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#pendaftarTable').DataTable({
      pageLength: 10,
      lengthChange: false,
      ordering: false,
      paging: true, // pastikan pagination diaktifkan
      language: {
        search: "Cari:",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        },
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ akun",
        infoEmpty: "Tidak ada akun",
        zeroRecords: "Akun tidak ditemukan"
      }
    });
  });
</script>

</body>
</html>
