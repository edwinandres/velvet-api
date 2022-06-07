<?php

namespace App\Http\Livewire;

use App\Models\Barrio;
use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Livewire\WithPagination;

class Barrios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $barrio_id,$nombre,  $ciudades, $ciudad_id;

    public $view = 'create';

    public function mount(){
        //$categorias = Categoria::all();
        //$this->categorias = $categorias;
        //$this->proveedores = Proveedor::all();
        $ciudades = Ciudad::all();
        $this->ciudades =$ciudades;
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
        return view('livewire.barrios',[
            'barrios'=>Barrio::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function store(){
        $this->validate(['nombre'=>'required',  'ciudad_id'=>'required']);

//        $barrio = Barrio::create([
//            'nombre' => $this->nombre,
//            'ciudad_id'=>$this->ciudad_id
//        ]);
//        $this->edit($barrio->id);

        $this->validate(['nombre'=>'required']);


        DB::select('SELECT barrioCreate(?,?)', [$this->nombre, $this->ciudad_id]);
        $barrio = Barrio::latest('created_at')->first();
        $this->edit($barrio->id);
    }

    public function destroy($id){
        Barrio::destroy($id);
    }

    public function edit($id){
        $barrio = Barrio::find($id);

        $this->barrio_id = $barrio->id;
        $this->nombre = $barrio->nombre;
        $this->ciudad_id = $barrio->ciudad_id;


        $this->view ="edit";

    }

    public function default(){
        $this->barrio_id = "";
        $this->nombre = "";

        $this->ciudad_id = "";


        $this->view ="create";
    }



    public function update(){

        $this->validate(['nombre'=>'required', 'ciudad_id'=>'required']);

//        $barrio = Barrio::find($this->barrio_id);
//
//        $barrio->update([
//            'nombre' => $this->nombre,
//
//            'ciudad_id'=>$this->ciudad_id,
//
//        ]);

        DB::select('SELECT barrioUpdate(?,?,?)', [$this->barrio_id, $this->nombre, $this->ciudad_id]);

        $this->default();
    }
}
