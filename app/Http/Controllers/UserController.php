<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Tampilkan daftar user
    public function index()
    {
        $dataUser = User::orderBy('id', 'asc')->get();

        return view('backend.v_beranda.index', [
            'judul' => 'Data User',
            'users' => $dataUser
        ]);
    }
}
