<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(ClienteSeeder::class);
        User::factory(5)->create();
        //Cliente::factory(1)->create();
        //estas estan por revisar
        //-------------------------------------------------

        Categoria::factory(10)->create();
        Proveedor::factory(5)->create();
        Articulo::factory(5)->create()->each(function(Articulo $articulo){
            Inventario::factory(1)->create([
                'articulo_id'=>$articulo->id
            ]);
        });

        $this->call(DepartamentoSeeder::class);

    }
}
