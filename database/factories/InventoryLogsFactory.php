<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Products;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryLogs>
 */
class InventoryLogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_id' => Products::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'change_type' => $this->faker->randomElement(['added','sold','adjusted']),
            'quantity' => $this->faker->numberBetween(1,100)
        ];
    }
}
