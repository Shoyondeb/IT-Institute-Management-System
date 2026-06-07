<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@training.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Create a test student
        User::create([
            'name' => 'Test Student',
            'email' => 'student@training.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
    }
}
