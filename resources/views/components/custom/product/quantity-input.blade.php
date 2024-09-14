@props(['currentQuantity' => 1, 'max' => 10])

<div
    x-data="{
        quantity: {{ $currentQuantity }},
        max: {{ $max }},
        increment() {
            if (this.quantity < this.max) {
                this.quantity++;
                $wire.set('quantity', this.quantity); // Update Livewire
            }
        },
        decrement() {
            if (this.quantity > 1) {
                this.quantity--;
                $wire.set('quantity', this.quantity); // Update Livewire
            }
        }
    }"
    class="flex w-44 p-0.5 mt-3 gap-2 justify-between items-center bg-neutral-100 border border-neutral-200/15 rounded-full"
>
    <button
        x-on:click="increment"
        class="h-8 w-14 select-none rounded-full px-3 border border-neutral-400/35 bg-white font-bold flex justify-center items-center">
        +
    </button>

    <input
        x-model="quantity"
        wire:model.lazy="quantity"
        type="text"
        class="bg-transparent text-center w-14 border-none outline-none focus:outline-none focus:ring-0"
    >

    <!-- Decrement Button -->
    <button
        x-on:click="decrement"
        class="h-8 w-14 rounded-full select-none px-3 text-white bg-primary font-bold flex justify-center items-center">
        -
    </button>
</div>
