<?php

namespace Tests\Unit;

use App\Models\Categoria;
//use PHPUnit\Framework\TestCase;  //Este se usa para los de unit
use App\Models\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriaTest extends TestCase
{
//use DatabaseMigrations;
    /** @test */
    public function una_categoria_tiene_muchos_articulos()
    {
        $categoria = new Categoria;
        $this->assertInstanceOf(Collection::class,$categoria->articulos);
    }

    /** @test */
    public function si_carga_lista_de_usuarios()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/usuarios');
        $response->assertStatus(200);
    }

    /** @test */
    public function si_carga_lista_de_barrios()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/barrios');
        $response->assertStatus(200);
    }

    /** @test */
    public function si_carga_lista_de_departamentos()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/departamentos');
        $response->assertStatus(200);
    }

    /** @test */
    public function si_carga_lista_de_ciudades()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/departamentos');
        $response->assertStatus(200);
    }
}
