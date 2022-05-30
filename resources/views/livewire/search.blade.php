<div>
    {{-- In work, do what you enjoy. --}}
    <div class="position-relative mt-3 mb-4">
        <form action="{{route('search')}}">
            <input name="name" type="text" wire:model="search" placeholder="Estas buscando algun producto?" class="w-75">
            <button class="btn btn-danger">Buscar</button>
        </form>


{{--        <div class="position-absolute {{$open??'d-none'}} " style="z-index: 20" >--}}
{{--            <div class="card rounded mt-1 {{$open??'d-none'}} " >--}}
{{--                <div class="px-4 py-3 {{$open??'d-none'}} ">--}}
{{--                    @forelse($articulos as $articulo)--}}
{{--                        <a href="{{route('articulos.show', $articulo)}}">--}}
{{--                            <div class="{{$open??'d-none'}} ">--}}
{{--                                <p>{{$articulo->nombre}}</p>--}}
{{--                                <p>Precio: {{$articulo->precio_venta}}</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        @empty--}}

{{--                    @endforelse--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
    </div>


</div>
