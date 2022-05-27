<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use Livewire\Component;

class Search extends Component
{

    public $search;
    public $open = true;

    public function render()
    {
        if($this->search){
            $articulos = Articulo::where('nombre','ILIKE',"%". $this->search . "%")->get();
        }else{
            $articulos = [];
        }

        return view('livewire.search', compact("articulos"));
    }
}
