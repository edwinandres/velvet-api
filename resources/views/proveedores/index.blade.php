@extends('adminlte::page')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                            <input type="text" value="hola" id="pruebatxt">--}}
{{--                        @foreach($articulos as $articulo)--}}
{{--                            <li>{{$articulo->nombre}}</li>--}}
{{--                            @endforeach--}}



{{--                            <div>--}}
{{--                                <input type="hidden" value="articulos" id="table">--}}
{{--                                <table class="table table-bordered" id="defaultTable2">--}}

{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th class="camp" id="opciones">Opciones</th>--}}
{{--                                       <th class="camp" id="nombre">Nombre</th>--}}
{{--                                        <th class="camp" id="precio_compra">Email</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                </table>--}}
{{--                            </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="container">

    @livewire('proveedores')
</div>

@endsection


