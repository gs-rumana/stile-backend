<?php

namespace Database\Seeders;

use App\Models\User;
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
            'first_name' => 'Admin',
            'last_name' => 'Stile',
            'email' => 'admin@stile.com',
            'phone' => '1234567890',
            'password' => bcrypt('stile123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
