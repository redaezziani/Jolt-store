<div class="w-full flex gap-3 justify-end items-center ">
    <div class="relative w-[20rem] flex justify-start items-center">
        <x-my-input wire:model.live="search" type='text' placeholder="ابحث عن أي شيء..." class="w-full" />
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

    <x-dropdown>
        <x-dropdown.item icon="download" label="تنزيل ملف CSV للمنتجات" wire:click="downloadCsvProductsFile" />
        <x-dropdown.item icon="plus" label="إنشاء فئة" x-on:click="$dispatch('category-side-bar-open')" />
        <x-dropdown.item icon="trash" class=" text-red-500" label="حذف الكل" x-on:click="$dispatch('open-products-delete-model')" />
    </x-dropdown>

    <x-my-button x-data x-on:click="$dispatch('dashboard-sheet-bar-open')"
        class=" flex items-center justify-center default  gap-1   py-2 ">
        <p>
            إنشاء منتج
        </p>
    </x-my-button>

</div>
