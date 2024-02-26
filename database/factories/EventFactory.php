<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'images' => 'no-image.png',
            'tags' => 'futsal, seminar, esports',
            'description' => $this->faker->paragraph(5),
            'type' => $this->faker->name(),
        ];
    }
}
