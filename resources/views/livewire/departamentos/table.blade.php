<div>
    <h2>Listado de departamentos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>

                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departamentos as $departamento)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$departamento->id}}</td>
                    <td>{{$departamento->nombre}}</td>

                    <td>
                        <button wire:click="edit({{$departamento->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$departamento->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $articulos->links('vendor.pagination.bootstrap-4') }}--}}
{{ $departamentos->links('vendor.livewire.bootstrap') }}
