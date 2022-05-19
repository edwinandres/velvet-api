<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="d-inline-block">
        <div>
            <button wire:click="saludar({{$articulo->nombre}})" type="button">actualizar</button>
            <button wire:click="prueba">NUEVO</button>
            <button wire:click="prueba2('{{$articulo->nombre}}')">NUEVO2</button>

            <p>{{$color}}</p>
            <button @wire:target="saludar" @wire:click="saludar">boton wire</button>
            <span id="qty">{{$qty}}</span>

            {{$articulo->nombre}}
            <button onclick="increment();">+</button>
        </div>
        <div>
            <button wire:click="agregarAlCarro"
                    wire:loading.attr="disabled"
                    wire:target="agregarAlCarro">Agregar al carrito de compras
            </button>
            <label>{{$estaencarro}}</label>
        </div>
    </div>
</div>


<script>
    function increment(){
        var id = document.getElementById('qty')
        var valor = Number(id.innerHTML)
        var nuevovalor = valor+1;
        id.innerText = nuevovalor
    }

    function decrement(){
        var id = document.getElementById('qty')
        var valor = Number(id.innerHTML)
        var nuevovalor = valor-1;
        id.innerText = nuevovalor
    }

    function agregarAlCarro(){
        var id = document.getElementById('qty')
        var valor = Number(id.innerHTML)
        alert("agregamos al carro " +valor+" objetos de tipo :")
    }

</script>
