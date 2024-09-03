@props(['currentQuantity' => 1])
<div
 {{--max is the product quantity--}}
    x-data="{ quantity: 1 , max: 10}"
    x-init="quantity = $wire.entangle('quantity').defer"
    x-on:quantity-add="quantity < max ? quantity = quantity + 1 : null"
    x-on:quantity-sub="quantity > 1 ? quantity = quantity - 1 : null"
    x-on:quantity-input="quantity = $event.target.value"
    class=" flex w-44 p-0.5 mt-3  gap-2 justify-between items-center bg-neutral-100 border border-neutral-200/15 rounded-full ">
    <button

        wire:click="setQuantity({{ $currentQuantity + 1 }})"
        class="h-8 w-14 select-none rounded-full px-3 border border-neutral-400/35 bg-white font-bold flex justify-center items-center">
        +
    </button>
    <input
        wire:model.live="quantity"
        wire:change="setQuantity($event.target.value)"
        value="{{ $currentQuantity }}"
        type="text"
        class=" bg-transparent text-center w-14  border-none outline-none focus:outline-none focus:ring-0">
    <button
    wire:click="setQuantity({{ $currentQuantity - 1 }})"
    class="h-8 w-14 rounded-full select-none px-3 text-white bg-primary font-bold flex justify-center items-center">
        -
    </button>
</div>
