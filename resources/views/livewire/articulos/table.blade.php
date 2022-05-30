<div>
    <h2>Listado de articulos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->nombre}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->precio_compra}}</td>
                    <td>
                        <button wire:click="edit({{$articulo->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$articulo->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $articulos->links('vendor.pagination.bootstrap-4') }}--}}
{{ $articulos->links('vendor.livewire.bootstrap') }}
