<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Purchases;
use App\Models\Products;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseItems>
 */
class PurchaseItemsFactory extends Factory
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
            'purchase_id' => Purchases::inRandomOrder()->first()->id,
            'product_id' => Products::inRandomOrder()->first()->id,
            'quantity'=> $this->faker->numberBetween(1,100),
        ];
    }
}
