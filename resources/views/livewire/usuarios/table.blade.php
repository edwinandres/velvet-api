<div>
    <h2>Listado de usuarios</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>

                <th colspan="2">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr wire:key="{{ $loop->index }}">
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>

                    <td>
                        <button wire:click="edit({{$usuario->id}})"   class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{$usuario->id}})"   class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{--{{ $categorias->links('vendor.pagination.bootstrap-4') }}--}}
{{ $usuarios->links('vendor.livewire.bootstrap') }}
