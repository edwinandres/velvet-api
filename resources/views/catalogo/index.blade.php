@extends('layouts.app')

@section('content')


    @foreach($articulos as $articulo)
        <p>{{$articulo->nombre}}</p>
        <button class="btn btn-primary"></button>
        <a href="{{route('articulos.show', $articulo)}}"> Presione aqui</a>
    @endforeach

@endsection
