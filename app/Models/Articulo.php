<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio_compra',
        'precio_venta',
        'categoria_id',
        'proveedor_id'
    ];

    //accesores
    public function getStockAttribute(){
        return $this->inventario->cantidad;
    }

    //URL AMIGABLES
    public function getRouteKeyName(){
        return 'nombre';
    }


    public function inventario(){
        return $this->hasOne(Inventario::class);
    }
}
