<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@hotelo.com'],
            [
                'name' => 'Admin Hotelo',
                'password' => Hash::make('password123'),
                'role' => 'Admin',
            ]
        );
    }
}

