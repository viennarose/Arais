<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'size' => $this->faker->randomElement(["Small", "Medium", "Large"]),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
