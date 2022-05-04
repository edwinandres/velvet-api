<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articulos = Articulo::all();
        return $articulos;
    }

    public function lista(){
//dd("hola");
        $articulos = Articulo::all();
        return view('articulos.index', compact('articulos'));
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
        $articulo = new Articulo();

        $articulo->nombre = $request->nombre;
        $articulo->precio_compra = $request->precio_compra;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->proveedor_id = $request->proveedor_id;

        $articulo->save();

        return $articulo;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articulo = new Articulo($id);
        return $articulo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd('este es el id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $articulo = Articulo::findOrFail($id);

        $articulo->nombre = $request->nombre;
        $articulo->precio_compra = $request->precio_compra;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->proveedor_id = $request->proveedor_id;

        $articulo->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalle(Request  $request)
    {
        //
        //dd($request->toArray());
        $articulos = Articulo::all();
        $articulo = Articulo::find($request->id);
        return view('articulos.detail', compact('articulos','articulo'));
    }

    public function catalogoUsuario(){
        //dd("catalogo usurio");
//        $stripe = new \Stripe\StripeClient(
//            'sk_test_51Knu6CD9CNNKm4vlc02NMSCddauEDOLAgGW1KltSQ1srHr73eP42J450IFqzAZu4pWfmpsUrPlQBrxwy1NxvWFZq00Xkp59eNR'
//        );
//        $stripe->skus->all(['limit' => 3]);
        \Stripe\Stripe::setApiKey('sk_test_51Knu6CD9CNNKm4vlc02NMSCddauEDOLAgGW1KltSQ1srHr73eP42J450IFqzAZu4pWfmpsUrPlQBrxwy1NxvWFZq00Xkp59eNR');
        $skus = \Stripe\SKU::all();
        $skus = \Stripe\Product::all();
        //dd($skus);
        //dd($stripe);
        $articulos = Articulo::all();

        return View('catalogo.listado', compact('articulos','skus'));
    }
}
