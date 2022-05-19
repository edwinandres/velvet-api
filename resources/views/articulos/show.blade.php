@extends('layouts.app')

@section('content')


    <p>Hemos entrado en articulos . show</p>
    <p>{{$articulo->nombre}}</p>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <i class="fas fa-truck">hoal</i>
            <h5 class="card-title">{{$articulo->nombre}}</h5>
            <h5 class="card-title">Precio venta: ${{$articulo->precio_venta}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{route('catalogo.usuario')}}" class="btn btn-primary">Go somewhere</a>
            <a href="#" class="btn btn-primary"> Agregar al carrito</a>
        </div>
    </div>

    @livewire('add-cart-item', ['articulo'=>$articulo])


@endsection
