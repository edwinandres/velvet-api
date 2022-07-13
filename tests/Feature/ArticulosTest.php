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
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
//    public function un_usuario_puede_crear_articulos()
//    {
//        //1.Teniendo un usuario autenticado
//        $user = factory(User::class)->create();
//        $this->actingAs($user);
//        //2. Cuando hace un post request a status
//
//        $this->post(route('status.store'), ['body' => 'Mi primer estado']);
//
//        //3. Entonces veo un nuevo estado en base de datos
//        $this->assertDatabaseHas('articulos');
//    }

    /**@test*/
    public function un_usuario_puede_crear_articulos()
    {
//        $user = User::where('email','test123@email.com')->get();
//        //dd($user);
//
//        if($user->count() >0){
//            //dd($user->first()->id);
//            //dd($user->first()->id);
//            $ide =$user->first()->id;
//            Livewire::test(Articulos::class)
//                //->emit('prueba',$user->first()->id);
//                ->set('usuario_id', $user->first()->id)
//
//                ->call('delete');
//        }

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());


        //2. Cuando hace un post request a status
        Livewire::test(Articulos::class)
            ->set('nombre', 'test123')
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
    public function un_usuario_puede_editar_articulos()
    {
//        $user = User::where('email','test123@email.com')->get();
//        //dd($user);
//
//        if($user->count() >0){
//
//            $ide =$user->first()->id;
//            Livewire::test(Usuarios::class)
//                //->emit('prueba',$user->first()->id);
//                ->set('prueba', $user->first()->id)
//
//                ->call('pruebaf');
//        }

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());

    $articulo = Articulo::whereNombre('test123');
        $articulo = Articulo::whereId(1);

    //dd($articulo->first()->id);
        //2. Cuando hace un post request a status
        Livewire::test(Articulos::class)
            ->set('articulo_id', $articulo->first()->id)
            ->set('nombre', 'xdxd')
            ->set('precio_compra', 9999)
            ->set('precio_venta', 9999)
            ->set('categoria_id', 1)
            ->set('proveedor_id', 1)
            ->set('precio_compra', 8888)
            ->set('imagen_url','https://via.placeholder.com/150x150.png/0011bb?text=ipsum')
            ->set('descripcion', 8888)
            ->call('update');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(Articulo::whereNombre('xdxd')->exists());
    }


    /** @test */
    public  function un_usuario_puede_eliminar_articulos(){
        $user = User::where('email','test123@email.com')->get();

        $articulo = Articulo::where('nombre','test123')->first();
        //dd($articulo->id);

        if($user->count() >0){

            $ide =$user->first()->id;
            Livewire::test(Articulos::class)->call('destroy' ,$articulo->id);

        }
    }
    /** @test */
    public  function un_usuario_puede_encontrar_usuarios(){
        $user = User::where('email','test123@email.com')->get();
        //dd($user->first()->id);

        if($user->count() >0){

            $articulo = Articulo::whereNombre('test123')->first();
            //dd($articulo->id);
           $nuevo = Livewire::test(Articulos::class)->call('edit' ,$articulo->id);
//dd($user->viewData('name'));
            //$nuevo->assertEquals('precio_venta', 8888);
            $nuevo->assertSee(8888);
        }
    }
}
