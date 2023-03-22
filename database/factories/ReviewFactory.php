<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stock_id' => $this->faker->numberBetween(3000, 20000),
            'user_id' => $this->faker->numberBetween(1, 200),
            'rating' => $this->faker->numberBetween(1, 5),
            'summary' => $this->faker->sentence(5),
            'comment' => $this->faker->paragraph(3),
        ];
    }
}
