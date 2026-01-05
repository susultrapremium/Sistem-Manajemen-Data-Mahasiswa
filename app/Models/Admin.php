<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Nama tabel
    protected $table = 'admins';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'nim',      // ganti dari 'username' ke 'nim'
        'password',
    ];

    // Kolom yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
