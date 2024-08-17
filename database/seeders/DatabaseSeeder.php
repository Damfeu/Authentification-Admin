<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'email' => 'damaz@gmail.com',
            'password' => Hash::make('1010'),
            'role' => true,
            // 'is_admin' => true, // Assurez-vous que la colonne `is_admin` existe dans votre table `users`
        ]);

    }
}
