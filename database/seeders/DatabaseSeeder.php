<?php

declare(strict_types=1);

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
        // User::factory(10)->create();

        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name'  => 'Test User 1',
            'email' => 'test1@example.com',
            'is_admin' => false,
        ]);

        $this->call([
            CardSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
