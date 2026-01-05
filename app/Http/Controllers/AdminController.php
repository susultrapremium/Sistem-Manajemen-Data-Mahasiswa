<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ==========================
    // TAMPIL DAFTAR MAHASISWA
    // ==========================
    public function daftarMahasiswa()
    {
        $mahasiswa = Mahasiswa::orderBy('id', 'asc')->get();
        return view('admin.mahasiswa', [
            'judul' => 'Daftar Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

    // ==========================
    // HALAMAN TAMBAH MAHASISWA
    // ==========================
    public function create()
    {
        return view('admin.mahasiswa_create', [
            'judul' => 'Tambah Mahasiswa'
        ]);
    }

    // ==========================
    // SIMPAN MAHASISWA BARU
    // ==========================
    public function store(Request $request)
    {
        $request->validate([
            'nim'      => 'required|unique:users,nim|unique:mahasiswas,nim',
            'nama'     => 'required',
            'jurusan'  => 'required',
            'fakultas' => 'required',
        ]);

        // 1. Simpan ke tabel USERS (login)
        $user = User::create([
            'nim'      => $request->nim,
            'name'     => $request->nama, 
            'password' => Hash::make($request->nim), 
            'role'     => '0', // string karena ENUM('0','1')
            'status'   => 1,
        ]);

        // 2. Simpan ke tabel MAHASISWAS
        Mahasiswa::create([
            'nim'      => $request->nim,
            'nama'     => $request->nama,
            'jurusan'  => $request->jurusan,
            'fakultas' => $request->fakultas,
            'user_id'  => $user->id,
            'status'   => 1,
        ]);

        return redirect()->route('admin.mahasiswa')
            ->with('success', 'Mahasiswa dan Akun Login berhasil ditambahkan');
    }

    // ==========================
    // HALAMAN EDIT MAHASISWA
    // ==========================
    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa_edit', [
            'judul' => 'Edit Mahasiswa',
            'mahasiswa' => $m
        ]);
    }

    // ==========================
    // UPDATE MAHASISWA
    // ==========================
    public function update(Request $request, $id)
    {
        $m = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'      => 'required|unique:mahasiswas,nim,' . $m->id,
            'nama'     => 'required',
            'jurusan'  => 'required',   // wajib diisi
            'fakultas' => 'required',   // wajib diisi
        ]);

        // Update Mahasiswa
        $m->update([
            'nim'      => $request->nim,
            'nama'     => $request->nama,
            'jurusan'  => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        // Update User terkait
        User::where('id', $m->user_id)->update([
            'name' => $request->nama,
            'nim'  => $request->nim, // jika nim ikut diubah
        ]);

        return redirect()->route('admin.mahasiswa')
            ->with('success', 'Mahasiswa berhasil diupdate');
    }

    // ==========================
    // DELETE MAHASISWA & USER
    // ==========================
    public function destroy($id)
    {
        $m = Mahasiswa::findOrFail($id);

        // Hapus User terkait
        User::where('id', $m->user_id)->delete();

        // Hapus Mahasiswa
        $m->delete();

        return redirect()->route('admin.mahasiswa')
            ->with('success', 'Mahasiswa dan Akun berhasil dihapus');
    }
}
