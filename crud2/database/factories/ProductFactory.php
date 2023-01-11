<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'p_name' => $this->faker->word,
            'p_descrption' => $this->faker->text,
            'p_price' => $this->faker->numberBetween(100, 1000),
            'p_stock' => $this->faker->randomDigit()
        ];
    }
}
