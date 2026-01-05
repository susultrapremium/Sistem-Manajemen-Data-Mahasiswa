<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
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
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center">Sistem Manejemen Data Mahasiswa</h4>
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
    <h3>{{ $judul }}</h3>

    {{-- ✅ PESAN SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tombol tambah mahasiswa -->
    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary mb-3">
        Tambah Mahasiswa
    </a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $m)
            <tr>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td>
                    <a href="{{ route('admin.mahasiswa.edit', $m->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.mahasiswa.destroy', $m->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
