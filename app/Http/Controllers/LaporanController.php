<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::with('mahasiswa')->latest()->get();

        return view('admin.laporan', [
            'judul' => 'Daftar Laporan Mahasiswa',
            'laporan' => $laporan
        ]);
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return view('admin.laporan_create', [
            'judul' => 'Tambah Laporan',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'isi_laporan'  => 'required',
            'tanggal'      => 'required|date',
        ]);

        Laporan::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'isi_laporan'  => $request->isi_laporan,
            'tanggal'      => $request->tanggal,
            'status'       => 'pending',
        ]);

        return redirect()->route('admin.laporan')
            ->with('success', 'Laporan berhasil ditambahkan');
    }

    // ==========================
    // HALAMAN EDIT LAPORAN
    // ==========================
    public function edit($id)
    {
        $laporan = Laporan::with('mahasiswa')->findOrFail($id);

        return view('admin.laporan_edit', [
            'judul' => 'Edit Laporan',
            'laporan' => $laporan
        ]);
    }

    // ==========================
    // UPDATE LAPORAN
    // ==========================
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $laporan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.laporan')
            ->with('success', 'Status laporan berhasil diupdate');
    }

    // ==========================
    // HAPUS LAPORAN
    // ==========================
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.laporan')
            ->with('success', 'Laporan berhasil dihapus');
    }
}
