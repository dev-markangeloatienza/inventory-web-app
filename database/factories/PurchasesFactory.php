<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchases>
 */
class PurchasesFactory extends Factory
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
            "supplier_id" => Supplier::inRandomOrder()->first()->id,
            "total_cost" => $this->faker->randomFloat(2, 100, 1000),
            "purchase_date" => $this->faker->date()
        ];
    }
}
