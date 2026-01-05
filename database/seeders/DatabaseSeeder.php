<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::query()->delete();
        User::create([
            'nim' => '0001',
            'name' => 'Administrator',
            'password' => bcrypt('admin123'),
            'role' => '1',
            'status' => 1,
        ]);

        User::create([
            'nim' => '2301001',
            'name' => 'Sopian Aji',
            'password' => bcrypt('aji123'),
            'role' => '0',
            'status' => 1,
        ]);

        User::create([
            'nim' => '2301002',
            'name' => 'Kelvin',
            'password' => bcrypt('vin123'),
            'role' => '0',
            'status' => 1,
        ]);
    }
}



