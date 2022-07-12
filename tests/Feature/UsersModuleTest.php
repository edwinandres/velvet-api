<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function si_carga_lista_de_usuarios()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
        //$response->
    }

    /*public function si_carga_detalle_de_usuario()
    {
        $response = $this->get('/usuarios/5');
        $response->assertStatus(200);
        $response->assertSee("hola");
    }*/
}
