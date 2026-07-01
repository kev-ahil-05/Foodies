<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       // Gumawa ng Admin Account
    User::create([
        'name' => 'System Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
        'role' => 'admin',
    ]);

    // Gumawa ng Regular User Account
    User::create([
        'name' => 'Juan Dela Cruz',
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
        'role' => 'user',
    ]);
    }
}
