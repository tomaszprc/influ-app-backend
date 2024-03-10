<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Influencer>
 */
class InfluencerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name'=> fake()->lastName(),
            'description' => fake()->paragraph(),
            'verified' => fake()->boolean(),
            'youtube_url' => fake()->url(),
            'tiktok_url' => fake()->url(),
            'instagram_url' => fake()->url(),
        ];
    }
}
