<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::all();
        return $clientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $exception = DB::transaction(function () use ($request){
            try{

                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => $request['password']
                ]);

                $cliente = new Cliente();
                $cliente->user_id = $user->id;
                $cliente->direccion = $request->direccion;
                $cliente->descripcion = $request->descripcion;
                $cliente->save();
            }
            catch (Exception $e){
                return $e;
            }

        });


        return is_null($exception) ?
            response()->json(["success" => "cliente creado con exito", "status" => "ok"]):
            response()->json(["error" => $exception, "status" => "error"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cliente = DB::table('clientes')
            ->join('users', function($join) use($id){
                $join->on('clientes.user_id','=', 'users.id')
                    ->where('clientes.id', $id);
            })
            ->select('clientes.id', 'users.id as user_id', 'name', 'email', 'direccion', 'descripcion')
        ->get();

        return $cliente;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    private function crearUsuarioParaClienteNuevo(Request $request){

        //$user = User::cre
    }
}
