<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Backend</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body, html {
            height: 100%;
            background-color: #f0f2f5;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #012E0D;
        }
        .btn-login {
            background-color: #012E0D;
            color: #fff;
        }
        .btn-login:hover {
            background-color: #014d1a;
        }
        .logo-mahasiswa {
            width: 100px;
            height: 100px;
            margin-bottom: 1rem;
            transition: 0.3s;
        }
        .logo-mahasiswa:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">

        <!-- LOGO ORANG PAKAI TOPI WISUDA -->
<svg class="logo-mahasiswa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="#074b1aff">
    <!-- Topi wisuda -->
    <polygon points="32,6 4,20 32,34 60,20"/>
    <rect x="20" y="34" width="24" height="5" rx="2"/>

    <!-- Tali topi -->
    <line x1="44" y1="20" x2="44" y2="38" stroke="#074b1aff" stroke-width="2"/>
    <circle cx="44" cy="40" r="2"/>

    <!-- Kepala -->
    <circle cx="32" cy="46" r="6"/>

    <!-- Badan -->
    <path d="M20 60c0-6 6-10 12-10s12 4 12 10H20z"/>
</svg>


        <h4 class="mb-1 fw-bold">Sistem Manajemen Data Mahasiswa</h4>
        <small class="text-muted d-block mb-4">Portal Akademik & Administrasi</small>

        <!-- FORM LOGIN -->
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            <div class="mb-3 text-start">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" placeholder="Masukkan NIM" required>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- NOTIFIKASI ERROR -->
@if($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: "{{ $errors->first() }}",
});
</script>
@endif

<!-- NOTIFIKASI SUKSES -->
@if(session('welcome_name'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Selamat Datang!',
    text: "{{ session('welcome_name') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

</body>
</html>
