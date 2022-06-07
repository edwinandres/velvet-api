@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
<form>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
<button id="botonprueba" >saludar</button>
                        {{ __('You are logged in!') }}
                        <input type="text" value="hola" id="pruebatxt">
                        @foreach($articulos as $articulo)
                            <li>{{$articulo->nombre}}</li>
                        @endforeach

<p>El articulo es {{$articulo->nombre}}</p>

                        <div>
                            <input type="hidden" value="detalle" id="table">
                            <table class="table table-bordered" id="defaultTable">

                                <thead>
                                <tr>
                                    <th class="camp" id="opciones">Iddetalle</th>
                                    <th class="camp" id="fecha_envio">Nombredetalle</th>
                                    <th class="camp" id="fecha_envio">Emaildetalle</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
</form>
                </div>
            </div>
        </div>
    </div>


@endsection


