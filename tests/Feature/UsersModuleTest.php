<?php

namespace Tests\Feature;

use App\Http\Livewire\Usuarios;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{


    /** @test */
    public function un_usuario_puede_crear_usuarios()
    {
        $user = User::where('email','test123@email.com')->get();

        if($user->count() >0){
            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)
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

    /** @test */
    public function un_usuario_puede_editar_usuarios()
    {
        $user = User::where('email','test123@email.com')->get();

        if($user->count() >0){

            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)
                //->emit('prueba',$user->first()->id);
                ->set('prueba', $user->first()->id)
                ->call('update');
        }

        //1.Teniendo un usuario autenticado
        $this->actingAs(User::factory()->create());


        //2. Cuando hace un post request a status
        Livewire::test(Usuarios::class)
            ->set('nombre', 'test123')
            ->set('correo', 'test123@email.com')
            ->call('update');


        //3. Entonces veo un nuevo estado en base de datos
        $this->assertTrue(User::whereName('test123')->exists());
    }

    /** @test */
    public  function un_usuario_puede_encontrar_usuarios(){
        $user = User::where('email','test123@email.com')->get();

        if($user->count() >0){

            $ide =$user->first()->id;
            $user = Livewire::test(Usuarios::class)->call('edit' ,$ide);
            $user->assertSee('test123');
        }
    }

    /** @test */
    public  function un_usuario_puede_eliminar_usuarios(){
        $user = User::where('email','test123@email.com')->get();

        if($user->count() >0){

            $ide =$user->first()->id;
            Livewire::test(Usuarios::class)->call('destroy' ,$ide);

        }
    }

}
