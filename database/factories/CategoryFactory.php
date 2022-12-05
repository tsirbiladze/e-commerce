<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return \Faker\Factory::create('en');
    }

    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->name,
            'slug' => Str::slug($name)
        ];
    }
}
