@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="row" style="color: white">
            <div class="col-1">

            </div>
            <div class="col-2">
                <div class="card bg-red " style="background-color: darkorange; height: 100px">
                    <p class="text-center">PENDIENTE</p>
                    <p class="text-center mt-2">{{$orders->where('status',1)->count()}}</p>
                    <p class="text-center mt-2"><i class="fas fa fa-business-time"></i></p>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-red" style=" background-color: gray; height: 100px">
                    <p class="text-center">RECIBIDO</p>
                    <p class="text-center mt-2">{{$orders->where('status',2)->count()}}</p>
                    <p class="text-center mt-2"><i class="fas fa fa-credit-card"></i></p>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-red" style=" background-color: blue; height: 100px">
                    <p class="text-center">ENVIADO</p>
                    <p class="text-center mt-2">{{$orders->where('status',3)->count()}}</p>
                    <p class="text-center mt-2"><i class="fas fa fa-truck"></i></p>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-red" style=" background-color: green; height: 100px">
                    <p class="text-center">ENTREGADO</p>
                    <p class="text-center mt-2">{{$orders->where('status',4)->count()}}</p>
                    <p class="text-center mt-2"><i class="fas fa fa-check-circle"></i></p>
                </div>
            </div>
            <div class="col-2">
                <div class="card bg-red" style=" background-color: red; height: 100px">
                    <p class="text-center">ANULADO</p>
                    <p class="text-center mt-2">{{$orders->where('status',5)->count()}}</p>
                    <p class="text-center mt-2"><i class="fas fa fa-times-circle"></i></p>
                </div>
            </div>

        </section>

        <section class="row mt-4 card shadow-lg">
            <h1>Pedidos recientes</h1>
            <ul>
                @foreach($orders as $order)
                    <ol class="card-body hover">
                        <a href="{{route('orders.show', $order)}}" class="d-inline-flex">
                            <span class="text-center" style="margin-right: 20px">
                                @switch($order->status)
                                    @case(1)
                                        <i class="fas fa-business-time red" style="color: orangered"></i>
                                        @break
                                    @case(2)
                                        <i class="fas fa-credit-card" style="color: grey"></i>
                                        @break
                                    @case(3)
                                        <i class="fas fa-truck" style="color: blue"></i>
                                        @break
                                    @case(4)
                                        <i class="fas fa-check-circle" style="color: green"></i>
                                        @break
                                    @case(5)
                                        <i class="fas fa-times-circle"style="color: red"></i>
                                        @break

                                @endswitch
                            </span>
                            <span class="mr-3">
                                Orden: {{$order->id}}
{{--                                <br>--}}
                                {{$order->created_at->format('d/m/Y')}}

                            </span>
                            <div class="ml-4">
                                <span class="ml-3" style="margin-left: 20px;">
                                    @switch($order->status)
                                        @case(1)
                                            Pendiente
                                            @break
                                        @case(2)
                                            Recibido
                                            @break
                                        @case(3)
                                            Enviado
                                            @break
                                        @case(4)
                                            Entregado
                                            @break
                                        @case(5)
                                            Anulado
                                            @break



                                    @endswitch
                                </span>
{{--                                <br>--}}<span class="px-2" style="width: 30px;margin-left: 20px">    </span>
                                <span>
                                    ${{$order->total}} COP
                                </span>
                                <span>
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </div>

                        </a>

                    </ol>

                @endforeach

            </ul>
        </section>
    </div>
@endsection
