<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Kaprodi',
            'nim_nik'  => 'KAP001',
            'password' => Hash::make('password'),
            'role'     => 'kaprodi',
        ]);

        User::create([
            'name'     => 'Dosen Informatika',
            'nim_nik'  => 'DOS001',
            'password' => Hash::make('password'),
            'role'     => 'dosen',
        ]);

        User::create([
            'name'     => 'Mahasiswa A',
            'nim_nik'  => 'MHS001',
            'password' => Hash::make('password'),
            'role'     => 'mahasiswa',
        ]);
    }
}
