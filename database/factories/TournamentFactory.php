<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
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
            'images' => 'tournament_default.png',
            'tags' => 'ICONIC, SASAGEYO, TITAN, ALCO, ARSENAL, CHEALSEA, MAN UTD, MAN CITY, RECON, PRIME 7, ALTER EGO, RRQ HOSHI, ONIC',
            'description' => $this->faker->paragraph(8),
            'schedule' => 'futsal_matches.jpg',
            'prize_pool' => 'prize_pool.jpg',
        ];
    }
}
