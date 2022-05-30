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
            'nombre' => $this->faker->word(),
            'precio_compra' => $this->faker->randomElement([10000,15000,20000,30000,50000]),
            'precio_venta' => $this->faker->randomElement([10000,15000,20000,30000,50000]),
            'categoria_id' => Categoria::all()->random()->id,
            'proveedor_id' => Proveedor::all()->random()->id,
            'imagen_url'=> $this->faker->imageUrl(150,150),
            'descripcion'=>$this->faker->text()

        ];
    }
}
