<header class="bg-black">

{{--        <div class="container flex align-items-center h-16">--}}
    <div class="container">
        <div class="row">
            <div class="col-9">
                @livewire('search')
            </div>
            <div class="col-3">
                @livewire('dropdown-cart')
            </div>

            {{--        <button><i class="fas fa-user-circle"></i></button>--}}


        </div>


    </div>


{{--    <div>--}}
        {{-- Because she competes with no one, no one can compete with her. --}}
        {{--AQUI VA EL CARRITO DE COMPRAS TIPO DROPDOWN--}}
{{--        <div class="dropdown">--}}
{{--            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                Categorias--}}
{{--            </button>--}}
{{--            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" >--}}
{{--                <ul>--}}


{{--                @foreach($categorias as $cat)--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{route('categorias.show', $cat)}}">{{$cat->nombre}}</a>--}}

{{--                    </li>--}}

{{--                @endforeach--}}
{{--                </ul>--}}
{{--                    <a class="dropdown-item" href="#">Action</a>--}}
{{--                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Some Dropdown<b class="caret"></b></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    @foreach($categorias as $cat)--}}
{{--                        <li><a href="#"><i class="icon-arrow-up"></i> {{$cat}}</a></li>--}}
{{--                    @endforeach--}}
{{--                    <li><a href="#"><i class="icon-arrow-up"></i> Up</a></li>--}}
{{--                    <li><a href="#"><i class="icon-arrow-down"></i> Down</a></li>--}}
{{--                    <li><a href="#"><i class="icon-arrow-left"></i> Left</a></li>--}}
{{--                    <li><a href="#"><i class="icon-arrow-right"></i> Right</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}


{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>--}}
{{--        <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"/>--}}



{{--    </div>--}}

</header>
