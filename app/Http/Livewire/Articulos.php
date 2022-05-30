<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Articulos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $articulo_id,$nombre, $descripcion, $precio_compra, $precio_venta, $categorias, $categoria_id,
            $proveedores, $proveedor_id, $imagen_url;

    public $view = 'create';

    public function mount(){
        $categorias = Categoria::all();
        $this->categorias = $categorias;
        $this->proveedores = Proveedor::all();
    }

//    public function updatingSearch()
//    {
//        $this->resetPage();
//    }

//    public function hydrate()
//    {
//        $this->resetErrorBag();
//        $this->resetValidation();
//    }

    public function render()
    {
        //$this->resetErrorBag();
        //$this->resetValidation();
        return view('livewire.articulos',[
            'articulos'=>Articulo::where('status',1)->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function store(){
        $this->validate(['nombre'=>'required', 'descripcion'=>'required', 'precio_compra'=>'required', 'categoria_id'=>'required']);

        $articulo = Articulo::create([
            'nombre' => $this->nombre,
            'descripcion'=>$this->descripcion,
            'precio_compra'=>$this->precio_compra,
            'precio_venta'=>$this->precio_venta,
            'categoria_id'=>$this->categoria_id,
            'proveedor_id'=>$this->proveedor_id,
            'imagen_url'=>$this->imagen_url
        ]);
        $this->edit($articulo->id);
    }

    public function destroy($id){
        Articulo::destroy($id);
    }

    public function edit($id){
        $articulo = Articulo::find($id);

        $this->articulo_id = $articulo->id;
        $this->nombre = $articulo->nombre;
        $this->descripcion = $articulo->descripcion;
        $this->precio_compra = $articulo->precio_compra;
        $this->precio_venta = $articulo->precio_venta;
        $this->proveedor_id = $articulo->proveedor_id;
        $this->categoria_id = $articulo->categoria_id;
        $this->imagen_url = $articulo->imagen_url;

        $this->view ="edit";

    }

    public function default(){
        $this->articulo_id = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->precio_compra = "";
        $this->precio_venta = "";
        $this->proveedor_id = "";
        $this->categoria_id = "";
        $this->imagen_url = "";

        $this->view ="create";
    }

    public function prueba(){
        dd("prueba");
    }

    public function update(){

        $this->validate(['nombre'=>'required', 'descripcion'=>'required', 'precio_compra'=>'required', 'categoria_id'=>'required']);

        $articulo = Articulo::find($this->articulo_id);

        $articulo->update([
            'nombre' => $this->nombre,
            'descripcion'=>$this->descripcion,
            'precio_compra'=>$this->precio_compra,
            'precio_venta'=>$this->precio_venta,
            'categoria_id'=>$this->categoria_id,
            'proveedor_id'=>$this->proveedor_id,
            'imagen_url'=>$this->imagen_url
        ]);

        $this->default();
    }

}
