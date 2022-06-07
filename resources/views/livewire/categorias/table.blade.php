<div>
    <h2>Listado de categorias</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>

                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>

                    <td>
                        <button wire:click="edit({{$categoria->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$categoria->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $categorias->links('vendor.pagination.bootstrap-4') }}--}}
{{ $categorias->links('vendor.livewire.bootstrap') }}
