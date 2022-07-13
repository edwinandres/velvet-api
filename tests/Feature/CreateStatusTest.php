<?php

namespace Tests\Feature;

use App\Http\Livewire\Usuarios;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateStatusTest extends TestCase
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
    public function un_usuario_puede_crear_usuarios()
    {
        $user = User::where('email','test123@email.com')->get();
        //dd($user);

        if($user->count() >0){
            //dd($user->first()->id);
            //dd($user->first()->id);
            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)
               //->emit('prueba',$user->first()->id);
                ->set('usuario_id', $user->first()->id)

                ->call('delete');
        }

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());


        //2. Cuando hace un post request a status
        Livewire::test(Usuarios::class)
            ->set('nombre', 'test123')
            ->set('correo', 'test123@email.com')
            ->call('store');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(User::whereName('test123')->exists());
    }

    /**@test*/
    public function un_usuario_puede_editar_usuarios()
    {
        $user = User::where('email','test123@email.com')->get();
        //dd($user);

        if($user->count() >0){

            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)
                //->emit('prueba',$user->first()->id);
                ->set('prueba', $user->first()->id)

                ->call('pruebaf');
        }

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());


        //2. Cuando hace un post request a status
        Livewire::test(Usuarios::class)
            ->set('nombre', 'test123')
            ->set('correo', 'test123@email.com')
            ->call('store');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(User::whereName('test123')->exists());
    }
    /**@test*/
    public  function un_usuario_puede_hacer_destroy(){
        $user = User::where('email','test123@email.com')->get();

        if($user->count() >0){

            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)->call('destroy' ,$ide);

        }
    }
    public  function un_usuario_puede_encontrar_usuarios(){
        $user = User::where('email','test123@email.com')->get();
        //dd($user->first()->id);

        if($user->count() >0){

            $ide =$user->first()->id;
            $user = Livewire::test(Usuarios::class)->call('edit' ,$ide);
//dd($user->viewData('name'));
            //$this->assertEquals('name', $user->name);
            $user->assertSee('test123');
        }
    }
}
