<?php

namespace Tests\Unit;

use App\Models\Categoria;
//use PHPUnit\Framework\TestCase;  //Este se usa para los de unit
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriaTest extends TestCase
{
//use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_una_categoria_tiene_muchos_articulos()
    {
        $categoria = new Categoria;
        //dd($categoria->articulos());
        $this->assertInstanceOf(Collection::class,$categoria->articulos);
    }
}
