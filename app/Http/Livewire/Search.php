<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use Livewire\Component;

class Search extends Component
{

    public $search;

    public function render()
    {
        $articulos = Articulo::where('nombre','ILIKE',"%". $this->search . "%")->get();
        return view('livewire.search', compact("articulos"));
    }
}
