

    <div class="container">
        <section class="rounded-2 shadow-lg">
            @if(Cart::count())
                <h1>Carro de compras</h1>
                <table class="table-bordered align-items-center" width="85%" align="center">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                        <th>Actualizar cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}}</td>
                            <td align="center"><i wire:click="delete('{{$item->rowId}}')" wire:loading.class="btn btn-success" wire:target="delete('{{$item->rowId}}')" class="fa fa-trash"></i></td>
                            <td align="center">@livewire('update-cart-item',['rowId'=>$item->rowId], key($item->rowId))</td>
                            <td>{{$item->price * $item->qty}}</td>
                        </tr>
                    @endforeach

                </table>


{{--                @foreach(Cart::content() as $item)--}}
{{--        --}}{{--            REEMPLAZAR ESTE DIV POR UNA TABLA--}}
{{--                    <div class="card-body d-inline-flex">--}}
{{--                        <p>{{$item->name}}</p><br>--}}
{{--                        <p> Cantidad: {{$item->qty}}</p><br>--}}
{{--                        <p> Precio: {{$item->price}}</p><br>--}}
{{--                        <p> Total: {{$item->qty}}</p>--}}
{{--                        <i wire:click="delete('{{$item->rowId}}')" wire:loading.class="btn btn-success" wire:target="delete('{{$item->rowId}}')" class="fa fa-trash"></i>--}}
{{--                        <p>{{$item->rowId}}</p>--}}
{{--                        <div>--}}
{{--                            @livewire('update-cart-item',['rowId'=>$item->rowId], key($item->rowId))--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <p>esto es item.qty{{$item->qty}}</p>--}}
{{--                            <p>usd {{$item->price * $item->qty}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                @endforeach--}}
                <a class=" btn btn-danger mt-3 mb-3" wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito
                </a>
            @else
                <h1>El carro de compras se encuentra vacio</h1>

                <a href="/catalogo" class="btn btn-info">Ir al inicio</a>
            @endif
        </section>

        <div class="rounded-2 shadow-lg mt-4">
            <div>
                <p>
                    <span>Total:</span>
                    USD {{Cart::subtotal()}}
                </p>
            </div>
            <div>
{{--                <button href="{{route('orders.create')}}" class="btn btn-success">Continuar</button>--}}
                <a href="{{route('orders.create')}}" class="btn btn-success">Continuar</a>
            </div>

        </div>

    </div>

