<div class="w-full flex gap-3 justify-end items-center ">
    <div class="relative w-[20rem] flex justify-start items-center">
        <x-input wire:model.live="search" type='text' placeholder="ابحث عن أي شيء..." class="w-full" />
        <div class="size-8 bg-white flex justify-center items-center text-slate-500 absolute left-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none">
                <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            </svg>
        </div>
    </div>

    <a href="{{ route('dashboard-products-create') }}">
        <x-button class="default flex items-center justify-center gap-1 px-4 py-2 bg-primary text-amber-200">
            <p>
                إنشاء منتج
            </p>
        </x-button>
    </a>

    <x-button
    wire:click='deleteAllProducts()'
    class="destructive flex items-center justify-center gap-1 px-4 py-2 bg-primary text-amber-200">
        <p>
            حذف الكل
        </p>
    </x-button>
    <div wire:ignore class="flex">
    </div>
</div>
