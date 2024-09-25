<div class="w-full flex gap-3 mt-5 justify-between items-center ">

    {{-- lets make here a tap bar using alpine js and tailiwnd css --}}
    <div x-data="{ activeTab: @entangle('filter') }" class="flex gap-2 p-1.5 bg-slate-100 rounded-lg">

        <!-- Category (فئة) -->
        <span wire:click="setFilter('category')"
            class="px-3 py-1 text-sm font-medium select-none cursor-pointer rounded-md focus:outline-none"
            :class="{ 'bg-white text-primary': activeTab === 'category', 'text-slate-500': activeTab !== 'category' }">
            فئة
        </span>

        <!-- Quantity (كمية) -->
        <span wire:click="setFilter('quantity')"
            class="px-3 py-1 text-sm font-medium select-none cursor-pointer rounded-md focus:outline-none"
            :class="{ 'bg-white text-primary': activeTab === 'quantity', 'text-slate-500': activeTab !== 'quantity' }">
            كمية
        </span>

        <!-- Price (سعر) -->
        <span wire:click="setFilter('price')"
            class="px-3 py-1 text-sm font-medium select-none cursor-pointer rounded-md focus:outline-none"
            :class="{ 'bg-white text-primary': activeTab === 'price', 'text-slate-500': activeTab !== 'price' }">
            سعر
        </span>

        <!-- Date (تاريخ) -->
        <span wire:click="setFilter('date')"
            class="px-3 py-1 text-sm font-medium select-none cursor-pointer rounded-md focus:outline-none"
            :class="{ 'bg-white text-primary': activeTab === 'date', 'text-slate-500': activeTab !== 'date' }">
            تاريخ
        </span>

    </div>


    <div class="flex gap-3 justify-start items-center">

            <x-dropdown
        >
        <x-dropdown.item
        icon="save"
        label="تصدير المحدد"
        :disabled="count($selectedProducts) === 0"
        wire:click="exportSelectedProducts"
        />
        <x-dropdown.item
        icon="trash" class=" text-red-500"
        label="حذف المحدد"
        :disabled="count($selectedProducts) === 0"
        wire:click="deleteSelectedProducts"
        />
        </x-dropdown>
        <div class="relative w-[20rem] flex justify-start items-center">
            <x-my-input wire:model.live="search" type='text' placeholder="ابحث عن أي شيء..." class="w-full " />
            <div class="size-8 bg-white flex justify-center items-center text-slate-500 absolute left-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                    fill="none">
                    <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                </svg>
            </div>
        </div>


        <span
        wire:click="toggleOrder()"
        x-data="{ isActivated: false }"
        :class="{ 'text-primary': isActivated, 'text-slate-500': !isActivated }"
        class="flex items-center cursor-pointer justify-center gap-1 py-1"
        x-on:click="isActivated = !isActivated"
        >
            <svg class=" size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-sort-ascending">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l7 0" />
                <path d="M4 12l7 0" />
                <path d="M4 18l9 0" />
                <path d="M15 9l3 -3l3 3" />
                <path d="M18 6l0 12" />
            </svg>
        </span>
    </div>
</div>
