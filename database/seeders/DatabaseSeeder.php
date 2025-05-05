<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sabeum Eka',
            'email' => 'SabeumEka@gmail.com',
            'password' => Hash::make('kapoldasumbar2025'),
            'role' => 'admin',
            'status' => 'approved'
        ]);
    }
}

