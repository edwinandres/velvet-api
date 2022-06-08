<div class="form-group">
    <label>Cantidad</label>
    <input type="text" class="form-control" wire:model="cantidad">
    @error('cantidad')<span>{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label>Articulo</label>
    <textarea type="text" class="form-control" wire:model="articulo_id"></textarea>
    @error('articulo_id')<span>{{$message}}</span> @enderror
</div>

{{--<div class="form-group">--}}
{{--    <label>Precio compra</label>--}}
{{--    <input type="number" class="form-control" wire:model="precio_compra"/>--}}
{{--    @error('precio_compra')<span>{{$message}}</span> @enderror--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <label>Precio venta</label>--}}
{{--    <input type="number" class="form-control" wire:model="precio_venta"/>--}}
{{--    @error('precio_venta')<span>{{$message}}</span> @enderror--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label>Categoria</label>--}}
{{--    <select wire:model="categoria_id" class="form-control">--}}
{{--        <option value="">--Categoria--</option>--}}
{{--        @foreach($categorias as $categoria)--}}
{{--            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    @error('categoria_id')<span>{{$message}}</span> @enderror--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label>Proveedor</label>--}}
{{--    <select wire:model="proveedor_id" class="form-control">--}}
{{--        <option value="">--Proveedor--</option>--}}
{{--        @foreach($proveedores as $proveedor)--}}
{{--            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    @error('proveedor_id')<span>{{$message}}</span> @enderror--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label>Imagen</label>--}}
{{--    <input type="text" class="form-control" wire:model="imagen_url">--}}
{{--    @error('imagen_url')<span>{{$message}}</span> @enderror--}}
{{--</div>--}}
