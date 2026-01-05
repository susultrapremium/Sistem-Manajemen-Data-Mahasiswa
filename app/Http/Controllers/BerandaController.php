<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Laporan;

class BerandaController extends Controller
{
    public function dashboard()
    {
        // Ambil semua mahasiswa untuk tabel
        $mahasiswa = Mahasiswa::orderBy('id', 'asc')->get();

        // ===============================
        // Hitung statistik untuk 3 card
        // ===============================

        // Mahasiswa aktif
        $mahasiswaAktif = Mahasiswa::where('status', 1)->count();

        // Mahasiswa yang sudah mengirim tugas (distinct mahasiswa_id di tabel laporan)
        $mahasiswaSudahKirim = Laporan::select('mahasiswa_id')
            ->distinct()
            ->count();

        // Mahasiswa belum mengirim tugas
        $mahasiswaBelumKirim = $mahasiswaAktif - $mahasiswaSudahKirim;

        return view('admin.dashboard', [
            'judul' => 'Dashboard Admin',
            'mahasiswa' => $mahasiswa,
            'mahasiswaAktif' => $mahasiswaAktif,
            'mahasiswaSudahKirim' => $mahasiswaSudahKirim,
            'mahasiswaBelumKirim' => $mahasiswaBelumKirim,
        ]);
    }
}
