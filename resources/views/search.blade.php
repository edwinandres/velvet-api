@extends('layouts.app')
@section('content')
<div class="container">



    <div class="col-12">


        <ul>
            @foreach($articulos as $articulo)
                <div class="card-body d-inline-block rounded-2 " style="border: 1px solid">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$articulo->imagen_url}}" alt="Card image cap">
                        <div class="card-body">

                            <h5 class="card-title">{{$articulo->nombre}}</h5>
                            <a class="btn btn-info" href="{{route('articulos.show', $articulo)}}"> Ver detalle</a>
{{--                            <h5 class="card-title">Precio venta: ${{$articulo->precio_venta}}</h5>--}}
{{--                            <p>Disponibles: {{$articulo->stock}}</p>--}}
{{--                            <p class="card-text">{{$articulo->descripcion}}</p>--}}
                            {{--                        <a href="{{route('catalogo.usuario')}}" class="btn btn-primary">Go somewhere</a>--}}
                            {{--                        <a href="#" class="btn btn-primary"> Agregar al carrito</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

</div>
@endsection
