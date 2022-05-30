<div class="flex-column align-items-center">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <button class="btn" wire:click="decrement" wire:target="decrement">-</button>

    <span class="mx-2">{{$qty}}</span>

    <button class="btn" wire:click="increment" wire:target="increment">+</button>
</div>
