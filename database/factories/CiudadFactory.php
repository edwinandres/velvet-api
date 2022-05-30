<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
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
            'nombre' => $this->faker->word(),
            'costo' => $this->faker->randomElement([5000,6000,7000,8000]),
            //'departamento_id' => $this->faker->word()
        ];
    }
}
