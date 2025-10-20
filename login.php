<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['login_admin'])) {
    header("Location: index.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Asumsi password disimpan sebagai plain text; ganti dengan password_verify($password, $row['password']) jika hashed
        if (password_verify($password, $row['password'])) {
            $_SESSION['login_admin'] = true;
            $_SESSION['admin_nama'] = $row['nama'];
            header("Location: index.php");
            exit();
        } else {
            $error = 'Username atau password salah!';
        }
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin - Mecnesia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .btn-login {
            background: linear-gradient(90deg, #6d0f10, #a6262a);
            border: none;
            color: white;
            font-weight: bold;
        }

        .btn-login:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(109, 15, 16, 0.3);
        }

        .logo {
            margin-bottom: 2rem;
        }

        .logo img {
            height: 80px;
            margin-bottom: 0.5rem;
        }

        .logo span {
            font-weight: bold;
            color: #d6c464;
            font-size: 1.5rem;
        }

        h3 {
            color: #6d0f10;
        }

        .form-label {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="login-card">
            <div class="logo">
                <img src="assets/img/logo1.png" alt="Logo Mecnesia">
                <span>MECNESIA</span>
            </div>
            <h3 class="mb-4">Login Admin</h3>

            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label"><i class="fas fa-user"></i> Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login w-100 rounded-pill py-2">Masuk</button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>