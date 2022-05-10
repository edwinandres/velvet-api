<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function subcategorias(){
        return $this->hasMany(Subcategorias::class);
    }

    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    public function productos(){
        return $this->hasManyThrough(Product::class);
    }

    //URL AMIGABLES
    public function getRouteKeyName(){
        return 'nombre';
    }
}
