<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->numberBetween('100','999'),
            'product_name' => $this->faker->firstName(),
            'product_stock' => $this->faker->numberBetween('100','999'),
            'product_price' => $this->faker->numberBetween('100','999'),
            'product_status' => $this->faker->firstName(),
            'product_expiration' => now(),
        ];
    }
}
