<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mahasiswa/registrasi', [MahasiswaController::class, 'registrasi'])->name('mahasiswa.registrasi');
Route::post('/mahasiswa/registrasi', [MahasiswaController::class, 'storeRegistrasi'])->name('mahasiswa.storeRegistrasi');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/admin/dashboard', [BerandaController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/mahasiswa', [AdminController::class, 'daftarMahasiswa'])->name('admin.mahasiswa');
    Route::get('/admin/mahasiswa/create', [AdminController::class, 'create'])->name('admin.mahasiswa.create');
    Route::post('/admin/mahasiswa', [AdminController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/admin/mahasiswa/{id}/edit', [AdminController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::put('/admin/mahasiswa/{id}', [AdminController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/admin/mahasiswa/{id}', [AdminController::class, 'destroy'])->name('admin.mahasiswa.destroy');

    Route::get('/admin/settings', [BerandaController::class, 'settings'])->name('admin.settings');

    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/admin/laporan/create', [LaporanController::class, 'create'])->name('admin.laporan.create');
    Route::post('/admin/laporan', [LaporanController::class, 'store'])->name('admin.laporan.store');
    Route::get('/admin/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('admin.laporan.edit');
    Route::put('/admin/laporan/{id}', [LaporanController::class, 'update'])->name('admin.laporan.update');
});

Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::post('/mahasiswa/laporan', [MahasiswaController::class, 'storeLaporan'])->name('mahasiswa.laporan.store');
});
