<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*$categoria = Categoria::orderByRaw('random()')->take(1)->get();
        $proveedor = Proveedor::orderByRaw('random()')->take(1)->get();
        dd($categoria->nombre);*/

        return [
            //
            'nombre' => $this->faker->name(),
            'precio_compra' => $this->faker->randomDigit(),
            'precio_venta' => $this->faker->randomDigit(),
            'categoria_id' => Categoria::all()->random()->id,
            'proveedor_id' => Proveedor::all()->random()->id,

        ];
    }
}
