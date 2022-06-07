<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Departamentos extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $depto = Departamento::all();
        //dd($depto);
        $flowers = array();
       $departamentos = DB::select('SELECT departamentosGetAll()');
       foreach($departamentos as $departamento){
           $prueba =$departamento->departamentosgetall;
           $resultado = str_replace ( "(", '', $prueba);
           $resultado = str_replace(")",'',$resultado);
           //dd($resultado);
           $departamentos= explode(',', $resultado);
           $departamento = new Departamento();
           $departamento->id = $departamentos[0];
           $departamento->nombre = $departamentos[1];
           //dd($departamento);
           array_push($flowers, $departamento);
       }

       $departamentos = collect($flowers);


       //return view('livewire.departamentos', compact('departamentos'));
       //dd($departamentos);
        return view('livewire.departamentos',[
            'departamentos'=>Departamento::orderBy('id', 'desc')->paginate(10)
        ]);
    }



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



    public function store(){
        $this->validate(['nombre'=>'required']);

//        $departamento = Departamento::create([
//            'nombre' => $this->nombre,
//
//        ]);
//        $this->edit($departamento->id);
        //$departamento = DB::select('SELECT public."departamentoCreate"(hola)');
        //$string = "select * from fn_envio(".$param1.",".$param2.",".$param3.",'');";$sql = DB::select($string);

        DB::select('SELECT departamentoCreate(?)', [$this->nombre]);
        $departamento = Departamento::latest('created_at')->first();
        $this->edit($departamento->id);
    }

    public function destroy($id){
        Departamento::destroy($id);
    }

    public function edit($id){

        $departamento = Departamento::find($id);

        $this->departamento_id = $departamento->id;
        $this->nombre = $departamento->nombre;

        $this->view ="edit";

    }

    public function default(){
        $this->departamento_id = "";
        $this->nombre = "";


        $this->view ="create";
    }

    public function prueba(){
        dd("prueba");
    }

    public function update(){

        $this->validate(['nombre'=>'required']);

//        $departamento = Departamento::find($this->departamento_id);
//
//        $departamento->update([
//            'nombre' => $this->nombre
//
//        ]);

        DB::select('SELECT departamentoUpdate(?,?)', [$this->departamento_id, $this->nombre]);
        //$departamento = Departamento::latest('created_at')->first();

        $this->default();
    }
}
