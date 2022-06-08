<div>
    <h2>Listado de proveedores</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>

                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$proveedor->id}}</td>
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->direccion}}</td>
                    <td>{{$proveedor->telefono}}</td>

                    <td>
                        <button wire:click="edit({{$proveedor->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$proveedor->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $categorias->links('vendor.pagination.bootstrap-4') }}--}}
{{ $proveedores->links('vendor.livewire.bootstrap') }}
