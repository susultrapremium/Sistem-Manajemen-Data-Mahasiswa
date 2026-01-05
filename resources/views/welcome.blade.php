<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Manajemen Data Mahasiswa</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: Figtree, sans-serif;
            background-color: #f8fafc;
        }
        .logo-mahasiswa {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-light bg-light fixed-top px-4">
        <div class="ms-auto d-flex gap-2">
            @guest('web')
                @guest('mahasiswa')
                    <a href="{{ route('login') }}" class="btn btn-success btn-sm">Login</a>
                    <a href="{{ route('mahasiswa.registrasi') }}" class="btn btn-outline-success btn-sm">Registrasi Mahasiswa</a>
                @else
                    <span class="fw-semibold text-secondary">Mahasiswa: {{ auth('mahasiswa')->user()->nama }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @endguest
            @else
                <span class="fw-semibold text-secondary">Admin: {{ auth()->user()->name ?? 'Admin' }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            @endguest
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow text-center p-5" style="max-width: 520px; width:100%;">

            <!-- ICON ORANG + TOPI WISUDA -->
            <svg class="logo-mahasiswa mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="#198754">
                <polygon points="32,6 4,20 32,34 60,20"/>
                <rect x="20" y="34" width="24" height="5" rx="2"/>
                <line x1="44" y1="20" x2="44" y2="38" stroke="#198754" stroke-width="2"/>
                <circle cx="44" cy="40" r="2"/>
                <circle cx="32" cy="46" r="6"/>
                <path d="M20 60c0-6 6-10 12-10s12 4 12 10H20z"/>
            </svg>

            <h1 class="fw-bold mb-3">Sistem Manajemen Data Mahasiswa</h1>

            <p class="text-muted mb-4">
                Aplikasi berbasis web untuk mengelola data mahasiswa, jurusan,
                mata kuliah, dan informasi akademik secara terpusat dan efisien.
            </p>

            @guest('web')
                @guest('mahasiswa')
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg mb-2 w-100">Login Menggunakan NIM</a>
                    <a href="{{ route('mahasiswa.registrasi') }}" class="btn btn-outline-success btn-lg w-100">Registrasi Mahasiswa</a>
                @else
                    <span class="btn btn-success btn-lg disabled w-100">Anda sudah login sebagai Mahasiswa</span>
                @endguest
            @else
                <span class="btn btn-success btn-lg disabled w-100">Anda sudah login sebagai Admin</span>
            @endguest

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center text-muted py-4">
        © {{ date('Y') }} Sistem Manajemen Data Mahasiswa | Laravel {{ Illuminate\Foundation\Application::VERSION }}
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
