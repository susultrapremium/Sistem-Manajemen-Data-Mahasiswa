<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User; // import User untuk auth
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    // ===========================
    // DASHBOARD MAHASISWA
    // ===========================
    public function dashboard()
    {
        // Ambil mahasiswa berdasarkan guard 'mahasiswa'
        $mahasiswa = auth('mahasiswa')->user();

        // Ambil semua laporan mahasiswa
        $laporans = $mahasiswa ? $mahasiswa->laporans : [];

        return view('mahasiswa.dashboard', compact('laporans'));
    }

    // ===========================
    // KIRIM LAPORAN
    // ===========================
    public function storeLaporan(Request $request)
    {
        $mahasiswa = auth('mahasiswa')->user();

        $request->validate([
            'isi_laporan' => 'required|string',
        ]);

        Laporan::create([
            'mahasiswa_id' => $mahasiswa->id,
            'isi_laporan'   => $request->isi_laporan,
            'tanggal'       => now(),
            'status'        => 'pending',
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim');
    }

    // ===========================
    // FORM REGISTRASI MAHASISWA
    // ===========================
    public function registrasi()
    {
        return view('mahasiswa.registrasi');
    }

    // ===========================
    // SIMPAN DATA REGISTRASI
    // ===========================
    public function storeRegistrasi(Request $request)
    {
        $request->validate([
            'nim'      => 'required|unique:mahasiswas,nim',
            'nama'     => 'required|string|max:100',
            'jurusan'  => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'password' => 'required|string|min:6|confirmed', // wajib ada password_confirmation
        ]);

        // 1️⃣ Buat record di tabel users (untuk auth)
        $user = User::create([
            'name'     => $request->nama,
             'nim'      => $request->nim, // ✅ tambahkan ini
            'email'    => $request->nim.'@example.com', // email dummy
            'password' => Hash::make($request->password),
            'role'     => '0', // 0 = mahasiswa
        ]);

        // 2️⃣ Buat record di tabel mahasiswas
        Mahasiswa::create([
            'user_id'  => $user->id, // wajib agar foreign key tidak error
            'nim'      => $request->nim,
            'nama'     => $request->nama,
            'jurusan'  => $request->jurusan,
            'fakultas' => $request->fakultas,
            'status'   => 1, // aktif
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
