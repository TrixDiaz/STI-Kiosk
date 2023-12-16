<?php
// In database/factories/RevenueFactory.php

namespace Database\Factories;

use App\Models\Revenue;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevenueFactory extends Factory
{
    protected $model = Revenue::class;

    public function definition()
    {
        $startDate = now()->startOfYear();
        $endDate = now()->endOfYear();

        return [
            'order_id' => $this->faker->unique()->randomNumber(),
            'product_name' => $this->faker->word,
            'product_price' => $this->faker->randomFloat(2, 10, 100),
            'product_image' => $this->faker->imageUrl(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->randomFloat(2, 20, 200),
            'order_type' => $this->faker->randomElement(['Online', 'In-store']),
            'payment_status' => $this->faker->randomElement(['Cash', 'Gcash']),
            'name' => $this->faker->name,
            'change' => $this->faker->randomFloat(2, 0, 50),
            'created_at' => $this->faker->dateTimeBetween($startDate, $endDate),
        ];
    }
}
