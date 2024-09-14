@props(['productId'])
<div x-data="{ show: false }"
    x-show="show"
    x-on:open-product-delete-model.window="show=true"
    x-on:close-product-delete-model.window="show=false"
    x-on:keydown.escape.window="show=false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-10"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-10"
    style="display: none"
    class="fixed left-0 top-0 z-[99] bg-white flex h-screen w-full items-center justify-center overflow-hidden">

    <section x-data
        class="z-10 flex h-44 w-[30rem] flex-col items-start justify-start gap-2 rounded-md border border-slate-400/30 bg-white p-4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">

        <h2 class="font-medium text-red-500">
            تأكيد الحذف
        </h2>

        <h3 class="text-slate-400">
            هل أنت متأكد أنك تريد حذف هذا المنتج؟ لا يمكن التراجع عن هذا الإجراء.
        </h3>

        <div wire:ignore class="mt-10 flex w-full items-center justify-end gap-2">
            <x-my-button x-data x-on:click="$dispatch('close-product-delete-model')" class="outline" id="cancel-button">
                إلغاء
            </x-my-button>
            <x-my-button wire:click="deleteProduct({{ $productId }})" class="destructive" id="deleteProduct">
                <p>
                    حذف المنتج
                </p>
            </x-my-button>
        </div>
    </section>
</div>
