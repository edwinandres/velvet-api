<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class AddCartItem extends Component
{

    public $qty = 1;
    public $articulo, $quantity;
    public $color = "azul";
    public $estaencarro = "no";
    public $options = [];

    public function increment(){
        $this->qty = $this->qty+1;
    }

    public function mount(){
        $this->quantity = $this->articulo->cantidad;
        $this->options['image'] = Storage::url($this->articulo->image);
    }

    public function agregarAlCarro(){
        $this->estaencarro = "si";
        Cart::add(['id'=> $this->articulo->id,
            'name'=> $this->articulo->nombre,
            'qty' => $this->qty,
            'price'=> $this->articulo->precio_venta,
            'weight' => 55,
            'options' => $this->options
            //'precio_compra'=> $this->articulo->precio_compra
        ]);
    }

    public function saludar($nombre){

        $this->color = "red";
        $this->qty = 10;
    }
    public function decrement(){
        $this->qty = $this->qty-1;
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }

    public function prueba(){
        $this->color = $this->color."l";
    }

    public function prueba2($palabra){
        $this->color = $this->color.$palabra;
    }
}
