<div class="container py-8 grid col-12">
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-7">
            <div class="rounded-2 shadow-lg p-4">
                <div>
                    <label>Nombre</label>
                    <input type="text">
                </div>
                <div>
                    <label>Telefono</label>
                    <input type="text">
                </div>
            </div>
            <div>
                <p class="mt-6 mb-3">Envios</p>
                <label class="rounded-2 shadow-lg p-4">
                    <input type="radio" name="envio" class="text-dark">
                    <span class="ml-2">Recojo en tienda</span>
                    <span class="mx-lg-auto">Gratis</span>
                </label>
                <label class="rounded-2 shadow-lg p-4">
                    <input type="radio" name="envio" class="text-dark">
                    <span class="ml-2">Envio a domicilio</span>
                    <span class="mx-lg-auto">Gratis</span>
                </label>
            </div>

            <div>
                <button>Continuar con la compra</button>
            </div>
            <hr>
            <p>Loreeañfañfjñflñfkafj ñf fñ faf fa<a href="/">Politicas de privacidad</a></p>

        </div>

        <div class="col-5">
            <div class="card-body rounded-2 shadow-lg">
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
                <hr class="mt-4 mb-3">
                <div>
                    <p class="align-items-center">Subtotal: <span>{{Cart::subtotal()}}</span></p>
                    <p>Envio: <span>Gratis</span></p>
                    <hr class="mt-4 mb-3">
                    <p class="align-items-center">Total: <span>{{Cart::subtotal()}}</span></p>

                </div>
            </div>

        </div>
    </div>
</div>
