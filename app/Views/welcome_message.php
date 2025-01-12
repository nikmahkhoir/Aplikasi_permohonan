<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Permohonan Rumah Dinas-BPKAD-TANAH LAUT</title>
    <!-- Link to Bootstrap CSS -->
  <link rel="icon" href="/bpkad.png" type="image/x-icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the login page */
        .login-card {
            background: linear-gradient(to bottom, #006A67, #009E9A);
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .login-card .btn-primary {
            background-color: #071952;
            border-color: #071952;
        }
        .login-card .btn-primary:hover {
            background-color: #093683;
            border-color: #093683;
        }
        .login-card .btn-danger {
            background-color: #7D0A0A;
            border-color: #7D0A0A;
        }
        .login-card .btn-danger:hover {
            background-color: #A31010;
            border-color: #A31010;
        }
        .logo-container {
            margin-top: 20px; /* Tambah margin atas untuk menurunkan logo */
        }
        .logo-left,
        .logo-right {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px; /* Ketinggian kontainer logo */
        }
        .logo-left img,
        .logo-right img {
            max-height: 80px; /* Ukuran logo tetap */
        }
    </style>
</head>
<body class="bg-light">
    <div class="row justify-content-between logo-container">
        <div class="col-sm-2 logo-left">
            <img src="tala.jpg" alt="Logo Left" class="img-fluid">
        </div>
      
        <div class="col-sm-2 logo-right">
            <img src="bpkad.png" alt="Logo Right" class="img-fluid">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 login-card">
                    <div class="card-header text-center">
                        <h3>SIRUMDIS</h3>
                        <h5>Sistem Informasi Permohonan <br>Surat Izin Rumah Dinas</h5>
                    </div>
                    <div class="card-body">
                        <form action="/proses-login" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Or login with:</p>
                            <a href="<?= $googleAuthUrl ?>" class="btn btn-danger btn-block">
                                <i class="fab fa-google"></i> Login with Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS (optional, for functionality like modals) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
