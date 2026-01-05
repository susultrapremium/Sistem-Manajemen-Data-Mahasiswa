<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Laporan</h1>

    <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Mahasiswa:</label>
            <input type="text" class="form-control" value="{{ $laporan->mahasiswa->nama }}" disabled>
        </div>

        <div class="mb-3">
            <label>Laporan:</label>
            <textarea class="form-control" rows="5" disabled>{{ $laporan->isi_laporan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $laporan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $laporan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $laporan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.laporan') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
