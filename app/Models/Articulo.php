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

    //URL AMIGABLES
    public function getRouteKeyName(){
        return 'nombre';
    }
}
