<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" wire:model="nombre">
    @error('nombre')<span>{{$message}}</span> @enderror
</div>



<div class="form-group">
    <label>Ciudad</label>
    <select wire:model="ciudad_id" class="form-control">
        <option value="">--Ciudad--</option>
        @foreach($ciudades as $ciudad)
            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
        @endforeach
    </select>
    @error('ciudad_id')<span>{{$message}}</span> @enderror
</div>

