<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mahasiswa;

class LoginController extends Controller
{
    // ===========================
    // HALAMAN LOGIN (Satu view)
    // ===========================
    public function loginPage()
    {
        return view('login'); // satu halaman login untuk admin & mahasiswa
    }

    // ===========================
    // LOGIN SATU METHOD
    // ===========================
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login sebagai admin (guard web)
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Coba login sebagai mahasiswa (guard mahasiswa)
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('mahasiswa.dashboard');
        }

        // Jika keduanya gagal
        return back()->withErrors([
            'nim' => 'NIM atau password salah.',
        ])->onlyInput('nim');
    }

    // ===========================
    // LOGOUT ADMIN / MAHASISWA
    // ===========================
    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
