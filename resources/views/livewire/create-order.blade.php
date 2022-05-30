<div class="container py-8 grid col-12">
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-7">
            <h5>Persona quien recibe:</h5>
            <div class="rounded-2 shadow-lg p-4 form-group-sm">
                <div>
                    <label>Nombre</label>
                    <input type="text" class="form-control" wire:model.defer="contacto">
                </div>
                <div>
                    <label>Telefono</label>
                    <input type="text" class="form-control" wire:model.defer="telefono">
                </div>
            </div>
            <div>
                <h5 class="mt-6 mb-3">Envios</h5>
{{--                <label class="rounded-2 shadow-lg p-4">--}}
{{--                    <input type="radio" name="envio" class="text-dark">--}}
{{--                    <span class="ml-2">Recojo en tienda</span>--}}
{{--                    <span class="mx-lg-auto">Gratis</span>--}}
{{--                </label>--}}
                <div class="rounded-2 shadow-lg p-4">
{{--                    <div>--}}
{{--                        <label >--}}
{{--                            <input type="radio" name="envio" class="text-dark">--}}
{{--                            <span class="ml-2">Envio a domicilio</span>--}}
{{--                            <span class="mx-lg-auto">Gratis</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
                    <div class="row mt-3 ml-4 px-4">
                        <div class=" col-6">
                            <label>Departamento</label>
                            <select class="form-control " wire:model="departamento_id">
                                <option value="" disabled selected>Seleccione un departamento</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Ciudad</label>
                            <select class="form-control" wire:model="ciudad_id">
                                <option value="" disabled selected>Seleccione una ciudad</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6" >
                            <label>Barrio</label>
                            <select class="form-control" wire:model="barrio_id">
                                <option value="" disabled selected>Seleccione una ciudad</option>
                                @foreach($barrios as $barrio)
                                    <option value="{{$barrio->id}}">{{$barrio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 " >
                            <label>Direccion</label>
                            <input class="form-control he" type="text" wire:model="direccion" style="height: 35px;"/>
                        </div>
                        <div class="col-12 form-group" >
                            <label>Referencia</label>
                            <input class="form-control full-width-chart" type="text" wire:model="referencia" style="height: 35px;"/>
                        </div>
                    </div>

                </div>

            </div>

            <div>
                <button class="btn btn-success" wire:loading.attr="disabled" wire:target="create_order" wire:click="create_order">Continuar con la compra</button>
            </div>
            <hr>
            <p>lorem ipsum <a href="/">Politicas de privacidad</a></p>

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
                    <p>Envio: <span>{{$shipping_cost}}</span></p>
                    <hr class="mt-4 mb-3">
                    <p class="align-items-center">Total: <span>{{$total }}</span></p>

                </div>
            </div>

        </div>
    </div>
</div>
