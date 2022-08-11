@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--    <h1>Dashboard</h1>--}}
@stop

@section('content')

    @section('content')
        <div class="container">
            <section class="row" style="color: white">
                <div class="col-1">

                </div>
                <a class="col-2" style="color:white" href="{{route('admin.orders.index')."?status=1"}}">
                    <div class="card bg-orange" style="background-color: darkorange; height: 120px">
                        <p class="text-center">PENDIENTE</p>
                        <p class="text-center mt-1">{{$pendiente}}</p>
                        <p class="text-center mt-1"><i class="fas fa fa-business-time"></i></p>
                    </div>
                </a>
                <a class="col-2" style="color:white" href="{{route('admin.orders.index')."?status=2"}}">
                    <div class="card bg-gray" style=" background-color: gray; height: 120px">
                        <p class="text-center">RECIBIDO</p>
                        <p class="text-center mt-1">{{$recibido}}</p>
                        <p class="text-center mt-1"><i class="fas fa fa-credit-card"></i></p>
                    </div>
                </a>
                <a class="col-2" style="color:white" href="{{route('admin.orders.index')."?status=3"}}">
                    <div class="card bg-blue" style=" background-color: blue; height: 120px">
                        <p class="text-center">ENVIADO</p>
                        <p class="text-center mt-1">{{$enviado}}</p>
                        <p class="text-center mt-1"><i class="fas fa fa-truck"></i></p>
                    </div>
                </a>
                <a class="col-2" style="color:white" href="{{route('admin.orders.index')."?status=4"}}">
                    <div class="card bg-gradient-green" style=" background-color: green; height: 120px">
                        <p class="text-center">ENTREGADO</p>
                        <p class="text-center mt-1">{{$entregado}}</p>
                        <p class="text-center mt-1"><i class="fas fa fa-check-circle"></i></p>
                    </div>
                </a>
                <a class="col-2" style="color:white" href="{{route('admin.orders.index')."?status=5"}}">
                    <div class="card bg-red" style=" background-color: red; height: 120px">
                        <p class="text-center">ANULADO</p>
                        <p class="text-center mt-1">{{$anulado}}</p>
                        <p class="text-center mt-1"><i class="fas fa fa-times-circle"></i></p>
                    </div>
                </a>

            </section>

            <section class="row mt-4 card shadow-lg">
                <h1>Pedidos recientes</h1>
                <ul>
                    @foreach($orders as $order)
                        <ol class="card-body hover">
                            <a href="{{route('admin.orders.show', $order)}}" class="d-inline-flex">
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

@stop

@section('css')

@stop
