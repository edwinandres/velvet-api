<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    //relacion uno a muchos inversa

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    public function barrio(){
        return $this->belongsTo(Barrio::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
