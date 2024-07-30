<div
 {{--max is the product quantity--}}
    x-data="{ quantity: 1 , max: 10}"
    x-init="quantity = $wire.entangle('quantity').defer"
    x-on:quantity-add="quantity < max ? quantity = quantity + 1 : null"
    x-on:quantity-sub="quantity > 1 ? quantity = quantity - 1 : null"
    x-on:quantity-input="quantity = $event.target.value"
    class=" flex w-52 p-0.5 mt-3  gap-2 justify-between items-center bg-neutral-100 border border-neutral-200/15 rounded-full ">
    <button

        x-on:click="$dispatch('quantity-add')"
        class="h-10 w-16 select-none rounded-full px-3 border border-neutral-400/35 bg-white font-bold flex justify-center items-center">
        +
    </button>
    <input
        x-model="quantity"
        x-on:input="quantity = $event.target.value"
        x-on:change="$dispatch('quantity-input', $event)"
        x-bind:value="quantity"
        x-bind:min="1"
        x-bind:max="max"
        value="1"
        type="text"
        class=" bg-transparent text-center w-14  border-none outline-none focus:outline-none focus:ring-0">
    <button
    x-on:click="$dispatch('quantity-sub')"
    class="h-10 w-16 rounded-full select-none px-3 text-white bg-primary font-bold flex justify-center items-center">
        -
    </button>
</div>
