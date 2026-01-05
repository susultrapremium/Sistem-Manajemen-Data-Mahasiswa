<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (WAJIB untuk bi-*) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body { font-family: Arial, sans-serif; }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        table th {
            background-color: #f4f4f4;
        }

        /* Card Statistik */
        .card-icon {
            font-size: 3rem;
            opacity: 0.9;
        }

        .card-number {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

        .card {
            border-radius: 12px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h5 class="text-center px-2"> <i class="bi bi-mortarboard-fill card-icon"></i> Sistem Manajemen Data Mahasiswa</h5>
    <hr class="text-white">
    

    <a href="{{ route('admin.dashboard') }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('admin.mahasiswa') }}">
        <i class="bi bi-people-fill me-2"></i> Mahasiswa
    </a>
    <a href="{{ route('admin.laporan') }}">
        <i class="bi bi-file-text-fill me-2"></i> Laporan
    </a>

    <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
    </form>
</div>

<!-- Content -->
<div class="content">
    <h3 class="mb-4">{{ $judul }}</h3>

    <!-- Card Statistik -->
    <div class="row mb-4">

        <!-- Mahasiswa Aktif -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-mortarboard-fill card-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Mahasiswa Aktif</h6>
                        <p class="card-number">{{ $mahasiswaAktif }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sudah Mengirim Tugas -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-file-earmark-check-fill card-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Sudah Mengirim Tugas</h6>
                        <p class="card-number">{{ $mahasiswaSudahKirim }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Belum Mengirim Tugas -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-file-earmark-x-fill card-icon"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Belum Mengirim Tugas</h6>
                        <p class="card-number">{{ $mahasiswaBelumKirim }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Mahasiswa -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>
                            @if($m->status == 1)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
