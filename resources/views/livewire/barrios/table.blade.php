<div>
    <h2>Listado de barrios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th colspan="2">&nbsp</th>
            </tr>
        </thead>


        <tbody>
            @foreach($barrios as $barrio)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$barrio->id}}</td>
                    <td>{{$barrio->nombre}}</td>
                    <td>{{$barrio->ciudad->nombre}}</td>

                    <td>
                        <button wire:click="edit({{$barrio->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$barrio->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $articulos->links('vendor.pagination.bootstrap-4') }}--}}
{{ $barrios->links('vendor.livewire.bootstrap') }}
