@extends('layouts.app')
@section('content')
<div class="container">


<p>esta es la busqueda de blade</p>
    {{$articulos}}
    <div class="col-12">


        <ul>
            @foreach($articulos as $articulo)
                <div class="card-body d-inline-block rounded-2 " style="border: 1px solid">
                    {{$articulo->nombre}}
                </div>
            @endforeach
        </ul>
    </div>

</div>
@endsection
