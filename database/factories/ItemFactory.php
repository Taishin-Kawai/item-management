<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,3),
            'name' => $this->faker->realText(10),
            'price' => $this->faker->numberBetween(100,100000),
            'status' => $this->faker->numberBetween(1,3),
            'quantity' => $this->faker->numberBetween(1, 100),
            'detail' => $this->faker->realText(50)
        ];
    }
}
