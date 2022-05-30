@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body rounded-lg shadow-lg mb-3">
            <p class="text-uppercase">
                Número de orden {{$order->id}}
            </p>
        </div>
        <div class="card card-body rounded-lg shadow-lg mb-6 ml-3 mb-3">

            <div class="row ml-3">
                <div class="col-5 mx-2 px-2">
                    <h5 class="font-weight-bold text-uppercase">Envío</h5>
                    <p class="mx-lg-auto gap-3">Los productos seran enviados a :</p>
                    <p class="mx-lg-auto gap-3">{{$order->direccion}}</p>
                    <p>{{$order->departamento->nombre}} - {{$order->ciudad->nombre}} - {{$order->barrio->nombre}}</p>

                </div>
                <div class="col-5">
                    <h5 class="font-weight-bold text-uppercase">Contacto</h5>
                    <p class="mx-lg-auto gap-3">La persona que recibe : {{$order->contacto}}</p>
                    <p class="mx-lg-auto gap-3">Telefono: {{$order->telefono}}</p>
                </div>

            </div>
        </div>

        <div class="card card-body rounded-lg shadow-lg mb-6">
            <div class="row ml-3" style="margin-left: 2%; margin-right: 2%">
                <h5 class="font-weight-bold text-uppercase">Resumen</h5>
                <table class="table ml-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td><div class="flex-column">
                                        <img  style="width: 50px; height: 50px;" src="{{$item->options->imagen_url}}" alt="">
                                        <article><h5>{{$item->name}}</h5></article>
                                    </div>
                                </td>
                                <td class="align-items-center">{{$item->price}}</td>
                                <td class="align-items-center">{{$item->qty}}</td>
                                <td class="align-items-center">{{$item->price * $item->qty}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card card-body rounded-lg shadow-lg mb-3 flex-fill">
            <div class="row">
                <div class="col-6">
                    <img style="width: 500px" src="{{asset('img/pagoCredito.png')}}" class="d-inline-flex"/>
                </div>
                <div class="col-6 align-items-right">
                    <h5>Subtotal: {{$order->total -$order->shipping_cost}}</h5>
                    <h5>Envio: {{$order->shipping_cost}}</h5>
                    <h5>Pago: {{$order->total}}</h5>
                </div>

            </div>


        </div>
    </div>

@endsection
