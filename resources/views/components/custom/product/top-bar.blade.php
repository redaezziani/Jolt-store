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
    <x-my-button
    x-data
    x-on:click="$dispatch('category-side-bar-open')"
    class=" outline flex items-center justify-center gap-1 px-4 py-2">
        {{--this is to create a new cat--}}


        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4" /><path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3" /><path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
        <p>
            إنشاء فئة
        </p>
    </x-my-button>
    <x-my-button wire:click='downloadCsvProductsFile()' class=" outline flex items-center justify-center gap-1 px-4 py-2">
        <p>
            تنزيل ملف CSV للمنتجات
        </p>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"  fill="none">
            <path d="M12 15L12 5M12 15C11.2998 15 9.99153 13.0057 9.5 12.5M12 15C12.7002 15 14.0085 13.0057 14.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M5 19H19.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </x-my-button>

    <x-my-button
    x-data
    x-on:click="$dispatch('open-products-delete-model')"
    class=" destructive flex items-center justify-center gap-1 px-4 py-2 ">
        <p
        class=""
        >
            حذف الكل
        </p>
    </x-my-button>
    <x-my-button x-data x-on:click="$dispatch('dashboard-sheet-bar-open')"
        class=" flex items-center justify-center default  gap-1   py-2 ">
        <p>
            إنشاء منتج
        </p>
    </x-my-button>

</div>
