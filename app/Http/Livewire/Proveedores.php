<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedores extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $proveedor_id,$nombre, $telefono, $direccion;
    public $view = 'create';



    public function render()
    {

        return view('livewire.proveedores',[
            'proveedores'=>Proveedor::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function store(){
        $this->validate(['nombre'=>'required', 'telefono'=>'required', 'direccion'=>'required']);


        DB::select('SELECT proveedorCreate(?,?,?)', [$this->nombre, $this->telefono, $this->direccion]);
        $proveedor = Proveedor::latest('created_at')->first();
        $this->edit($proveedor->id);
    }

    public function destroy($id){
        Proveedor::destroy($id);
    }

    public function edit($id){
        $proveedor = Proveedor::find($id);

        $this->proveedor_id = $proveedor->id;
        $this->nombre = $proveedor->nombre;
        $this->direccion = $proveedor->direccion;
        $this->telefono = $proveedor->telefono;

        $this->view ="edit";

    }

    public function default(){
        $this->proveedor_id = "";
        $this->nombre = "";
        $this->direccion = "";
        $this->telefono = "";

        $this->view ="create";
    }


    public function update(){

        $this->validate(['nombre'=>'required', 'telefono'=>'required', 'direccion'=>'required']);

        DB::select('SELECT proveedorUpdate(?,?,?,?)', [$this->proveedor_id, $this->nombre, $this->direccion, $this->telefono]);
        //$departamento = Departamento::latest('created_at')->first();

        $this->default();
    }

}
