@extends('layouts.app')

@section('content')

    <div class="container ">
        @foreach($articulos as $articulo)
            <div class="d-inline-flex">
                <div class="card-body">
                    <p>{{$articulo->nombre}}</p>
                    <img src="{{$articulo->imagen_url}}" alt="{{$articulo->nombre}}"/>

                    <a class="btn btn-info" href="{{route('articulos.show', $articulo)}}"> Ver detalle</a>
                </div>
            </div>


        @endforeach
    </div>


@endsection
