<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Categorias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {


        return view('livewire.categorias',[
            'categorias'=>Categoria::orderBy('id', 'desc')->paginate(10)
        ]);
    }



    public $categoria_id,$nombre, $descripcion;

    public $view = 'create';

    public function mount(){
//        $categorias = Categoria::all();
//        $this->categorias = $categorias;

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



    public function store(){
        $this->validate(['nombre'=>'required','descripcion'=>'required']);


        DB::select('SELECT categoriaCreate(?,?)', [$this->nombre, $this->descripcion]);
        $categoria = Categoria::latest('created_at')->first();
        $this->edit($categoria->id);
    }

    public function destroy($id){
        Categoria::destroy($id);
    }

    public function edit($id){

        $categoria = Categoria::find($id);

        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;

        $this->view ="edit";

    }

    public function default(){
        $this->categoria_id = "";
        $this->nombre = "";
        $this->descripcion = "";


        $this->view ="create";
    }


    public function update(){

        $this->validate(['nombre'=>'required', 'descripcion'=>'required']);


        DB::select('SELECT categoriaUpdate(?,?,?)', [$this->categoria_id, $this->nombre, $this->descripcion]);
        //$departamento = Departamento::latest('created_at')->first();

        $this->default();
    }
}
