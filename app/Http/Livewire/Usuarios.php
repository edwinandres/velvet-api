<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $usuario_id,$nombre, $correo;
    //public $id;
    public $prueba =0;
    public $view = 'create';



    public function render()
    {

        return view('livewire.usuarios',[
            'usuarios'=>User::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function store(){
        $this->validate(['nombre'=>'required', 'correo'=>'required']);


        DB::select('SELECT usuarioCreate(?,?)', [$this->nombre, $this->correo]);
        $usuario = User::latest('created_at')->first();
        $this->edit($usuario->id);
    }

    public function destroy($id){

            User::destroy($id);
    }



    public function edit($id){
        $usuario = User::find($id);

        $this->usuario_id = $usuario->id;
        $this->nombre = $usuario->name;
        $this->correo = $usuario->email;


        $this->view ="edit";

    }

    public function default(){
        $this->usuario_id = "";
        $this->nombre = "";
        $this->correo = "";

        $this->view ="create";
    }


    public function update(){

        $this->validate(['nombre'=>'required', 'correo'=>'required']);

        DB::select('SELECT usuarioUpdate(?,?,?)', [$this->usuario_id, $this->nombre, $this->correo]);
        //$departamento = Departamento::latest('created_at')->first();

        $this->default();
    }

    public function delete(){

        User::destroy($this->usuario_id);
    }

}
