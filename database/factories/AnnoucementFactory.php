<?php

namespace Database\Factories;

use App\DataTypes\AnnouncementStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annoucement>
 */
class AnnoucementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => rand(1,10),
            'title' => fake()->title(),
            'description' => fake()->paragraph(),
            'onlyVerifiedInfluencers' => fake()->boolean(),
            'status' => fake()->randomElement(AnnouncementStatus::TYPES),
            'start_at' => fake()->date(),
            'finished_at' => fake()->date()
        ];
    }
}
