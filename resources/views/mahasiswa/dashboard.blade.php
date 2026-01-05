<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        form button { padding: 5px 10px; }
        section { margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <h2>Dashboard Mahasiswa</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    <section>
        <h3>Selamat datang, {{ Auth::user()->name }}</h3>
        <p>NIM: {{ Auth::user()->nim }}</p>
        <p>Status: {{ Auth::user()->status == 1 ? 'Aktif' : 'Nonaktif' }}</p>
    </section>

    <section>
        <h3>Buat Laporan</h3>
        <form action="{{ route('mahasiswa.laporan.store') }}" method="POST">
            @csrf
            <label>Isi Laporan:</label><br>
            <textarea name="laporan" rows="5" cols="50" required></textarea><br><br>
            <button type="submit">Kirim Laporan</button>
        </form>
    </section>
</body>
</html>
