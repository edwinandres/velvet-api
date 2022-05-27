<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'costo', 'departamento_id'];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function barrios(){
        return $this->hasMany(Barrio::class);
    }

    public function ordenes(){
        return $this->hasMany(Order::class);
    }
}
