<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(5),
            'stock_id' => $this->faker->numberBetween(3000, 20000),
            'category_id' => $this->faker->numberBetween(1, 5),
            'brand' => $this->faker->randomElement(['Brand 1', 'Brand 2', 'Brand 3', 'Brand 4']),
            'image' => 'https://picsum.photos/250',
            'out_of_stock' => $this->faker->boolean(65),
            'price' => $this->faker->randomDigit(),
            'description' =>$this->faker->paragraph(6),
        ];
    }
}
