<?php

namespace Tests\Feature;

use App\Http\Livewire\Articulos;
use App\Http\Livewire\Usuarios;
use App\Models\Articulo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ArticulosTest extends TestCase
{


    /** @test */
    public function un_usuario_puede_crear_articulos()
    {
        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());


        //2. Cuando hace un post request a status
        Livewire::test(Articulos::class)
            ->set('nombre', 'test1234')
            ->set('precio_compra', 8888)
            ->set('precio_venta', 8888)
            ->set('categoria_id', 1)
            ->set('proveedor_id', 1)
            ->set('precio_compra', 8888)
            ->set('imagen_url','https://via.placeholder.com/150x150.png/0011bb?text=ipsum')
            ->set('descripcion', 8888)
            //->set('status',1)
            ->call('store');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(Articulo::whereNombre('test123')->exists());
    }

    /** @test */
    public  function un_usuario_puede_encontrar_articulos(){

        $this->actingAs(User::factory()->create());

        $articulo = Articulo::whereNombre('test1234')->first();

        $nuevo = Livewire::test(Articulos::class)->call('edit' ,$articulo->id);

        $nuevo->assertSee('test1234');


    }

    /** @test */
    public function un_usuario_puede_editar_articulos()
    {

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());

    $articulo = Articulo::whereNombre('test123');


        Livewire::test(Articulos::class)
            ->set('articulo_id', $articulo->first()->id)
            ->set('nombre', 'cambio')
            ->set('precio_compra', 9999)
            ->set('precio_venta', 9999)
            ->set('categoria_id', 1)
            ->set('proveedor_id', 1)
            ->set('precio_compra', 8888)
            ->set('imagen_url','https://via.placeholder.com/150x150.png/0011bb?text=ipsum')
            ->set('descripcion', 8888)
            ->call('update');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(Articulo::whereNombre('cambio')->exists());
    }


    /** @test */
    public  function un_usuario_puede_eliminar_articulos(){
        $this->actingAs(User::factory()->create());

        $articulo = Articulo::where('nombre','cambio')->first();

        Livewire::test(Articulos::class)->call('destroy' ,$articulo->id);

    }

}
