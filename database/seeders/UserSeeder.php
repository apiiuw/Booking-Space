<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@upnvj.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'jenis_kelamin' => 'L',
        ]);

        // User biasa
        User::create([
            'name' => 'User Testing',
            'email' => 'user@upnvj.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'jenis_kelamin' => 'P',
        ]);
    }
}
