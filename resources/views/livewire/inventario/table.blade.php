<div>
    <h2>Listado de proveedores</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>


                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $item)

                <tr wire:key="{{ $loop->index }}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->articulo->nombre}}</td>
                    <td>{{$item->cantidad}}</td>


                    <td>
                        <button wire:click="edit({{$item->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$item->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $categorias->links('vendor.pagination.bootstrap-4') }}--}}
{{ $inventario->links('vendor.livewire.bootstrap') }}
