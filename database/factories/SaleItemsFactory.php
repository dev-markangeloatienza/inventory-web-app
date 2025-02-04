<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sales;
use App\Models\Products;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleItems>
 */
class SaleItemsFactory extends Factory
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
            "sale_id" => Sales::inRandomOrder()->first()->id,
            "product_id"=> Products::inRandomOrder()->first()->id,
            "quantity" => $this->faker->numberBetween(1,100)
        ];
    }
}

