<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{

    protected $listeners = ['render'=>'render'];

    public function destroy(){
        Cart::destroy();
        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        //$articulos = Articulo::all();
        return view('livewire.shopping-cart')->extends('layouts.app');
    }
}
