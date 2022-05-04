<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    //
    public function listarArticulos(Request $request){

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        //dd($columnName_arr[0]);
        $columnName = $columnIndex == 0 ? $columnName_arr[1]['data'] : $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $articulos = Articulo::where('articulos.id', '>', '0');
        $registros = $articulos
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $totalRecordswithFilter = $registros->count();
        $totalRecords = $registros->count();


        $data_arr = array();
        foreach ($registros as $registro) {


            $btn_ziggy = "<a href='".route('articulo.edit',['id'=>$registro->id,'nombre'=>'edwin'])."'  class='btn btn-success btn-xs'>Ziggy</a>";
            $btn1 = '<a href="detalle/'.$registro->id.'" class="btn btn-success btn-xs">Form Details</a>';
            $btn = '<a href="detalle/"  class="btn btn-success btn-xs">Form Details</a>';
            $otro_boton = '<a window.location.href="{{ route(\'articulo.edit\', $registro->id) }}" class="btn btn-warning">'.'ver'.'</a>';
            $boton_prueba = "<button class='btn btn-success'>Hola</button>";
            //$boton_prueba2 = "<a href='" . action('/app/Http/Controllers/ArticuloController@edit', ['id' => $registro->id]) . "' class='btn btn-danger'  title='Editar' type='button'>Editar</a>";
            $boton_editar = "<a href='" . url('ArticuloController@edit', ['id' => $registro->id]) . "'   title='Editar'><i class='fas carousel-fade'></i></a>";
            //$boton_ver_detalle = "<a href='" . action('authenticated\evento\EventoController@show', ['id' => $evento->id]) . "' class='fas fa-external-link-alt fa-1_75x opacity-50 mr-1' title='Ver detalle'></a>";
            $nombre = $registro->nombre;
            $opciones = $boton_editar.$boton_prueba.$otro_boton.$btn.$btn_ziggy;

            $data_arr[] = array(

                "nombre" => $nombre,
"opciones" => $opciones,
//            "id" => $id,
//            "estado" => $estado,
//            "fecharegistro" => $fecharegistro,
//            "nivelprioridad" => $nivelprioridad,
//            "tipoincidenteicad" => $tipoincidenteicad,
//            "unidad" => $unidad,
//            "direccion" => $direccion,
//            "fenomeno" => $fenomeno,
            );
        }






        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;

    }
}
