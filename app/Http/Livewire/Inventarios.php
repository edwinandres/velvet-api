<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Inventario;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Inventarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $inventario_id,$articulo_id, $cantidad;
    public $view = 'create';



    public function render()
    {

        return view('livewire.inventarios',[
            'inventario'=>Inventario::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function store(){
        $this->validate(['nombre'=>'required']);

        $inventario = Inventario::create([
            'cantidad' => $this->cantidad,
            'articulo_id'=>$this->cantidad

        ]);
        $this->edit($inventario->id);



    }

    public function destroy($id){
        Inventario::destroy($id);
    }

    public function edit($id){
        $inventario = Inventario::find($id);

        $this->inventario_id = $inventario->id;
        $this->cantidad = $inventario->cantidad;
        $this->articulo_id = $inventario->articulo_id;

        $this->view ="edit";

    }

    public function default(){
        $this->inventario_id = "";
        $this->cantidad = "";
        $this->articulo_id = "";

        $this->view ="create";
    }


    public function update(){

        $this->validate(['cantidad'=>'required', 'articulo_id'=>'required']);

        $inventario = Inventario::find($this->inventario_id);

        $inventario->update([
            'cantidad' => $this->cantidad,
            'articulo_id'=> $this->articulo_id

        ]);



        $this->default();
    }

}
