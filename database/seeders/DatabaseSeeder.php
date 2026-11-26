<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'username' => 'testuser',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'first_name' => 'Power',
            'last_name' => 'Babaniyi',
            'username' => 'roxified',
            'email' => 'powerbabaniyi32@gmail.com',
            'is_admin' => true,
        ]);
    }
}
