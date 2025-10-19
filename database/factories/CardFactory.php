<?php

declare(strict_types = 1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'      => $this->faker->randomElement(['flashcard', 'text', 'open']),
            'title'     => $this->faker->sentence(),
            'question'  => $this->faker->paragraph(),
            'answer'    => $this->faker->paragraph(),
            'content'   => $this->faker->paragraph(),
            'tags'      => $this->faker->words(rand(1, 4)),
            'is_public' => $this->faker->boolean(),
            'user_id'   => \App\Models\User::factory(),
        ];
    }
}
