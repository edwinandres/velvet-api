<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            //'costo' => $this->faker->randomElement([5,10,15]),
            'cantidad' => $this->faker->randomElement([20, 30, 25])
        ];
    }
}
