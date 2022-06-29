<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    //
    public function lista(){

        $inventario = Inventario::all();
        return view('inventario.index', compact('inventario'));
    }
}
