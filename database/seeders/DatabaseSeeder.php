<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriesTableSeeder::class,
            AdminUserSeeder::class,
        ]);
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'sultanah@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
    }
}
