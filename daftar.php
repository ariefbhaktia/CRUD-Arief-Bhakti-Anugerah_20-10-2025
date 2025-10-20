<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>joinmecnesia</title>

  <!-- SEO META -->
  <meta name="description" content="Mecnesia adalah tempat kursus Bahasa Inggris yang menyenangkan dan efektif, cocok untuk semua usia.">
  <meta name="keywords" content="kursus bahasa Inggris, les bahasa Inggris, belajar bahasa Inggris, Mecnesia">
  <meta name="author" content="Mecnesia">

  <!-- OG META -->
  <meta property="og:title" content="Mecnesia - Les Bahasa Inggris Terbaik">
  <meta property="og:description" content="Tempat terbaik belajar Bahasa Inggris secara menyenangkan dan efektif.">
  <meta property="og:image" content="https://joinmecnesia.id/assets/img/logo.png">
  <meta property="og:url" content="https://joinmecnesia.id/">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Mecnesia - Les Bahasa Inggris">
  <meta name="twitter:description" content="Tempat terbaik untuk belajar Bahasa Inggris dengan suasana menyenangkan dan efektif.">
  <meta name="twitter:image" content="https://joinmecnesia.id/assets/img/logo.png">

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "Mecnesia",
    "url": "https://joinmecnesia.id",
    "logo": "https://joinmecnesia.id/assets/img/logo.png",
    "description": "Tempat kursus Bahasa Inggris yang menyenangkan dan efektif untuk semua usia.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Indonesia"
    }
  }
  </script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .step-form {display: none;transition: opacity 0.3s ease-in-out;}
    .step-form.active {display: block;opacity: 1;}
    .step-btn {background-color: #7b1113;color: white;}
    .step-btn:hover {background-color: #5c0d0f;color: #d6c464;}
    .custom-shadow {box-shadow: 0 10px 30px rgba(123, 17, 19, 0.2);border-radius: 20px;}
    .step-indicator {display: flex;justify-content: space-between;margin-bottom: 20px;}
    .step-indicator .step {flex: 1;height: 5px;background-color: #ddd;margin: 0 5px;}
    .step-indicator .step.active {background-color: #7b1113;}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/img/logo1.png" alt="Logo Mecnesia" style="height: 60px; margin-right: 10px;">
      <span style="font-weight: bold; color: #d4c26a;">MECNESIA</span>
    </a>
    <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item d-none d-lg-block">
          <span class="nav-separator mx-3"></span>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-custom-secondary" href="index.php">Beranda</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="py-5" style="background-color: #f5f5f5;">
  <div class="container">
    <div class="card shadow p-5 custom-shadow">
      <h2 class="text-center" style="color: #7b1113;">Form Pendaftaran Mecnesia</h2>

      <form action="proses-daftar.php" method="post" enctype="multipart/form-data" id="formPendaftaran">

        <!-- Step Indicator -->
        <div class="step-indicator">
          <div class="step active"></div>
          <div class="step"></div>
          <div class="step"></div>
          <div class="step"></div>
        </div>

        <!-- STEP 1 -->
        <div class="step-form active" id="step1">
          <h5>1. Data Diri</h5>
          <div class="row">
            <div class="col-md-6 mb-3"><label>Nama Lengkap</label><input type="text" name="nama" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3"><label>Tempat, Tanggal Lahir</label><input type="text" name="ttl" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>No. WhatsApp</label><input type="number" name="whatsapp" class="form-control" required></div>
          </div>
          <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required></textarea></div>
          <div class="row">
            <div class="col-md-6 mb-3"><label>Sekolah / Kampus</label><input type="text" name="sekolah" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>Kelas / Departemen</label><input type="text" name="kelas" class="form-control" required></div>
          </div>
          <button type="button" class="btn step-btn w-100 mt-3" onclick="nextStep(2)">Lanjut</button>
        </div>

        <!-- STEP 2 -->
        <div class="step-form" id="step2">
          <h5>2. Data Program</h5>
          <div class="mb-3">
            <label for="provinsi">Pilih Provinsi</label>
            <select name="provinsi" id="provinsi" class="form-control" required>
              <option value="" disabled selected>Pilih provinsi</option>
              <option value="Jawa Barat">Jawa Barat</option>
              <option value="Jawa Tengah">Jawa Tengah</option>
              <option value="DI Yogyakarta">DI Yogyakarta</option>
              <option value="Jawa Timur">Jawa Timur</option>
              <option value="Gorontalo">Gorontalo</option>
              <option value="Sulawesi Selatan">Sulawesi Selatan</option>
              <option value="Sulawesi Tengah">Sulawesi Tengah</option>
              <option value="Sulawesi Utara">Sulawesi Utara</option>
              <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
              <option value="Sulawesi Barat">Sulawesi Barat</option>
              <option value="Kalimantan Timur">Kalimantan Timur</option>
              <option value="Kalimantan Barat">Kalimantan Barat</option>
              <option value="Kalimantan Selatan">Kalimantan Selatan</option>
              <option value="Kalimantan Utara">Kalimantan Utara</option>
              <option value="NTB">NTB</option>
              <option value="NTT">NTT</option>
              <option value="Maluku">Maluku</option>
              <option value="Maluku Utara">Maluku Utara</option>
              <option value="Papua Barat Daya">Papua Barat Daya</option>
              <option value="Papua">Papua</option>
              <option value="Bandar Lampung">Bandar Lampung</option>
              <option value="Sumatera Selatan">Sumatera Selatan</option>
              <option value="Jambi">Jambi</option>
              <option value="Riau">Riau</option>
              <option value="Kepulauan Riau">Kepulauan Riau</option>
              <option value="Sumatera Utara">Sumatera Utara</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="kota">Pilih Kabupaten/Kota</label>
            <select name="kota" id="kota" class="form-control" required>
              <option value="" disabled selected>Pilih Kabupaten/Kota</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="program">Pilih Program</label>
            <select name="program" id="program" class="form-control" required>
              <option value="" disabled selected>Pilih program</option>
              <option value="English Master">English Master</option>
              <option value="Super IELTS">Super IELTS</option>
              <option value="Super TOEFL">Super TOEFL</option>
              <option value="Super Speaking">Super Speaking</option>
              <option value="English For Future">English For Future</option>
              <option value="English For Teens">English For Teens</option>
            </select>
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Kembali</button>
            <button type="button" class="btn step-btn" onclick="nextStep(3)">Lanjut</button>
          </div>
        </div>

        <!-- STEP 3 -->
        <div class="step-form" id="step3">
          <h5>3. Data Keluarga</h5>
          <div class="row">
            <div class="col-md-6 mb-3"><label>Nama Ayah</label><input type="text" name="nama_ayah" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>Nama Ibu</label><input type="text" name="nama_ibu" class="form-control" required></div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3"><label>Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" class="form-control" required></div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3"><label>No. HP Ayah</label><input type="number" name="no_ayah" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label>No. HP Ibu</label><input type="number" name="no_ibu" class="form-control" required></div>
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Kembali</button>
            <button type="button" class="btn step-btn" onclick="nextStep(4)">Lanjut</button>
          </div>
        </div>

        <!-- STEP 4 -->
        <div class="step-form" id="step4">
          <h5>4. Pembayaran</h5>
          <div class="mb-3"><label>Total Payment</label><input type="text" name="total_payment" class="form-control" id="totalPayment" oninput="formatRupiah(this)" required></div>
          <div class="mb-3">
            <label for="stts">Metode Pembayaran</label>
            <select name="stts" id="stts" class="form-control" required>
              <option value="" disabled selected>Pilih metode pembayaran</option>
              <option value="Lunas">Lunas</option>
              <option value="Cicilan">Cicilan</option>
            </select>
          </div>
          <div class="mb-3"><label>Upload Bukti Transfer</label><input type="file" name="bukti_transfer" class="form-control" accept="image/*" required></div>
          <div class="mb-3">
            <label for="info">Dapat info dari mana?</label>
            <select name="info" id="info" class="form-control" required>
              <option value="" disabled selected>Pilih sumber informasi</option>
              <option value="Tidak Ada">Tidak Ada</option>
              <option value="Ms. Cindy">Ms. Cindy</option>
              <option value="Mr. Syafi'i">Mr. Syafi'i</option>
              <option value="Mr. James">Mr. James</option>
              <option value="Mr. Sahrul">Mr. Sahrul</option>
            </select>
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="nextStep(3)">Kembali</button>
            <button type="submit" class="btn step-btn">Selesai</button>
          </div>
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
    <i class="fab fa-tiktok fa-2x"></i></a>
      <a href="https://www.instagram.com/mecnesia.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="https://www.youtube.com/@mecnesiatv5894" target="_blank" aria-label="YouTube"><i class="fab fa-youtube fa-2x"></i></a>
      <a href="mailto:info@mecnesia.com" aria-label="Email"><i class="fas fa-envelope fa-2x"></i></a>
    </div>
    <p>&copy; <?= date('Y'); ?> Mecnesia. All Rights Reserved.</p>
  </div>
</footer>

<script>
  function nextStep(step) {
    document.querySelectorAll('.step-form').forEach(e => e.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');
    document.querySelectorAll('.step-indicator .step').forEach((e, i) => {
      if (i < step) e.classList.add('active'); else e.classList.remove('active');
    });
  }

  function formatRupiah(input) {
    var number_string = input.value.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        rest = split[0].length % 3,
        rupiah = split[0].substr(0, rest),
        thousand = split[0].substr(rest).match(/\d{3}/gi);
    if (thousand) {
      separator = rest ? '.' : '';
      rupiah += separator + thousand.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    input.value = 'Rp. ' + rupiah;
  }

  // Data kota per provinsi
  const dataKota = {
    "Jawa Barat": ["Bandung", "Bogor", "Depok", "Bekasi", "Sukabumi"],
    "Jawa Tengah": ["Semarang", "Sukoharjo", "Klaten", "Surakarta"],
    "DI Yogyakarta": ["Yogyakarta", "Sleman", "Bantul", "Kulon Progo", "Gunungkidul"],
    "Jawa Timur": ["Surabaya", "Malang", "Sidoarjo", "Pasuruan", "Probolinggo", "Kediri", "Jombang", "Nganjuk", "Madiun", "Tuban"],
    "Gorontalo": ["Gorontalo"],
    "Sulawesi Selatan": ["Makassar", "Pare-Pare", "Palopo", "Wajo", "Bone", "Sinjai", "Bulukumba", "Bantaeng", "Jeneponto", "Takalar", "Gowa"],
    "Sulawesi Tengah": ["Palu", "Luwuk"],
    "Sulawesi Utara": ["Manado"],
    "Sulawesi Tenggara": ["Kendari", "Bau-Bau"],
    "Sulawesi Barat": ["Polewali", "Majene", "Wonomulyo"],
    "Kalimantan Timur": ["Samarinda", "Balikpapan", "Berau", "Tenggarong"],
    "Kalimantan Barat": ["Pontianak"],
    "Kalimantan Selatan": ["Banjarmasin", "Banjarbaru"],
    "Kalimantan Utara": ["Tarakan", "Tanjung Selor"],
    "NTB": ["Mataram"],
    "NTT": ["Kupang"],
    "Maluku": ["Ambon"],
    "Maluku Utara": ["Ternate", "Tidore"],
    "Papua Barat Daya": ["Sorong"],
    "Papua": ["Jayapura"],
    "Bandar Lampung": ["Lampung"],
    "Sumatera Selatan": ["Palembang"],
    "Jambi": ["Jambi"],
    "Riau": ["Pekanbaru"],
    "Kepulauan Riau": ["Batam"],
    "Sumatera Utara": ["Medan", "Binjai"]
  };

  const provinsiSelect = document.getElementById("provinsi");
  const kotaSelect = document.getElementById("kota");

  provinsiSelect.addEventListener("change", function () {
    const provinsi = this.value;
    kotaSelect.innerHTML = '<option value="" disabled selected>Pilih kota/kabupaten</option>';
    if (dataKota[provinsi]) {
      dataKota[provinsi].forEach(function (kota) {
        const option = document.createElement("option");
        option.value = kota;
        option.textContent = kota;
        kotaSelect.appendChild(option);
      });
    }
  });
</script>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>