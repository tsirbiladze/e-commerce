<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->name,
            'product_id' => Product::factory()->create()->id,
            'product_variation_type_id' => ProductVariationType::factory()->create()->id,
        ];
    }
}
