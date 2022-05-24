<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'articulo_id'
    ];

    public function articulo(){
        return $this->hasOne(Articulo::class);
    }
}
