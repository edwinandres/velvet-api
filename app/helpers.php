<?php
use App\Models\Articulo;

function quantity($articulo_id){
    $articulo = Articulo::find($articulo_id);

    $quantity = $articulo->inventario->cantidad;

    return $quantity;
}

function qty_added($articulo_id){
    $cart = Cart::content();
    $item = $cart->where('id', $articulo_id)->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }
}

function qty_available($articulo_id){
    return quantity($articulo_id)- qty_added($articulo_id);
}
