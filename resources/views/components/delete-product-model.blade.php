@props(['productId'])
<div x-data="{ show: false }" x-show="show" x-on:open-product-delete-model.window="show=true"
    x-on:close-product-delete-model.window="show=false" x-on:keydown.escape.window="show=false" style="display: none"
    class="fixed left-0 top-0 z-[99] flex h-screen w-full items-center justify-center overflow-hidden">
    <div x-data x-on:click="show=false" class="absolute inset-0  z-0 w-full bg-slate-900/10"></div>
    <section x-data
        class="z-10 flex h-44 w-[30rem] flex-col items-start justify-start gap-2 rounded-md border border-slate-400/30 bg-white p-4">
        <h2 class="font-medium text-red-500"
        >
            Delete Product
       </h2>
        <h3 class="text-slate-400">
            Are you sure that you what to delete this product ?
        </h3>
        <div
        wire:ignore
        class="mt-10 flex w-full items-center justify-end gap-2">
            <x-button x-data x-on:click="$dispatch('close-product-delete-model')" class="outline" id="cancel-button">
                cancel
            </x-button>
            <x-button

            wire:click="deleteProduct({{ $productId }})"
            class="destructive"
            id="deleteProduct"
            >
                <p>
                    Delete
                </p>


            </x-button>
        </div>
    </section>
</div>
