<?php

declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Card::factory()
            ->count(50)
            ->create();
    }
}
