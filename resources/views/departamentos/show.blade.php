@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$articulo->imagen_url}}" alt="Card image cap">
                    <div class="card-body">

                        <h5 class="card-title">{{$articulo->nombre}}</h5>
                        <h5 class="card-title">Precio venta: ${{$articulo->precio_venta}}</h5>
                        <p>Disponibles: {{$articulo->stock}}</p>
                        <p class="card-text">{{$articulo->descripcion}}</p>
{{--                        <a href="{{route('catalogo.usuario')}}" class="btn btn-primary">Go somewhere</a>--}}
{{--                        <a href="#" class="btn btn-primary"> Agregar al carrito</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-5">
                @livewire('add-cart-item', ['articulo'=>$articulo])
            </div>
        </div>




    </div>


@endsection
