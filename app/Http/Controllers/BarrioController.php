<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
    //
    public function lista(){

        $barrios = Barrio::all();
        return view('barrios.index', compact('barrios'));
    }
}
