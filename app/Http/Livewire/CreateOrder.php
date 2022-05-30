<?php

namespace App\Http\Livewire;

use App\Models\Barrio;
use App\Models\Ciudad;
use App\Models\Departamento;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use App\Models\Order;

class CreateOrder extends Component
{
    public $departamentos, $ciudades=[], $barrios = [];
    public $departamento_id = "", $ciudad_id="", $barrio_id="";
    public $contacto, $telefono, $direccion, $referencia, $shipping_cost = 0;
    public $total = 0;
    public $rules=[
        'contacto'=>'required', 'telefono'=>'required'
    ];

    public function mount(){
        $this->departamentos = Departamento::all();

    }

    public function render()
    {
        return view('livewire.create-order')->extends('layouts.app');
    }

    public function create_order(){

        $rules = $this->rules;
        $this->validate($rules);

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contacto = $this->contacto;
        $order->telefono = $this->telefono;
        $order->shipping_cost = $this->shipping_cost;
        $this->subtotal = (int)Cart::subtotal(0,false,false);
        $order->total = $this->shipping_cost + $this->subtotal;
        $order->direccion = $this->direccion;
        $order->content = Cart::content();
        $order->departamento_id = $this->departamento_id;
        $order->ciudad_id = $this->ciudad_id;
        $order->barrio_id = $this->barrio_id;

        $order->save();
        //Cart::destroy();

        return redirect()->route('orders.payment', $order);


    }

    public function updatedDepartamentoId($value){
        $this->ciudades = Ciudad::where('departamento_id',$value)->get();
        $this->reset(['barrio_id', 'ciudad_id']);
    }

    public function updatedCiudadId($value){
        $ciudad = Ciudad::find($value);
        $this->shipping_cost = floatval($ciudad->costo);
        $this->subtotal = (int)Cart::subtotal(0,false,false);
        //dd($this->shipping_cost, $this->subtotal);
        $this->total = $this->subtotal + $this->shipping_cost;

        $this->barrios = Barrio::where('ciudad_id',$value)->get();
        $this->reset('barrio_id');
    }
}
