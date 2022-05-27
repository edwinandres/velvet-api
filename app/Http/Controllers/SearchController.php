<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        // TODO: Implement __invoke() method.
        $name = $request->name;
        $articulos = Articulo::where('nombre', 'ILIKE', '%'. $name . '%')
            //->take(8)
            ->paginate(8);



        return view('search' , compact('articulos'));
    }
}
