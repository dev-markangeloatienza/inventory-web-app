<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Supplier;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
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
            'name' => $this->faker->words(2, true),
            'category_id' =>  Category::factory(),
            'supplier_id' =>  Supplier::factory(),
            'sku'=> $this->faker->randomLetter.$this->faker->randomNumber(1,10).$this->faker->randomNumber(1,10),
            'price'=> $this->faker->randomFloat(2, 1, 100),
            'stock'=> $this->faker->numberBetween(1,100),
            'isActive'=> $this->faker->boolean(50),
        ];
    }
}
