<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ciudad_id'];

    public function ordenes(){
        return $this->hasMany(Order::class);
    }
}
