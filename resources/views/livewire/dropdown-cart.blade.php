<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    {{--AQUI VA EL CARRITO DE COMPRAS TIPO DROPDOWN--}}
    <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle d-inline-flex" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-cart-shopping mx-2 "></i>
            <label class="alert-danger mx-2" >{{Cart::count()}}</label>

        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
{{--            <a class="dropdown-item" href="#">Action</a>--}}
{{--            <a class="dropdown-item" href="#">Another action</a>--}}
{{--            <a class="dropdown-item" href="#">Something else here</a>--}}
            <ul>
                @forelse(Cart::content() as $item)

                    <div class="row d-inline-flex">

                            <div class="col-2 card-body d-inline-flex">
                                {{--                        <img src="{{$item->options->image}}" alt=""/>--}}
                                <img width="50px;" src="{{$item->options->imagen_url}}" alt="{{$item->options->imagen_url}}"/>

                            </div>


                        <div class="col-10 d-inline-flex">
                            <article>

                                <p>{{$item->name}}</p>
                                <p>Cantidad {{$item->qty}}</p>
                                <p>Precio {{$item->price}}</p>
                            </article>
                        </div>
                    </div>

                @empty
                    <p>No tiene items</p>
                @endforelse
            </ul>
            @if(Cart::count())
                <div>
                    <p><span class="fw-bold">Total:</span> {{Cart::subtotal()}}</p>
                </div>
            <a href="{{route('shopping-cart')}}">
                <button class="btn btn-info">Ir al carro de compras</button>
            </a>

            @endif
        </div>
    </div>
{{--    <ul>--}}
{{--        <li class="dropdown">--}}
{{--            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Some Dropdown<b class="caret"></b></a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li><a href="#"><i class="icon-arrow-up"></i> Up</a></li>--}}
{{--                <li><a href="#"><i class="icon-arrow-down"></i> Down</a></li>--}}
{{--                <li><a href="#"><i class="icon-arrow-left"></i> Left</a></li>--}}
{{--                <li><a href="#"><i class="icon-arrow-right"></i> Right</a></li>--}}


{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <ul>--}}
{{--        @forelse(Cart::content() as $item)--}}
{{--            <p>si tiene items</p>--}}
{{--            <li class="flex">--}}
{{--                <img src="{{$item->options->image}}" alt=""/>--}}
{{--                <article>--}}
{{--                    <h1>{{$item->name}}</h1>--}}
{{--                </article>--}}
{{--            </li>--}}
{{--        @empty--}}
{{--            <p>No tiene items</p>--}}
{{--        @endforelse--}}
{{--    </ul>--}}


    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="application/javascript" src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"/>


</div>
