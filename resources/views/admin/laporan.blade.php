<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul ?? 'Daftar Laporan Mahasiswa' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 20px; }
        table th { background-color: #f4f4f4; }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center">Sistem Manajemen Data Mahasiswa</h4>
    <hr class="text-white">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.mahasiswa') }}">Mahasiswa</a>
    <a href="{{ route('admin.laporan') }}">Laporan</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
        @csrf
        <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
</div>

<div class="content">
    <h3>{{ $judul ?? 'Daftar Laporan Mahasiswa' }}</h3>

    <!-- ✅ TOMBOL TAMBAH LAPORAN -->
    <a href="{{ route('admin.laporan.create') }}" class="btn btn-primary mb-3">
        + Tambah Laporan
    </a>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Isi Laporan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $index => $l)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $l->mahasiswa->nama }}</td>
                <td>{{ $l->mahasiswa->nim }}</td>
                <td>{{ $l->isi_laporan }}</td>
                <td>{{ $l->tanggal }}</td>
                <td>{{ ucfirst($l->status) }}</td>
                <td>
                    <a href="{{ route('admin.laporan.edit', $l->id) }}"
                       class="btn btn-sm btn-warning">
                        Ubah Status
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada laporan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
