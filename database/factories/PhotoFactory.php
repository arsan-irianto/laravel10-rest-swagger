<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'album_id' => Album::factory(),
            'title' => $this->faker->realTextBetween(10, 50, 2),
            'url' => $this->faker->imageUrl(),
            'thumbnail_url' => $this->faker->imageUrl(),
        ];
    }
}
