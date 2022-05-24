<div>
    {{-- In work, do what you enjoy. --}}
    <div class="position-relative">
        <input type="text" wire:model="search" placeholder="Estas buscando algun producto?" class="w-75">


        <div class="position-absolute " style="z-index: 20" >
            <div class="card rounded mt-1">
                <div class="px-4 py-3">
                    @forelse($articulos as $articulo)
                        <div class="flex-column">

                        </div>
                        <div>
                            <p>{{$articulo->nombre}}</p>
                            <p>Precio: {{$articulo->precio_venta}}</p>
                        </div>
                        @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>


</div>
