<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nama',
        'nim',
        'password',
        'role',
        'status',
        'jurusan',
        'fakultas',
        'user_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // hash password otomatis (AMAN)
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }
     public function getAuthIdentifierName()
    {
        return 'nim';
    }
}
