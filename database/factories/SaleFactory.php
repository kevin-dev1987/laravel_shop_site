<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 202,
            'product_id' => $this->faker->randomElement(['4, 10, 12, 8', '8, 6', '14', '20, 75, 72']),
            'order_number' => 0112233,
            'price' => $this->faker->randomDigit(),
            'payment_type' => $this->faker->randomElement(['PayPal', 'Credit/Debit Card', 'Stripe']),
        ];
    }
}
